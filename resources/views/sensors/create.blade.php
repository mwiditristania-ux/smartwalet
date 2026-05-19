@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0" style="border-radius: 20px;">

                <div class="card-header text-white text-center"
                     style="background: linear-gradient(45deg, #f4b6c2, #ff9eb5);">
                    <h4>Input Data Walet 🐦</h4>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sensors.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Suhu (26 - 29°C)</label>
                            <input type="number" name="suhu" step="0.1"
                                class="form-control"
                                value="{{ old('suhu') }}">
                        </div>

                        <div class="mb-3">
                            <label>Kelembaban (80 - 90%)</label>
                            <input type="number" name="kelembaban" step="0.1"
                                class="form-control"
                                value="{{ old('kelembaban') }}">
                        </div>

                        <button class="btn btn-success w-100">💾 Simpan</button>

                        <a href="/" class="btn btn-secondary w-100 mt-2">⬅️ Kembali</a>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection