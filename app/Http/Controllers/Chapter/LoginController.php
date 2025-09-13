<?php

namespace App\Http\Controllers\chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function showLogin()
    {

        if (Auth::guard('chapter')->check()) {
            return redirect()->route('member.showDashboard');
        }

        return view('chapter.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::guard('chapter')->attempt(['email' => $email, 'password' => $password], $remember)) {
            // Authentication was successful...
            $request->session()->regenerate();
            return redirect()->intended(route('chapter.showDashboard'));
        }

        return back()->with('error', 'Wrong Password or Username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('chapter.login');
    }
}
