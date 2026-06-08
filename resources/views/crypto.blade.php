<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Secure Cryptography</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins', sans-serif;
            min-height:100vh;
            background:
                radial-gradient(circle at top left, #2563eb, transparent 30%),
                radial-gradient(circle at bottom right, #7c3aed, transparent 30%),
                #0f172a;
            color:white;
            padding:30px;
            overflow-y:auto;
        }

        .container{
            width:100%;
            max-width:1100px;
            margin:auto;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(15px);
            border:1px solid rgba(255,255,255,0.1);
            border-radius:30px;
            padding:40px;
            box-shadow:0 10px 40px rgba(0,0,0,0.4);
        }

        .title{
            text-align:center;
            margin-bottom:40px;
        }

        .back-home{
    display:inline-block;
    margin-bottom:20px;
    padding:12px 20px;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.12);
    color:white;
    text-decoration:none;
    font-weight:500;
    transition:0.3s;
}

.back-home:hover{
    background:rgba(255,255,255,0.15);
    transform:translateY(-2px);
}

        .title h1{
            font-size:50px;
            margin-bottom:10px;
        }

        .title p{
            color:#cbd5e1;
        }

        .security-badge{
            display:flex;
            justify-content:center;
            gap:15px;
            margin-top:20px;
            flex-wrap:wrap;
        }

        .badge{
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.08);
            padding:10px 18px;
            border-radius:30px;
            font-size:13px;
            color:#cbd5e1;
        }

        .stats{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:15px;
            margin:35px 0;
        }

        .stats-card{
            background:rgba(255,255,255,0.06);
            padding:25px;
            border-radius:20px;
            text-align:center;
            border:1px solid rgba(255,255,255,0.08);
        }

        .stats-card h3{
            font-size:35px;
            margin-bottom:10px;
        }

        .stats-card p{
            color:#cbd5e1;
        }

        .grid{
            display:flex;
            justify-content:center;
        }

        .card{
            width:100%;
            max-width:700px;
            background:rgba(255,255,255,0.07);
            border:1px solid rgba(255,255,255,0.08);
            border-radius:25px;
            padding:35px;
        }

        .card h2{
            margin-bottom:25px;
            font-size:30px;
        }

        label{
            display:block;
            margin-bottom:10px;
            margin-top:20px;
            color:#cbd5e1;
        }

        textarea,
        input,
        .select-method{
            width:100%;
            padding:15px;
            border:none;
            border-radius:15px;
            background:rgba(255,255,255,0.08);
            color:white;
            outline:none;
            font-size:15px;
        }

        textarea{
            min-height:160px;
            resize:none;
        }

        textarea::placeholder,
        input::placeholder{
            color:#94a3b8;
        }

        .select-method option{
            background:#0f172a;
            color:white;
        }

        .btn{
            width:100%;
            margin-top:30px;
            padding:15px;
            border:none;
            border-radius:15px;
            background:linear-gradient(135deg,#3b82f6,#06b6d4);
            color:white;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            transform:scale(1.02);
            opacity:0.95;
        }

        .result{
            margin-top:30px;
            background:rgba(255,255,255,0.08);
            padding:25px;
            border-radius:20px;
            word-wrap:break-word;
        }

        .result h3{
            margin-bottom:15px;
        }

        .result p{
            line-height:1.8;
            color:#e2e8f0;
        }
        
        .history-section{
            margin-top:50px;
        }

        .copy-btn,
.delete-btn,
.export-btn,
.delete-all-btn{
    min-width:120px;
    height:45px;

    border:none;
    border-radius:12px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:14px;
    font-weight:600;

    text-decoration:none;
    cursor:pointer;

    transition:all .3s ease;
}

/* Copy & Export */

.copy-btn,
.export-btn{
    background:linear-gradient(
        135deg,
        #3b82f6,
        #06b6d4
    );
    color:white;
}

/* Delete */

.delete-btn,
.delete-all-btn{
    background:#ef4444;
    color:white;
}

/* Hover */

.copy-btn:hover,
.export-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(6,182,212,.35);
}

