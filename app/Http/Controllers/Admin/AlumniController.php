<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Throwable;
use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showAluminUpload()
    {
        $programmes = Programme::orderBy('programme', 'asc')->get();

        return view('admin.alumni.alumni', compact('programmes'));
    }

    public function uploadAlumni(Request $request)
    {
        $request->validate([
            'alumni_file' => 'required|mimes:xlsx',
            'programme_id' => 'required',
        ]);

        // dd('dsd');
        $originalFileName = $request->alumni_file->getClientOriginalName();
        $fileName = time() . '_' . $originalFileName;
        $request->alumni_file->move('./uploads', $fileName);
        $inputFileName = 'uploads/' . $fileName;

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(false);
        $spreadsheet = $reader->load($inputFileName);
        $spreadsheet->setActiveSheetIndex(0);

        try {
            DB::beginTransaction();

            $records = 0;
            $rowNumber = $spreadsheet->getActiveSheet()->getHighestRow();
            for ($i = 2; $i <= $rowNumber; $i++) {
                $fullname =  $spreadsheet->getActiveSheet()->getCell('B' . $i)->getFormattedValue();
                $organisation =  $spreadsheet->getActiveSheet()->getCell('C' . $i)->getFormattedValue();
                $location =  $spreadsheet->getActiveSheet()->getCell('D' . $i)->getFormattedValue();
                $file_no =  $spreadsheet->getActiveSheet()->getCell('E' . $i)->getFormattedValue();
                $certificate_no =  $spreadsheet->getActiveSheet()->getCell('F' . $i)->getFormattedValue();
                $regno =  $spreadsheet->getActiveSheet()->getCell('G' . $i)->getFormattedValue();

                $course =  $request->programme_id;
                $year =  $request->year;

                // $degree_class =  $spreadsheet->getActiveSheet()->getCell('G' . $i)->getFormattedValue();


                $student = Student::where('certificate_no', $certificate_no)->first();
                // dd($application);
                if (blank($student)) {
                    $std = Student::Create([
                        'fullname' => $fullname,
                        'organization' => $organisation,
                        'programme_id' => $course,
                        'year' => $year,
                        'month' => $year,
                        'location' => $location,
                        'file_no' => $file_no,
                        'certificate_no' => $certificate_no,
                        'regno' => $regno,

                    ]);
                    $records++;
                } else {
                    $error_mssg = "$certificate_no Exist at row no " . ($i - 1);
                }

                if (!empty($error_mssg)) {
                    break;
                }
            }

            if (empty($error_mssg)) {
                DB::commit();
                return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Upload of ' . $records . ' request records was successful.']);
            } else {
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => $error_mssg]);
                DB::rollback();
            }
        } catch (Throwable $e) {
            DB::rollback();
            Log::error($e);
            if (env('APP_ENV') == 'local')
                return back()->with('mssg', ['type' => 'danger', 'icon' => 'ban', 'message' => $e->getMessage()]);

            return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Record Not Added']);
        }
    }


    public function showSingleUpload()
    {
        $programmes = Programme::all();
        return view('admin.alumni.alumni-single', compact('programmes'));
    }
    public function uploadAlumniSingle(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'organization' => 'required',
            'programme_id'  => 'required',
            'year' => 'required',
            'location' => 'required',
            'file_no' => 'required',
            'certificate_no' => 'required',
            'regno' => 'regno',
        ]);
        // dd($request->yog);
        $student = Student::where('certificate_no', $request->certificate_no)->first();
        if (Blank($student)) {
            $std = Student::Create([
                'fullname' => $request->fullname,
                'organization' => $request->organization,
                'programme_id' => $request->programme_id,
                'year' => $request->year,
                'location' => $request->location,
                'file_no' => $request->file_no,
                'certificate_no' => $request->certificate_no,
                'regno' => $request->regno,

            ]);
            return back()->with('mssg', ['type' => 'success', 'icon' => 'check', 'message' => 'Upload of ' . $request->certificate_no . ' was successful.']);
        } else {
            return back()->with('mssg', ['type' => 'danger', 'icon' => 'check', 'message' => 'Record Not Added for ' . $request->certificate_no]);
        }
    }


    public function showList()
    {
        $students = Student::join('programmes', 'students.programme_id', 'programmes.id')
            ->get(['students.id', 'students.certificate_no', 'students.organization', 'students.file_no', 'students.fullname', 'programmes.programme', 'students.year',  'students.location']);


        // dd($students);
        return view('admin.alumni.alumni-list', compact('students'));
    }
}
