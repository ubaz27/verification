<?php

namespace App\Http\Controllers\Admin;

use PDF;
use MPDF;
use App\Http\Controllers\Controller;
use App\Models\Idcard;
use App\Models\Papers;
use App\Models\Programme;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Unit;
use \Illuminate\Support\Facades\URL;

class ReportController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function showIDList()
    {
        $programmes = Programme::all();
        $dates = Idcard::select('date_processed')->distinct()->get();
        // $dates = Idcard::distinct()->pluck('date_processed');
        // dd($dates);
        return view('admin.report.download-id-card', compact('dates'));
    }


    public function generateIDList(Request $request)
    {
        $request->validate([
            'sdate' => 'required',
            'edate' => 'required',
        ]);
        // $id = $request->programme_id;
        // dd($request->programme_id);
        // dd($id);

        $data = DB::select("SELECT students.id, students.regno, students.first_name, students.middle_name,
        students.last_name,programmes.programme,students.passport, students.signature FROM students
INNER JOIN idcards ON students.regno = idcards.regno
INNER JOIN programmes ON students.programme_id = programmes.id
 WHERE
idcards.payment_status_code = 1 AND idcards.generated = 0 and
CAST(idcards.date_processed as datetime) BETWEEN ? and ?", [$request->sdate, $request->edate]);
        $i = 0;
        // dd($data);
        if (!blank($data)) {
            foreach ($data as $items) {
                $i++;
                // $student_id = $items->id;
                // dd($student_id);
                $link = Url::signedRoute("verifyIDCard", ['id' => $items->id]);
                $results[] = array_merge(array($i), array_values(get_object_vars($items)), array($link));
            }
        } else {
            $results[] = array();
        }



        $ReportHeader = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $TableHeader = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
        ];

        $TableBody = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times');
        $spreadsheet->getDefaultStyle()->getFont()->setSize('13');
        $sheet = $spreadsheet->getActiveSheet();


        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setWorksheet($sheet);
        // $drawing->setPath('dist/img/logo.png');
        $drawing->setPath('assets/images/logo.png');
        $drawing->setCoordinates('A1');
        $drawing->setHeight(60);
        $sheet->getRowDimension('1')->setRowHeight(55);
        $drawing->setOffsetX(110);

        $sheet->setCellValue('A2',  "BUKAA, Bayero University, Kano");
        $sheet->setCellValue('A3', "ID Card Data");
        // $sheet->setCellValue('A4', "From ");
        $sheet->mergeCells('A2:I2');
        $sheet->mergeCells('A3:I3');
        $sheet->mergeCells('A4:C4');
        $sheet->getStyle("A1:A4")->applyFromArray($ReportHeader);

        $header = array("S/N", "Student iD", "Regno", "First Name", "Middle Name", "Last Name", "Programme", "Passport", "Signature", "Link");
        $sheet->fromArray($header, NULL, 'A6');
        $sheet->getStyle("A6:J6")->applyFromArray($TableHeader);

        $sheet->fromArray($results, NULL, 'A7');

        $highest_row = $sheet->getHighestRow();
        $highest_column = $sheet->getHighestColumn();
        $sheet->getStyle("A7:J$highest_row")->applyFromArray($TableBody);
        // $sheet->getStyle("B7:B$highest_row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $sheet->getStyle("D7:D$highest_row")->getNumberFormat()->setFormatCode('0.00');
        // $sheet->getStyle("E7:E$highest_row")->getNumberFormat()->setFormatCode('0.00');

        // $highestColumnAutoSize = $highest_column;
        // $highestColumnAutoSize = $highestColumnAutoSize - 4;
        // for ($col = 'D'; $col !== $highestColumnAutoSize; $col++) {
        //     $sheet
        //         ->getColumnDimension($col)
        //         ->setAutoSize(true);
        // }

        $sheet->getColumnDimension('C')->setAutoSize(false);
        $sheet->getColumnDimension('C')->setWidth(25);

        $sheet->getColumnDimension('A')->setAutoSize(false);
        $sheet->getColumnDimension('A')->setWidth(7);


        $sheet->getColumnDimension('I')->setAutoSize(false);
        $sheet->getColumnDimension('I')->setWidth(37);


        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        $filename = "Summary.xlsx";

        $writer = new Xlsx($spreadsheet);
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer->save('php://output');
        exit;
    }

    public function verifyIDCard($id)
    {

        $data = Student::join('programmes', 'students.programme_id', 'programmes.id')
            ->where('students.id', [$id])
            ->get(['students.regno', 'first_name', 'middle_name', 'last_name', 'programmes.programme', 'passport']);


        // dd($data);

        return view('admin.report.view-id-card', compact('data'));

        // dd($id);
    }
    public function showUnitReport()
    {
        $units =  Unit::where('id', '>', 2)->get();
        $papertypes = Papers::all();
        $category = array('University', 'Staff');
        return view('admin.report.list-unit-report', compact('units', 'papertypes', 'category'));
    }


    //     public function generate_pdf()
    //     {
    //         $data = [
    //             'foo' => 'bar'
    //         ];
    //         $pdf = PDF::loadView('admin.report.pdf-category-summary', $data);
    //         return $pdf->stream('document.pdf');
    //     }
    //     public function pdfRecordByCatetogry(Request $request)
    //     {
    //         $request->validate(
    //             [
    //                 'category' => 'required',

    //             ]
    //         );

    //         $category = $request->category;


    //         if ($category == 'Staff') {
    //             $transactions = DB::select('SELECT papers.papertype , count(staff_records.title) AS no
    // FROM papers INNER JOIN staff_records
    // ON papers.id = staff_records.paper_type_id
    // GROUP BY papers.papertype ');
    //         } elseif ($category == 'University') {
    //             $transactions = DB::select('SELECT papers.papertype , count(university_records.title) AS no
    // FROM papers INNER JOIN university_records
    // ON papers.id = university_records.paper_type_id
    // GROUP BY papers.papertype ');

    //             // dd($transactions);
    //         }

    //         if ($request->type === 'pdf') {
    //             $filename = "Summary.pdf";

    //             $pdf = PDF::loadView('admin.report.pdf-category-summary', compact('transactions', 'category'));

    //             if ($request->submit == 'btnDownload') {
    //                 return $pdf->download($filename);
    //             }
    //             return $pdf->stream($filename);
    //         }

    //         if ($request->type === 'excel') {
    //             $results = array();
    //             $i = 0;
    //             $total_credit = $total_debit = 0;

    //             foreach ($transactions as $transaction) {
    //                 $i++;
    //                 $results[] = array_merge(array($i), array_values(get_object_vars($transaction)));
    //             }


    //             $ReportHeader = [
    //                 'font' => [
    //                     'bold' => true,
    //                 ],
    //                 'alignment' => [
    //                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 ],
    //             ];

    //             $TableHeader = [
    //                 'font' => [
    //                     'bold' => true,
    //                 ],
    //                 'alignment' => [
    //                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 ],
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                     ],
    //                 ],
    //                 'fill' => [
    //                     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
    //                     'rotation' => 90,
    //                     'startColor' => [
    //                         'argb' => 'FFA0A0A0',
    //                     ],
    //                     'endColor' => [
    //                         'argb' => 'FFFFFFFF',
    //                     ],
    //                 ],
    //             ];

    //             $TableBody = [
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                     ],
    //                 ],
    //             ];

    //             $spreadsheet = new Spreadsheet();
    //             $spreadsheet->getDefaultStyle()->getFont()->setName('Times');
    //             $spreadsheet->getDefaultStyle()->getFont()->setSize('13');
    //             $sheet = $spreadsheet->getActiveSheet();


    //             $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //             $drawing->setName('Logo');
    //             $drawing->setDescription('Logo');
    //             $drawing->setWorksheet($sheet);
    //             // $drawing->setPath('dist/img/logo.png');
    //             $drawing->setPath('assets/images/logo.png');
    //             $drawing->setCoordinates('C1');
    //             $drawing->setHeight(60);
    //             $sheet->getRowDimension('1')->setRowHeight(55);
    //             $drawing->setOffsetX(110);

    //             $sheet->setCellValue('A2',  "Bayero University, Kano");
    //             $sheet->setCellValue('A3', "Summary of " .  $category . " Based Documents");
    //             // $sheet->setCellValue('A4', "From ");
    //             $sheet->mergeCells('A2:C2');
    //             $sheet->mergeCells('A3:C3');
    //             $sheet->mergeCells('A4:C4');
    //             $sheet->getStyle("A1:A4")->applyFromArray($ReportHeader);

    //             $header = array("S/N", "Paper Category", "Number of Documents");
    //             $sheet->fromArray($header, NULL, 'A6');
    //             $sheet->getStyle("A6:C6")->applyFromArray($TableHeader);

    //             $sheet->fromArray($results, NULL, 'A7');
    //             $highest_row = $sheet->getHighestRow();
    //             $highest_column = $sheet->getHighestColumn();
    //             $sheet->getStyle("A7:C$highest_row")->applyFromArray($TableBody);
    //             $sheet->getStyle("B7:B$highest_row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    //             // $sheet->getStyle("D7:D$highest_row")->getNumberFormat()->setFormatCode('0.00');
    //             // $sheet->getStyle("E7:E$highest_row")->getNumberFormat()->setFormatCode('0.00');

    //             $highestColumnAutoSize = $highest_column;
    //             $highestColumnAutoSize++;
    //             for ($col = 'A'; $col !== $highestColumnAutoSize; $col++) {
    //                 $sheet
    //                     ->getColumnDimension($col)
    //                     ->setAutoSize(true);
    //             }

    //             $sheet->getColumnDimension('C')->setAutoSize(false);
    //             $sheet->getColumnDimension('C')->setWidth(25);

    //             $sheet->getColumnDimension('A')->setAutoSize(false);
    //             $sheet->getColumnDimension('A')->setWidth(7);



    //             $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

    //             $filename = $category . "Summary.xlsx";

    //             $writer = new Xlsx($spreadsheet);
    //             // Redirect output to a client’s web browser (Xlsx)
    //             header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //             header('Content-Disposition: attachment;filename=' . $filename);
    //             header('Cache-Control: max-age=0');
    //             // If you're serving to IE 9, then the following may be needed
    //             header('Cache-Control: max-age=1');

    //             // If you're serving to IE over SSL, then the following may be needed
    //             header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    //             header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    //             header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    //             header('Pragma: public'); // HTTP/1.0

    //             $writer->save('php://output');
    //             exit;
    //         }
    //     }


    //     public function pdfRecordByPaperUnit(Request $request)
    //     {
    //         $request->validate(
    //             [
    //                 'papertype_id' => 'required',
    //                 'category' => 'required',

    //             ]
    //         );

    //         $papertype_id = $request->papertype_id;
    //         $category = $request->category;
    //         $papers = Papers::find($papertype_id);


    //         if ($category == 'Staff') {
    //             $transactions = DB::select('SELECT units.unit_name, count(staff_records.staffno) AS no
    // FROM staff_records
    // INNER JOIN members ON members.staffno = staff_records.staffno
    // INNER JOIN papers ON staff_records.paper_type_id =papers.id
    // INNER JOIN units ON members.unit_id = units.id
    // WHERE papers.id = ?
    // GROUP BY  units.unit_name,papertype',  [$papertype_id]);
    //         } elseif ($category == 'University') {
    //             $transactions = DB::select('SELECT units.unit_name, COUNT(university_records.title) AS no
    // FROM university_records
    // INNER JOIN units ON university_records.unit_id = units.id
    // INNER JOIN papers ON university_records.paper_type_id =papers.id
    // WHERE papers.id = ?
    // GROUP BY units.unit_name',  [$papertype_id]);
    //         }


    //         if ($request->type === 'pdf') {
    //             $filename = "Summary.pdf";

    //             $pdf = PDF::loadView('admin.report.pdf-unit-summary', compact('transactions', 'category', 'papers'));

    //             if ($request->submit == 'btnDownload') {
    //                 return $pdf->download($filename);
    //             }
    //             return $pdf->stream($filename);
    //         }

    //         if ($request->type === 'excel') {
    //             $results = array();
    //             $i = 0;

    //             foreach ($transactions as $transaction) {
    //                 $i++;
    //                 $results[] = array_merge(array($i), array_values(get_object_vars($transaction)));
    //             }


    //             $ReportHeader = [
    //                 'font' => [
    //                     'bold' => true,
    //                 ],
    //                 'alignment' => [
    //                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 ],
    //             ];

    //             $TableHeader = [
    //                 'font' => [
    //                     'bold' => true,
    //                 ],
    //                 'alignment' => [
    //                     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 ],
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                     ],
    //                 ],
    //                 'fill' => [
    //                     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
    //                     'rotation' => 90,
    //                     'startColor' => [
    //                         'argb' => 'FFA0A0A0',
    //                     ],
    //                     'endColor' => [
    //                         'argb' => 'FFFFFFFF',
    //                     ],
    //                 ],
    //             ];

    //             $TableBody = [
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                     ],
    //                 ],
    //             ];

    //             $spreadsheet = new Spreadsheet();
    //             $spreadsheet->getDefaultStyle()->getFont()->setName('Times');
    //             $spreadsheet->getDefaultStyle()->getFont()->setSize('13');
    //             $sheet = $spreadsheet->getActiveSheet();


    //             $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //             $drawing->setName('Logo');
    //             $drawing->setDescription('Logo');
    //             $drawing->setWorksheet($sheet);
    //             $drawing->setPath('assets/images/logo.png');
    //             $drawing->setCoordinates('C1');
    //             $drawing->setHeight(60);
    //             $sheet->getRowDimension('1')->setRowHeight(55);
    //             $drawing->setOffsetX(110);

    //             $sheet->setCellValue('A2',  "Bayero University, Kano");

    //             $sheet->setCellValue('A3', $papers->papertype . " Summary of " .  $category . " Based Documents");
    //             // $sheet->setCellValue('A4', "From ");
    //             $sheet->mergeCells('A2:C2');
    //             $sheet->mergeCells('A3:C3');
    //             $sheet->mergeCells('A4:C4');
    //             $sheet->getStyle("A1:A4")->applyFromArray($ReportHeader);

    //             $header = array("S/N", "Unit", "Number of Documents");
    //             $sheet->fromArray($header, NULL, 'A6');
    //             $sheet->getStyle("A6:C6")->applyFromArray($TableHeader);

    //             $sheet->fromArray($results, NULL, 'A7');
    //             $highest_row = $sheet->getHighestRow();
    //             $highest_column = $sheet->getHighestColumn();
    //             $sheet->getStyle("A7:C$highest_row")->applyFromArray($TableBody);
    //             $sheet->getStyle("B7:B$highest_row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    //             // $sheet->getStyle("D7:D$highest_row")->getNumberFormat()->setFormatCode('0.00');
    //             // $sheet->getStyle("E7:E$highest_row")->getNumberFormat()->setFormatCode('0.00');

    //             $highestColumnAutoSize = $highest_column;
    //             $highestColumnAutoSize++;
    //             for ($col = 'A'; $col !== $highestColumnAutoSize; $col++) {
    //                 $sheet
    //                     ->getColumnDimension($col)
    //                     ->setAutoSize(true);
    //             }

    //             $sheet->getColumnDimension('C')->setAutoSize(false);
    //             $sheet->getColumnDimension('C')->setWidth(25);

    //             $sheet->getColumnDimension('A')->setAutoSize(false);
    //             $sheet->getColumnDimension('A')->setWidth(7);



    //             $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

    //             $filename = $category . "Summary.xlsx";

    //             $writer = new Xlsx($spreadsheet);
    //             // Redirect output to a client’s web browser (Xlsx)
    //             header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //             header('Content-Disposition: attachment;filename=' . $filename);
    //             header('Cache-Control: max-age=0');
    //             // If you're serving to IE 9, then the following may be needed
    //             header('Cache-Control: max-age=1');

    //             // If you're serving to IE over SSL, then the following may be needed
    //             header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    //             header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    //             header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    //             header('Pragma: public'); // HTTP/1.0

    //             $writer->save('php://output');
    //             exit;
    //         }
    //     }
}
