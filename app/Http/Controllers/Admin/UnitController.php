<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Programme;
use App\Models\ProgrammeCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showFaculty()
    {

        return view('admin.unit.faculties');
    }

    public function saveFaculty(Request $request)
    {
        $request->validate([
            'faculty' => 'required',
        ]);

        Faculty::Create([
            'faculty' => $request->faculty,
        ]);

        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Faculty ' . $request->faculty . ' Info. Inserted']);
    }

    public function getFacultyList(Request $request)
    {

        if ($request->ajax()) {
            $data = Faculty::get(['faculties.id', 'faculties.faculty']);
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("admin.getFacultyEdit", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function showDepartment()
    {

        $faculties = Faculty::all();
        return view('admin.unit.departments', compact('faculties'));
    }


    public function saveDepartment(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'faculty_id' => 'required',
        ]);

        Department::Create([
            'department' => $request->department,
            'faculty_id' => $request->faculty_id,
        ]);
        // return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Faculty ' . $request->faculty . ' Info. Inserted']);

        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Department ' . $request->department .  ' Saved Successfully']);
    }

    public function showBatchDepartments()
    {
        $faculties = Faculty::all();
        return view('admin.unit.batch_departments', compact('faculties'));
    }
    public function saveBatchDepartment(Request $request)
    {
        $request->validate([
            'departments' => 'required',
            'faculty_id' => 'required',

        ]);

        $departmentsinfo = array_filter(explode("\n", trim($request->departments)));
        $i = 0;
        try {
            DB::beginTransaction();
            foreach ($departmentsinfo as $info) {
                Department::Create([
                    'department' => $info,
                    'faculty_id' => $request->faculty_id,
                ]);
                $i++;
            }

            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => $i . ' Departments Saved Successfully']);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
            // return back()->with('error', 'Record Not Added');
            return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => ' Not Added Successfully']);
        }
    }

    public function getDepartmentList(Request $request)
    {

        if ($request->ajax()) {
            $data = Department::join('faculties', 'faculties.id', 'departments.faculty_id')
                ->get(['departments.id', 'departments.department', 'faculties.faculty']);
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("admin.getDepartmentEdit", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function showProgramme()
    {

        $departments = Department::all();
        $categories = ProgrammeCategory::all();
        return view('admin.unit.programmes', compact('departments', 'categories'));
    }

    public function showBatchProgrammes()
    {

        $departments = Department::orderBy('department', 'asc')->get();
        $categories = ProgrammeCategory::all();
        return view('admin.unit.batch_programmes', compact('departments', 'categories'));
    }


    public function saveProgramme(Request $request)
    {
        $request->validate([
            'programme' => 'required',
            'department_id' => 'required',

        ]);

        Programme::Create([
            'programme' => $request->programme,
            'department_id' => $request->department_id,

        ]);
        // return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Faculty ' . $request->faculty . ' Info. Inserted']);

        return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Programme ' . $request->programme .  ' Saved Successfully']);
    }


    public function saveBatchProgramme(Request $request)
    {
        $request->validate([
            'programmes' => 'required',
            'department_id' => 'required',

        ]);

        $programmesinfo = array_filter(explode("\n", trim($request->programmes)));
        $i = 0;
        try {
            DB::beginTransaction();
            foreach ($programmesinfo as $info) {
                Programme::Create([
                    'programme' => $info,
                    'department_id' => $request->department_id,

                ]);
                $i++;
            }

            DB::commit();
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => $i . ' Programmes Saved Successfully']);
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);
            // return back()->with('error', 'Record Not Added');
            return back()->with('mssg', ['type' => 'error', 'icon' => 'check', 'message' => ' Not Added Successfully']);
        }
    }
    public function getProgrammeList(Request $request)
    {

        if ($request->ajax()) {
            $data = Programme::join('departments', 'departments.id', 'programmes.department_id')
                ->get(['programmes.id', 'programmes.programme', 'departments.department']);
            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . Url::signedRoute("admin.getDepartmentEdit", ['id' => $row->id]) . '"  class="btn btn-primary btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="View/Edit"><i data-lucide="pencil"></i></a>';
                    // $btn = '<a href="' . Url::signedRoute("admin.acceptStudent", ['id' => $row->id]) . '" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="Accept"><i data-lucide="edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
