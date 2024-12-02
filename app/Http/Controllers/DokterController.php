<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function authenticate(Request $request)
    {
        $validate = $request->only('name', 'no_hp');
        
        if (Auth::guard('dokter')->attempt($validate)) {
            return redirect()->route('dokter.dashboard');
        }

        return back()->withErrors(['name' => 'Name atau password salah.']);
    }
}
