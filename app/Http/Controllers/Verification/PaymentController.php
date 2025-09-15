<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;
use Throwable;

class PaymentController extends Controller
{
    //
    public function getInvoiceList(Request $request)
    {
        $id = Auth::guard('verification')->user()->id;
        if ($request->ajax()) {
            $data = Payment::join('students', 'payments.student_id', 'students.id')
                ->join('applications', 'applications.id', 'payments.application_id')
                ->join('programmes', 'students.programme_id', 'programmes.id')
                ->where('payments.application_id', $id)
                ->get(['payments.id', 'students.fullname', 'programmes.programme', 'students.month', 'students.certificate_no']);
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("verification.login", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function generateInvoice(Request $request)
    {

        $request->validate([
            'certificate_no' => 'required',
        ]);
        $id = Auth::guard('verification')->user()->id;

        $data =  Student::where('certificate_no', $request->certificate_no)->first();
        $student_id = $data->id;
        // dd('ss');
        $ref =  'O' . generateTicketID();
        $check = Payment::where('rrr', $ref)->count();
        if ($check > 0) {
            $ref =   'O' . generateTicketID(); //ticket no
        }
        $data = Payment::where(
            [
                ['payments.student_id', $student_id],
                ['payments.application_id', $id],
                ['payments.amount_paid', '=', '0.0']
            ]
        )->get();
        if (!blank($data)) {
            $message = "Invoice already generated. Pay first";
            return view('verification.message2', compact('message'));
        } else {
            try {

                DB::beginTransaction();


                $payment =  Payment::Create([
                    'application_id' => Auth::guard('verification')->user()->id,
                    'amount_payable' => 10000,
                    'student_id' => $student_id,
                    'rrr' => $ref,
                    'payment_status_code' => 25,
                    'payment_commission' => 33,

                ]);
                DB::commit();

                return  redirect()->route('verification.showVerify');
            } catch (Throwable $e) {
                DB::rollback();
                Log::error($e);
                if (env('APP_ENV') == 'local')
                    return back()->with('error',  $e->getMessage());

                return back()->with('error',  'Record Not Added');
            }
        }
    }
}
