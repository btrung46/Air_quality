<?php

namespace App\Http\Controllers;

use App\Exports\AirQualityExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfWriter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

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
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Chuyển sang đối tượng Carbon để so sánh
        $fromDate = Carbon::parse($from);
        $toDate = Carbon::parse($to);

        if ($fromDate->gt($toDate)) {
            return back()->with('error', 'The start date must not be later than the end date.');
        }

        $export = new AirQualityExport($from, $to);
        $uuid = Str::uuid();

        return Excel::download($export, "air_quality_report_{$uuid}.xlsx");
    }
}
