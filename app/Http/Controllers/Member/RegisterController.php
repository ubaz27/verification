<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Check;
use App\Models\Member;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    //
    public function showRegister()
    {
        return view('member.register');
    }

    public function saveRegister(Request $request)
    {
        $request->validate([
            'userPhone' => 'required',
            'fullname' => 'required',
            'userPassword' => 'required',
            'confirmPassword' => 'required',
        ]);


        try {
            DB::beginTransaction();
            Member::Create([
                'phone' => $request->userPhone,
                'fullname' => $request->fullname,
                'password' => Hash::make($request->userPassword),


            ]);

            DB::commit();

            // DB::beginTransaction();
            // Check::Create([
            //     'username' => $request->userPhone,
            //     'publication_id' => $publication_id,
            // ]);

            // DB::commit();

            // return redirect()->intended(route('application.showSignedUp'));
            // return view('application.register', compact('message'));

            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Account with ' . $request->userPhone . ' is created successfully. Login and Complete Your Form']);
        } catch (Throwable $e) {

            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
            // return back()->with('error', 'Record Not Added');

            // if (!empty($message_error)) {
            //     return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => 'Provide Phone number for  ' . $request->fullname . '. Record Not Added Successfully']);
            // } else {
            return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => 'Account for ' . $request->userPhone . ' Not Created. Try again']);
            // }
        }
    }
}
