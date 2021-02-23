@extends('layouts.PlantillaMaster')

@section('content')
  @if ($message = Session::get('success'))
       <div class="alert alert-info text-center">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" >&times;</span>

          </button>
          <h3>{{$message}}</h3>
      </div>
    @endif
    
<br><br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><strong> Sucursales</strong></h2>
        </div>
        <div class="panel-body">
            {!!Form::open(['route'=>'sucursal.index','method'=>'GET','class'=>'float-md-right','role'=>'search'])!!}
                <div class="form-group">
            {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Search'])!!}
              <br>
                <button  type="submit" class="btn btn-success">
                <i class="fas fa-search"></i>
                Buscar</button>

           {!!Form::close()!!}

        </div>
      </div>

    <br>
    <div class="form-group">
      <a class="btn btn-success" href="{{ route('sucursal.create') }}"> 
        <i  class="fas fa-plus-square mr-3"></i>
        Sucursal
      </a>
      <br></br>
      @if($sucursal->isNotEmpty())
   
          <div class="table-responsive">

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Sucursal</th>
                          
                          <th width="280px">Editar</th>
                          <th width="280px">Eliminar</th>
                      </tr>
                    </thead>
                      @foreach ($sucursal as $item)
                      <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->nombre }}</td>
                          <td> 
                           <form action="{{ route('sucursal.destroy',$item->id) }}" method="POST">
                            
                                  <a class="btn btn-primary" href="{{ route('sucursal.edit',$item->id) }}">
                                     <i  class="fas fa-edit mr-20"></i>
                                  </a>
                              </form>
                 
                          </td>
                          <td>
                             
                                {!! Form::open(['route'=>['sucursal.destroy',$item->id]])!!}
                                 <input type="hidden" name="_method" value="DELETE">
                                 
                                 <button onclick="return confirm('Eliminar Departamento?')" class="btn btn-danger">
                                     <i class=" fas fa-trash-alt"></i>
                                 </button>
                                {!!Form::close()!!}

                          </td>
                      </tr>
                      @endforeach
                  </table>

                  <nav>
                    <ul class="pagination justify-contend-end">
                          {{ $sucursal->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                  </nav>
                  
      @else
       <p> 
          <strong>
            <h2 class="panel-title">
              <center>
                !! Sin resultados vuelve a intertarlo !!
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
