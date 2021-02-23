@extends('layouts.PlantillaMaster')

@section('content')
<br>
<div class="content">
<div class="card">
  <div class="card-header special-card-title">
    <h5 class="card-title"><i class="fa fa-calendar"></i> Reporte de Asistencia Mensual</h5>
    
  </div>
  <div class="card-body">
    {!! Form::open(['route'=>'reportemensual.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}

        <div class="row">
          <div class="col-md-4">

            <div class="form-group">
            <label>Mes :</label>
            {!!
                    Form::select('mes',array('1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'),1,array('class'=>'form-control'));
            !!}
          </div>
          </div>
            
          <div class="col-md-4">
            <div class="form-group">
              <label>Año :</label>
            {!!
                    Form::selectYear('anio',2010,$anio,$anio,['class'=>'form-control']);
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
