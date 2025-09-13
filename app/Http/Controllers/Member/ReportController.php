<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Idcard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Log;
use PDF;

class ReportController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth:member');
    }


    public function downloadInvoice(Request $request)
    {
        $request->validate([
            'payment_id' => 'required',
        ]);
        $regno = Auth::guard('member')->user()->regno;
        $fname = Auth::guard('member')->user()->first_name;
        $mname = Auth::guard('member')->user()->middle_name;
        $lname = Auth::guard('member')->user()->last_name;
        $fullname = $fname . ' ' . $mname . ' ' . $lname;
        $id = Auth::guard('member')->user()->id;

        $payments = Idcard::join('students', 'students.regno', 'idcards.regno')
            ->where('idcards.generated',  0)
            ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.payment_reference', 'idcards.payment_status_code']);
        // dd($payments);

        $member_details = Student::find($id);

        $filename = "Invoice Slip.pdf";
        $pdf = PDF::loadView('member.report.pdf-invoice', compact('regno', 'fullname',  'payments'), [], [
            'title' => 'BUKAA',
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
        return $pdf->stream($filename);
    }



    public function donwloadReceipt(Request $request)
    {
        $request->validate([
            'payment_id' => 'required',
        ]);
        $regno = Auth::guard('member')->user()->regno;
        $fname = Auth::guard('member')->user()->first_name;
        $mname = Auth::guard('member')->user()->middle_name;
        $lname = Auth::guard('member')->user()->last_name;
        $fullname = $fname . ' ' . $mname . ' ' . $lname;
        $id = Auth::guard('member')->user()->id;

        $payments = Idcard::join('students', 'students.regno', 'idcards.regno')
            ->where('idcards.generated',  0)
            ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.payment_reference', 'idcards.payment_status_code']);
        // dd($payments);

        $member_details = Student::find($id);
        if (blank($payments)) {
            return back()->with('error', 'Payment Not Complete');
        } else {
            $filename = "Receipt Slip.pdf";
            $pdf = PDF::loadView('member.report.pdf-receipt', compact('regno',  'fullname', 'payments'), [], [
                'title' => 'Zaria Merit',
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
            return $pdf->stream($filename);
        }
    }
}
