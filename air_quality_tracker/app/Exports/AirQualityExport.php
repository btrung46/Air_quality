<?php
namespace App\Exports;
use App\Models\Air_data; // Model bạn dùng
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
class AirQualityExport implements FromCollection, WithHeadings
{
    protected $from, $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
        return Air_data::where('user_id', Auth::id())
            ->whereBetween('created_at', [
                Carbon::parse($this->from)->startOfDay(),
                Carbon::parse($this->to)->endOfDay()
            ])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('AVG(temperature) as avg_temperature'),
                DB::raw('AVG(humidity) as avg_humidity'),
                DB::raw('AVG(CO) as avg_CO'),
                DB::raw('AVG(O3) as avg_O3'),
                DB::raw('AVG(PM2_5) as avg_PM2_5'),
                DB::raw('AVG(CO2) as avg_co2'), 
                DB::raw('AVG(TVOC) as avg_tvoc'),
            )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('MAX(created_at)'))
            ->get()
            ->map(function ($item) {
                // Tính AQI cho các chỉ số trung bình
                $aqi_pm25 = $this->calculateAQI($item->avg_PM2_5, 'PM2_5');
                $aqi_o3 = $this->calculateAQI($item->avg_O3, 'O3');
                $aqi_co = $this->calculateAQI($item->avg_CO, 'CO');

                // Lấy AQI cao nhất
                $aqi = max($aqi_pm25, $aqi_o3, $aqi_co);

                // Xác định trạng thái AQI
                $status = $this->getAQIStatus($aqi);

                return [
                    'date'            => $item->date,
                    'avg_temperature' => round($item->avg_temperature, 2),
                    'avg_humidity'    => round($item->avg_humidity, 2),
                    'avg_CO'          => round($item->avg_CO, 2),
                    'avg_O3'          => round($item->avg_O3, 2),
                    'avg_PM2_5'       => round($item->avg_PM2_5, 2),
                    'avb_co2'         => round($item->avg_co2, 2),
                    'avg_tvoc'        => round($item->avg_tvoc, 2),
                    'AQI'             => round($aqi, 2),
                    'status'          => $status,
                ];
            });
    }

    // Tính AQI từ một chỉ số (PM2.5, O3, CO...)
    private function calculateAQI($concentration, $pollutant = null)
    {
        // Bảng ngưỡng AQI theo EPA
        $aqiBreakpoints = [
            'PM2_5' => [
                'C_low' => [0.0, 12.1, 35.5, 55.5, 150.5, 250.5, 350.5],
                'C_high' => [12.0, 35.4, 55.4, 150.4, 250.4, 350.4, 500.4],
                'I_low' => [0, 51, 101, 151, 201, 301, 401],
                'I_high' => [50, 100, 150, 200, 300, 400, 500]
            ],
            'O3' => [ // O3 (8-hour average, ppb)
                'C_low' => [0, 55, 71, 86, 106, 201],
                'C_high' => [54, 70, 85, 105, 200, 605],
                'I_low' => [0, 51, 101, 151, 201, 301],
                'I_high' => [50, 100, 150, 200, 300, 500]
            ],
            'CO' => [ // CO (8-hour average, ppm)
                'C_low' => [0.0, 4.5, 9.5, 12.5, 15.5, 30.5, 40.5],
                'C_high' => [4.4, 9.4, 12.4, 15.4, 30.4, 40.4, 50.4],
                'I_low' => [0, 51, 101, 151, 201, 301, 401],
                'I_high' => [50, 100, 150, 200, 300, 400, 500]
            ]
        ];

        // Kiểm tra chất ô nhiễm hợp lệ
        if (!$pollutant || !isset($aqiBreakpoints[$pollutant])) {
            return 0;
        }

        $breakpoints = $aqiBreakpoints[$pollutant];
        $C = floatval($concentration);

        // Tìm khoảng ngưỡng phù hợp
        for ($i = 0; $i < count($breakpoints['C_low']); $i++) {
            if ($C >= $breakpoints['C_low'][$i] && $C <= $breakpoints['C_high'][$i]) {
                $I_low = $breakpoints['I_low'][$i];
                $I_high = $breakpoints['I_high'][$i];
                $C_low = $breakpoints['C_low'][$i];
                $C_high = $breakpoints['C_high'][$i];

                // Công thức tính AQI
                $aqi = (($I_high - $I_low) / ($C_high - $C_low)) * ($C - $C_low) + $I_low;
                return round($aqi, 2);
            }
        }
    }

    // Xác định trạng thái AQI
    private function getAQIStatus($aqi)
    {
        if ($aqi <= 50) {
            return 'Good';
        } elseif ($aqi <= 100) {
            return 'Moderate';
        } elseif ($aqi <= 150) {
            return 'Unhealthy for Sensitive Groups';
        } elseif ($aqi <= 200) {
            return 'Unhealthy';
        } elseif ($aqi <= 300) {
            return 'Very Unhealthy';
        } else {
            return 'Hazardous';
        }
    }
    public function headings(): array
    {
        return [
            'Date',
            'Temperature',
            'Humidity',
            'CO',
            'O3',
            'PM2.5',
            'CO2',
            'TVOC',
            'AQI',
            'Status'
        ];
    }
}
