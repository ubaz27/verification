<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;



class LoginController extends Controller
{
    //
    public function showLogin()
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.showDashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'userEmail' => 'required|email',
            'userPassword' => 'required',
        ]);

        $email = $request->userEmail;
        $password = $request->userPassword;
        $remember = $request->remember;

        // remember variable keep user loged in indefinetely until logged out
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password, 'is_active' => 1], $remember)) {
            // Authentication was successful...
            $request->session()->regenerate();
            return redirect()->intended(route('admin.showDashboard'));
        }

        return back()->with('error', 'Wrong Password or Username');
    }


    public function showChangePassword()
    {

        return view('admin.change-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:6',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        //dd(auth()->user->password);
        $currentPasswordStatus = Hash::check($request->current_password, Auth::guard('admin')->user()->password);

        if ($currentPasswordStatus) {
            Admin::findorFail(Auth::guard('admin')->user()->id)
                ->update([
                    'password' => Hash::make($request->password),
                    'reset_password' => 0,
                ]);


            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();


            return redirect()->route('admin.showLogin');
            // return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
    public function saveChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:6',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        //dd(auth()->user->password);
        $currentPasswordStatus = Hash::check($request->current_password, Auth::guard('admin')->user()->password);

        if ($currentPasswordStatus) {
            Admin::findorFail(Auth::guard('admin')->user()->id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);
            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.showLogin');
    }
}
