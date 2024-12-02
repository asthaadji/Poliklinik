<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function authenticate(Request $request)
    {
        $validate = $request->only('name', 'no_ktp');
        
        if (Auth::guard('pasien')->attempt($validate)) {
            return redirect()->route('pasien.dashboard');
        }

        return back()->withErrors(['name' => 'Name atau password salah.']);
    }
}
