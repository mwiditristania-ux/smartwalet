<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (FROM BREEZE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |-------------------------
    | DASHBOARD
    |-------------------------
    */
   Route::get('/dashboard', function (\Illuminate\Http\Request $request) {

    $sensor = Sensor::latest()->first();

    $query = Sensor::query();

    // SEARCH
    if ($request->search) {

        $query->where('suhu', 'like', '%' . $request->search . '%')
              ->orWhere('kelembaban', 'like', '%' . $request->search . '%');
    }

    // FILTER NYAMAN
    if ($request->status == 'nyaman') {

        $query->whereBetween('suhu', [26, 30])
              ->whereBetween('kelembaban', [80, 90]);
    }

    // FILTER TIDAK NYAMAN
    if ($request->status == 'tidak_nyaman') {

        $query->where(function($q){

            $q->where('suhu', '<', 26)
              ->orWhere('suhu', '>', 30)
              ->orWhere('kelembaban', '<', 80)
              ->orWhere('kelembaban', '>', 90);
        });
    }

    $riwayat = $query->latest()->get();

    return view('dashboard', compact(
        'sensor',
        'riwayat'
    ));

})->name('dashboard');

    /*
    |-------------------------
    | SENSOR CRUD
    |-------------------------
    */
    Route::resource('sensors', SensorController::class);

    /*
    |-------------------------
    | PROFILE
    |-------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/force-login', function () {
    auth()->loginUsingId(1);
    return redirect('/dashboard');
});
});