<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Smart Walet Dashboard</title>

<!-- TAILWIND -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

*{
    font-family:'Inter',sans-serif;
}

.title-font{
    font-family:'Plus Jakarta Sans',sans-serif;
    letter-spacing:-1.7px;
}

.body-font{
    font-family:'Inter',sans-serif;
}

body{
    min-height:100vh;
    overflow-x:hidden;

   background:
linear-gradient(
    135deg,
    #eef5ff 0%,
    #edf6ff 25%,
    #eaf4ff 50%,
    #f4f9ff 100%
);

    position:relative;
}

/* ===== BACKGROUND EFFECT ===== */
body::before{

    content:'';

    position:fixed;
    inset:0;

    background:

    radial-gradient(
        circle at top left,
        rgba(96,165,250,0.30),
        transparent 30%
    ),

    radial-gradient(
        circle at bottom right,
        rgba(125,211,252,0.25),
        transparent 35%
    ),

    radial-gradient(
        circle at center,
        rgba(191,219,254,0.15),
        transparent 45%
    );

    z-index:-2;
}

/* ===== IMAGE BACKGROUND ===== */
body::after{

    content:'';

    position:fixed;
    inset:0;

    background:
    linear-gradient(
        rgba(219,234,254,0.68),
        rgba(239,246,255,0.78)
    ),
    url("{{ asset('images/amazewalet.png') }}");

    background-size:cover;
    background-position:center;

    opacity:0.35;

    z-index:-3;
}

/* ===== GLASS ===== */
.glass{

    background:
    rgba(255,255,255,0.50);

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.55);

    box-shadow:

    0 8px 32px rgba(148,163,184,0.10),

    inset 0 1px 1px rgba(255,255,255,0.45);
}

/* ===== SHADOW ===== */
.soft-shadow{

    box-shadow:

    0 8px 32px rgba(59,130,246,0.10),

    0 0 25px rgba(96,165,250,0.10),

    inset 0 1px 1px rgba(255,255,255,0.35);
}

/* ===== SIDEBAR ===== */
.sidebar-shadow{

    box-shadow:

    0 10px 40px rgba(59,130,246,0.12),

    0 0 45px rgba(125,211,252,0.12);
}

/* ===== CARD HOVER ===== */
.hover-card{

    transition:all 0.35s ease;
}

.hover-card:hover{

    transform:
    translateY(-6px);

    box-shadow:

    0 14px 40px rgba(96,165,250,0.18),

    0 0 30px rgba(125,211,252,0.22);
}

/* ===== NEON TEXT ===== */
.neon-blue{

    text-shadow:

    0 0 10px rgba(96,165,250,0.35),

    0 0 22px rgba(125,211,252,0.25);
}

/* ===== INPUT ===== */
.soft-input{

    background:
    rgba(255,255,255,0.32);

    border:
    1px solid rgba(255,255,255,0.35);

    color:#334155;

    box-shadow:
    inset 0 1px 2px rgba(255,255,255,0.35);
}

.soft-input:focus{

    outline:none;

    border:
    1px solid rgba(96,165,250,0.45);

    box-shadow:
    0 0 0 4px rgba(147,197,253,0.18);
}

/* ===== BUTTON ===== */
.soft-btn{

    background:
    linear-gradient(
        135deg,
        rgba(191,219,254,0.85),
        rgba(125,211,252,0.78)
    );

    color:#334155;

    box-shadow:
    0 8px 24px rgba(96,165,250,0.18);

    transition:0.3s;
}

.soft-btn:hover{

    transform:translateY(-2px);

    box-shadow:

    0 10px 28px rgba(96,165,250,0.28),

    0 0 20px rgba(125,211,252,0.25);
}

/* ===== CHART ===== */
canvas{
    width:100% !important;
    height:360px !important;
}

.chart-glow{

    position:relative;
    overflow:hidden;
}

.chart-glow::before{

    content:'';

    position:absolute;

    width:280px;
    height:280px;

    background:
    rgba(125,211,252,0.16);

    border-radius:50%;

    top:-120px;
    right:-80px;

    filter:blur(40px);
}

/* ===== PAGINATION ===== */

nav[role="navigation"]{
    width:100%;
    margin-top:35px;
}

