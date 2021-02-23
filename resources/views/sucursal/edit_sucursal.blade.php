@extends('layouts.PlantillaMaster')

@section('content')
<br></br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Actualizar Sucursal</h4>
            </div>
            <div class="card-body">
                {!! Form::model($sucursal, ['route' => ['sucursal.update', $sucursal->id],'method'=>'PUT']) !!}
        <div class="form-group">
          
                {!! Form::text('nombre', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Nombre Sucursal'
                  )) 
                !!}
                @if ($errors->has('nombre'))
                   <span class="help-block">
                     <strong>{{ $errors->first('nombre') }}</strong>
                   </span>
                  @endif
         </div>
               {!! Form::open(['route'=>['sucursal.update',$sucursal->id]])!!}
                    <input type="hidden" name="_method" value="PUT">
                    <button onclick="return confirm('Esta Seguro De Actualizar La Sucursal?')" class="btn btn-success btn-block">Guardar
                    </button>
                {!!Form::close()!!}
            <a href="{{route('sucursal.index')}}" class="btn btn-info btn-block" >Atrás</a>
                
            </div>
            
        </div>
    </div>
</div>

@endsection
