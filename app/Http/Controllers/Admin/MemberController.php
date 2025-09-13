<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Staff;
use App\Models\UserCategory;
use App\Models\Unit;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    // public function showMembers()
    // {
    //     $unit = Unit::all();


    //     return view('admin.member.member', compact('unit'));
    // }

    public function saveMember(Request $request)
    {

        $request->validate([
            'staffno' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'unit_id' => 'required',
            'gender' => 'required',
        ]);



        // dd('sdfds');
        // dd($request);
        try {
            DB::beginTransaction();
            Member::Create([
                'staffno' => $request->staffno,
                'name' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'unit_id' => $request->unit_id,
                'password' => Hash::make($request->phone),
                'status' => 1,
            ]);

            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Member ' . $request->name . ' Inserted']);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
            // return back()->with('error', 'Record Not Added');
            return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => 'Plot Not Added Successfully']);
        }
    }
    public function getMemberList(Request $request)
    {

        if ($request->ajax()) {
            $data = Member::join('units', 'units.id', 'members.unit_id')
                ->get(['members.id', 'members.staffno', 'members.name', 'members.phone', 'members.status', 'members.email', 'units.unit_name']);
            // dd($data);
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        $cancelled = 'Yes';
                    } else {
                        $cancelled = 'No';
                    }
                    return $cancelled;
                })

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("admin.getUniversityEdit", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getUniversityEdit(Request $request)
    {
        $id = $request->id;

        $units = Member::where('universities.id', $id)->get(['universities.id',  'universities.university']);

        // dd($units);
        return view('admin.unit.edit-university', compact('units'));
    }
}
