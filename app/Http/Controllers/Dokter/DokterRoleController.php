<?php

namespace App\Http\Controllers\Dokter;

use App\Models\DokterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class DokterRoleController extends Controller
{
    public function index()
    {
        return view('dokter.index');
    }
    public function loginPage()
    {
        return view('dokter.auth.login');
    }

    public function authenticate(Request $request)
    {
        $dokter = DokterModel::where('name', $request->name)
        ->where('no_hp', $request->no_hp)
        ->first();

        if ($dokter) {
            Auth::guard('dokter')->login($dokter);
            Alert::success('Berhasil', 'Login berhasil!');
            return redirect()->route('dokter.dashboard');
        }
        return back()->withErrors(['message' => 'name atau no_hp salah.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('dokter')->logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Berhasil', 'Log out berhasil!');

        return redirect()->route('dokter.login');
    }
}
