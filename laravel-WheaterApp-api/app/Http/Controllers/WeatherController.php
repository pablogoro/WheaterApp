<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class WeatherController extends Controller
{
        public function index(){
            return view('/home');
        }


    public function resultado(Request $request){



            $datos = $request->validate([
                'cp' => 'required',
                'cp'=>'digits:5'
            ]);


            /* Recuperamos el cp y la key de la api */
            $ciudad=$datos['cp'];
            $key = config('services.owm.key');

        /* Consulta de la Api que nos devulve el tiempo de Hoy */
            $hoy= Http::get("https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&lang=es&appid=".$key)->json();
            //echo "https://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&lang=es&appid=".$key;


        /* Consulta de la Api que nos devulve el tiempo 5 dias / 3horas */
            $consulta= Http::get("https://api.openweathermap.org/data/2.5/forecast?q=".$ciudad."&lang=es&appid=".$key)->json();


            /*Verificamos el estado de la consulta*/
             if ($hoy['cod']==200){
                 $weather = $hoy['weather'][0]['description'];
                 $main = $hoy['weather'][0]['main'];
                 $temp = $hoy['main']['temp'] - 273;
                 $ruta="http://openweathermap.org/img/wn/{$hoy['weather'][0]['icon']}@2x.png";
                 $icon=$ruta;
                 $ciudad=$hoy['name'];
             };
                $cityQuery= DB::table('tbl_ciudad')->where('nombre', $ciudad)->first();

             if ($cityQuery == null){
                   DB::table('tbl_ciudad')->insertGetId([
                        'nombre' => $ciudad,
                        'cp' => $datos['cp']
                    ]);
                }
             $cityIdQuery=DB::table('tbl_ciudad')
                 ->select('id')
                 ->where('tbl_ciudad.cp',$datos['cp'])
                 ->orWhere('tbl_ciudad.nombre', $ciudad)
                 ->get();

             $cityId= (int) filter_var($cityIdQuery, FILTER_SANITIZE_NUMBER_INT);

             $registroQuery= DB::table('tbl_registros')
                 ->join('tbl_ciudad', 'tbl_ciudad.id', '=', 'tbl_registros.ciudad')
                 ->where('tbl_registros.ciudad', $cityId)
                 ->where('tbl_registros.dia',DB::raw('curdate()'))
                 ->first();

             if ($registroQuery == null){
                 DB::table('tbl_registros')->insertGetId([
                     'temp' => $temp,
                     'weather' => $weather,
                     'ciudad'=>$cityId,
                     'dia'=>DB::raw('curdate()')
                 ]);
             }


            /*Verificamos el estado de la consulta*/
            if ($consulta['cod']=='200'){

                /* Creamos dos arrays una para el resultado en  proximas horas y otro en proximos dias */
                $resultadoHoras=['tiempos'=>[],'iconos'=>[], 'temp'=>[],'dt_txt'=>[]];

                //$resultadoDias=['tiempos'=>[],'iconos'=>[], 'temp'=>[],'dt_txt'=>[]];

                /* Recuperamos el nombre de la ciudad */


                /* Recorremos la consulta para tantas horas como queramos mostrar información */
                for ($i=0; $i<4; $i++){
                    array_push($resultadoHoras['tiempos'],$consulta['list'][$i]['weather'][0]['description']);
                    $ruta="http://openweathermap.org/img/wn/{$consulta['list'][$i]['weather'][0]['icon']}@2x.png";
                    array_push($resultadoHoras['iconos'], $ruta);
                    array_push($resultadoHoras['temp'],$consulta['list'][$i]['main']['temp']-273);
                    $dt_txt= explode(" ", $consulta['list'][$i]['dt_txt']);

                    array_push($resultadoHoras['dt_txt'],$dt_txt[1]);
                }
                $cont=1;

                foreach ($resultadoHoras['dt_txt']  as $key){

                    $hora=explode(":",$key);
                    $resultadoHoras['dt_txt'][$cont]=$hora[0].":".$hora[1];
                    $cont ++;
                }
                $resultadoHoras['dt_txt'][0]='Ahora';


                /*Top temperaturas más bajas*/
                $topQuery= DB::table('tbl_registros')
                    ->select(\DB::raw("MIN(temp) as  min, tbl_ciudad.nombre, tbl_ciudad.cp"))
                    ->join('tbl_ciudad', 'tbl_ciudad.id', '=', 'tbl_registros.ciudad')
                    ->where('tbl_registros.dia',DB::raw('curdate()'))
                    ->groupBy('tbl_registros.ciudad','tbl_ciudad.cp','tbl_ciudad.nombre')
                    ->orderBy('tbl_registros.temp','asc')
                    ->limit(5)
                    ->get()->toArray();
                $top5=['temp'=>[],'cp'=>[],'nombre'=>[]];
                foreach ($topQuery as $top) {
                    $array = json_decode(json_encode($top), true);
                    array_push($top5['temp'],$array['min']);
                    array_push($top5['cp'],$array['cp']);
                    array_push($top5['nombre'],$array['nombre']);

                }




            /*    $days = [
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                ];

                $dia=array_search(date('l'),$days);

                for ($i=0; $i<5; $i++){
                    if ($dia>6){
                        $dia=0;
                    }
                    array_push($resultadoDias['dt_txt'],$days[$dia]);
                    $dia ++;


                }*/

                return view('/resultado',  compact('weather','main','temp','icon','resultadoHoras','ciudad','top5'));
        }else{
            $error=true;
            return view('home',compact('error'));
        }

    }

}


