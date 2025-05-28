<?php

namespace App\Http\Controllers;

use App\Events\NewDataEvent;
use App\Mail\WarningMail;
use App\Models\Air_data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        if ($request['aqi'] >= 150) {
            $user = User::find($request['user_id']);
            if ($request['aqi']<=200){
                $level = 'Unhealthy Air Quality';
                $recom = 'Everyone may begin to experience health effects; members of sensitive groups may experience more
                        serious health effects.';
            }
            else if($request['aqi'] <= 300){
                $level = ' Very Unhealthy Air Quality';
                $recom = ' Health alert: everyone may experience more serious health effects.';
            }else{
                $level  = 'Hazardous Air Quality';
                $recom = 'Health warnings of emergency conditions. The entire population is more likely to be affected.';
            }
            $content = [
                'name' => $user->name,
                'aqi' => $request['aqi'],
                'level' => $level,
                'recommendation' => $recom,
            ];
            Mail::to($user->email)->send(new WarningMail($content));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Dữ liệu đã nhận!',
        ]);
    }
}
