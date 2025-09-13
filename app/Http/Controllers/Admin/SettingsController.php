<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class SettingsController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'batch_no' => 'required|string',
            'closing_date' => 'required|date',
            'active' => 'required|string',
        ]);
    }
    // public function showBatchEntry()
    // {
    //     $data = Batch::all();
    //     // dd($data);
    //     return view('admin.settings.batch-entry');
    // }


    public function saveBatchEntry(Request $request)
    {
        $this->validator($request->all())->validate();

        $batch = DB::Select("update batches set active = 'No' ");

        try {

            DB::beginTransaction();
            $batch_no = $request->batch_no;
            $closing_date = $request->closing_date;
            $active = $request->active;

            Batch::Create([
                'publication' => $batch_no,
                'closing_date' => $closing_date,
                'active' => $active,
            ]);
            DB::commit();
            // return back()->with('success', 'Record Added successfully');
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Record Info Inserted Successfully.']);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
            // return back()->with('error', 'Record Not Added');
            return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => 'Record Not Added Successfully']);
        }
    }

    public function getBatchList(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        if ($request->ajax()) {
            $data = Batch::all();
            // dd($data);
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    if ($row->active == 'Yes') {
                        $active = '<span class="btn btn-primary btn-sm">Yes</span>';
                    } else {
                        $active = '<span class="btn btn-danger btn-sm">No</span>';
                    }
                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("admin.getUniversityEdit", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })

                ->rawColumns(['active', 'action'])
                ->make(true);
        }
    }
}
