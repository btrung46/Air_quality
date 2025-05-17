<?php

namespace App\Http\Controllers;

use App\Exports\AirQualityExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfWriter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class ReportController extends Controller
{
    public function showForm()
    {
        return view('reports.form');
    }

    public function export(Request $request)
    {
        $from = $request->from_date;
        $to = $request->to_date;

        $export = new AirQualityExport($from, $to);
        $uuid = Str::uuid();

        return Excel::download($export, "air_quality_report_{$uuid}.xlsx");

        // Nếu là PDF:
        // $filename = "air_quality_temp_{$uuid}.xlsx";
        // $pdfPath = storage_path("app/air_quality_report_{$uuid}.pdf");
        // Excel::store($export, $filename); // Lưu file Excel tạm

        // $spreadsheet = IOFactory::load(storage_path("app/{$filename}"));
        // IOFactory::registerWriter('Pdf', PdfWriter::class);
        // $writer = IOFactory::createWriter($spreadsheet, 'Pdf');
        // $writer->save($pdfPath);

        // unlink(storage_path("app/{$filename}")); // Xóa Excel tạm

        // return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
}
