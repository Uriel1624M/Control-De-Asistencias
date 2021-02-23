@extends('layouts.PlantillaMaster')

@section('content')
<br></br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Actualizar ROL</h4>
            </div>

            <div class="card-body">
                {!! Form::model($roles, ['route' => ['rol.update', $roles->id],'method'=>'PUT']) !!}
        <div class="form-group">
          
                {!! Form::text('nombre', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Cargo...'
                  )) 
                !!}
                 @if ($errors->has('nombre'))
                   <span class="help-block">
                     <strong>{{ $errors->first('nombre') }}</strong>
                   </span>
                   @endif
 
         </div>
               {!! Form::open(['route'=>['rol.update',$roles->id]])!!}
                    <input type="hidden" name="_method" value="PUT">
                    <button onclick="return confirm('Esta Seguro De Actualizar El Perfil de Usuario?')" class="btn btn-success btn-block">Guardar
                    </button>
                    <a href="{{route('rol.index')}}" class="btn btn-info btn-block" >Atrás</a>
                {!!Form::close()!!}
            
            </div>
        </div>

    </div>
</div>

@endsection
