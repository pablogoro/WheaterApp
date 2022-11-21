<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
        public function index(){
            return view('/home');
        }


    public function resultado(Request $request){
        $datos = $request->validate([
            'cp' => 'required'
        ]);
        $ciudad=$datos['cp'];
        $key = config('services.owm.key');
        //echo $key;
        //echo "https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&lang=es"."&appid=".$key;
        $consulta=  Http::get("https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&lang=es"."&appid=".$key)->json();
        $consulta2= Http::get("https://api.openweathermap.org/data/2.5/forecast?q=".$ciudad."&lang=es&appid=".$key)->json();
        if ($consulta['cod']=='200'){
            $tiempo=$consulta['weather'][0]['description'];
            $icon="http://openweathermap.org/img/wn/{$consulta['weather'][0]['icon']}@2x.png";
            $temp=$consulta['main']['temp'] -273;
            return view('/resultado',  compact('tiempo','icon','temp'));
        }else{
            $error=true;
            return view('home',compact('error'));
        }

    }

}


