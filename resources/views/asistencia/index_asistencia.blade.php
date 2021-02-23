@extends('layouts.PlantillaMaster')
@section('content')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
   <script src="js/sweetalert.min.js"></script>


 @include('sweet::alert')
 <br>
 <div class="content">
   <div class="row">
  	<div class="col-md-6 offset-md-3">
  		<div class="card">
        <div class="card-header special-card-title">
          
            <h3>Asistencia Personal</h3>
         </div>
        <div class="card-body">
          <form method="POST" action="{{route('asistencia.store') }}"  role="form">
                {{ csrf_field() }}
                <div class="form-group">
                  <strong>
                    <label><i class="fas fa-barcode"></i> Codigo de Barras</label>
                    
                    
                  </strong>
                    <input type="number" name="cod_barras" id="cod_barras" class="form-control" autofocus>

                    @if ($errors->has('cod_barras'))
                     <span class="help-block">
                       <strong>{{ $errors->first('cod_barras') }}</strong>
                     </span>
                    @endif
                </div>
                 <br>
                   <input type="submit"  value="Entrar" class="btn btn-success btn-block">
   
               
              </form>
        </div>
  			
  		</div>
  	</div>
  </div>
</div>

@endsection
