<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Sensor;

/*
|--------------------------------------------------------------------------
| TEST API
|--------------------------------------------------------------------------
*/
Route::get('/test', function () {

    return response()->json([
        'status' => 'API HIDUP'
    ]);
});

/*
|--------------------------------------------------------------------------
| TERIMA DATA SENSOR
|--------------------------------------------------------------------------
*/
Route::get('/sensor', function (Request $request) {

    try {

        // VALIDASI
        if (
            !$request->has('suhu') ||
            !$request->has('kelembaban')
        ) {

            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak lengkap'
            ]);
        }

        // SIMPAN DATABASE
        $sensor = Sensor::create([
            'suhu' => $request->suhu,
            'kelembaban' => $request->kelembaban
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $sensor
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
});

/*
|--------------------------------------------------------------------------
| AMBIL DATA TERBARU
|--------------------------------------------------------------------------
*/
Route::get('/latest', function () {

    $data = Sensor::latest()->first();

    return response()->json([
        'status' => 'success',
        'data' => $data
    ]);
});