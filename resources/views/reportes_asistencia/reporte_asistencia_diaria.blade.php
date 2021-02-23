@extends('layouts.PlantillaMaster')

@section('content')
<br>
<div class="content">
  <div class="card">
    <div class="card-header special-card-title">
      <h5 class="card-title"><i class="fa fa-calendar"></i> Reporte de Asistencia Diaria</h5>
      
    </div>
    <div class="card-body">
      {!! Form::open(['route'=>'reportediario.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}

          <div class="row">
            <div class="col-md-4">

              <div class="form-group">
              <label>Fecha</label>
              {!!
                      Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control']);
              !!}
            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Departamento</label>
                      {!!
                        Form::select('id_departamento', $departamento, null, array('class'=>'form-control', 'placeholder'=>'General'))
                      !!}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Sucursal</label>
                      {!!
                        Form::select('id_sucursal', $sucursal, null, array('class'=>'form-control', 'placeholder'=>'General'))
                      !!}
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
