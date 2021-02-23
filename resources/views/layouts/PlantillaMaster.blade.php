<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Control De  Asistencias Limon Almacenes S.A. DE C.V.</title>
        <meta name="title" content="Título de la WEB">
        <meta name="description" content="Descripción de la WEB"> 

        <!--Letras google-->
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  
        <!--CDN-->
         
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <!--FontAwesome-->
        <link rel="stylesheet" type="text/css" href="/fontawesome-5.11.2/css/all.css">
        <!--Alertas-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <!--estilo de footer-->
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <!--CDN JAVA SCRIP-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>

            <body>
                @section('menu')
                @include('secciones.menu')

                @show

                <div class="container">
                    @include('flash-alert.flash-alert')
                    @yield('content')
                    
                    <br>
                </div>
                @yield('example')
                @include('secciones.footer')
                      

            </body> 


        <!--  -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <!--  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!--Script para cerrar la notificacion de asistencia-->
        <script type="text/javascript">
            $(document).ready(function(){
              setTimeout(function (){
              $("#target").hide(900);

              },3000);
             });
        </script>



</html>