/* hide text */
nav[role="navigation"] > div:first-child{
    display:none !important;
}

/* wrapper */
nav[role="navigation"] > div:last-child{
    display:flex !important;
    justify-content:center !important;
    align-items:center !important;
    width:100% !important;
}

/* ul */
nav[role="navigation"] ul{

    display:flex !important;

    flex-direction:row !important;

    justify-content:center !important;

    align-items:center !important;

    flex-wrap:wrap !important;

    gap:12px !important;

    list-style:none !important;

    margin:0 !important;

    padding:0 !important;
}

/* li */
nav[role="navigation"] li{
    display:flex !important;
}

/* button */
nav[role="navigation"] a,
nav[role="navigation"] span{

    display:flex !important;

    justify-content:center !important;

    align-items:center !important;

    min-width:46px !important;

    height:46px !important;

    padding:0 16px !important;

    border-radius:18px !important;

    background:
    rgba(255,255,255,0.28) !important;

    backdrop-filter:blur(14px);

    border:
    1px solid rgba(255,255,255,0.35);

    color:#334155 !important;

    font-weight:700 !important;

    text-decoration:none !important;

    box-shadow:

    0 8px 24px rgba(96,165,250,0.14),

    0 0 20px rgba(125,211,252,0.10);

    transition:0.25s;
}

/* hover */
nav[role="navigation"] a:hover{

    transform:
    translateY(-3px);

    background:
    linear-gradient(
        135deg,
        rgba(147,197,253,0.95),
        rgba(125,211,252,0.95)
    ) !important;

    color:white !important;

    box-shadow:

    0 10px 30px rgba(96,165,250,0.22),

    0 0 24px rgba(125,211,252,0.25);
}

/* active */
nav[role="navigation"] .active span{

    background:
    linear-gradient(
        135deg,
        #60a5fa,
        #7dd3fc
    ) !important;

    color:white !important;

    box-shadow:

    0 12px 30px rgba(96,165,250,0.28),

    0 0 26px rgba(125,211,252,0.28);
}

/* icon */
nav[role="navigation"] svg{

    width:18px;

    height:18px;
}

/* ===== FONT TITLE ===== */

.title-font{
    font-family:'Sora',sans-serif;
    letter-spacing:-1.5px;
}

/* ===== FONT BODY ===== */

