<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>Laporan Smart Walet</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 30px;
        }

        .kop{
            text-align: center;
            line-height: 1.5;
        }

        .kop h2{
            margin: 0;
            font-size: 20px;
        }

        .kop h3{
            margin: 0;
            font-size: 16px;
        }

        .kop p{
            margin: 2px;
            font-size: 12px;
        }

        hr{
            border: 1px solid black;
            margin-top: 10px;
            margin-bottom: 25px;
        }

        .judul{
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        .info{
            margin-bottom: 20px;
            line-height: 1.8;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th{
            background: #0ea5e9;
            color: white;
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        td{
            border: 1px solid black;
            padding: 7px;
            text-align: center;
        }

        .footer{
            margin-top: 50px;
            width: 100%;
        }

        .ttd{
            width: 250px;
            float: right;
            text-align: center;
            line-height: 1.8;
        }

    </style>

</head>

<body>

    <!-- KOP SURAT -->
    <div class="kop">

        <h2>SMK NEGERI 6 MALANG</h2>

        <h3>LAPORAN MONITORING SMART WALET</h3>

        <p>
            Sistem Monitoring Suhu dan Kelembaban Rumah Walet
        </p>

        <p>
            Tahun 2026
        </p>

    </div>

    <hr>

    <!-- JUDUL -->
    <div class="judul">

        LAPORAN DATA SENSOR SMART WALET

    </div>

    <!-- INFO -->
    <div class="info">

        <b>Tanggal Cetak :</b>
        {{ now()->format('d-m-Y H:i') }}

        <br>

        <b>Status Filter :</b>

        @if(request('status') == 'nyaman')

            Kondisi Nyaman

        @elseif(request('status') == 'tidak_nyaman')

            Kondisi Tidak Nyaman

        @else

            Semua Kondisi

        @endif

        <br>

        <b>Tanggal Data :</b>

        {{ request('tanggal') ?? 'Semua Tanggal' }}

    </div>

    <!-- TABEL -->
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

            @forelse($data as $item)

            @php

                $ideal =
                    $item->suhu >= 26 &&
                    $item->suhu <= 30 &&
                    $item->kelembaban >= 80 &&
                    $item->kelembaban <= 90;

            @endphp

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->suhu }} °C
                </td>

                <td>
                    {{ $item->kelembaban }} %
                </td>

                <td>

                    @if($ideal)

                        Nyaman

                    @else

                        Tidak Nyaman

                    @endif

                </td>

                <td>
                    {{ $item->created_at->translatedFormat('l') }}
                </td>

                <td>
                    {{ $item->created_at->format('d-m-Y') }}
                </td>

                <td>
                    {{ $item->created_at->format('H:i:s') }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7">

                    Tidak ada data

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <!-- TTD -->
    <div class="footer">

        <div class="ttd">

            <p>
                Malang,
                {{ now()->format('d F Y') }}
            </p>

            <br><br><br>

            <p>
                ______________________
            </p>

            <p>
                Administrator Smart Walet
            </p>

        </div>

    </div>

</body>
</html>