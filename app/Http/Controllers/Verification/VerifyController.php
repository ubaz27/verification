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
use PDF;

class VerifyController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:verification');
    }
    public function showVerify()
    {
        // $id = Auth::guard('verification')->user()->id;
        // $data = Payment::join('students', 'payments.student_id', 'students.id')
        //     ->join('applications', 'applications.id', 'payments.application_id')
        //     ->join('programmes', 'students.programme_id', 'programmes.id')
        //     ->where('payments.application_id', $id)
        //     ->get(['payments.id', 'payments.payment_status_code', 'students.fullname', 'programmes.programme', 'students.month', 'students.certificate_no']);

        // dd($data);
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

    public function downloadCertificate(request $request)
    {
        $payment_id = $request->id;
        $filename = "Verification Data.pdf";
        $data = Payment::join('students', 'students.id', 'payments.student_id')
            ->join('programmes', 'students.programme_id', 'programmes.id')
            ->where('payments.id', $payment_id)
            ->get(['students.fullname', 'programmes.programme', 'students.organization', 'students.month', 'students.location', 'students.file_no', 'students.certificate_no', 'students.isBlocked']);

        $pdf = PDF::loadView('verification.report.pdf-verification', compact('data'), [], [
            'title' => 'NITT',
            'format' => 'A4',
            'default_font_size' => '12',
            'default_font' => 'Times',
            'orientation' => 'P',
            'margin_bottom' => 15,
            'margin_top' => 10,
            'margin_footer' => 5,
            'margin_header' => 5,
        ]);

        if ($request->submit == 'btnDownload') {
            return $pdf->download($filename);
        }
        return $pdf->download($filename);
        // return $pdf->stream($filename);
    }
}
