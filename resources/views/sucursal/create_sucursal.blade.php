@extends('layouts.PlantillaMaster')
@section('content')
<br></br>

<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Sucursal</h4>
			</div>
      <div class="card-body">
        <form method="POST" action="{{route('sucursal.store') }}"  role="form">
              {{ csrf_field() }}
              <div class="form-group">
                  <input type="text" name="nombre" id="nombre" class="form-control" autofocus  placeholder="Sucursal">
                  @if ($errors->has('nombre'))
                   <span class="help-block">
                     <strong>{{ $errors->first('nombre') }}</strong>
                   </span>
                  @endif
              </div>
               <br>
                  <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                  <a href="{{route('sucursal.index')}}" class="btn btn-info btn-block" >Atrás</a>
 
             
            </form>
      </div>
			
		</div>
	</div>
</div>
@endsection
