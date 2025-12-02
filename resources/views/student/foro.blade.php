{{-- resources/views/padre/foro.blade.php --}}
@extends('layouts.lateral') {{-- Usa tu layout lateral --}}

@section('titulo', 'Foro')

@section('contenido')
<div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 300px;">
    <div class="container d-flex flex-column align-items-center mt-5" style="background-color: var(--color-cuadros); border-radius: 20px; height: 400px;">

        <div class="col-11 d-flex justify-content-center mt-5" style="background-color: var(--color-test); border-radius: 20px; height: 40px; padding-top: 5px;">
            <h4>Foro</h4>
        </div>

        <div class="col-11 d-flex justify-content-left mt-2" style="background-color: var(--color-fondo); border-radius: 20px; height: 360px; padding-top: 5px; padding-left: 2px;">
            <h5>No hay información por el momento</h5>
        </div>

    </div>
</div>
@endsection
