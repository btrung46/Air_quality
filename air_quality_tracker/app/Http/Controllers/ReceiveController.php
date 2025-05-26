<?php

namespace App\Http\Controllers;

use App\Events\NewDataEvent;
use App\Models\Air_data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ReceiveController extends Controller
{
    public function receive_data(Request $request)
    {
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
        event(new NewDataEvent($data));
        $threshold = 150;

        if ($request['aqi'] > $threshold) {
            $user = User::find($request['user_id']);

            if ($user && $user->player_id) {
                $fields = [
                    'app_id' => '14264129-0222-4ea9-8522-acb34a4209d7',
                    'include_player_ids' => [$user->player_id],
                    'headings' => ['en' => '⚠️ Cảnh báo chất lượng không khí'],
                    'contents' => ['en' => "AQI hiện tại của bạn vượt ngưỡng an toàn!"],
                ];
                Http::withHeaders([
                    'Authorization' => 'Basic os_v2_app_cqteckicejhktbjcvszuuqqj25pu5o3ht4oeaivpbnykg5c7guu6pc6co2gt7popcizblw2y2ulgyhquxwbmdalaljxjjpxf6hzgida',
                    'Content-Type' => 'application/json',
                ])->post('https://onesignal.com/api/v1/notifications', $fields);
            }
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Dữ liệu đã nhận!',
        ]);
    }
}
