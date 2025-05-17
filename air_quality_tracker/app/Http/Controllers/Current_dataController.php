<?php

namespace App\Http\Controllers;

use App\Models\Air_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Current_dataController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $current_data = Air_data::where('user_id',$user_id)->latest()->first();
        if (empty($current_data)){
            return view('dashboard',[
                'check_data' => false
            ]);
        }
        
        $totalAQI = $current_data->aqi;
        // chart
        $hourlyData = Air_data::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('HOUR(created_at) as hour'),
            DB::raw('AVG(PM2_5) as avg_pm25'), 
             DB::raw('AVG(Temperature) as avg_temperature'), 
             DB::raw('AVG(Humidity) as avg_humidity'),
             DB::raw('AVG(CO) as avg_co'), 
             DB::raw('AVG(O3) as avg_o3'),
             DB::raw('AVG(CO2) as avg_co2'), 
             DB::raw('AVG(TVOC) as avg_tvoc'),
        )
        ->where('user_id',$user_id)
        ->groupBy(DB::raw('DATE(created_at)'), DB::raw('HOUR(created_at)'))
        ->orderBy(DB::raw('MAX(created_at)'), 'desc')
        ->limit(7)
        ->get();

        $hourlyLabels = $hourlyData->map(fn($item) => str_pad($item->hour, 2, '0', STR_PAD_LEFT) . ':00')->toArray();
        $hourlyValues = [
        'pm25' => $hourlyData->pluck('avg_pm25')->toArray(),
        'temperature' => $hourlyData->pluck('avg_temperature')->toArray(),
        'humidity' => $hourlyData->pluck('avg_humidity')->toArray(),
        'co' => $hourlyData->pluck('avg_co')->toArray(),
        'o3' => $hourlyData->pluck('avg_o3')->toArray(),
        'co2' => $hourlyData->pluck('avg_co2')->toArray(),
        'tvoc' => $hourlyData->pluck('avg_tvoc')->toArray(),
        
    ];


        $dailyData = Air_data::select(
            DB::raw('DATE(created_at) as date'),
             DB::raw('AVG(PM2_5) as avg_pm25'), 
             DB::raw('AVG(Temperature) as avg_temperature'), 
             DB::raw('AVG(Humidity) as avg_humidity'),
             DB::raw('AVG(CO) as avg_co'), 
             DB::raw('AVG(O3) as avg_o3'),
              DB::raw('AVG(CO2) as avg_co2'), 
             DB::raw('AVG(TVOC) as avg_tvoc'),
        )
        ->where('user_id',$user_id)
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy(DB::raw('MAX(created_at)'), 'desc') // Lấy ngày mới nhất
        ->limit(7) 
        ->get();
    
        $dailyLabels = $dailyData->pluck('date')->toArray();
        $dailyValues = [
            'pm25' => $dailyData->pluck('avg_pm25')->toArray(),
            'temperature' => $dailyData->pluck('avg_temperature')->toArray(),
            'humidity' => $dailyData->pluck('avg_humidity')->toArray(),
            'co' => $dailyData->pluck('avg_co')->toArray(),
            'o3' => $dailyData->pluck('avg_o3')->toArray(),
            'co2' => $dailyData->pluck('avg_co2')->toArray(),
             'tvoc' => $dailyData->pluck('avg_tvoc')->toArray(),
        ];

        $hourlyTableData = Air_data::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('HOUR(created_at) as hour'),
            DB::raw('AVG(PM2_5) as avg_pm25'), 
             DB::raw('AVG(Temperature) as avg_temperature'), 
             DB::raw('AVG(Humidity) as avg_humidity'),
             DB::raw('AVG(CO) as avg_co'), 
             DB::raw('AVG(O3) as avg_o3'),
              DB::raw('AVG(CO2) as avg_co2'), 
             DB::raw('AVG(TVOC) as avg_tvoc'),
        )
        ->where('user_id',$user_id)
        ->groupBy(DB::raw('DATE(created_at)'), DB::raw('HOUR(created_at)'))
        ->orderBy(DB::raw('MAX(created_at)'), 'desc')
        ->paginate(10)->withQueryString();
        return view('Dashboard', [
            'check_data' => true,
            'current_dat' => $current_data,
            'AQI' => $totalAQI,
            'dailyLabels' => array_reverse($dailyLabels),
            'dailyValues' => $dailyValues,
            'hourlyLabels' => array_reverse($hourlyLabels),
            'hourlyValues' => $hourlyValues,
            'hourlyTableData' => $hourlyTableData
        ]);
    }
    // public function calculateAQI($concentration, $breakpoints)
    // {
    //     foreach ($breakpoints as $range) {
    //         $cLow = $range['c_low'];
    //         $cHigh = $range['c_high'];
    //         $iLow = $range['i_low'];
    //         $iHigh = $range['i_high'];

    //         if ($concentration >= $cLow && $concentration <= $cHigh) {
    //             $aqi = (($iHigh - $iLow) / ($cHigh - $cLow)) * ($concentration - $cLow) + $iLow;
    //             return round($aqi);
    //         }
    //     }
    //     return null;
    // }
}
