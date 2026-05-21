<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/', function () {
    return redirect('/login');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function (Request $request) {

        // DATA TERBARU
        $sensor = Sensor::latest()->first();

        // QUERY
        $query = Sensor::query();


        if ($request->tanggal) {

            $query->whereDate(
                'created_at',
                $request->tanggal
            );
        }


        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'suhu',
                    'like',
                    '%' . $request->search . '%'
                )
                ->orWhere(
                    'kelembaban',
                    'like',
                    '%' . $request->search . '%'
                );

            });
        }


        if ($request->status == 'nyaman') {

            $query->whereBetween('suhu', [26, 30])
                  ->whereBetween('kelembaban', [80, 90]);
        }

        if ($request->status == 'tidak_nyaman') {

            $query->where(function ($q) {

                $q->where('suhu', '<', 26)
                  ->orWhere('suhu', '>', 30)
                  ->orWhere('kelembaban', '<', 80)
                  ->orWhere('kelembaban', '>', 90);

            });
        }


        $riwayat = $query
            ->latest()
            ->paginate(40)
            ->withQueryString();

        return view('dashboard', compact(
            'sensor',
            'riwayat'
        ));

    })->name('dashboard');


    Route::get('/export-pdf', function (Request $request) {

        $query = Sensor::query();

        if ($request->tanggal) {

            $query->whereDate(
                'created_at',
                $request->tanggal
            );
        }

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where(
                    'suhu',
                    'like',
                    '%' . $request->search . '%'
                )
                ->orWhere(
                    'kelembaban',
                    'like',
                    '%' . $request->search . '%'
                );

            });
        }

        if ($request->status == 'nyaman') {

            $query->whereBetween('suhu', [26, 30])
                  ->whereBetween('kelembaban', [80, 90]);
        }


        if ($request->status == 'tidak_nyaman') {

            $query->where(function ($q) {

                $q->where('suhu', '<', 26)
                  ->orWhere('suhu', '>', 30)
                  ->orWhere('kelembaban', '<', 80)
                  ->orWhere('kelembaban', '>', 90);

            });
        }


        $data = $query
            ->latest()
            ->get();


        $pdf = Pdf::loadView(
            'pdf.sensor',
            compact('data')
        );

        return $pdf->download(
            'laporan-smartwalet.pdf'
        );

    })->name('export.pdf');


    Route::resource(
        'sensors',
        SensorController::class
    );

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    Route::get('/force-login', function () {

        auth()->loginUsingId(1);

        return redirect('/dashboard');

    });

});