.body-font{
    font-family:'Manrope',sans-serif;
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="fixed left-0 top-0 h-full w-[260px] p-5 z-50">

    <div class="glass sidebar-shadow rounded-[32px] h-full p-6">

        <div class="mb-10">

            <h1 class="title-font text-3xl font-bold text-slate-700 neon-blue">
                🐦 Smart Walet
            </h1>

            <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                Monitoring rumah walet realtime modern.
            </p>

        </div>

        <div class="space-y-3">

            <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-5 py-4 rounded-2xl bg-blue-100/60 text-slate-700 font-medium">

                🏠 Dashboard

            </a>

            <form method="POST"
            action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                class="w-full flex items-center gap-3 px-5 py-4 rounded-2xl bg-red-100/40 text-slate-700 font-medium">

                    🚪 Logout

                </button>

            </form>

        </div>

    </div>

</div>

<!-- MAIN -->
<div class="ml-[280px] p-8">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">

        <div>

            <<h2 class="title-font text-5xl font-semibold text-slate-700 neon-blue tracking-tight">
                Dashboard Monitoring
            </h2>

           <p class="mt-4 max-w-2xl leading-[1.9] text-[16px] font-normal text-slate-600 tracking-[0.2px] body-premium">
    Sistem monitoring suhu dan kelembaban rumah walet berbasis ESP8266 dan DHT11 secara realtime dengan tampilan modern, interaktif, dan efisien untuk menjaga kondisi lingkungan tetap ideal.
        </p>

        </div>

        <div class="glass soft-shadow rounded-[30px] px-6 py-5">

            <div class="text-sm text-slate-500 mb-1">
                Hari Ini
            </div>

            <div id="tanggal"
            class="text-lg font-medium text-slate-700">
                --
            </div>

            <div id="jam"
            class="text-3xl font-light text-blue-900/80 mt-1">
                --
            </div>

        </div>

    </div>

    <!-- CARD -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mb-8">

        <!-- SUHU -->
        <div class="glass soft-shadow hover-card rounded-[34px] p-8 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-40 h-40 bg-blue-200/30 blur-3xl rounded-full"></div>

            <div class="flex items-center justify-between">

                <div>

                    <div class="text-slate-500 uppercase text-sm tracking-wide">
                        Suhu Ruangan
                    </div>

                    <div id="suhu"
                    class="text-[78px] font-extralight leading-none mt-5 text-slate-700 neon-blue">

                        --°C

                    </div>

                    <div class="mt-4 text-slate-500">
                        Rentang suhu ideal 26°C - 30°C
                    </div>

                </div>

                <div class="w-24 h-24 rounded-[28px] bg-blue-100/70 flex items-center justify-center text-5xl">

                    🌡️

                </div>

            </div>

        </div>

        <!-- KELEMBABAN -->
        <div class="glass soft-shadow hover-card rounded-[34px] p-8 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-40 h-40 bg-cyan-200/30 blur-3xl rounded-full"></div>

            <div class="flex items-center justify-between">

                <div>

                    <div class="text-slate-500 uppercase text-sm tracking-wide">
                        Kelembaban
                    </div>

                    <div id="kelembaban"
                    class="text-[78px] font-extralight leading-none mt-5 text-slate-700 neon-blue">

                        --%

                    </div>

                    <div class="mt-4 text-slate-500">
                        Rentang kelembaban ideal 80% - 90%
                    </div>

                </div>

                <div class="w-24 h-24 rounded-[28px] bg-cyan-100/70 flex items-center justify-center text-5xl">

                    💧

                </div>

            </div>

        </div>

    </div>

    <!-- STATUS -->
    <div id="statusBox"
    class="glass soft-shadow rounded-[34px] p-8 mb-8">

        <div class="text-lg text-slate-500 mb-2">
            Status Monitoring
        </div>

        <div class="text-3xl font-light text-slate-700">
            ⏳ Menunggu data sensor...
        </div>

    </div>

    <!-- FILTER -->
    <div class="glass soft-shadow rounded-[34px] p-8 mb-8">

        <div class="mb-6">

            <h3 class="title-font text-2xl font-semibold text-slate-700 neon-blue tracking-tight">
                Filter Monitoring
            </h3>

            <h3 class="title-font text-3xl font-semibold text-slate-700 neon-blue tracking-tight">
                Cari data suhu dan kelembaban berdasarkan tanggal atau status.
            </h3>

        </div>

        <form method="GET"
        action="{{ route('dashboard') }}"
        class="flex flex-wrap gap-4">

            <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari suhu / kelembaban..."
            class="soft-input px-5 py-4 rounded-2xl w-[260px]">

            <select
            name="status"
            class="soft-input px-5 py-4 rounded-2xl">

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

            <input
            type="date"
            name="tanggal"
            value="{{ request('tanggal') }}"
            class="soft-input px-5 py-4 rounded-2xl">

            <button type="submit"
            class="soft-btn px-8 py-4 rounded-2xl font-medium">

                Filter

            </button>

            <a href="{{ route('export.pdf', request()->query()) }}"
            class="soft-btn px-8 py-4 rounded-2xl font-medium">

                📄 Cetak PDF

            </a>

        </form>

    </div>

    <!-- TABLE RIWAYAT -->
@if(request('status') || request('tanggal') || request('search'))

<div class="glass soft-shadow rounded-[40px] p-8 mb-8 overflow-x-auto">

    <div class="mb-6">

        <h3 class="text-3xl font-light text-slate-700 neon-blue">
            Riwayat Monitoring
        </h3>

        <p class="text-slate-500 mt-2">
            Data hasil filter monitoring suhu dan kelembaban.
        </p>

    </div>

    <table class="w-full text-left border-separate border-spacing-y-3">

        <thead>

            <tr class="text-slate-600">

                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Suhu</th>
                <th class="px-4 py-3">Kelembaban</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Jam</th>

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

            <tr class="bg-white/25 backdrop-blur-md">

                <td class="px-4 py-4 rounded-l-2xl text-slate-700">

                    {{ ($riwayat->currentPage() - 1) * $riwayat->perPage() + $loop->iteration }}

                </td>

                <td class="px-4 py-4 text-slate-700">
                    {{ $item->suhu }}°C
                </td>

                <td class="px-4 py-4 text-slate-700">
                    {{ $item->kelembaban }}%
                </td>

                <td class="px-4 py-4">

                    @if($ideal)

                        <span class="px-4 py-2 rounded-xl bg-green-100/70 text-green-700 text-sm">
                            Nyaman
                        </span>

                    @else

                        <span class="px-4 py-2 rounded-xl bg-red-100/70 text-red-700 text-sm">
                            Tidak Nyaman
                        </span>

                    @endif

                </td>

                <td class="px-4 py-4 text-slate-700">
                    {{ $item->created_at->format('d-m-Y') }}
                </td>

                <td class="px-4 py-4 rounded-r-2xl text-slate-700">
                    {{ $item->created_at->format('H:i:s') }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                class="text-center py-8 text-slate-500">

                    Data tidak ditemukan

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <!-- PAGINATION -->
    <div class="w-full flex justify-center mt-10">

    {{ $riwayat->links('pagination::tailwind') }}

</div>

</div>

@endif

    <!-- CHART -->
    <div class="glass soft-shadow chart-glow rounded-[40px] p-8">

        <div class="mb-8">

            <h3 class="text-3xl font-light text-slate-700 neon-blue">
                Grafik Monitoring
            </h3>

            <p class="text-slate-500 mt-2">
                Grafik realtime suhu dan kelembaban sensor.
            </p>

        </div>

        <canvas id="chart"></canvas>

    </div>

</div>

<script>

// ===== CLOCK =====
function updateClock(){

    const now = new Date();

    document.getElementById('tanggal').innerHTML =
    now.toLocaleDateString('id-ID',{

        weekday:'long',
        year:'numeric',
        month:'long',
        day:'numeric'

    });

    document.getElementById('jam').innerHTML =
    now.toLocaleTimeString('id-ID');

}

setInterval(updateClock,1000);

updateClock();

// ===== DATA =====
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

                borderColor:'#7dd3fc',

                backgroundColor:'rgba(125,211,252,0.15)',

                fill:true,

                tension:0.4,

                borderWidth:3
            },

            {
                label:'Kelembaban',

                data:lembabData,

                borderColor:'#93c5fd',

                backgroundColor:'rgba(147,197,253,0.12)',

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
                    color:'#475569'
                }
            }
        },

        scales:{

            x:{
                ticks:{
                    color:'#64748b'
                },

                grid:{
                    color:'rgba(148,163,184,0.12)'
                }
            },

            y:{
                beginAtZero:true,

                ticks:{
                    color:'#64748b'
                },

                grid:{
                    color:'rgba(148,163,184,0.12)'
                }
            }
        }
    }
});

