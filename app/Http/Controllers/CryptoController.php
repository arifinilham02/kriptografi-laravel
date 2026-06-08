<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Barryvdh\DomPDF\Facade\Pdf;

class CryptoController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $histories = History::when($search, function ($query) use ($search) {
            $query->where('input_text', 'like', "%$search%")
                ->orWhere('result_text', 'like', "%$search%")
                ->orWhere('algorithm', 'like', "%$search%")
                ->orWhere('action', 'like', "%$search%");
        })->latest()->get();

        $total = History::count();
        $caesar = History::where('algorithm', 'CAESAR')->count();
        $vigenere = History::where('algorithm', 'VIGENERE')->count();
        $aes = History::where('algorithm', 'AES')->count();
        $rsa = History::where('algorithm', 'RSA')->count();

        return view('crypto', compact(
            'histories',
            'total',
            'caesar',
            'vigenere',
            'aes',
            'rsa',
            'search'
        ));
    }

    public function process(Request $request)
    {
        $text = $request->text;
        $shift = $request->shift;
        $action = $request->action;
        $algorithm = $request->algorithm;
        $result = '';

        if ($algorithm == 'caesar') {
            $text = strtoupper($text);
            $result = $this->caesar($text, (int) $shift, $action);
        }

        elseif ($algorithm == 'vigenere') {
            $text = strtoupper($text);

            $result = empty($shift)
                ? 'Key Vigenere tidak boleh kosong!'
                : $this->vigenere($text, $shift, $action);
        }

        elseif ($algorithm == 'aes') {
            if ($action == 'encrypt') {
                $result = encrypt($text);
            } else {
                try {
                    $result = decrypt($text);
                } catch (\Exception $e) {
                    $result = 'Cipher tidak valid!';
                }
            }
        }

        elseif ($algorithm == 'rsa') {
            if ($action == 'encrypt') {
                $publicKeyPath = storage_path('app/keys/public.pem');

                if (!file_exists($publicKeyPath)) {
                    $result = 'Public key RSA belum tersedia!';
                } else {
                    $publicKey = file_get_contents($publicKeyPath);

                    if (openssl_public_encrypt($text, $encrypted, $publicKey)) {
                        $result = base64_encode($encrypted);
                    } else {
                        $result = 'Gagal melakukan RSA encrypt!';
                    }
                }
            } else {
                $privateKeyPath = storage_path('app/keys/private.pem');

                if (!file_exists($privateKeyPath)) {
                    $result = 'Private key RSA belum tersedia!';
                } else {
                    $privateKey = file_get_contents($privateKeyPath);

                    if (openssl_private_decrypt(base64_decode($text), $decrypted, $privateKey)) {
                        $result = $decrypted;
                    } else {
                        $result = 'RSA cipher tidak valid!';
                    }
                }
            }
        }

        History::create([
            'input_text' => $text,
            'result_text' => $result,
            'algorithm' => strtoupper($algorithm),
            'action' => strtoupper($action)
        ]);

        return redirect('/crypto')->with('result', $result);
    }

    private function caesar($text, $shift, $action)
    {
        $result = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_alpha($char)) {
                $ascii = ord($char);

                if ($action == 'encrypt') {
                    $converted = (($ascii - 65 + $shift) % 26) + 65;
                } else {
                    $converted = (($ascii - 65 - $shift + 26) % 26) + 65;
                }

                $result .= chr($converted);
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    private function vigenere($text, $key, $action)
    {
        $text = strtoupper($text);
        $key = strtoupper($key);
        $result = '';
        $keyIndex = 0;

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];

            if (ctype_alpha($char)) {
                $textCode = ord($char) - 65;
                $keyCode = ord($key[$keyIndex % strlen($key)]) - 65;

                if ($action == 'encrypt') {
                    $converted = ($textCode + $keyCode) % 26;
                } else {
                    $converted = ($textCode - $keyCode + 26) % 26;
                }

                $result .= chr($converted + 65);
                $keyIndex++;
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    public function deleteHistory($id)
    {
        History::findOrFail($id)->delete();

        return back();
    }

    public function deleteAllHistory()
    {
        History::truncate();

        return back();
    }

    public function exportPdf()
    {
        $histories = History::latest()->get();

        $pdf = Pdf::loadView('history_pdf', compact('histories'));

        return $pdf->download('history-cryptography.pdf');
    }
}