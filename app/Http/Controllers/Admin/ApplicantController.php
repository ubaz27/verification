<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Registration;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Programme;
use App\Models\ProgrammeCategory;
use App\Models\Student;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\URL;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ApplicantController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showApplicantList()
    {
        $data = Registration::join('programmes', 'registrations.programme_id', 'programmes.id')
            ->get(['registrations.id', 'registrations.year_graduation', 'first_name', 'middle_name', 'last_name', 'registrations.migrated_id', 'programmes.programme', 'registrations.regno']);
        // dd($data);


        return view('admin.applicant.applicant-list', compact('data'));
    }

    public function getApplicantsList(Request $request)
    {

        if ($request->ajax()) {
            $data = Registration::join('programmes', 'registrations.programme_id', 'programmes.id')
                ->get(['registrations.id', 'registrations.year_graduation', DB::raw('CONCAT_WS(first_name," ",middle_name," " ,last_name) as fullname'), 'registrations.migrated_id', 'programmes.programme', 'registrations.regno']);
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('migrated_id', function ($row) {
                    if ($row->migrated_id == 1) {
                        $is_migrated = 'Yes';
                    } else {
                        $is_migrated = 'No';
                    }
                    return $is_migrated;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("admin.showApplicantEdit", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['migrated_id', 'action'])
                ->make(true);
        }
    }

    public function showApplicantEdit($id)
    {
        $programmes  = Programme::orderBy('programme', 'asc')->get();
        $records = Registration::join('programmes', 'programmes.id', 'registrations.programme_id')
            ->where('registrations.id', $id)
            ->get([
                'registrations.id',
                'registrations.regno',
                'registrations.first_name',
                'registrations.middle_name',
                'registrations.last_name',
                'registrations.email',
                'registrations.programme_id',
                'registrations.phone',
                'registrations.year_graduation',
                'programmes.programme',
                'registrations.state'
            ]);

        // dd($records);
        return view('admin.applicant.edit-applicant', compact('records', 'programmes'));
    }

    public function saveEditApplicant(Request $request)
    {
        $request->validate([
            'regno' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'programme_id' => 'required',
        ]);

        if ($request->status_id == 'Select') {
            return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Select Status and Try again']);
        } else {


            if ($request->status_id == 1) //Active
            {
                // dd($request->id);
                $registration = Registration::where('id', $request->id)->first();
                // dd($registration);
                $registration->regno = $request->regno;
                $registration->first_name = $request->first_name;
                $registration->middle_name = $request->middle_name;
                $registration->last_name = $request->last_name;
                $registration->email = $request->email;
                $registration->phone = $request->phone;
                $registration->programme_id = $request->programme_id;
                $registration->year_graduation = $request->yog;

                if (!empty($request->password)) {
                    $registration->password = Hash::make($request->password);
                }
                // dd($request->id);
                $registration->save();
                return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Account Saved Successfully']);
            } else if ($request->status_id == 2) //validate
            {
                $registration = Registration::where('id', $request->id)->first();
                try {
                    $students = Student::where('regno', $request->regno)->first();
                    if (!blank($students)) {
                        return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Record ' . $request->regno . ' Exist']);
                    } else {
                        DB::beginTransaction();
                        $std = Student::Create([
                            'regno' => $request->regno,
                            'first_name' => $request->first_name,
                            'middle_name' => $request->middle_name,
                            'last_name' => $request->last_name,
                            'year_graduation' => $request->yog,
                            'degree_class' => $request->degree_class_id,
                            'programme_id' => $request->programme_id,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'password' => Hash::make(1000),
                        ]);

                        if (!blank($std)) {
                            DB::commit();
                            $registration->migrated_id  = 1;
                            $registration->save();
                            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Account Migrated Successfully']);
                        }
                    }
                } catch (Throwable $e) {
                    DB::rollback();
                    Log::error($e);
                    if (env('APP_ENV') == 'local')
                        return back()->with('error',  $e->getMessage());
                    return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Account Not Migrated, Try again']);

                    // return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Record Not Added']);
                }
            } else if ($request->status_id == 3)  ///reject the record
            {
                $registration = Registration::where('id', $request->id)->first();
                $registration->is_active = 0;
                $registration->save();
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Account Deactivated Successfully']);
            }
        }
    }
}
