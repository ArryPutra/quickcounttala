<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('kelola-suara.index');
        }
        return view('pages.auth.index', [
            'title' => 'Masuk'
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama_pengguna' => ['required'],
            'password' => ['required'],
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);

        if (Auth::attempt($request->only('nama_pengguna', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/kelola-suara');
        }

        return back()->withErrors([
            'pesan' => 'Login gagal.'
        ]);
    }
}
