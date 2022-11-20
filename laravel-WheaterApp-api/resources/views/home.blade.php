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

    <script src="https://kit.fontawesome.com/20fb0bfa14.js" crossorigin="anonymous"></script>
    <link href="./css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="background items-center-h">
    <img src="./images/logo.png" alt="logo">
    <div>
        <div class="frase items-center-h">
            <p>Enteráte del tiempo en la zona exacta que te interesa buscando por código postal</p>
        </div>
        <form action="{{ route('resultado') }}" >

        <div class="inputs items-center-h ">
            <input type="text" name="cp" placeholder="Introduce el código postal">

        </div>
            <div class="items-center-h">
            <div class="submitBox">

                <input type="submit" value="Buscar"   class="son"  >
                <i class="fa-sharp fa-solid fa-magnifying-glass son2"></i>
            </div>
            </div>
         {{--   <div class="submit">
                <input type="submit" value="Buscar">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </div>--}}



        </form>

    </div>
    <div class="footter">
        <p>¡Que la lluvia no te pare! </p>
    </div>
</div>

</body>
</html>
