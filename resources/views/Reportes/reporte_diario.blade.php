<!DOCTYPE html>
<html>
<head>

	<title> Reporte diario</title>
     <style>

        @page {
          margin: 180px 15px; 
        }
            
        #header { 
                    position: fixed; 
                    left: 0px; top: -180px;
                    right: 0px; height: 150px; 
                    background-color: #14E25F;
                    text-align: center;
                    border-radius: 0.25em;
                      
               }


    #footer { 
            position: fixed;
             left: 0px; 
             bottom: -180px; 
             right: 0px;
              height: 150px;
             background-color: #14E25F;
              }

    #footer .page:after { content: counter(page,1); }

    body{
            font:13px Arial, Tahoma, Verdana, Helvetica, sans-serif;
            color:#000;
        }

    a h1{
    font-size:70px; 
    color:#FFF;
    }

    h2{
    color:#000;
    font-size:15px; 
    }

    h4{
        text-align: center;
    }

    h5{
        color:black/*#FFF*/;
        font-size:18px;
        font-family: condensed 120% sans-serif;
        text-align: right;

    }

    table{
        width:100%;
        height:auto;
        margin:10px 0 10px 0;
        border-collapse:collapse;
        text-align:center;
        background-color:#FFF/*#365985*/;
        color:black;
    }

    table td,th{
    border:2px solid black;
    padding: 15px;
    }

    /*color encabezado*/
    table th{
    color:white; 
    background-color:#246355/*#365985*/;

    }
    /*Estilo ala tabla sombreado */
    tr:nth-child(even){
        background-color: #ddd
    }
    img{
            width: 140px;
            float:left;
        }

</style>
    
</head>
<body>

    <div id="header">
        <img src="{{public_path()}}/imagenes/superlimon.jpg" >
        <h1>Empresa S.A DE C.V. </h1>
        <h5>Reporte De la Fecha: {{$fecha}} 
            <br>
        Fecha de generacion: {{\Carbon\Carbon::now()}}</h5>
    </div>

     <div id="footer">

        <hr>

        <h4>CARETERRA MAZATLAN CANOAS KM. 68-A S/N COL. 10 DE MARZO TEL. 01 (989) 89 308 33 FAX: 7788 899   CP. 92122 MAZATLAN, SONORA.<br>
        e-mail: EMPRESA@producto.net.mx</h4>
     </div> 

			<div class="table">

            <table class="table">
                <thead>
                    <tr>
                        <th>Cod Barras</th>
                        <th>Nombre</th>
                        <th>Primer Turno</th>
                        
                        <th >Segundo Turno</th>
                        <th>Departamento</th>
                        <th >Sucursal</th>
                        <th>Horas Laboradas</th>

                    </tr>
                </thead>
                @foreach ($result as $cargo)

                <tr>
                    <td>{{$cargo->cod_barras}}</td>
                    <td>{{$cargo->nombre}}</td>
                    <td>
                        Entrada:
                        <hr>
                        {{$cargo->hora_entrada}}
                        <br>
                        <hr>
                        Salida :
                        
                        {{$cargo->hora_salida}}

                    </td>
                    <td> 
                      Entrada:
                        <hr>
                      {{$cargo->hora_entrada2}}
                        <br>
                        <hr>
                      Salida :
                      {{$cargo->hora_salida2}}

                    </td>
                    <td>
                       {{$cargo->departamento}}
                    </td>
                    <td>
                        {{$cargo->sucursal}}
                    </td>
                    <td>{{(($cargo->TURNO1+$cargo->TURNO2)/60)}}</td>
                </tr>
                 @endforeach

            </table>

		
	</div>
    
    <script type="text/php">
        if(isset($pdf)){
                $pdf->page_script('
                if($PAGE_COUNT >1){
                    $font= $fontMetrics->getFont("Lato","regular");
                    $pdf->page_text(522,770,"Pagina {PAGE_NUM} / {PAGE_COUNT}",$font,8,array(.5,.5,.5));
                }
            ');
        }
    </script>

</body>

</html>
<!--

    <script type="text/php">
        if(isset($pdf)){
                $pdf->page_script('
                if($PAGE_COUNT > 1){
                    $font= $fontMetrics->getFont("Lato","regular");
                    $pdf->page_text(522,770,"Page {PAGE_NUM} /{PAGE_COUNT}",$font,8,array(.5,.5,.5));
                }
            ');
        }
    </script>
-->