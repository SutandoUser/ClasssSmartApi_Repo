@extends('layouts.app')

@section('title', 'Tareas')

@section('content')
<div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 300px; padding-top: 30px;">
    <div class="container d-flex flex-column align-items-center mt-5" 
         style="background-color: var(--color-cuadros); border-radius: 20px; height: 450px;">

        <!-- Encabezado de Tareas -->
        <div class="col-11 d-flex justify-content-center mt-2" 
             style="background-color: var(--color-test); border-radius: 20px; height: 40px; padding-top: 5px;">
            <h4>Tareas</h4>
        </div>

        <!-- Contenido de Tareas -->
        <div class="col-11 d-flex justify-content-left mt-2" 
             style="background-color: var(--color-fondo); border-radius: 20px; height: 360px; padding-top: 5px; padding-left: 2px;">
            <h5>No hay tareas por el momento</h5>
        </div>
    </div>
</div>
@endsection
