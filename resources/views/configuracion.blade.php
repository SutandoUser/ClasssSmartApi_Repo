@extends('layouts.app')

@section('title', 'Configuración General')

@section('content')
<div class="box col-6 me-5 mt-5" style="margin-left:300px; height:auto;">
    <h3 class="text-center mb-3" style="color: var(--color-barra); font-weight: 700;">PREFERENCIAS DE NOTIFICACIONES</h3><br>

    <div class="form-check form-switch d-flex justify-content-between align-items-center mt-4">
        <label class="form-check-label mb-0 ms-5 lb2" style="font-size: 20px;">Recibe notificaciones en el correo electrónico</label>
        <input class="form-check-input ms-3" type="checkbox" role="switch" checked>
    </div>
    <hr>

    <div class="form-check form-switch d-flex justify-content-between align-items-center">
        <label class="form-check-label mb-0 ms-5 lb2" style="font-size: 20px;">Recibe notificaciones sobre tareas pendientes de su(s) hijo(s)</label>
        <input class="form-check-input ms-3" type="checkbox" role="switch" checked>
    </div>
    <hr>

    <div class="form-check form-switch d-flex justify-content-between align-items-center">
        <label class="form-check-label mb-0 ms-5 lb2" style="font-size: 20px;">Recibe notificaciones sobre la(s) calificaciones de su(s) hijo(s)</label>
        <input class="form-check-input ms-3" type="checkbox" role="switch" checked>
    </div>
    <hr>

    <div class="form-check form-switch d-flex justify-content-between align-items-center">
        <label class="form-check-label mb-0 ms-5 lb2" style="font-size: 20px;">Recibe notifiaciones sobre el foro</label>
        <input class="form-check-input ms-3" type="checkbox" role="switch" checked>
    </div>
    <hr>

    <div class="d-flex justify-content-center mt-4">
        <button type="button" class="btn btn-danger px-4 py-2" data-bs-toggle="modal" data-bs-target="#cerrarModal">
            CERRAR SESIÓN
        </button>
    </div>

    <!-- Modal cerrar sesión -->
    <div class="modal fade" id="cerrarModal" tabindex="-1" aria-labelledby="cerrarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-estilo">
                <div class="modal-header modal-header-estilo">
                    <h1 class="modal-title fs-4" id="cerrarModalLabel">¿DESEAS CERRAR SESIÓN?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="lbl"><h5>Se cerrará tu sesión y volverás a la pantalla de inicio. ¿Estás seguro?</h5></label>
                </div>
                <div class="modal-footer modal-footer-estilo">
                    <button type="button" class="button-jumena btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button-jumena">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
