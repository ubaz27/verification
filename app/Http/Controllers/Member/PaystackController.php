<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Idcard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PaystackController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth:member');
    }


    public function callback(Request $request)
    {
        $regno = Auth::guard('member')->user()->regno;
        $id = Auth::guard('member')->user()->id;
        // dd($ref)/;

        $ref = $request->reference;
        // dd($ref);
        $secret_key = env('PAYSTACK_SECRET_KEY');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",

            ),

        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);



        $response = json_decode($response);
        // dd($response);

        if ($response->data->status == 'success') {
            $todayDate = date("Y-m-d");
            $amount_paid = ($response->data->amount) / 100;
            // dd($amount_paid);
            $invoice_data = Idcard::where('payment_reference', $ref)->first();
            $paystack_commision = $invoice_data->paystack_commission;
            $amount_to_pay = $invoice_data->amount;
            $actual_amount_paid = $amount_paid - $paystack_commision;


            $paystack = Idcard::where('payment_reference', $ref)
                ->update(['payment_status_code' => 01, 'date_processed' => $todayDate, 'amount_paid' => $actual_amount_paid]);


            $payments = Idcard::join('students', 'students.regno', 'idcards.regno')
                ->where('idcards.generated',  0)
                ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount_paid', 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.payment_reference', 'idcards.payment_status_code']);
            // dd($payments);
            $allpayment = Idcard::join('students', 'students.regno', 'idcards.regno')
                ->get(['students.regno', DB::raw('idcards.id AS payment_id'), 'idcards.amount_paid', 'idcards.amount', 'idcards.generated', 'idcards.paystack_commission', 'idcards.date_processed', 'idcards.payment_reference', 'idcards.payment_status_code']);

            $member_details = Student::find($id);
            $accounts = Account::all();

            // dd($member_details);
            return view('member.invoice.invoice', compact('id', 'allpayment', 'regno', 'accounts', 'payments', 'member_details'));
        } else {
            return redirect()->route('member.cancel');
        }
    }

    //payment for booking of plot
    public function callback2(Request $request)
    {
        $phone = Auth::guard('application')->user()->phone;
        $id = Auth::guard('application')->user()->id;
        // dd($ref)/;

        $ref = $request->reference;
        // dd($ref);
        $secret_key = env('PAYSTACK_SECRET_KEY');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",

            ),

        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);


        $response = json_decode($response);

        if ($response->data->status == 'success') {
            $todayDate = date("Y-m-d");
            $amount_paid = ($response->data->amount) / 100;

            //update bookingplot payment status to paid;
            $paystack = BookingPlot::where('payment_reference', $ref)
                ->update(['payment_status_code' => 01, 'date_processed' => $todayDate]);


            $records =  BookingPlot::where('payment_reference', $ref)
                ->where('payment_status_code', 1)->get(['plot_id', 'deposit_amount', 'month']);



            $it_commission = env('IT_COMMISSION');

            foreach ($records as $detail) {
                $amount_paid = $detail->deposit_amount;
                $plot_id = $detail->plot_id;
                $month = $detail->month;
                // $paystack_commission = $detail->paystack_commission;
                $actual_amount = $amount_paid - $it_commission;
                // dd($plot_id);
                //update plot availability
                $plotdata = Plot::find($plot_id);
                $plotdata->is_available = 1;
                $plotdata->save();

                //insert into land distribution
                LandDistribution::create([
                    'phone' => $phone,
                    'member_id' => $id,
                    'plot_id' => $plot_id,
                    'agent_id' => 1,

                ]);

                //get the id of land distribution
                $land_details = LandDistribution::where('phone', $phone)
                    ->where('plot_ID', $plot_id)
                    ->get(['land_distributions.id',]);


                //insert into transaction table
                foreach ($land_details as $transaction) {
                    Transaction::create([
                        'member_id' => $id,
                        'member_phone' => $phone,
                        'land_distribution_id' => $transaction->id,
                        'amount' =>  $amount_paid,
                        'month' =>  Carbon::createFromFormat('Y-m', $month)->format('M Y'),
                        'payment_reference' => $ref,
                    ]);
                }
            }


            // dd($plots);
            //get details for display
            $plots_member = BookingPlot::join('plots', 'booking_plots.plot_id', 'plots.id')
                ->join('lands', 'plots.land_id', 'lands.id')
                ->where('booking_plots.member_phone', $phone)
                ->get(['booking_plots.id', 'booking_plots.payment_status_code', 'booking_plots.payment_reference', 'booking_plots.deposit_amount', 'plots.plot_no', 'lands.land_name', 'plots.cost', 'plots.dimension']);

            return view('application.view-booked-plots', compact('plots_member'));
        } else {
            return redirect()->route('application.cancel');
        }
    }
}
