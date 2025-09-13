<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {

        if (Auth::guard('verification')->check()) {
            $name = Auth::guard('verification')->user()->first_name;

            return redirect()->route('verification.showDashboard', compact('name'));
        }

        return view('verification.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        // remember variable keep user loged in indefinetely until logged out
        if (Auth::guard('verification')->attempt(['email' => $email, 'password' => $password], $remember)) {


            $request->session()->regenerate();
            // return redirect()->intended(route('application.showDashboard'));

            $id = Auth::guard('verification')->user()->id;
            $application = Application::find($id);


            return view('verification.profile.profile', compact('application'));
        } else {
            return back()->with('error', 'Wrong Password or Username');
        }
    }
}
