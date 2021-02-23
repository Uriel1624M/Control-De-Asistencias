@extends('layouts.PlantillaMaster')

@section('content')
<br></br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Actualizar Cargo</h4>
            </div>

            <div class="card-body">
                {!! Form::model($cargo, ['route' => ['cargos.update', $cargo->id],'method'=>'PUT']) !!}
        <div class="form-group">
          
                {!! Form::text('cargo', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Cargo...'
                  )) 
                !!}
         </div>
               {!! Form::open(['route'=>['cargos.update',$cargo->id]])!!}
                    <input type="hidden" name="_method" value="PUT">
                    <button onclick="return confirm('Esta Seguro De Actualizar El Cargo?')" class="btn btn-success btn-block">Guardar
                    </button>
                    <a href="{{route('cargos.index')}}" class="btn btn-info btn-block" >Atrás</a>
                {!!Form::close()!!}
            
            </div>
        </div>

    </div>
</div>

@endsection
