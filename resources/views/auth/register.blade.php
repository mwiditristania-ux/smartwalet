<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register - Smart Walet</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;

    background:#dbeafe;
}

/* ===== BACKGROUND ===== */
.bg{
    position:absolute;
    inset:0;

    background:
    url("{{ asset('images/amazewalet.png') }}");

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    z-index:0;
}

/* ===== OVERLAY ===== */
.overlay{
    display:none;
}

/* ===== CARD ===== */
.card{
    position:relative;
    z-index:2;

    width:100%;
    max-width:520px;

    padding:18px 34px;

    border-radius:28px;

    background:rgba(255,255,255,0.18);

    backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.35);

    box-shadow:
    0 15px 40px rgba(0,0,0,0.18);

    overflow:hidden;

    animation:cardFloat 5s ease-in-out infinite;
}

/* ===== CARD DECOR ===== */
.card::before{
    content:'';

    position:absolute;

    width:180px;
    height:180px;

    background:
    rgba(56,189,248,0.12);

    border-radius:50%;

    top:-70px;
    right:-70px;
}

.card::after{
    content:'';

    position:absolute;

    width:130px;
    height:130px;

    background:
    rgba(125,211,252,0.15);

    border-radius:50%;

    bottom:-60px;
    left:-60px;
}

@keyframes cardFloat{
    0%,100%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-6px);
    }
}

/* ===== LOGO ===== */
.logo{
    width:82px;
    height:82px;

    margin:auto;
    margin-bottom:14px;

    border-radius:50%;

    overflow:hidden;

    display:flex;
    justify-content:center;
    align-items:center;

    background:white;

    border:5px solid rgba(255,255,255,0.9);

    box-shadow:
    0 10px 35px rgba(56,189,248,0.45);
}

.logo img{
    width:100%;
    height:100%;

    object-fit:cover;
}

/* ===== TITLE ===== */
.card h2{
    text-align:center;

    font-size:30px;
    font-weight:700;

    color:#0f172a;

    letter-spacing:1px;
}

/* ===== SUBTITLE ===== */
.subtitle{
    margin-top:6px;
    margin-bottom:14px;

    text-align:center;

    font-size:14px;
    line-height:1.5;

    color:#0f172a;

    font-weight:700;
}

/* ===== INPUT ===== */
.input-group{
    margin-bottom:12px;
}

.input-group label{
    display:block;

    margin-bottom:8px;

    font-size:14px;
    font-weight:600;

    color:#0f172a;
}

input{
    width:100%;

    padding:11px 15px;

    border-radius:16px;

    border:
    1px solid rgba(148,163,184,0.25);

    background:
    rgba(255,255,255,0.75);

    font-size:14px;
    font-weight:500;

    color:#0f172a;

    transition:0.3s;

    outline:none;
}

input::placeholder{
    color:#94a3b8;
}

input:focus{
    border-color:#38bdf8;

    box-shadow:
    0 0 0 4px rgba(56,189,248,0.15);

    background:white;
}

/* ===== PASSWORD BOX ===== */
.password-box{
    position:relative;
}

.password-box input{
    padding-right:55px;
}

/* ===== ICON MATA ===== */
.toggle-password{
    position:absolute;

    right:18px;
    top:50%;

    transform:translateY(-50%);

    cursor:pointer;

    font-size:18px;

    user-select:none;

    transition:0.3s;
}

.toggle-password:hover{
    transform:
    translateY(-50%)
    scale(1.1);
}

/* ===== BUTTON ===== */
button{
    width:100%;

    padding:12px;

    border:none;
    border-radius:18px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #38bdf8
    );

    color:white;

    font-size:15px;
    font-weight:600;

    cursor:pointer;

    transition:0.3s;

    box-shadow:
    0 10px 25px rgba(56,189,248,0.35);
}

button:hover{

    transform:translateY(-2px);

    box-shadow:
    0 15px 35px rgba(56,189,248,0.5);
}

/* ===== BOTTOM ===== */
.bottom-text{
    margin-top:18px;

    text-align:center;

    font-size:14px;

    color:#0f172a;

    font-weight:600;
}

.bottom-text a{
    color:#0f172a;

    font-weight:700;

    text-decoration:none;
}

.bottom-text a:hover{
    text-decoration:underline;
}

/* ===== FOOTER ===== */
.footer{
    margin-top:18px;

    text-align:center;

    font-size:12px;

    color:#0f172a;

    font-weight:600;

    line-height:1.8;
}

/* ===== RESPONSIVE ===== */
@media(max-width:500px){

    .card{
        margin:20px;
        padding:28px 24px;
    }

    .card h2{
        font-size:30px;
    }

    .logo{
        width:100px;
        height:100px;
    }
}

</style>
</head>

<body>

<!-- BACKGROUND -->
<div class="bg"></div>

<!-- OVERLAY -->
<div class="overlay"></div>

<!-- CARD -->
<div class="card">

    <!-- LOGO -->
    <div class="logo">

        <img
        src="{{ asset('images/logo-walet.png') }}"
        alt="Logo Walet">

    </div>

    <h2>SMART WALET</h2>

    <p class="subtitle">
        Buat akun untuk mengakses sistem monitoring suhu
        dan kelembaban rumah walet secara realtime.
    </p>

    <!-- FORM -->
    <form method="POST" action="/register">

        @csrf

        <!-- NAMA -->
        <div class="input-group">

            <label>Nama Lengkap</label>

            <input
            type="text"
            name="name"
            placeholder="Masukkan nama lengkap..."
            required>

        </div>

        <!-- EMAIL -->
        <div class="input-group">

            <label>Email</label>

            <input
            type="email"
            name="email"
            placeholder="Masukkan email..."
            required>

        </div>

        <!-- PASSWORD -->
        <div class="input-group">

            <label>Password</label>

            <div class="password-box">

                <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password..."
                required>

                <span class="toggle-password"
                onclick="togglePassword('password')">

                    👁️

                </span>

            </div>

        </div>

        <!-- KONFIRMASI -->
        <div class="input-group">

            <label>Konfirmasi Password</label>

            <div class="password-box">

                <input
                type="password"
                id="confirmPassword"
                name="password_confirmation"
                placeholder="Konfirmasi password..."
                required>

                <span class="toggle-password"
                onclick="togglePassword('confirmPassword')">

                    👁️

                </span>

            </div>

        </div>

        <!-- BUTTON -->
        <button type="submit">

            🚀 Daftar Sekarang

        </button>

    </form>

    <!-- LOGIN -->
    <div class="bottom-text">

        Sudah punya akun?
        <a href="/login">Login</a>

    </div>

    <!-- FOOTER -->
    <div class="footer">

        Smart Walet Monitoring System <br>
        Tampilan modern • Soft blue UI • Realtime Monitoring

    </div>

</div>

<!-- SCRIPT -->
<script>

function togglePassword(id){

    const input =
    document.getElementById(id);

    if(input.type === 'password'){

        input.type = 'text';

    }else{

        input.type = 'password';
    }
}

</script>

</body>
</html>