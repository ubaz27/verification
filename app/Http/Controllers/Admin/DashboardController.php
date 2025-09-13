<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Scholarship;
use App\Models\Executive;
use App\Models\Faq;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showDashboard()
    {
        if (Auth::guard('admin')->user()) {
            $reset_password = Auth::guard('admin')->user()->reset_password;


            if ($reset_password == 1) {
                return view('admin.password-reset');
            } else {

                // $reset_password = Auth::guard('admin')->user()->reset_password;
                $alumni_no = Student::all()->count();

                // dd($alumni_no);
                $unconfirmed = Registration::where('migrated_id', 0)->count();
                // dd($unconfirmed);
                $payment_no = 0;
                // $papers = DB::select("select count(id) as no from staff_records where paper_type_id = 3");
                $chapters = 0;

                // Scholarship statistics - only total needed for dashboard
                $total_scholarships = Scholarship::count();

                // Executive statistics
                $total_executives = Executive::count();
                $active_executives = Executive::active()->count();

                // FAQ statistics
                $total_faqs = Faq::count();
                $active_faqs = Faq::active()->count();

                // Contact Messages statistics
                $total_messages = ContactMessage::count();
                $unread_messages = ContactMessage::unread()->count();
                $scholarship_messages = ContactMessage::where('source', 'scholarship')->count();
                $contact_messages = ContactMessage::where('source', 'contact')->count();
                $recent_messages = ContactMessage::latest()->take(5)->get();

                return view('admin.dashboard', compact('alumni_no', 'chapters', 'payment_no', 'unconfirmed', 'total_scholarships', 'total_executives', 'active_executives', 'total_faqs', 'active_faqs', 'total_messages', 'unread_messages', 'scholarship_messages', 'contact_messages', 'recent_messages'));
                // return view('admin.dashboard', compact('available_plots', 'allocated_plot_no', 'land_no', 'member_no', 'plot_no', 'agent_no'));
            }
        } else {
            return view('admin.login');
        }
    }

    public function showBlank()
    {
        return view('admin.blank');
    }
}
