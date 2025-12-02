@extends('layout')

@section('titulo', 'Perfil')

@section('contenido')
<div class="row g-3 mt-4 tab-pane" style="height: auto; min-height: 400px;">
    <div class="box col-7 me-5" style="height:auto;">
        <h1>PERFIL</h1>

        <div class="sec">
            <label class="lbl">NOMBRE:</label>
            <label class="lbl lb">Nombre Usuario Completo</label>
        </div>

        <div class="sec">
            <label class="lbl">CORREO:</label>
            <label class="lbl lb">usuario@example.com</label>
        </div>

        <br>

        <div class="sec secc text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <label class="lbl lbl2">CAMBIAR CONTRASEÑA</label>
        </div>

        <!-- Modal Cambiar Contraseña -->
        <div class="modal fade" id="exampleModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-estilo">
                    <div class="modal-header modal-header-estilo">
                        <h1 class="modal-title fs-4">Cambiar contraseña</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form>
                        <div class="modal-body">
                            <label class="lbl">Contraseña actual:</label>
                            <input type="password" class="input-general input-modal mb-3">

                            <label class="lbl">Nueva contraseña:</label>
                            <input type="password" class="input-general input-modal mb-3">

                            <label class="lbl">Confirmar nueva contraseña:</label>
                            <input type="password" class="input-general input-modal mb-3">
                        </div>

                        <div class="modal-footer modal-footer-estilo">
                            <button type="button" class="button-jumena btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="button-jumena">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Foto del usuario --}}
    <div class="col-2 d-flex align-items-center p-3 rounded shadow-sm"
         style="background: var(--color-cuadros); height: calc(100% / 3);">
        <img src="{{ asset('images/user.jpg') }}" alt="Usuario" style="width:140px; height:140px; object-fit:cover; border-radius:50%;">
    </div>
</div>
@endsection
