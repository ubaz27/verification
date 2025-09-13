<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {

        $id = Auth::guard('verification')->user()->id;
        $application = Application::where('id', $id)->first();


        return view('verification.profile.profile', compact('application'));
    }
}
