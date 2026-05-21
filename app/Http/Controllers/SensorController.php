<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    // 🔒 LOGIN REQUIRED
    public function __construct()
    {
        $this->middleware('auth');
    }

    // =========================
    // DASHBOARD
    // =========================
public function dashboard(Request $request)
{
    $query = Sensor::query();

    // FILTER STATUS
    if ($request->status == 'nyaman') {

        $query->whereBetween('suhu', [26, 30])
              ->whereBetween('kelembaban', [80, 90]);

    } elseif ($request->status == 'tidak_nyaman') {

        $query->where(function ($q) {

            $q->where('suhu', '<', 26)
              ->orWhere('suhu', '>', 30)
              ->orWhere('kelembaban', '<', 80)
              ->orWhere('kelembaban', '>', 90);

        });
    }

    // SEARCH
    if ($request->search) {

        $query->where(function ($q) use ($request) {

            $q->where('suhu', 'like', '%' . $request->search . '%')
              ->orWhere('kelembaban', 'like', '%' . $request->search . '%');

        });
    }

    // PAGINATION
    $riwayat = $query
        ->latest()
        ->paginate(40)
        ->withQueryString();

    return view('dashboard', compact('riwayat'));
}

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('sensors.create');
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([

            'suhu' => 'required|numeric',
            'kelembaban' => 'required|numeric',

        ], [

            'suhu.required' => 'Suhu wajib diisi!',
            'kelembaban.required' => 'Kelembaban wajib diisi!',

        ]);

        Sensor::create([

            'suhu' => $request->suhu,
            'kelembaban' => $request->kelembaban,

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                '✅ Data berhasil disimpan!'
            );
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $sensor = Sensor::findOrFail($id);

        return view('sensors.edit', compact('sensor'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([

            'suhu' => 'required|numeric',
            'kelembaban' => 'required|numeric',

        ]);

        $sensor = Sensor::findOrFail($id);

        $sensor->update([

            'suhu' => $request->suhu,
            'kelembaban' => $request->kelembaban,

        ]);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                '✏️ Data berhasil diupdate!'
            );
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $sensor = Sensor::findOrFail($id);

        $sensor->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                '🗑️ Data berhasil dihapus!'
            );
    }

    // =========================
    // DELETE ALL
    // =========================
    public function deleteAll()
    {
        Sensor::truncate();

        return redirect()
            ->back()
            ->with(
                'success',
                '🧹 Semua data berhasil dihapus!'
            );
    }

    // =========================
    // API LATEST
    // =========================
    public function latest()
    {
        $data = Sensor::latest()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}