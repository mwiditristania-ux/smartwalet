@extends('layouts.app')

@section('content')
<div style="max-width: 500px; margin: 40px auto; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background-color: #ffffff;">
    
    <h2 style="text-align: center; margin-bottom: 20px;">✏️ Edit Data Sensor</h2>

    {{-- Error validasi --}}
    @if ($errors->any())
        <div style="background-color: #ffdddd; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 20px; color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/sensors/{{ $sensor->id }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Suhu --}}
        <label style="font-weight: bold;">🌡️ Suhu (°C)</label>
        <input 
            type="number" 
            name="suhu" 
            step="0.01" 
            value="{{ $sensor->suhu }}"
            style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"
        >

        {{-- Kelembaban --}}
        <label style="font-weight: bold;">💧 Kelembaban (%)</label>
        <input 
            type="number" 
            name="kelembaban" 
            step="0.01" 
            value="{{ $sensor->kelembaban }}"
            style="width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc;"
        >

        {{-- Tombol --}}
        <div style="display: flex; justify-content: space-between;">
            <a href="/sensors" 
               style="text-decoration: none; padding: 8px 15px; background-color: #6c757d; color: white; border-radius: 5px;">
               ⬅ Kembali
            </a>

            <button type="submit" 
                style="padding: 8px 15px; background-color: #28a745; color: white; border: none; border-radius: 5px;">
                💾 Update
            </button>
        </div>
    </form>
</div>
@endsection