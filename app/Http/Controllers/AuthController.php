<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($user)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['email' => 'الحساب غير موجود']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
