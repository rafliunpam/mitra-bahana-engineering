<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $creadentials = $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($creadentials)) {
            $request->session()->regenerate();
            $jabatan = auth()->user()->employee->jabatan;
            $nik = auth()->user()->employee->nik;
            $format = [$nik.' | '.$jabatan];
            $auth = implode("",$format);

            return redirect()->intended('/dashboard')->with('success', $auth);
        }

        return back()->with('loginError', 'Login Failed!');
    }
    
    public function logout(Request $request)
    {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
    }
}
