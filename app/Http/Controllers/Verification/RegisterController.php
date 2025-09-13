<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister()
    {

        if (Auth::guard('verification')->check()) {
            $name = Auth::guard('verification')->user()->first_name;

            return redirect()->route('verification.showDashboard', compact('name'));
        }

        return view('verification.register');
    }

    public function saveRegister(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'regex:/^\w+\s+\w+/'],
            'userPhone' => ['required', 'digits:11'],
            'email' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        try {
            DB::beginTransaction();
            Application::Create([
                'phone' => $request->userPhone,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
            // return back()->with('message',  'Record Not Added');
            $message = "Account Created Successfully for " .  $request->fullname . ". Username is " . $request->email;
            return view('verification.message', compact('message'));
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('error',  $e->getMessage());

            return back()->with('error',  'Record Not Added');
        }
    }
}
