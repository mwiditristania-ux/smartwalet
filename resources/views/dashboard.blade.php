<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Smart Walet</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    overflow-x:hidden;
    color:white;
    background:#dff4ff;
}

/* ===== BACKGROUND ===== */
.bg{
    position:fixed;
    inset:0;

    background:
    linear-gradient(
        rgba(219,239,255,0.82),
        rgba(191,229,255,0.88)
    ),
    url("{{ asset('images/amazewalet.png') }}");

    background-size:cover;
    background-position:center;

    z-index:-2;
}

/* ===== EFFECT ===== */
.bg::after{
    content:'';

    position:absolute;
    inset:0;

    background:
    radial-gradient(circle at top right,
    rgba(255,255,255,0.4),
    transparent 40%);

    z-index:-1;
}

/* ===== SIDEBAR ===== */
.sidebar{
    position:fixed;
    left:0;
    top:0;

    width:260px;
    height:100%;

    padding:28px 20px;

    background:
    linear-gradient(
        180deg,
        rgba(29,78,216,0.95),
        rgba(14,165,233,0.95)
    );

    backdrop-filter:blur(10px);

    border-right:
    1px solid rgba(255,255,255,0.12);

    box-shadow:
    0 0 30px rgba(0,0,0,0.15);

    z-index:10;
}

.logo-box{
    text-align:center;
    margin-bottom:35px;
}

.logo-box h2{
    font-size:28px;
    font-weight:700;
    color:white;
}

.logo-box p{
    margin-top:6px;
    font-size:13px;
    opacity:0.9;
}

/* ===== MENU ===== */
.menu{
    display:flex;
    align-items:center;
    gap:10px;

    width:100%;

    padding:15px 18px;
    margin-bottom:15px;

    border:none;
    border-radius:18px;

    background:rgba(255,255,255,0.14);

    color:white;
    text-decoration:none;

    font-weight:500;

    cursor:pointer;

    transition:0.25s;
}

.menu:hover{
    background:white;
    color:#0284c7;

    transform:translateX(5px);
}

.menu.active{
    background:white;
    color:#0284c7;

    box-shadow:
    0 10px 25px rgba(255,255,255,0.25);
}

.logout{
    background:rgba(239,68,68,0.18);
}

.logout:hover{
    background:#ef4444;
    color:white;
}

/* ===== MAIN ===== */
.main{
    margin-left:270px;
    padding:35px 25px;
}

/* ===== CONTAINER ===== */
.container{
    max-width:1200px;
    margin:auto;
}

/* ===== HEADER ===== */
.header{
    padding:35px;

    border-radius:28px;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.95),
        rgba(224,242,254,0.95)
    );

    color:#0f172a;

    box-shadow:
    0 10px 35px rgba(14,165,233,0.18);

    margin-bottom:30px;

    border:
    1px solid rgba(255,255,255,0.4);
}

.header-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:20px;
}

.header h1{
    font-size:38px;
    color:#0284c7;
    margin-bottom:10px;
}

.header p{
    color:#475569;
    line-height:1.8;
}

.live{
    padding:12px 20px;

    border-radius:30px;

    background:
    rgba(14,165,233,0.12);

    color:#0284c7;

    font-weight:600;

    animation:blink 1s infinite;
}

@keyframes blink{
    0%,100%{
        opacity:1;
    }

    50%{
        opacity:0.5;
    }
}

/* ===== INFO BOX ===== */
.info-grid{
    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(220px,1fr));

    gap:20px;

    margin-bottom:25px;
}

/* ===== CARD ===== */
.card{
    padding:25px;

    border-radius:24px;

    background:
    linear-gradient(
        145deg,
        rgba(255,255,255,0.97),
        rgba(240,249,255,0.95)
    );

    border:
    1px solid rgba(255,255,255,0.5);

    box-shadow:
    0 10px 30px rgba(14,165,233,0.12);

    transition:0.3s;

    color:#0f172a;

    position:relative;

    overflow:hidden;
}

.card::before{
    content:'';

    position:absolute;
    top:-30px;
    right:-30px;

    width:120px;
    height:120px;

    background:
    rgba(14,165,233,0.08);

    border-radius:50%;
}

.card:hover{
    transform:translateY(-6px);

    box-shadow:
    0 15px 40px rgba(14,165,233,0.2);
}

