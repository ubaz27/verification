<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Batch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Log;
use File;

class ApplicationController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:member');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'batch_id' => 'required',
            'title' => 'required|string',

        ]);
    }
}
