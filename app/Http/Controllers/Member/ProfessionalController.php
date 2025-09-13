<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Throwable;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class ProfessionalController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:member');
    }

    //
    public function showProfessional()
    {

        // dd($data);
        // dd(Hash::make(123456));
        // dd(dd);

        return view('member.professional.professional');
    }

    public function saveProfessional(Request $request)
    {
        $regno = Auth::guard('member')->user()->regno;


        $request->validate([
            'organization' => 'required',
            'position' => 'required',
            'sdate'  => 'required',
            'edate' => 'required',
        ]);

        $no_items = count($request->organization);
        // dd($no_items);

        for ($i = 0; $i < $no_items; $i++) {
            // dd($request->organization[$i]);
            if (!empty($request->organization[$i]))
                $sdate = $request->edate[$i];
            if ($request->current == 'Yes') {
                $sdate = NULL;
            }
            Professional::Create([
                'regno' => $regno,
                'organization' =>  $request->organization[$i],
                'position' => $request->position[$i],
                'sdate' =>  $request->sdate[$i],
                'edate' => $sdate,
                'current' => $request->current[$i],
            ]);
        }

        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Professional Data Updated Successfully.']);


        // foreach ()
    }

    public function getProfessionals(Request $request)
    {

        $regno = Auth::guard('member')->user()->regno;



        if ($request->ajax()) {
            $regno = Auth::guard('member')->user()->regno;
            $data = Professional::where('professionals.regno', $regno)
                ->get(['professionals.id', 'organization', 'position', 'sdate', 'edate', 'current']);

            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('current', function ($row) {
                    if ($row->current == 'Yes') {
                        $current = 'Yes';
                    } else {
                        $current = 'No';
                    }
                    return $current;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("member.deleteProfessional", ['id' => $row->id]) . '" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i data-lucide="trash"></i></a>';
                    return $btn;
                })
                ->make(true);
        }
    }

    public function deleteProfessional($id)
    {
        Professional::where('id', $id)->delete();
        return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Professional Data Deleted Successfully.']);
    }
}
