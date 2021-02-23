@extends('layouts.PlantillaMaster')

@section('content')
<br></br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Actualizar Usuario</h4>
            </div>
            <div class="card-body">
              {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id],'method'=>'PUT']) !!}
        <div class="form-group">
          <label>Nombre :</label>
                {!! Form::text('name', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Nombre usuario'
                  )) 
                !!}
                 @if ($errors->has('name'))
                   <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                   </span>
                  @endif
          <label>Email :</label>
          {!! Form::text('email', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Email de usuario'
                  )) 
                !!}
                 @if ($errors->has('name'))
                   <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                   </span>
                  @endif

          <label>Perfil :</label>
           <div class="form-group">

                        {!!
                          Form::select('id_rol', $perfil, $usuario->id_rol, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
                        !!}
                      
                    </div>
          
         </div>
               {!! Form::open(['route'=>['usuarios.update',$usuario->id]])!!}
                    <input type="hidden" name="_method" value="PUT">
                    <button onclick="return confirm('Esta Seguro De Actualizar El Usuario?')" class="btn btn-success btn-block">Guardar
                    </button>
                    <a href="{{route('usuarios.index')}}" class="btn btn-info btn-block" >Atrás</a>  
            
                {!!Form::close()!!}

            </div>
            
        </div>
    </div>
</div>

@endsection
