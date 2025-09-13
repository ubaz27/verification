<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Executive;

class AboutController extends Controller
{
    //


    public function about()
    {
        $executives = Executive::active()->orderBy('id')->get();
        return view('public.about', compact('executives'));
    }
}
