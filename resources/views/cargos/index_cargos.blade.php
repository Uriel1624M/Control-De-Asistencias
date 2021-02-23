@extends('layouts.PlantillaMaster')

@section('content')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  @if ($message = Session::get('success'))
       <div class="alert alert-info text-center">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" >&times;</span>

          </button>
          <h3>{{$message}}</h3>
      </div>
    @endif
    
<br>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><strong> Cargos</strong></h2>
        </div>
        <div class="panel-body">
            {!!Form::open(['route'=>'cargos.index','method'=>'GET','class'=>'float-md-right','role'=>'search'])!!}
                <div class="form-group">
            {!!Form::text('cargo',null,['class'=>'form-control','placeholder'=>'Search...'])!!}
              <br>
                <button  type="submit" class="btn btn-success">
                  <i class="fas fa-search"></i>
                  Buscar
                </button>

           {!!Form::close()!!}

        </div>
        
      
    <div class="form-group">
      <a class="btn btn-success" href="{{ route('cargos.create') }}">
        <i  class="fas fa-plus-square mr-3"></i>
        Nuevo Cargo
      </a>

      <br></br>
      @if($cargos->isNotEmpty())
        <div class="table-responsive">

            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Cargo</th>
                      
                      <th width="280px">Editar</th>
                      <th width="280px">Eliminar</th>
                  </tr>
                </thead>
                @foreach ($cargos as $cargo)
                <tr>
                    <td>{{ $cargo->id }}</td>
                    <td>{{ $cargo->cargo }}</td>
                    <td> 
                     <form action="{{ route('cargos.destroy',$cargo->id) }}" method="POST">
                      
                            <a class="btn btn-primary" href="{{ route('cargos.edit',$cargo->id) }}">
                              <i  class="fas fa-edit mr-20"></i>
                            </a>
                        </form>
           
                    </td>
                    <td>
                       
                          {!! Form::open(['route'=>['cargos.destroy',$cargo->id]])!!}
                           <input type="hidden" name="_method" value="DELETE">
                           
                           <button onclick="return confirm('Eliminar Departamento?')" class="btn btn-danger">
                              <i class=" fas fa-trash-alt"></i>
                           </button>
                          {!!Form::close()!!}

                    </td>
                </tr>
                @endforeach
            </table>
            {{ $cargos->links('vendor.pagination.bootstrap-4') }}
          @else
             <p> 
              <strong>
                <h2 class="panel-title">
                  <center>!! Sin resultados vuelve a intertarlo !!
                  </center> 
                </h2> 
              </strong>
            </p>
     @endif
     
    </div>
    </div>
  </div>
</div>
    
@endsection
