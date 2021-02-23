@extends('layouts.PlantillaMaster')

@section('example')

                
<main class="col-md-13">
    <header class="masthead d-flex">
        <div class="container text-center my-auto">
            <h1 class="mb-1">LIMON ALMACENES.</h1>
            <h3 class="mb-5">
                <em>Pagina Official 2019</em>
            </h3>
            <a class="btn btn-primary btn-lg" href="{{route('asistencia.create')}}">
                Asistencia
            </a>
        </div>
        <div class="overlay"></div>
    </header>
</main>
<br>

@endsection

