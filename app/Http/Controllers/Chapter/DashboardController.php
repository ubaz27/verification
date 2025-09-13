<?php

namespace App\Http\Controllers\chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function showDashboard()
    {
        $email = Auth::guard('chapter')->user()->email;
        $name = Auth::guard('chapter')->user()->name;
        $phone = '08063253405';

        // dd($plots);

        return view('chapter.dashboard', compact('email', 'phone', 'name'));
    }
}
