@extends('layouts.PlantillaMaster')
@section('content')
<br></br>

<div class="row">
			<div class="col-md-12">
				<div class="card">
					<!--style="background-color: rgba(51, 255, 189, 0.4);-->

					<div class="card-header">
						<h4 class="card-title"><strong>ALTA DE PERSONAL</strong>
						</h4>

					</div> 

						<div class="card-body">
							 {!! Form::open(['route'=>'personal.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}
					<div class="border p-4 special-card">
						<h2>Datos Generales:</h2>
							 <div class="form-group">
								 	<strong>
								    	{!! 
								    		Form::label('cod_barras', 'Codigo de Barras:', array('class' => 'negrita'))
								    	!!}
								    </strong>

								   	 	{!! 
								   	 		Form::number('cod_barras',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) 
								   		 !!}

								   		  @if ($errors->has('cod_barras'))
						                   <span class="help-block">
						                     <strong> <p class="text-danger">{{ $errors->first('cod_barras') }}</strong>
						                   </p>
						         @endif
							 	
							 	
							 	
							 </div>
							 <div class="form-group">
							 	 <strong>
							 	 	 {!! 
							 	 	 	Form::label('nombre', 'Nombre Completo :', array('class' => 'subrayado')) 
							 	 	 !!}
							 	 </strong>
							    
							   	 	{!!
							   	 	 Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) 
							    	!!}
							 	
							 </div>
							 <div class="form-group">
							 		<strong>
							 			{!! 
							 	 	 	Form::label('fecha_nacimiento', 'Fecha Nacimiento:', array('class' => 'subrayado')) 
							 	 	 !!}
							 		</strong>
							 		{!!
							 			Form::date('fecha_nacimiento', \Carbon\Carbon::now(),['class'=>'form-control']);
							 		!!}
							 </div>
							 <div class="form-group">
							 	<strong>
							    	{!! 
							    		Form::label('telefono', 'Telefono:', array('class' => 'negrita')) 
							    	!!}
							    </strong>
							    
							   	{!! 
							   		Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) 
							    !!}
							    @if ($errors->has('telefono'))
						                   <span class="help-block">
						                     <strong> <p class="text-danger">{{ $errors->first('telefono') }}</strong>
						                   </p>
						         @endif          

							 </div>   
							 <div class="form-group">
							 	<div class="row">
						  			 <div class="col-md-6">
						  				<strong>
						  					{!!
						  					 	Form::label('calle', 'Calle:', array('class' => 'negrita')) 
						  					!!}
						  				</strong>

								    	{!!
								    	 Form::text('calle',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) 
								   		 !!}
						  			 </div>
						 			 <div class="col-md-3">
						 			 	<strong>
						 			 		{!! Form::label('colonia', 'Colonia:', array('class' => 'negrita')) !!}
						 			 	</strong>
						 			 	 
								    	{!! 
								    		Form::text('colonia',null,['class'=>'form-control','placeholder'=>'', 'required' => 'required']) 
								  		!!}
						 			 </div>
						 			 <div class="col-md-3">
						 			 	<strong>
						 			 		{!!
						 			 		 	Form::label('numero', 'Numero:', array('class' => 'negrita')) 
						 			 		 !!}
						 			 	</strong>
						 			 	 
								    	{!!
								    		Form::text('numero',null,['class'=>'form-control', 'placeholder'=>'S/N', 'required' => 'required']) 
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
								    		Form::text('codigo_postal',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) 
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
								    		Form::text('localidad',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) 
								   		 !!}
						 			 </div>
								</div>

							 </div>   
							 <div class="form-group">
							 	<strong>
							   		{!! 
							   			Form::label('url_imagen', 'Selecciona una Fotografia:', array('class' => 'negrita')) 
							   		!!}  
							    
							   </strong>
							    {!!
							     	Form::file('url_imagen',null, array('required' => 'true')) 
							    !!}
							    @if ($errors->has('url_imagen'))
						                   <span class="help-block">
						                     <strong> <p class="text-danger">{{ $errors->first('url_imagen') }}</strong>
						                   </p>
						         @endif
							 	
							 </div>				   
							   
							 </div>
							    <!--Datos externos -->
							  <div class="form-group">
								  	<strong>
								    	{!!
								    	 	Form::label('id_departamento', 'Departamento :', array('class' => 'subrayado')) 
								    	 !!} 
								    </strong>

								    {!!
								     	Form::select('id_departamento', $departamento, null, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
								    !!}
							  	
							  </div>  
							  <div class="form-group">
							  	 <strong>
							     	{!! 
							     		Form::label('id_cargo', 'Cargo :', array('class' => 'subrayado')) 
							     	!!}
							     	
							     </strong>
							    			      
							     {!! 
							     	Form::select('id_cargo', $cargo, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) 
							     !!}				

							  	
							  </div>
							  <div class="form-group">
								  	<strong>
								    	{!!
								    	 	Form::label('id_sucursal', 'Sucursal :', array('class' => 'subrayado')) 
								    	 !!} 
								    </strong>

								    {!!
								     	Form::select('id_sucursal', $sucursal, null, array('class'=>'form-control', 'placeholder'=>'Please select ...'))
								    !!}
							  	
							  </div>  
							  <div class="form-group">
								  	<div class="row">
									  	<div class="col-md-3 offset-md-6">
									  		{!!
									  			Form::submit('Guardar Datos', array('class'=>'btn btn-success btn-block'))
									  		!!}
									  		
									  	</div>

									  	<div class="col-md-3">
									  		<a href="{{route('personal.index')}}" class="btn btn-info btn-block" >Atrás</a>
									  		
									  	</div>

							  	</div>
							  	
							  	
							  </div>
							    
							    
							{!! Form::close() !!}


						</div>
							
				</div>	
					
		</div>
</div>
@endsection