.card-title{
    font-size:17px;
    font-weight:600;
}

.value{
    margin-top:16px;

    font-size:42px;
    font-weight:700;

    color:#0284c7;
}

.desc{
    margin-top:10px;

    color:#64748b;
    font-size:14px;
    line-height:1.7;
}

/* ===== STATUS ===== */
.status{
    margin-top:25px;

    padding:24px;

    border-radius:24px;

    text-align:center;

    font-weight:600;

    font-size:20px;

    background:
    rgba(255,255,255,0.9);

    color:#0f172a;

    border:
    1px solid rgba(255,255,255,0.4);

    box-shadow:
    0 10px 30px rgba(14,165,233,0.12);

    transition:0.3s;
}

.ideal{
    color:#16a34a;

    background:
    rgba(220,252,231,0.95);
}

.tidak{
    color:#dc2626;

    background:
    rgba(254,226,226,0.95);
}

/* ===== UPDATE ===== */
.info{
    margin-top:10px;

    font-size:14px;

    color:#475569;
}

/* ===== TABLE ===== */
.table-box{
    margin-top:30px;

    padding:25px;

    border-radius:25px;

    background:
    rgba(255,255,255,0.94);

    box-shadow:
    0 10px 30px rgba(14,165,233,0.12);

    overflow-x:auto;
}

.table-title{
    font-size:22px;
    font-weight:700;
    color:#0284c7;

    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#0ea5e9;
    color:white;

    padding:16px;
    text-align:left;

    font-size:14px;
}

td{
    padding:16px;

    color:#334155;

    border-bottom:
    1px solid rgba(148,163,184,0.2);

    background:
    rgba(255,255,255,0.8);
}

tr:hover td{
    background:
    rgba(224,242,254,0.5);
}

/* ===== CHART ===== */
.chart-box{
    margin-top:30px;

    padding:28px;

    border-radius:28px;

    background:
    rgba(255,255,255,0.94);

    box-shadow:
    0 10px 35px rgba(14,165,233,0.12);
}

.chart-title{
    font-size:22px;
    font-weight:700;

    color:#0284c7;

    margin-bottom:20px;
}

canvas{
    width:100% !important;
    height:350px !important;
}

/* ===== FOOTER ===== */
.footer{
    margin-top:25px;

    text-align:center;

    color:#475569;
    font-size:14px;
}

/* ===== RESPONSIVE ===== */
@media(max-width:900px){

    .sidebar{
        width:100%;
        height:auto;
        position:relative;
    }

    .main{
        margin-left:0;
    }

    .header-top{
        flex-direction:column;
        align-items:flex-start;
    }
}

/* ===== PAGINATION ===== */

nav[role="navigation"]{
    margin-top:25px;
}

nav[role="navigation"] > div:first-child{
    display:none;
}

nav[role="navigation"] svg{
    width:18px;
    height:18px;
}

nav[role="navigation"] span,
nav[role="navigation"] a{

    padding:10px 16px;

    border-radius:12px;

    text-decoration:none;

    font-weight:600;

    margin:0 4px;

    transition:0.25s;
}

/* ANGKA AKTIF */
nav[role="navigation"] span[aria-current="page"] span{

    background:#0ea5e9 !important;

    color:white !important;
}

/* ANGKA */
nav[role="navigation"] a{

    background:white;

    color:#0f172a;

    box-shadow:
    0 4px 10px rgba(0,0,0,0.08);
}

/* HOVER */
nav[role="navigation"] a:hover{

    background:#0ea5e9;

    color:white;
}

/* TULISAN ABU DIHILANGKAN */
nav[role="navigation"] p{
    display:none;
}

</style>
</head>

<body>

<div class="bg"></div>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo-box">
        <h2>🐦 Smart Walet</h2>
        <p>Sistem Monitoring Rumah Walet</p>
    </div>

    <a href="{{ route('dashboard') }}"
    class="menu active">

        🏠 Dashboard

    </a>

    <form method="POST"
    action="{{ route('logout') }}">

        @csrf

        <button type="submit"
        class="menu logout">

            🚪 Logout

        </button>

    </form>

</div>

