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
        $events = Event::where('type', 1)
            ->where('status', 0)
            ->limit(4)
            ->latest()
            ->get();


        $new = Event::where('type', 2)
            ->where('status', 0)
            ->limit(4)
            ->latest()
            ->get();
        // dd($new);

        return view('index', compact('events', 'new'));
    }
}
