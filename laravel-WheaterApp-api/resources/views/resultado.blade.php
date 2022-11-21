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
                <div>
                    Codigo postal:
                    Ciudad:
                </div>
                <div>Buscar otra zona</div>
            </div>
            <div class="direction-row info">
                <div class="ahora">
                    <div class="info-header">Ahora</div>

                    <div class="info-box">
                        <div class="icon-box">

                            <img src="{{$icon}}">
                        </div>
                        <div class="lluvia-box">
                            <p >{{mb_convert_case($tiempo,MB_CASE_TITLE)}}</p>
                            <p class="temp2">{{round($temp)}}º</p>
                        </div>

                    </div>
                </div>
                <div class="prox">
                    <div class="info-header">Próximas horas</div>
                    <div class="miniboxes">

                    <div class="info-minibox">
                        <p class="h5">Ahora</p>
                        <i class="fa-solid fa-snowflake icon"></i>
                        <p class="lluvia">Nieve</p>
                        <p>-3</p>
                    </div>
                    <div class="info-minibox">
                        <p class="h5">Ahora</p>
                        <i class="fa-solid fa-snowflake icon"></i>
                        <p class="lluvia">Nieve</p>
                        <p>-3</p>
                    </div>
                    <div class="info-minibox">
                        <p class="h5">Ahora</p>
                        <i class="fa-solid fa-snowflake icon"></i>
                        <p class="lluvia">Nieve</p>
                        <p>-3</p>
                    </div>
                    <div class="info-minibox2">
                        <p class="h5">Ahora</p>
                        <i class="fa-solid fa-snowflake icon"></i>
                        <p class="lluvia">Nieve</p>
                        <p class="temp">-3</p>
                    </div>
                    </div>


                </div>
                <div class="dias">
                    <div class="info-header">Próximas horas</div>
                    <div class="owl-carousel owl-theme">
                        <div class="item info-minibox ">
                            <p class="h5">Ahora</p>
                            <i class="fa-solid fa-snowflake icon"></i>
                            <p class="lluvia">Nieve</p>
                            <p class="temp">-3</p>
                        </div>
                        <div class="item info-minibox">
                            <p class="h5">Ahora</p>
                            <i class="fa-solid fa-snowflake icon"></i>
                            <p class="lluvia">Nieve</p>
                            <p class="temp">-3</p>
                        </div>
                        <div class="item info-minibox">
                            <p class="h5">Ahora</p>
                            <i class="fa-solid fa-snowflake icon"></i>
                            <p class="lluvia">Nieve</p>
                            <p class="temp">-3</p>
                        </div>
                        <div class="item info-minibox">
                            <p class="h5">Ahora</p>
                            <i class="fa-solid fa-snowflake icon"></i>
                            <p class="lluvia">Nieve</p>
                            <p class="temp">-3</p>
                        </div>
                        <div class="item info-minibox">
                            <p class="h5">Ahora</p>
                            <i class="fa-solid fa-snowflake icon"></i>
                            <p class="lluvia">Nieve</p>
                            <p class="temp">-3</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="box box2">
            <div class="top-header">
                <h5>Top 5 de las zonas más frías según tus búsquedas</h5>
            </div>

            <div class="top-minibox">
                <p class="number">1.</p>
                <p class="top-temp">-3º</p>
                <div class="top-infobox">
                    <div class="cp">
                        <p class="cp-tittle">CP: </p>
                        <p class="cp-info">08034</p>
                    </div>
                    <div class="ciudad">
                        <p class="cd-tittle">Ciudad: </p>
                        <p class="cd-info">Barcelona</p>
                    </div>



                </div>




            </div>
            <hr>
            <div class="top-minibox">
                <p class="number">1.</p>
                <p class="top-temp">-3º</p>
                <div class="top-infobox">
                    <div class="cp">
                        <p class="cp-tittle">CP: </p>
                        <p class="cp-info">08034</p>
                    </div>
                    <div class="ciudad">
                        <p class="cd-tittle">Ciudad: </p>
                        <p class="cd-info">Barcelona</p>
                    </div>



                </div>




            </div>
            <hr> <div class="top-minibox">
                <p class="number">1.</p>
                <p class="top-temp">-3º</p>
                <div class="top-infobox">
                    <div class="cp">
                        <p class="cp-tittle">CP: </p>
                        <p class="cp-info">08034</p>
                    </div>
                    <div class="ciudad">
                        <p class="cd-tittle">Ciudad: </p>
                        <p class="cd-info">Barcelona</p>
                    </div>



                </div>




            </div>
            <hr>
            <div class="top-minibox">
                <p class="number">1.</p>
                <p class="top-temp">-3º</p>
                <div class="top-infobox">
                    <div class="cp">
                        <p class="cp-tittle">CP: </p>
                        <p class="cp-info">08034</p>
                    </div>
                    <div class="ciudad">
                        <p class="cd-tittle">Ciudad: </p>
                        <p class="cd-info">Barcelona</p>
                    </div>



                </div>




            </div>
            <hr>
            <div class="top-minibox">
                <p class="number">1.</p>
                <p class="top-temp">-3º</p>
                <div class="top-infobox">
                    <div class="cp">
                        <p class="cp-tittle">CP: </p>
                        <p class="cp-info">08034</p>
                    </div>
                    <div class="ciudad">
                        <p class="cd-tittle">Ciudad: </p>
                        <p class="cd-info">Barcelona</p>
                    </div>



                </div>




            </div>
            <hr>

        </div>
    </div>

</div>

</body>
</html>
