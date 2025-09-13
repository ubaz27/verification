<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\Student;

class LoginController extends Controller
{
    // //

    public function showLogin()
    {

        if (Auth::guard('member')->check()) {
            $name = Auth::guard('member')->user()->first_name;

            return redirect()->route('member.showDashboard', compact('name'));
        }

        return view('member.login');
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

        if (Auth::guard('member')->attempt(['email' => $email, 'password' => $password], $remember)) {
            // Authentication was successful...
            $request->session()->regenerate();
            $name = Auth::guard('member')->user()->first_name;

            return redirect()->intended(route('member.showDashboard', compact('name')));
        }

        return back()->with('error', 'Wrong Password or Username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('member.login');
    }


    public function showChangePassword()
    {

        return view('member.change-password');
    }

    public function saveChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'string', 'confirmed'],
        ]);
        // dd(auth()->user->password);
        $currentPasswordStatus = Hash::check($request->current_password, Auth::guard('member')->user()->password);

        if ($currentPasswordStatus) {
            Student::findorFail(Auth::guard('member')->user()->id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);
            // dd('ss');
            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
