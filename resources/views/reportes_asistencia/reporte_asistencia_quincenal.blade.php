@extends('layouts.PlantillaMaster')

@section('content')
<br>
<div class="content">
<div class="card">
  <div class="card-header special-card-title">
    <h5 class="card-title"><i class="fa fa-calendar"></i> Reporte de Asistencia Quincenal</h5>
    
  </div>
  <div class="card-body">
    {!! Form::open(['route'=>'reportequincenal.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}

        <div class="row">
          <div class="col-md-4">

            <div class="form-group">
            <label>Fecha inicio</label>
            {!!
                    Form::date('fecha_inicio', \Carbon\Carbon::now(),['class'=>'form-control']);
            !!}
          </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Fecha Final </label>
            {!!
                    Form::date('fecha_final', \Carbon\Carbon::now(),['class'=>'form-control']);
            !!}     
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Sucursal</label>
                    {!!
                      Form::select('id_sucursal', $sucursal, null, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
                    !!}
                    @if ($errors->has('id_sucursal'))
                               <span class="help-block">
                                 <strong> <p class="text-danger">{{ $errors->first('id_sucursal') }}</strong>
                               </p>
                     @endif

            </div>            
          </div>
          <div class="col-md-4 offset-md-8">
            {!!
            Form::submit('Buscar', array('class'=>'btn btn-success btn-block'))
             !!}
                        

          </div>
          
        </div>
      {!! Form::close() !!}
  </div>

</div>  
</div>
@endsection
