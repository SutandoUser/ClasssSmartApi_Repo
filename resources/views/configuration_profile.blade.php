<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración General</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/FULLMOONSTYLE.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <style>
        #Lateral {
            width: 260px;
            padding: 2rem 0.5rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            font-size: 20px;
            background-color: var(--color-barra);
            box-shadow: 3px 0 12px rgba(0,0,0,0.25);
            border-right: 1px solid rgba(206,213,228,0.3);
            height: 100vh;
            min-height: 500px;
            transition: transform 0.3s ease-in-out;
        }

        .header-logo {
            width: 150px;
            height: auto;
            margin-bottom: 3rem;
        }

        #Lateral ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        #Lateral ul li {
            text-align: center;
            width: 100%;
            margin: 0.7rem 0;
        }

        #Lateral .links {
            display: block;
            color: var(--color-test);
            font-weight: 700;
            font-size: 20px;
            text-decoration: none;
            padding: 5px 0;
            border-radius: 10px;
            transition: all 0.25s ease;
        }

        #Lateral .links:hover {
            background-color: rgba(255,255,255,0.12);
            transform: translateX(5px);
        }

        .fade-separator {
            width: 85%;
            height: 2px;
            margin: auto;
            background: linear-gradient(
                to right,
                rgba(206,213,228,0) 0%,
                rgba(206,213,228,0.8) 50%,
                rgba(206,213,228,0) 100%
            );
            border-radius: 1px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        .secc {
            padding: 10px;
        }

        .ig {
            color: rgb(55, 53, 53);
        }

        .lbl2 {
            display: block;
            text-align: center;
        }

        .lb {
            color: var(--color-barra);
            font-weight: 600;
        }

        .lb2 {
            color: var(--color-label);
            font-weight: 500;
        }

        .modal-content {
            background-color: var(--color-fondo);
            border-radius: 12px;
            border: none;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }

        .modal-header {
            background-color: var(--color-fondo-morado);
            color: white;
            padding: 18px 20px;
            border-bottom: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-title {
            font-size: 22px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .btn-close {
            filter: brightness(0) invert(1);
            opacity: 1;
        }

        .modal-body {
            padding: 30px 25px;
            font-size: 15px;
        }

        .modal-body input {
            border-radius: 8px;
            border: 1px solid #cfcfcf;
            background-color: var(--color-test);
            padding: 10px;
            transition: all 0.2s ease-in-out;
        }

        .modal-body input:focus {
            background-color: #ffffff;
            border: 1px solid var(--color-principal);
            box-shadow: 0 0 4px rgba(0,0,0,0.15);
        }

        .modal-footer {
            border-top: none;
            padding: 15px 25px;
            display: flex;
            gap: 15px;
        }

        .modal-footer .btn {
            border-radius: 8px;
            padding: 10px 25px;
            font-size: 15px;
            font-weight: 600;
        }

        .btn-cancel {
            background-color: #d4d4d4;
            color: #333;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
            transition: 0.2s;
        }

        .btn-cancel:hover {
            background-color: #bbbbbb;
        }
    </style>
</head>
<body>
   <div class="container-fluid">
        <nav id="Lateral">
            <div class="d-flex flex-column align-items-center mt-4">
                <img src="/css/royal.svg" alt="logo" class="header-logo">
            </div>

            <ul style="list-style-type: none; padding: 0; text-align: center;">
                <li><a class="links"
                    @if(Auth::user()->role_id === 1)
                        href="{{ route('admin.home') }}"
                    @elseif(Auth::user()->role_id === 2)
                        href="{{ route('teacher.home') }}"
                    @elseif(Auth::user()->role_id === 3)
                        href="{{ route('student.home') }}"
                    @elseif(Auth::user()->role_id === 4)
                        href="{{ route('parent.home') }}"
                    @endif
                >INICIO</a></li>
                <div class="fade-separator"></div>

                <li><a class="links" href="{{route('configuration.profile')}}">PERFIL</a></li>
                <div class="fade-separator"></div>

                <li><a class="links" href="{{ route('configuration.notifications') }}">NOTIFICACIONES</a></li>
                <div class="fade-separator"></div>
                <li>
                    <form action="{{route('logout') }}" method="POST">
                        @csrf
                        <button class="links" style="background:none; border:none; width:100%;">CERRAR SESION</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- CONTENIDO PRINCIPAL PERFIL -->
        <div class="row g-3 mt-4 tab-pane" style="height: auto; min-height: 400px;">
            <div class="box col-7 me-5" style="margin-left:300px; height:auto;">
                <h1>PERFIL</h1>

                <div class="sec">
                    <label class="lbl">NOMBRE:</label>
                    <label class="lbl lb">{{ Auth::user()->name ?? '' }} {{ Auth::user()->lastname ?? '' }}</label>
                </div>
                <div class="sec">
                    <label class="lbl">CORREO:</label>
                    <label class="lbl lb">{{ Auth::user()->email ?? 'usuario@example.com' }}</label>
                </div><br>

                <div class="sec secc text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <label class="lbl lbl2">CAMBIAR CONTRASEÑA</label>
                </div>

                <!-- Modal cambiar contraseña -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-estilo">
                            <div class="modal-header modal-header-estilo">
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Cambiar contraseña</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{route('configuration.updatePassword') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label class="lbl">Contraseña actual:</label>
                                    <input type="password" name="current_password" class="input-general input-modal mb-3" placeholder="Ingresa tu contraseña actual">

                                    <label class="lbl">Nueva contraseña:</label>
                                    <input type="password" name="password" class="input-general input-modal mb-3" placeholder="Ingresa tu nueva contraseña">

                                    <label class="lbl">Confirmar nueva contraseña:</label>
                                    <input type="password" name="password_confirmation" class="input-general input-modal mb-3" placeholder="Repite tu nueva contraseña">
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

            <div class="col-2 d-flex align-items-center p-3 rounded shadow-sm" style="background: var(--color-cuadros); height: calc(100% / 3); max-height: calc(100% / 3); ">
                <img src="/css/user.png" alt="Usuario" class="ms-4 me-1" style="width:140px; height:140px; object-fit:cover; border-radius:50%; align-self: center;">
            </div>
        </div>

        <!-- Modal cerrar sesion-->
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

                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="button-jumena">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
