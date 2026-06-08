<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Secure Cryptography</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            background:
                radial-gradient(circle at top left,#2563eb,transparent 30%),
                radial-gradient(circle at bottom right,#7c3aed,transparent 30%),
                #0f172a;
            color:white;
            overflow:hidden;
        }

        .hero{
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            text-align:center;
            padding:30px;
        }

        .content{
            max-width:850px;
        }

        h1{
            font-size:70px;
            margin-bottom:20px;
            line-height:1.1;
        }

        p{
            font-size:20px;
            color:#cbd5e1;
            line-height:1.8;
            margin-bottom:40px;
        }

        .btn{
            display:inline-block;
            padding:18px 40px;
            border-radius:15px;
            text-decoration:none;
            background:linear-gradient(135deg,#3b82f6,#06b6d4);
            color:white;
            font-weight:600;
            transition:0.3s;
        }

        .btn:hover{
            transform:translateY(-5px);
        }

        .badges{
            margin-top:40px;
            display:flex;
            justify-content:center;
            gap:15px;
            flex-wrap:wrap;
        }

        .badge{
            background:rgba(255,255,255,0.08);
            padding:12px 20px;
            border-radius:30px;
            border:1px solid rgba(255,255,255,0.08);
            color:#cbd5e1;
        }

        @media(max-width:768px){

    body{
        padding:15px;
    }

    .container{
        padding:20px;
        border-radius:20px;
    }

    .title h1{
        font-size:32px;
    }

    .stats{
        grid-template-columns:1fr;
    }

    .card{
        padding:25px;
    }

    .history-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .history-actions-top,
    .history-actions{
        width:100%;
        flex-direction:column;
    }

    .copy-btn,
    .delete-btn,
    .export-btn,
    .delete-all-btn{
        width:100%;
    }

    textarea{
        min-height:130px;
    }
}

    </style>

</head>
<body>

<div class="hero">

    <div class="content">

        <h1>
            🔐 Secure Cryptography System
        </h1>

        <p>
            Platform enkripsi dan dekripsi multi algoritma modern
            menggunakan Laravel enkripsi dan dekripsi teks Anda dengan aman
            menggunakan Caesar Cipher, Vigenere Cipher, RSA, dan enkripsi AES..
        </p>

        <a href="/crypto" class="btn">
            Launch Secure System
        </a>

        <div class="badges">

            <div class="badge">🛡 Secure Encryption</div>

            <div class="badge">⚡ Multi Algorithm</div>

            <div class="badge">💾 Database History</div>

            <div class="badge">📋 Copy Result</div>

            <div class="badge">📄 Download Result</div>
            
        </div>

    </div>

</div>
</body>
</html>