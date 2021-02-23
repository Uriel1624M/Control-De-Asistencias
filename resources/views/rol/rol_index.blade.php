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
 <!--   
<div class="card">
  <div class="card-header ">
    <h2 class="card-title"><strong>Panel de roles</strong></h2>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <a class="btn btn-success" href="{{ route('rol.create') }}">  
           <i  class="fas fa-plus-square mr-3"></i>
            Rol
          </a>
        </div>
        
      </div>

      <div class="col-md-9">
         {!!Form::open(['route'=>'rol.index','method'=>'GET','class'=>'float-md-right','role'=>'search'])!!}
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

      <div class="col-md-12">
        <div class="form-group">
          @if($roles->isNotEmpty())
   
          <div class="table-responsive">

                  <table class="table table-bordered">
                      <tr>
                          
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Actualizar</th>
                          <th>Eliminar</th>
                      </tr>
                    
                      @foreach ($roles as $item)
                      <tr>
                          
                          <td>{{ $item->id}}</td>
                          <td> {{$item->nombre}}</td>
                          <td>

                            <form action="{{ route('cargos.destroy',$item->id) }}" method="POST">
                              <a class="btn btn-primary" href="{{ route('rol.edit',$item->id)}}">
                                <i  class="fas fa-edit mr-20"></i>
                              </a>
                            </form>
                        
                 
                          </td>
                          <td>
                             
                                {!! Form::open(['route'=>['rol.destroy',$item->id]])!!}
                                 <input type="hidden" name="_method" value="DELETE">
                                 
                                 <button onclick="return confirm('Esta Seguro que desea Eliminar el Rol?')" class="btn btn-danger">
                                     <i class=" fas fa-trash-alt"></i>
                                 </button>
                                {!!Form::close()!!}

                          </td>
                      </tr>
                      @endforeach
                  </table>
                    <nav>
                      <ul class="pagination justify-contend-end">
                           {{ $roles->links('vendor.pagination.bootstrap-4') }}
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
         
    </div>
  </div>
</div>
-->

<br>
    <div class="panel panel-default">

          <div class="panel-heading">
              <h2 class="panel-title"><strong> Roles</strong></h2>
          </div>

            <div class="panel-body">
                {!!Form::open(['route'=>'rol.index','method'=>'GET','class'=>'float-md-right','role'=>'search'])!!}
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

        <a class="btn btn-success" href="{{ route('rol.create') }}">   
          <i  class="fas fa-plus-square mr-3"></i>
          Rol
        </a>
          <br></br>            
        @if($roles->isNotEmpty())
       
              <div class="table-responsive">

                      <table class="table table-bordered">
                        <thead>
                          <tr>
                              
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Actualizar</th>
                              <th>Eliminar</th>
                          </tr>
                        </thead>
                          @foreach ($roles as $item)
                          <tr>
                              
                              <td>{{ $item->id}}</td>
                              <td> {{$item->nombre}}</td>
                              <td>

                                <form action="{{ route('cargos.destroy',$item->id) }}" method="POST">
                                  <a class="btn btn-primary" href="{{ route('rol.edit',$item->id)}}">
                                    <i  class="fas fa-edit mr-20"></i>
                                  </a>
                                </form>
                            
                     
                              </td>
                              <td>
                                 
                                    {!! Form::open(['route'=>['rol.destroy',$item->id]])!!}
                                     <input type="hidden" name="_method" value="DELETE">
                                     
                                     <button onclick="return confirm('Esta Seguro que desea Eliminar el Rol?')" class="btn btn-danger">
                                         <i class=" fas fa-trash-alt"></i>
                                     </button>
                                    {!!Form::close()!!}

                              </td>
                          </tr>
                          @endforeach
                      </table>
    	                  <nav>
    	                    <ul class="pagination justify-contend-end">
    	                         {{ $roles->links('vendor.pagination.bootstrap-4') }}
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
