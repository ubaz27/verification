<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth:member');
    }

    public function showDashboard()
    {
        $phone = Auth::guard('member')->user()->phone;
        $name = Auth::guard('member')->user()->first_name . " " . Auth::guard('member')->user()->last_name;
        $state = Auth::guard('member')->user()->state;
        $passport = Auth::guard('member')->user()->passport;
        $programme_id = Auth::guard('member')->user()->programme_id;
        $programme_data = Programme::where('id', $programme_id)->first();
        $programme_name = $programme_data->programme;


        $no_chapter_state = Student::where('state', $state)->count();

        $no_chapter_programme = Student::where('programme_id', $programme_id)->count();
        // dd($chapter_state);
        // dd($programme_name);
        // $name = Auth::guard('member')->user()->first_name;
        // dd($name);
        // dd($plots);

        return view('member.dashboard', compact('no_chapter_programme', 'no_chapter_state', 'state', 'programme_name', 'phone', 'name'));
    }
}
