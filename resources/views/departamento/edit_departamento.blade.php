@extends('layouts.PlantillaMaster')

@section('content')
<br></br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Actualizar Departamento</h4>
            </div>
            <div class="card-body">
              {!! Form::model($departamento, ['route' => ['departamento.update', $departamento->id],'method'=>'PUT']) !!}
        <div class="form-group">
          
                {!! Form::text('departamento', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Nombre del Perfil...'
                  )) 
                !!}
                 @if ($errors->has('departamento'))
                   <span class="help-block">
                     <strong>{{ $errors->first('departamento') }}</strong>
                   </span>
                  @endif
         </div>
               {!! Form::open(['route'=>['departamento.update',$departamento->id]])!!}
                    <input type="hidden" name="_method" value="PUT">
                    <button onclick="return confirm('Esta Seguro De Actualizar El Departamento?')" class="btn btn-success btn-block">Guardar
                    </button>
                {!!Form::close()!!}
            <a href="{{route('departamento.index')}}" class="btn btn-info btn-block" >Atrás</a>  
            </div>
            
        </div>
    </div>
</div>

@endsection
