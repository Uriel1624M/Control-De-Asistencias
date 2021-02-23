@extends('layouts.PlantillaMaster')

@section('content')
<br></br>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header special-card-title">
                <center>
                 <h3>Actualizar Informacion de Personal</h3> 
                  </center> 
            </div>
            <br>
            <picture>
              <center>
            <img src="{{asset("imagenes_personal/$personal->url_foto" )}}" class="mx-auto m-2 rounded-circle w-50">
            </center>

            </picture>
            
            <div class="card-body">
                <center>
                  <h3 class="card-title">{{$personal->nombre}}</h3>  
                </center>
                {!! Form::model($personal,['route'=>['personal.update', $personal->id], 'method'=>'PUT', 'files' => true]) !!}
      
          <strong>
              {!! Form::label('cod_barras', 'Codigo Barras :', array('class' => 'subrayado')) !!} 
          </strong>   
                {!! Form::text('cod_barras', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Nombre del Perfil...'
                  )) 
                !!}
        <strong>
            {!! Form::label('nombre', 'Nombre :', array('class' => 'subrayado')) !!}
            
        </strong>
         
            {!! Form::text('nombre', null, array(
                'class'=>'form-control',
                'required'=>'required',
                'placeholder'=>'Nombre Completo'
              )) 
            !!}
        <strong>
            {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento :', array('class' => 'subrayado')) !!} 
            
        </strong>
       
        {!!
         Form::date('fecha_nacimiento',$personal->fecha_nacimiento,['class'=>'form-control']);
         !!}
        <strong>
            {!! Form::label('telefono', 'Telefono', array('class' => 'subrayado')) !!}
            
        </strong>
         
                {!! Form::text('telefono', null, array(
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Forma de Pago...'
                  )) 
                !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <strong>
                                 {!!
                                    Form::label('calle', 'Calle:', array('class' => 'negrita')) 
                                !!}
                        </strong>

                           {!!
                             Form::text('calle',$personal->direccion->calle,['class'=>'form-control', 'placeholder'=>'Cjon. 19 de Marzo', 'required' => 'required']) 
                            !!}
                    </div>
                    <div class="col-md-3">
                        <strong>
                            {!! Form::label('colonia', 'Colonia:', array('class' => 'negrita')) 
                            !!}
                        </strong>
                                         
                                        {!! 
                                            Form::text('colonia',$personal->direccion->colonia,['class'=>'form-control','placeholder'=>'Azteca', 'required' => 'required']) 
                                        !!}
                                     </div>
                                     <div class="col-md-3">
                                        <strong>
                                            {!!
                                                Form::label('numero', 'Numero:', array('class' => 'negrita')) 
                                             !!}
                                        </strong>
                                         
                                        {!!
                                            Form::text('numero',$personal->direccion->numero,['class'=>'form-control', 'placeholder'=>'S/N', 'required' => 'required']) 
                                        !!}
                                     </div>

                </div>
            </div>
            <div class="form-group">
                                <div class="row">
                                     <div class="col-md-7">
                                        <strong>
                                            {!!
                                                Form::label('codigo_postal', 'Codigo Postal:', array('class' => 'negrita')) 
                                            !!}
                                        </strong>

                                        {!! 
                                            Form::text('codigo_postal',$personal->direccion->codigo_postal,['class'=>'form-control', 'placeholder'=>'98644', 'required' => 'required']) 
                                         !!}
                                         @if ($errors->has('codigo_postal'))
                                           <span class="help-block">
                                             <strong> <p class="text-danger">{{ $errors->first('codigo_postal') }}</strong>
                                           </p>
                                          @endif
                                     </div>
                                     <div class="col-md-5">
                                        <strong>
                                            {!! 
                                                Form::label('localidad', 'Localidad:', array('class' => 'negrita'))
                                            !!}
                                            
                                        </strong>
                                         
                                        {!! 
                                            Form::text('localidad',$personal->direccion->localidad,['class'=>'form-control', 'placeholder'=>'Remanso', 'required' => 'required']) 
                                         !!}
                                     </div>
                                </div>

                             </div>   

                             <div class="form-group">
                               <strong>
                                {!! Form::label('archivo', 'Elige una Foto:', array('class' => 'negrita'))!!}
                  
                               </strong>
                                {!! Form::file('archivo',null, array('required' => 'false')) !!}
               
                             </div>
                        
                  <!--Datos externos -->
                    <div class="form-group">
                        <strong>
                          {!!
                            Form::label('id_departamento', 'Departamento :', array('class' => 'subrayado')) 
                           !!} 
                        </strong>

                        {!!
                          Form::select('id_departamento', $departamento, $personal->id_departamento, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
                        !!}
                      
                    </div> 
                    <div class="form-group">
                        <strong>
                          {!!
                            Form::label('id_cargo', 'Cargo :', array('class' => 'subrayado')) 
                           !!} 
                        </strong>

                        {!!
                          Form::select('id_cargo', $cargo, $personal->id_cargo, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
                        !!}
                      
                    </div> 
                     <div class="form-group">
                        <strong>
                          {!!
                            Form::label('id_sucursal', 'Cargo :', array('class' => 'subrayado')) 
                           !!} 
                        </strong>

                        {!!
                          Form::select('id_sucursal', $sucursal, $personal->id_sucursal, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
                        !!}
                      
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          {!! Form::submit('Guardar Cambios', array('class'=>'btn btn-success btn-block'))!!}
      
                        </div>
                        <div class="col-md-6">
                           <a href="{{route('personal.index')}}" class="btn btn-info btn-block" >Atrás</a>
                          
                        </div>
                      </div>
                    </div>
           
           
     </div>

          
    {!! Form::close() !!}
      
            
            </div>
         </div>   
        
</div>

@endsection
