<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class JobsController extends Controller
{
    //
    public function showJobs()
    {
        return view('admin.jobs.job');
    }

    public function saveJob(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'date' => 'required',
            'salary_range' => 'required',
            'job_type' => 'required',
            'category' => 'required',
            'company' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $location = $request->location ?? '';
            $salary_range = $request->salary_range ?? '';
            $website = $request->website ?? '';
            Job::Create([
                'title' => $request->title,
                'desc' => $request->details,
                'company' => $request->company,
                'location' => $location,
                'salary_range' => $salary_range,
                'website' => $website,
                'job_type' => $request->job_type,
                'category' => $request->category,
                'date' => $request->date,


            ]);


            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Job upload was successful.']);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('error',  $e->getMessage());

            return back()->with('mssg',  'Record Not Added');
        }
    }
}
