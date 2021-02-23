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
<br>
    <div class="panel panel-default">

          <div class="panel-heading">
              <h2 class="panel-title"><strong> Usuarios</strong></h2>
          </div>

            <div class="panel-body">
                {!!Form::open(['route'=>'usuarios.index','method'=>'GET','class'=>'float-md-right','role'=>'search'])!!}
                    <div class="form-group">
                          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Search...'])!!}
                            <br>
                            
                                <button  type="submit" class="btn btn-success">
                                  <i class="fas fa-search"></i>
                                  Buscar
                                </button>    

                           {!!Form::close()!!}
                      </div>
            </div>
    </div>
      
    <div class="form-group">

        <a class="btn btn-success" href="{{ route('usuarios.create') }}">   
          <i  class="fas fa-plus-square mr-3"></i>
          Usuario
        </a>
          <br></br>            
        @if($usuarios->isNotEmpty())
       
              <div class="table-responsive">

                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                               <!-- <th>Password</th>-->
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                          @foreach ($usuarios as $item)
                          <tr>
                              
                              <td>{{ $item->id}}</td>
                              <td> {{$item->name}}</td>

                              <td> {{$item->email}}</td>
                              <td>{{$item->perfil->nombre}}</td>

                              <!--<td> {{$item->password}}</td>-->
                              <td>

                                <form action="{{ route('usuarios.edit',$item->id) }}" method="POST">
                                  <a class="btn btn-primary" href="{{ route('usuarios.edit',$item->id)}}">
                                    <i  class="fas fa-edit mr-20"></i>
                                  </a>
                                </form>
                            
                     
                              </td>
                              <td>
                                 
                                    {!! Form::open(['route'=>['usuarios.destroy',$item->id]])!!}
                                     <input type="hidden" name="_method" value="DELETE">
                                     
                                     <button onclick="return confirm('Esta Seguro que desea Eliminar Usuario?')" class="btn btn-danger">
                                         <i class=" fas fa-trash-alt"></i>
                                     </button>
                                    {!!Form::close()!!}

                              </td>
                          </tr>
                          @endforeach
                      </table>
    	                  <nav>
    	                    <ul class="pagination justify-contend-end">
    	                         {{ $usuarios->links('vendor.pagination.bootstrap-4') }}
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
