<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Smart Walet</title>

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

/* ===== SOFT LIGHT ===== */
.light{
    display:none;
}

/* ===== BUBBLE ===== */
.bubble{
    display:none;
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
    max-width:560px;

    padding:26px 42px;

    border-radius:32px;

    background:rgba(255,255,255,0.18);

    backdrop-filter:blur(10px);

    border:
    1px solid rgba(255,255,255,0.35);

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
    width:100px;
    height:100px;

    margin:auto;
    margin-bottom:22px;

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

/* ===== IMAGE LOGO ===== */
.logo img{
    width:100%;
    height:100%;

    object-fit:cover;
}

/* ===== TITLE ===== */
.card h2{
    text-align:center;

    font-size:36px;
    font-weight:700;

    color:#0f172a;

    letter-spacing:1px;
}

/* ===== SUBTITLE ===== */
.subtitle{
    margin-top:10px;
    margin-bottom:22px;

    text-align:center;

    font-size:15px;
    line-height:1.8;

    color:#0f172a;

    font-weight:700; /* BOLD */

    text-shadow:
    0 1px 2px rgba(255,255,255,0.3);
}

/* ===== INPUT ===== */
.input-group{
    margin-bottom:22px;
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

    padding:15px 18px;

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

    padding:15px;

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

/* ===== ERROR LOGIN ===== */
.error-box{
    margin-bottom:20px;

    padding:14px;

    border-radius:16px;

    background:
    rgba(254,226,226,0.85);

    border:
    1px solid rgba(248,113,113,0.3);

    color:#dc2626;

    font-size:14px;
    font-weight:600;

    text-align:center;

    animation:shake 0.4s ease;
}

/* ===== ERROR INPUT ===== */
.input-error{

    margin-top:8px;

    color:#dc2626;

    font-size:13px;
    font-weight:600;

    padding-left:3px;
}

/* ===== SHAKE ===== */
@keyframes shake{

    0%{
        transform:translateX(0);
    }

    25%{
        transform:translateX(-4px);
    }

    50%{
        transform:translateX(4px);
    }

    75%{
        transform:translateX(-4px);
    }

    100%{
        transform:translateX(0);
    }
}

/* ===== BOTTOM ===== */
.bottom-text{
    margin-top:22px;

    text-align:center;

    font-size:14px;

    color:#0f172a; /* SAMAKAN DENGAN SMART WALET */

    font-weight:600;
}

.bottom-text a{
    color:#0f172a; /* SAMAKAN */

    font-weight:700;

    text-decoration:none;
}

.bottom-text a:hover{
    text-decoration:underline;
}

/* ===== FOOTER ===== */
.footer{
    margin-top:28px;

    text-align:center;

    font-size:12px;

    color:#0f172a; /* SAMAKAN */

    font-weight:600;

    line-height:1.8;
}

/* ===== RESPONSIVE ===== */
@media(max-width:500px){

    .card{
        margin:20px;
        padding:32px 25px;
    }

    .card h2{
        font-size:30px;
    }
}

</style>
</head>

<body>

<!-- BACKGROUND -->
<div class="bg"></div>

<!-- LIGHT EFFECT -->
<div class="light light1"></div>
<div class="light light2"></div>

<!-- BUBBLE -->
<div class="bubble b1"></div>
<div class="bubble b2"></div>
<div class="bubble b3"></div>

<!-- OVERLAY -->
<div class="overlay"></div>

<!-- CARD -->
<div class="card">

   <div class="logo">

    <img
    src="{{ asset('images/logo-walet.png') }}"
    alt="Logo Walet">

</div>

    <h2>SMART WALET</h2>

    <p class="subtitle">
        Sistem Monitoring Suhu & Kelembaban Rumah Walet
        secara realtime menggunakan ESP8266 dan sensor DHT.
    </p>

    <!-- ERROR LOGIN -->
    @if ($errors->has('login'))

        <div class="error-box">

            ❌ {{ $errors->first('login') }}

        </div>

    @endif

    <!-- FORM -->
    <form method="POST" action="/login">

        @csrf

        <!-- EMAIL -->
        <div class="input-group">

            <label>Email</label>

            <input
            type="email"
            name="email"
            value="{{ old('email') }}"
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

                <!-- ICON MATA -->
                <span class="toggle-password"
                onclick="togglePassword()">

                    👁️

                </span>

            </div>

            <!-- ERROR PASSWORD -->
            @error('password')

                <div class="input-error">

                    ❌ Password salah

                </div>

            @enderror

        </div>

        <!-- BUTTON -->
        <button type="submit">
            🚀 Masuk ke Dashboard
        </button>

    </form>

    <div class="bottom-text">

        Belum punya akun?
        <a href="/register">Daftar Sekarang</a>

    </div>

    <div class="footer">

        Smart Walet Monitoring System <br>
        Realtime Monitoring

    </div>

</div>

<!-- SCRIPT -->
<script>

function togglePassword(){

    const password =
    document.getElementById('password');

    if(password.type === 'password'){

        password.type = 'text';

    }else{

        password.type = 'password';
    }
}

</script>

</body>
</html>