<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class VerifyController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:verification');
    }
    public function showVerify()
    {

        return view('verification.verify.verify');
    }

    public function searchCertificateNo(Request $request)
    {
        $request->validate([
            'certificate_no' => 'required',
        ]);

        $data =  Student::where('certificate_no', $request->certificate_no)->first();
        $record =  Student::where('certificate_no', $request->certificate_no)->count();
        if (($record) == 1) {


            return view('verification.verify.verify-info', compact('data'));
        } else {
            return back()->with('error',  'No Record Found');
        }
    }
}
