{{-- resources/views/padre/calificaciones.blade.php --}}
@extends('layouts.lateral') {{-- o como hayas llamado tu layout --}}

@section('titulo', 'Calificaciones del Alumno')

@section('contenido')
<div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 300px; padding-top: 30px;">
    <div class="container d-flex flex-column align-items-center mt-5" style="background-color: var(--color-cuadros); border-radius: 20px; height: 450px;">

        <div class="col-11 d-flex justify-content-center mt-2" style="background-color: var(--color-test); border-radius: 20px; height: 40px; padding-top: 5px;">
            <h4>Calificaciones del alumno</h4>
        </div>

        <div class="col-11 d-flex justify-content-left mt-2" style="background-color: var(--color-fondo); border-radius: 20px; height: 360px; padding-top: 5px; padding-left: 2px;">
            <h5>No hay calificaciones por el momento</h5>
        </div>

    </div>
</div>
@endsection
