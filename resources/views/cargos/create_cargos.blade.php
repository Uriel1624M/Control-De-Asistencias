@extends('layouts.PlantillaMaster')
@section('content')
<br></br>

<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><center>Cargos<center></h4>
			</div>
      <div class="card-body">
        <form method="POST" action="{{route('cargos.store') }}"  role="form">
              {{ csrf_field() }}
              <div class="form-group">
                  <input type="text" name="cargo" id="cargo" class="form-control" autofocus  placeholder="Cargo">
                  @if ($errors->has('cargo'))
                   <span class="help-block">
                     <strong>{{ $errors->first('cargo') }}</strong>
                   </span>
                   @endif
 
              </div>
               <br>
                  <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                  <a href="{{route('cargos.index')}}" class="btn btn-info btn-block" >Atrás</a>
 
             
            </form>
        
      </div>
			
		</div>
	</div>
</div>
@endsection