.delete-btn:hover,
.delete-all-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(239,68,68,.35);
}

        .history-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
            gap:20px;
            flex-wrap:wrap;
        }

        .history-card{
            background:rgba(255,255,255,0.06);
            padding:20px;
            border-radius:18px;
            margin-bottom:15px;
            border:1px solid rgba(255,255,255,0.08);
        }

        .history-card p{
            margin-bottom:8px;
            color:#e2e8f0;
            word-wrap:break-word;
        }
                
        .history-actions{
            display:flex;
            gap:12px;
            align-items:center;
            margin-top:18px;    
}

.history-actions-top{
    display:flex;
    gap:12px;
    align-items:center;
}

.copy-source{
    position:absolute;
    left:-9999px;
    top:-9999px;
}

.export-btn:hover{
    opacity:0.9;
    transform:translateY(-2px);
}

        .footer{
            text-align:center;
            margin-top:35px;
            color:#94a3b8;
            font-size:13px;
        }

        @media(max-width:768px){

            .stats{
                grid-template-columns:1fr;
            }

            .title h1{
                font-size:36px;
            }

            .container{
                padding:25px;
            }

            .search-form{
                display:flex;
                gap:15px;
                margin-bottom:20px;
            }
            
            .search-form input{
                flex:1;
            }
        @media(max-width:768px){           
    .search-form{
        flex-direction:column;
    }
       
       .history-date{ 
           color:#94a3b8;
           font-size:13px;
           margin-bottom:10px;
}
        

}
        }

    </style>

</head>
<body>

<div class="container">

    <div class="title">

    <a href="/" class="back-home">
        ← Back to Home
    </a>

    <h1>🔐 Secure Cryptography</h1>

    <p>Multi Algorithm Encryption System Using Laravel</p>

    <div class="security-badge">

        <div class="badge">
            🔒 Secure Encryption
        </div>

        <div class="badge">
            ⚡ Multi Algorithm
        </div>

        <div class="badge">
            🛡 Laravel Security
        </div>

    </div>

</div>

    <div class="stats">

    <div class="stats-card">
        <h3>{{ $total }}</h3>
        <p>Total History</p>
    </div>

    <div class="stats-card">
        <h3>{{ $caesar }}</h3>
        <p>Caesar Used</p>
    </div>

    <div class="stats-card">
        <h3>{{ $vigenere }}</h3>
        <p>Vigenere Used</p>
    </div>
    
    <div class="stats-card">
        <h3>{{ $rsa}}</h3>
        <p>RSA Used</p>
    </div>

    <div class="stats-card">
        <h3>{{ $aes }}</h3>
        <p>AES Used</p>
    </div>

</div>

    <div class="grid">

        <div class="card">

            <h2>Secure Encryption System</h2>

            <form action="/process" method="POST">

                @csrf

                <label>Input Text</label>

                <textarea
                    name="text"
                    placeholder="Masukkan text..."
                    required
                ></textarea>

                <label>Key / Shift</label>

                <input
                    type="text"
                    name="shift"
                    value="3"
                >

                <label>Action</label>

                <select name="action" class="select-method">

                    <option value="encrypt">
                        Encrypt
                    </option>

                    <option value="decrypt">
                        Decrypt
                    </option>

                </select>

                <label>Encryption Method</label>

                <select name="algorithm" class="select-method">

                    <option value="caesar">Caesar Cipher</option>
                    <option value="vigenere">Vigenere Cipher</option>
                    <option value="rsa">RSA</option>                    
                    <option value="aes">AES (Advanced Encryption Standard)</option>

                </select>

                <button type="submit" class="btn">

                    Process Now

                </button>

            </form>

            @if(session('result'))

            <div class="result" id="resultBox">
               <h3>Result</h3>
               <p id="resultText">
        {{ session('result') }}
    </p>

</div>

            @endif

        </div>

    </div>

    <!-- HISTORY -->

    
    <div class="history-section">

    <form action="/crypto" method="GET" class="search-form">

    <input
        type="text"
        name="search"
        placeholder="Search history..."
        value="{{ $search ?? '' }}"
    >

    <button type="submit" class="btn">
        Search
    </button>

</form>

<div class="history-header">

    <h2>📜 History</h2>

    <div class="history-actions-top">

        <a href="/history/export/pdf" class="export-btn">
            📄 Export PDF
        </a>

        <form action="/history/delete/all" method="POST">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="delete-all-btn"
                onclick="return confirm('Yakin ingin menghapus semua history?')"
            >
                Delete All
            </button>

        </form>

    </div>

