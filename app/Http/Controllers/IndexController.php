<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Executive;
use App\Models\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function showIndex()
    {
       

        return view('index');
    }
}
