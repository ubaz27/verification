<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $message = "";
        $phone = Auth::guard('verification')->user()->phone;
        $fullname = Auth::guard('verification')->user()->fullname;


        return view('verification.dashboard', compact('fullname'));
    }
}