// ===== API =====
async function ambilData(){

    try{

        const res =
        await fetch('/api/latest');

        const response =
        await res.json();

        if(!response.data) return;

        const data =
        response.data;

        suhuEl.innerHTML =
        data.suhu + '°C';

        lembabEl.innerHTML =
        data.kelembaban + '%';

        // STATUS
        const statusBox =
        document.getElementById('statusBox');

        let ideal =

        data.suhu >= 26 &&
        data.suhu <= 30 &&

        data.kelembaban >= 80 &&
        data.kelembaban <= 90;

        if(ideal){

            statusBox.innerHTML = `
                <div class="text-lg text-slate-500 mb-2">
                    Status Monitoring
                </div>

                <div class="text-3xl font-light text-green-700">
                    🟢 Kondisi Ideal
                </div>
            `;

        }else{

            statusBox.innerHTML = `
                <div class="text-lg text-slate-500 mb-2">
                    Status Monitoring
                </div>

                <div class="text-3xl font-light text-red-700">
                    🔴 Tidak Ideal
                </div>
            `;
        }

        // CHART
        let waktu =
        new Date().toLocaleTimeString();

        labels.push(waktu);

        suhuData.push(data.suhu);

        lembabData.push(data.kelembaban);

        if(labels.length > 10){

            labels.shift();
            suhuData.shift();
            lembabData.shift();

        }

        chart.update('none');

    }catch(error){

        console.log(error);

    }

}

// LOAD
ambilData();

// AUTO REFRESH
setInterval(() => {

    ambilData();

},5000);

</script>

</body>
</html>