</div>

        @foreach($histories as $history)

<div class="history-card">

    <p>
        <strong>Action:</strong>
        {{ $history->action }}
    </p>

    <p>
        <strong>Algorithm:</strong>
        {{ $history->algorithm }}
    </p>

    <p class="history-date">   
        <strong>Date:</strong>  
        {{ $history->created_at->timezone('Asia/Jakarta')->format('d M Y - H:i:s') }} WIB   
    </p>

    <p>
        <strong>Input:</strong>
        {{ $history->input_text }}
    </p>

    <p>
        <strong>Result:</strong>
        {{ $history->result_text }}
    </p>

    <textarea
        id="copy-source-{{ $history->id }}"
        class="copy-source"
        readonly
    >{{ $history->result_text }}</textarea>

    <div class="history-actions">

        <button
            type="button"
            class="copy-btn"
            onclick="copyHistoryResult('{{ $history->id }}')"
        >
            Copy
        </button>

        <form action="/history/{{ $history->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="delete-btn"
                onclick="return confirm('Yakin ingin menghapus history ini?')"
            >
                Delete
            </button>
        </form>

    </div>

</div>

@endforeach

    </div>

    <div class="footer">

        Made with Laravel • Multi Algorithm Cryptography Project

    </div>

</div>

<script>
const inputText = document.querySelector('textarea[name="text"]');
const shiftInput = document.querySelector('input[name="shift"]');
const actionSelect = document.querySelector('select[name="action"]');
const algorithmSelect = document.querySelector('select[name="algorithm"]');
const resultBox = document.getElementById('resultBox');
const resultText = document.getElementById('resultText');
const resultTitle = document.getElementById('resultTitle');

function caesarCipher(text, shift, action) {
    text = text.toUpperCase();
    shift = parseInt(shift) || 0;

    let result = '';

    for (let i = 0; i < text.length; i++) {
        let char = text[i];

        if (char >= 'A' && char <= 'Z') {
            let code = char.charCodeAt(0);
            let converted;

            if (action === 'encrypt') {
                converted = ((code - 65 + shift) % 26) + 65;
            } else {
                converted = ((code - 65 - shift + 26) % 26) + 65;
            }

            result += String.fromCharCode(converted);
        } else {
            result += char;
        }
    }

    return result;
}

function vigenereCipher(text, key, action) {
    text = text.toUpperCase();
    key = key.toUpperCase();

    if (key.trim() === '') {
        return 'Key Vigenere tidak boleh kosong!';
    }

    let result = '';
    let keyIndex = 0;

    for (let i = 0; i < text.length; i++) {
        let char = text[i];

        if (char >= 'A' && char <= 'Z') {
            let textCode = char.charCodeAt(0) - 65;
            let keyCode = key[keyIndex % key.length].charCodeAt(0) - 65;
            let converted;

            if (action === 'encrypt') {
                converted = (textCode + keyCode) % 26;
            } else {
                converted = (textCode - keyCode + 26) % 26;
            }

            result += String.fromCharCode(converted + 65);
            keyIndex++;
        } else {
            result += char;
        }
    }

    return result;
}

function realtimeProcess() {
    const text = inputText.value;
    const shift = shiftInput.value;
    const action = actionSelect.value;
    const algorithm = algorithmSelect.value;

    if (algorithm === 'aes' || algorithm === 'rsa') {
        resultBox.style.display = 'none';
        resultText.innerText = '';
        return;
    }

    if (text.trim() === '') {
        resultBox.style.display = 'none';
        resultText.innerText = '';
        return;
    }

    let result = '';

    if (algorithm === 'caesar') {
        result = caesarCipher(text, shift, action);
    }

    if (algorithm === 'vigenere') {
        result = vigenereCipher(text, shift, action);
    }

    resultBox.style.display = 'block';
    resultText.innerText = result;
}

function copyHistoryResult(id) {
    const textarea = document.getElementById('copy-source-' + id);
    textarea.select();
    textarea.setSelectionRange(0, 999999);
    document.execCommand('copy');
    alert('History result copied!');
}

inputText.addEventListener('input', realtimeProcess);
shiftInput.addEventListener('input', realtimeProcess);
actionSelect.addEventListener('change', realtimeProcess);
algorithmSelect.addEventListener('change', realtimeProcess);
</script>
</body>
</html>