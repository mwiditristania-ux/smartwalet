@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; font-family: Arial;">

    <h2 style="text-align:center; margin-bottom:20px;">📊 Data Sensor</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom:15px; display:flex; justify-content:space-between;">

        {{-- Tombol tambah --}}
        <a href="/sensors/create" 
           style="text-decoration:none; background:#007bff; color:white; padding:8px 15px; border-radius:5px;">
           ➕ Tambah Data
        </a>

        {{-- Tombol hapus semua --}}
        <form action="/sensors/delete-all" method="POST" onsubmit="return confirm('Hapus SEMUA data?')">
            @csrf
            @method('DELETE')

            <button style="background:black; color:white; padding:8px 15px; border-radius:5px;">
                🧹 Hapus Semua
            </button>
        </form>
    </div>

    <table style="width:100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <thead style="background:#007bff; color:white;">
            <tr>
                <th style="padding:10px;">ID</th>
                <th>Suhu</th>
                <th>Kelembaban</th>
                <th>Dibuat</th>
                <th>Diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sensors as $index => $sensor)
            <tr style="background: {{ $index % 2 == 0 ? '#f9f9f9' : '#ffffff' }}; text-align:center;">
                <td style="padding:10px;">{{ $sensor->id }}</td>
                <td>{{ number_format($sensor->suhu, 2) }} °C</td>
                <td>{{ number_format($sensor->kelembaban, 2) }} %</td>
                <td>{{ $sensor->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    {{ $sensor->updated_at ? $sensor->updated_at->format('d-m-Y H:i') : '-' }}
                </td>
                <td>

                    {{-- Tombol Edit --}}
                    <a href="/sensors/{{ $sensor->id }}/edit" 
                       style="background:#ffc107; padding:5px 10px; border-radius:5px; text-decoration:none; color:black;">
                       ✏️ Edit
                    </a>

                    {{-- Tombol Hapus --}}
                    <form action="/sensors/{{ $sensor->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('Yakin mau hapus data ini?')"
                            style="background:#dc3545; color:white; padding:5px 10px; border:none; border-radius:5px;">
                            🗑️ Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection