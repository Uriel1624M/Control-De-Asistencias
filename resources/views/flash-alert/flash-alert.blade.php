<!--Alerta de Warning-->
 @if ($message = Session::get('warning'))
	<div id="target" class="alert alert-success text-center col-md-6 mx-auto">
	    <button type="button" class="close" data-dismiss="alert">&times;</button> 
      <h2> Limon Almacenes S.A de C.V</h2>
      <hr>
	    <strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


<!-- Alerta de Success-->
@if ($message = Session::get('success'))
       <div id="target" class="alert alert-success text-center col-md-6 mx-auto">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" >&times;</span>

          </button>
          <h2> Empresa S.A de C.V</h2>
          <hr>
          <h3>{{$message->nombre}}</h3>
          <img src="{{ asset("imagenes_personal/$message->url_foto" )}}" width="80" height="80" class="rounded-circle">

          @if($message->hora_entrada==$message->hora_salida)

               <h5>ENTRADA 1° TURNO: {{$message->hora_entrada}}</h5>
          @endif

          @if($message->hora_salida != $message->hora_entrada && $message->hora_salida2==0)
          <h5>ENTRADA 1° TURNO: {{ $message->hora_entrada}}</h5>
          <h5>SALIDA 1° TURNO: {{$message->hora_salida}}</h5>
          
          @endif

          @if($message->hora_entrada2 >0 && $message->hora_entrada2 ==$message->hora_entrada2)
          <h5>ENTRADA 2° TURNO: {{ $message->hora_entrada2}}</h4>
          
          @endif

          @if($message->hora_salida2 != $message->hora_entrada2 )
          <h5>SALIDA 2° TURNO: {{ $message->hora_salida2}}</h4>
          
          @endif    
      </div>
    @endif
