<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\ModelJadwalPeriksa;
use App\Models\PoliModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendaftaranPoliController extends Controller
{
    public function index()
    {
        $poli = PoliModel::all();
        return view('pasien.poli', compact('poli'));
    }

    public function getJadwal($id)
    {
        $poli = PoliModel::find($id);

        if (!$poli) {
            return response()->json([], 404);
        }

        $dokters = $poli->doctors;

        $jadwal = ModelJadwalPeriksa::whereIn('id_dokter', $dokters->pluck('id'))
            ->where('status', 'aktif')
            ->with('dokter') 
            ->get();

    return response()->json($jadwal);
    }
}
