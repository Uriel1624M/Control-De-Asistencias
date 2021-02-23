
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">
    <img src="/imagenes/vacation.jpg" width="40" height="40" alt="" class="rounded-circle">
    Empresa S.A De C.V
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
       @if (Route::has('login'))

        @auth
              <!--
              <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
            -->

               <li class="nav-item dropdown">
                @if(Auth::user()->id_rol==1)
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administración
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('personal.index')}}"><i class="fas fa-user-circle"></i> Personal</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('usuarios.index')}}"><i class="fas fa-user"></i> Usuarios</a>
                        
                        <a class="dropdown-item" href="{{route('rol.index')}}">
                          <i class="fas fa-exchange-alt"></i> Roles</a>
                      </div>
               </li>

              <!--
               <li class="nav-item">
                <a class="nav-link" href="#">Provedores</a>
              </li>
            -->
               <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Informacion Laboral
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('departamento.index')}}">Departamentos</a>
                        <a class="dropdown-item" href="{{route('cargos.index')}}">Cargos</a>
                        
                      <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('sucursal.index')}}">
                          <i class="fas fa-house-damage"></i>
                        Sucursales

                      </a>
                        
                      </div>
               </li>
               <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reportes
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('reportediario.index')}}">Asistencia Diaria</a>
                        <a class="dropdown-item" href="{{route('reportequincenal.index')}}">Asistencia Quincenal</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('reportemensual.index')}}">Asistencia Mensual</a>
                      </div>
               </li>
              @else
               <li class="nav-item">
                <a class="nav-link" href="{{route('asistencia.index')}}">Inicio</a>
              </li>
              @endif

           @else
                      
       @endauth
       @endif
    </ul>
     <ul class="navbar-nav my-2 my-lg-0">
    <li class="nav-item dropdown show">
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
        <!--
        <li class="nav-item"><a class="nav-link" href="">Register</a></li>
      -->
        @else
     <li class="nav-item dropdown show">

      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
          <img src="/imagenes/avatar.svg" alt="" width="25px" height="25px"> {{ Auth::user()->name }}
      </a>
      
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();"> Cerrar Sesion </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
   </form>

 </div>

  </li>
        @endguest
</ul>
<!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  -->
  </div>

</nav>

