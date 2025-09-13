<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Idcard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Log;
use PDF;

class PaymentController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:member');
    }
    public function showIDCard()
    {


        $regno = Auth::guard('member')->user()->regno;
        $first_name = Auth::guard('member')->user()->first_name;
        $middle_name = Auth::guard('member')->user()->middle_name;
        $last_name = Auth::guard('member')->user()->last_name;
        $email = Auth::guard('member')->user()->email;
        $phone = Auth::guard('member')->user()->phone;

        $id = Auth::guard('member')->user()->id;
        $signature = Auth::guard('member')->user()->signature;
        $passport = Auth::guard('member')->user()->passport;
        // dd($signature);
        if ($passport == 'user.png' or $signature == 'signature.png') {

            return redirect()->intended(route('member.showSignature'));
        } else {

            $payments = Idcard::join('students', 'students.regno', 'idcards.regno')
                ->where('idcards.generated',  0)
                ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount_paid', 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.payment_reference', 'idcards.payment_status_code']);
            // dd($payments);
            $accounts = Account::all();
            $allpayment = Idcard::join('students', 'students.regno', 'idcards.regno')
                ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount', 'idcards.amount_paid', 'idcards.generated', 'idcards.paystack_commission', 'idcards.date_processed', 'idcards.payment_reference', 'idcards.payment_status_code']);


            $member_details = Student::find($id);
            $message = "";
            return view('member.invoice.invoice', compact('allpayment', 'email', 'id', 'phone', 'last_name', 'member_details', 'middle_name', 'first_name', 'message', 'accounts', 'regno', 'payments'));
        }
    }

    public function generateInvoice(Request $request)
    {
        $request->validate([
            'regno' => 'required',
            'amount' => 'required',
        ]);

        $regno = Auth::guard('member')->user()->regno;
        $first_name = Auth::guard('member')->user()->first_name;
        $middle_name = Auth::guard('member')->user()->middle_name;
        $last_name = Auth::guard('member')->user()->last_name;
        $email = Auth::guard('member')->user()->email;
        $phone = Auth::guard('member')->user()->phone;

        $id = Auth::guard('member')->user()->id;

        // $month =  Carbon::createFromFormat('Y-m', $request->month)->format('M Y');

        $t = time();
        $todayDate = date("Y-m-d");
        $it_commission  = env('IT_COMMISSION');
        $payable_amount = $request->amount + $it_commission;
        // dd($payable_amount);
        if ($payable_amount < 2500) {
            $paystack_commission = ($payable_amount) * 0.015;
        } else {
            $paystack_commission = ($payable_amount) * 0.015 + 100;


            if ($paystack_commission > 2000) {
                $paystack_commission = 2000;
            }
        }
        // $paystack_commission = 0;
        // $payable_amount =  $payable_amount;
        $payable_amount =  $payable_amount + $paystack_commission;



        $ref = 'paystack_' . $t . '_' . str_replace('/', '', $request->regno);
        Idcard::create([
            'regno' => $request->regno,
            'payment_reference' => $ref,
            'payment_status_code' => '025',
            'amount' => $payable_amount,
            'paystack_commission' => $paystack_commission,
            'date_processed' => $todayDate,
            'date_generated' => $todayDate,
        ]);




        return back()->with('message', 'Invoice with reference ' . $ref . ' Generated');
    }

    public function makePayment(Request $request)
    {
        $regno = Auth::guard('member')->user()->regno;
        $first_name = Auth::guard('member')->user()->first_name;
        $middle_name = Auth::guard('member')->user()->middle_name;
        $last_name = Auth::guard('member')->user()->last_name;
        $email = Auth::guard('member')->user()->email;
        $phone = Auth::guard('member')->user()->phone;
        $id = Auth::guard('member')->user()->id;

        $payment_id = $request->payment_id;
        $payments = Idcard::join('students', 'students.regno', 'idcards.regno')
            ->where('idcards.generated',  0)
            ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount_paid', 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.payment_reference', 'idcards.payment_status_code']);
        // dd($payments);
        $allpayment = Idcard::join('students', 'students.regno', 'idcards.regno')
            ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount_paid', 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.date_processed', 'idcards.payment_reference', 'idcards.payment_status_code']);

        $member_details = Student::find($id);
        // dd($plots);
        return view('member.invoice.make-payment', compact('allpayment', 'payments', 'member_details'));
    }
    // public function showMakePayment()
    // {
    //     $phone = Auth::guard('application')->user()->phone;
    //     $id = Auth::guard('application')->user()->id;

    //     $payments = Formpayment::join('applications', 'formpayments.phone', 'applications.phone')
    //         ->join('programmes', 'applications.programme_id', 'programmes.id')
    //         ->where('applications.phone',  $phone)
    //         ->get(['programmes.programme', DB::raw('formpayments.id AS land_dist_id'), 'formpayments.amount', 'formpayments.payment_reference', 'formpayments.payment_status_code']);
    //     // dd($payments);

    //     $member_details = Application::find($id);
    //     // dd($member_details);
    //     return view('application.make-payment', compact('payments', 'member_details'));
    // }
}
