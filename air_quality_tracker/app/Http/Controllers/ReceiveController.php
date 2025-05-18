<?php

namespace App\Http\Controllers;

use App\Models\Air_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use NewDataEvent;

class ReceiveController extends Controller
{
    public function receive_data(Request $request)  {
            Log::info('Dữ liệu ESP8266 gửi về:', $request->all());
            $data = new Air_data();
            $data->user_id = $request['user_id'];
            $data->temperature = $request['temp'];
            $data->humidity = $request['humi'];
            $data->CO = $request['co'];
            $data->O3 = $request['o3'];
            $data->PM2_5 = $request['dust'];
            $data->CO2 = $request['co2'];
            $data->TVOC = $request['tvoc'];
            $data->aqi = $request['aqi'];
            $data->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Dữ liệu đã nhận!'
            ]);
    }
}