<!-- MAIN -->
<div class="main">

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div class="header-top">

            <div>
                <h1>Monitoring Rumah Walet</h1>

                <p>
                    Dashboard ini digunakan untuk memantau kondisi suhu dan kelembaban
                    rumah walet secara realtime menggunakan sensor DHT dan ESP8266.
                    Tampilan dibuat lebih nyaman, modern, dan mudah dipahami.
                </p>
            </div>

            <div class="live">
                🔴 LIVE MONITORING
            </div>

        </div>

    </div>

    <!-- CARD -->
    <div class="info-grid">

        <div class="card">

            <div class="card-title">
                🌡️ Suhu Ruangan
            </div>

            <div id="suhu"
            class="value">

                -- °C

            </div>

            <div class="desc">
                Suhu ideal rumah walet berkisar antara 26°C hingga 32°C.
            </div>

        </div>

        <div class="card">

            <div class="card-title">
                💧 Kelembaban
            </div>

            <div id="kelembaban"
            class="value">

                -- %

            </div>

            <div class="desc">
                Kelembaban ideal membantu menjaga kenyamanan burung walet.
            </div>

        </div>

        <div class="card">

            <div class="card-title">
                🐦 Status Rumah Walet
            </div>

            <div class="desc"
            style="margin-top:15px; line-height:2;">

                ✔️ Monitoring realtime<br>
                ✔️ Data otomatis update<br>
                ✔️ Tampilan interaktif

            </div>

        </div>

    </div>

    <!-- STATUS -->
    <div id="statusBox"
    class="status">

        ⏳ Menunggu data sensor...

    </div>

    <!-- UPDATE -->
    <div id="lastUpdate"
    class="info">

        Update: -

    </div>

    <!-- FILTER -->
<div class="table-box">

    <div class="table-title">
        🔍 Filter Monitoring
    </div>

    <form method="GET"
    action="{{ route('dashboard') }}"
    style="
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    margin-top:15px;
    ">

        <!-- SEARCH -->
        <input
        type="text"
        name="search"
        placeholder="Cari suhu / kelembaban..."
        value="{{ request('search') }}"

        style="
        padding:14px 18px;
        border-radius:14px;
        border:none;
        outline:none;
        width:260px;
        background:#f1f5f9;
        ">

        <!-- SELECT -->
        <select
        name="status"

        style="
        padding:14px 18px;
        border-radius:14px;
        border:none;
        outline:none;
        background:#f1f5f9;
        color:#0f172a;
        ">

            <option value="">
                Semua Kondisi
            </option>

            <option value="nyaman"
            {{ request('status') == 'nyaman' ? 'selected' : '' }}>

                Nyaman
            </option>

            <option value="tidak_nyaman"
            {{ request('status') == 'tidak_nyaman' ? 'selected' : '' }}>

                Tidak Nyaman
            </option>

        </select>

        <!-- BUTTON -->
        <button type="submit"

        style="
        padding:14px 24px;
        border:none;
        border-radius:14px;
        background:#0ea5e9;
        color:white;
        font-weight:600;
        cursor:pointer;
        ">

            Filter

        </button>

    </form>

</div>

    <!-- TABLE -->
    <div class="table-box">

        <div class="table-title">
            📋 Informasi Kondisi Ideal
        </div>

        <table>

            <thead>

                <tr>
                    <th>Parameter</th>
                    <th>Kondisi Ideal</th>
                    <th>Keterangan</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>🌡️ Suhu</td>
                    <td>26°C - 30°C</td>
                    <td>Menjaga kenyamanan habitat burung walet.</td>
                </tr>

                <tr>
                    <td>💧 Kelembaban</td>
                    <td>80% - 90%</td>
                    <td>Membantu menjaga kelembaban sarang walet.</td>
                </tr>

                <tr>
                    <td>📡 Monitoring</td>
                    <td>Realtime</td>
                    <td>Data sensor diperbarui otomatis setiap 5 detik.</td>
                </tr>

            </tbody>

        </table>

    </div>

@if(request('status'))

