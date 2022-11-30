<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- BOOTSTRAP LINK -->
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="./css/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owlcarousel/owl.theme.default.min.css">
    <link href="./css/app.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/20fb0bfa14.js" crossorigin="anonymous"></script>
    <!-- js LINKS -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>

    <script src="./js/app.js"></script>
</head>
<body>
<div class="background">
    <div class="items-center-h">
        <img src="./images/logo.png" alt="logo">
{{--        <div class="frase-header">    <p>¡Que la lluvia no te pare! </p>--}}
{{--        </div>--}}

    </div>

    <div class="boxes">
        <div class="box box1">
            <div class="direction-row header">
                <div class="info-ciudad">
                    <div class="codigo-postal">
                        <h5>Codigo postal:</h5>  <p> {{$_REQUEST['cp']}}</p>
                    </div>
                    <div class="nombre-ciudad">
                        <h5>Ciudad:</h5> <p>{{$ciudad}}</p>
                    </div>
                </div>
                <div class="buscar">  <a href="{{ route('home') }}"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>Buscar otra zona</a></div>
                <div class="buscar-responsive">  <a href="{{ route('home') }}"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></a></div>
            </div>
            <div class="direction-row info">
                <div class="ahora">
                    <div class="info-header">Hoy</div>

                    <div class="info-box">
                        <div class="icon-box">

                           <img src="{{$icon}}">
             </div>
                        <div class="lluvia-box">
                      <p >{{mb_convert_case($weather,MB_CASE_TITLE)}}</p>
                            <p class="temp2">{{round($temp)}}º</p>
                        </div>

                    </div>
                </div>
                <div class="prox">
                    <div class="info-header">Próximas horas</div>
                    <div class="miniboxes">

                    @foreach($resultadoHoras['tiempos'] as $key => $name)
                    <div class="info-minibox">

                    <p class="h5">{{$resultadoHoras['dt_txt'][$key]}}</p>
                        <img src="{{$resultadoHoras['iconos'][$key]}}">
                      <p class="lluvia">{{mb_convert_case($name,MB_CASE_TITLE)}}</p>
                        <p class="temp">{{round($resultadoHoras['temp'][$key])}}</p>
                    </div>
                        @endforeach

                    </div>


                </div>
                <div class="dias">
                    <div class="info-header">Próximos dias</div>
                    <div class="owl-carousel owl-theme ">
                        <div>
                            <p class="h5">Miércoles</p>
                            <img src="http://openweathermap.org/img/wn/11d.png">
                            <p class="lluvia">Tormenta</p>
                            <p class="temp">11º</p>

                        </div>
                        <div>
                            <p class="h5">Miércoles</p>
                            <img src="http://openweathermap.org/img/wn/11d.png">
                            <p class="lluvia">Tormenta</p>
                            <p class="temp">11º</p>

                        </div>
                        <div>
                            <p class="h5">Miércoles</p>
                            <img src="http://openweathermap.org/img/wn/11d.png">
                            <p class="lluvia">Tormenta</p>
                            <p class="temp">11º</p>

                        </div>
                        <div>
                            <p class="h5">Miércoles</p>
                            <img src="http://openweathermap.org/img/wn/11d.png">
                            <p class="lluvia">Tormenta</p>
                            <p class="temp">11º</p>

                        </div>
                        <div>
                            <p class="h5">Miércoles</p>
                            <img src="http://openweathermap.org/img/wn/11d.png">
                            <p class="lluvia">Tormenta</p>
                            <p class="temp">11º</p>

                        </div>


                    </div>
                </div>




            </div>


        </div>
        <div class="box box2">
            <div class="top-header">
                <h5>Top 5 de las zonas más frías según tus búsquedas</h5>
            </div>
            @php($cont=0)
            @foreach($top5['temp'] as $key=>$temp)
                @php($cont++)
                <div class="top-minibox">
                    <p class="number">1.</p>
                    <p class="top-temp">{{$temp}}</p>
                    <div class="top-infobox">
                        <div class="cp">
                            <p class="cp-tittle">CP: </p>
                            <p class="cp-info">{{$top5['cp'][$key]}}</p>
                        </div>
                        <div class="ciudad">
                            <p class="cd-tittle">Ciudad: </p>
                            <p class="cd-info">{{$top5['nombre'][$key]}}</p>
                        </div>



                    </div>
                </div>
            @if($cont!==5)
                <hr>
                @endif
            @endforeach

        </div>
    </div>

</div>

</body>
</html>
