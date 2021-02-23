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

<br>
    <div class="panel panel-default">
          <div class="panel-heading">
              <h2 class="panel-title"><strong> Personal</strong></h2>
          </div>

      <div class="panel-body">
                {!!Form::open(['route'=>'personal.index','method'=>'GET','class'=>'float-md-right','role'=>'search'])!!}
                
          <div class="form-group">
                {!!Form::text('persona',null,['class'=>'form-control','placeholder'=>'Search...'])!!}

                    <br>
                    <button  type="submit" class="btn btn-success">
                      <i class="fas fa-search"></i>
                      Buscar
                    </button>

               {!!Form::close()!!}
           </div>
     </div>
      
<div class="form-group">
            <a class="btn btn-success" href="{{ route('personal.create') }}"> 
              <i  class="fas fa-plus-square mr-3"></i>
              Personal
             </a>
             <br></br>
             
        @if($personal->isNotEmpty())
   
          <div class="table-responsive">

                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            <th>Codigo Barras</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <!--<th>Fecha Nacimiento</th>-->
                            <th>Telefono</th>
                            <th>Departamento</th>
                            <th>Cargo</th>
                            <th>Sucursal</th>
                            
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                      </thead>
                      @foreach ($personal as $persona)
                        <tr>
                            
                            <td>{{ $persona->cod_barras }}</td>
                            <td> <img src="{{ asset("imagenes_personal/$persona->url_foto" )}}" width="80" height="80" class="rounded-circle">
                            </td>
                            <td>{{$persona->nombre}}</td>
                           <!-- <td>{{$persona->fecha_nacimiento}}</td>-->
                            <td>{{$persona->telefono}}</td>
                             <td>{{$persona->departamentos->departamento}}</td>
                            <td>{{$persona->cargos->cargo}}</td>
                            <td>{{$persona->sucursal->nombre}}</td>
                           
                            <td> 
                             <form action="{{ route('personal.destroy',$persona->id) }}" method="POST">
                              
                                    <a class="btn btn-primary" href="{{ route('personal.edit',$persona->id) }}">
                                         <i  class="fas fa-edit mr-20"></i>
                                       </a>
                                </form>
                   
                            </td>
                            <td>
                               
                                  {!! Form::open(['route'=>['personal.destroy',$persona->id]])!!}
                                   <input type="hidden" name="_method" value="DELETE">
                                   
                                   <button onclick="return confirm('Esta Seguro que desea Eliminar el Personal?')" class="btn btn-danger">
                                    <i class=" fas fa-trash-alt"></i>
                                   </button>
                                  {!!Form::close()!!}

                            </td>
                        </tr>
                      @endforeach
                  </table>
                        <nav>
                          <ul class="pagination justify-contend-end">
                               {{ $personal->links('vendor.pagination.bootstrap-4') }}
                          </ul>
                        </nav>  
                     @else
                      <p> 
                        <strong>
                        <h2 class="panel-title">  
                          <center>!! Sin resultados vuelve a intertarlo !!</center> 
                        </h2> 
                      </strong>
                    </p>
         @endif
     </div>
    </div>
</div>
   
   
@endsection