<div class="table-box">

    <div class="table-title">

        @if(request('status') == 'nyaman')
            🟢 Riwayat Kondisi Nyaman
        @else
            🔴 Riwayat Kondisi Tidak Nyaman
        @endif

    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Suhu</th>
                <th>Kelembaban</th>
                <th>Status</th>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Jam</th>
            </tr>
        </thead>

        <tbody>

            @forelse($riwayat as $item)

            @php
                $ideal =
                    $item->suhu >= 26 &&
                    $item->suhu <= 30 &&
                    $item->kelembaban >= 80 &&
                    $item->kelembaban <= 90;
            @endphp

            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->suhu }} °C</td>
                <td>{{ $item->kelembaban }} %</td>

                <td>
                    @if($ideal)
                        <span style="color:#16a34a;font-weight:700;">
                            Nyaman
                        </span>
                    @else
                        <span style="color:#dc2626;font-weight:700;">
                            Tidak Nyaman
                        </span>
                    @endif
                </td>

                <td>{{ $item->created_at->translatedFormat('l') }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>{{ $item->created_at->format('H:i:s') }}</td>

            </tr>

            @empty

            <tr>
                <td colspan="7" style="text-align:center;padding:20px;">
                    Data tidak ditemukan
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endif

    <!-- CHART -->
    <div class="chart-box">

        <div class="chart-title">
            📈 Grafik Monitoring Sensor
        </div>

        <canvas id="chart"></canvas>

    </div>

    <div class="footer">
        Smart Walet Monitoring System • ESP8266 • DHT11
    </div>

</div>
</div>

<script>

// ===== ARRAY =====
let suhuData = [];
let lembabData = [];
let labels = [];

// ===== ELEMENT =====
const suhuEl =
document.getElementById('suhu');

const lembabEl =
document.getElementById('kelembaban');

// ===== CHART =====
const ctx =
document.getElementById('chart')
.getContext('2d');

const chart = new Chart(ctx, {

    type:'line',

    data:{

        labels:labels,

        datasets:[

            {
                label:'Suhu',

                data:suhuData,

                borderColor:'#0ea5e9',

                backgroundColor:'rgba(14,165,233,0.15)',

                fill:true,

                tension:0.4,

                borderWidth:3
            },

            {
                label:'Kelembaban',

                data:lembabData,

                borderColor:'#38bdf8',

                backgroundColor:'rgba(56,189,248,0.12)',

                fill:true,

                tension:0.4,

                borderWidth:3
            }
        ]
    },

    options:{

        responsive:true,

        maintainAspectRatio:false,

        animation:false,

        plugins:{

            legend:{
                labels:{
                    color:'#334155'
                }
            }
        },

        scales:{

            x:{
                ticks:{
                    color:'#334155'
                },

                grid:{
                    color:'rgba(148,163,184,0.2)'
                }
            },

            y:{
                beginAtZero:true,

                ticks:{
                    color:'#334155'
                },

                grid:{
                    color:'rgba(148,163,184,0.2)'
                }
            }
        }
    }
});

// ===== AMBIL DATA =====
async function ambilData(){

    try{

        const res =
        await fetch('/api/latest');

        const response =
        await res.json();

        if(!response.data) return;

        const data =
        response.data;

        // ===== UPDATE TEXT =====
        suhuEl.innerHTML =
        data.suhu + ' °C';

        lembabEl.innerHTML =
        data.kelembaban + ' %';

        // ===== STATUS =====
        let ideal =

        data.suhu >= 26 &&
        data.suhu <= 32 &&

        data.kelembaban >= 80 &&
        data.kelembaban <= 90;

        const statusBox =
        document.getElementById('statusBox');

        if(ideal){

            statusBox.innerHTML =
            "🟢 KONDISI IDEAL<br><span class='info'>Lingkungan rumah walet sangat baik dan stabil</span>";

            statusBox.className =
            "status ideal";

        }else{

            statusBox.innerHTML =
            "🔴 KONDISI TIDAK IDEAL<br><span class='info'>Suhu atau kelembaban perlu disesuaikan</span>";

            statusBox.className =
            "status tidak";
        }

        // ===== UPDATE TIME =====
        document.getElementById('lastUpdate')
        .innerHTML =

        "Update terakhir: " +
        new Date().toLocaleTimeString();

        // ===== UPDATE CHART =====
        let waktu =
        new Date().toLocaleTimeString();

        labels.push(waktu);

        suhuData.push(data.suhu);

        lembabData.push(data.kelembaban);

        // MAX DATA
        if(labels.length > 10){

            labels.shift();

            suhuData.shift();

            lembabData.shift();
        }

        // TANPA BERKEDIP
        chart.update('none');

    }catch(error){

        console.log(error);
    }
}

// ===== LOAD =====
ambilData();

// ===== AUTO REFRESH =====
setInterval(() => {

    ambilData();

}, 5000);

</script>

</body>
</html>