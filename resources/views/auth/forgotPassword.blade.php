<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/FULLMOONSTYLE.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title>Recuperacion de contraseña</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: var(--font-subtitulo);
            background: linear-gradient(-45deg, var(--color-fondo), var(--color-fondo-morado), var(--color-input), var(--color-fondo));
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite, fadeIn 1s ease-out;
            overflow: hidden;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }

        .top-bar {
            width: 100%;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            background-color: #ebebeb;
        }

        .box p {
            text-align: justify;
            margin-left: auto;
            margin-right: auto;
            width: 90%;
        }

        #recuperacion,
        #enviarCorreo {
            width: 70% !important;
            display: block;
            margin: 0 auto;
        }

        .box {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <img src="/css/royal.svg" alt="logo_vector" width="150px">
    </div>

    <!-- MODAL DE ÉXITO -->
    <div class="modal fade" id="correoEnviadoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header text-center" style="background: var(--color-boton); color: white;">
                    <h5 class="modal-title">CORREO ENVIADO</h5>
                </div>
                <div class="modal-body text-center">
                    <p>Hemos enviado un enlace a tu correo electrónico para restablecer tu contraseña.</p>
                    <br> 
                    <p class="text-muted">Serás redirigido automáticamente a inicio de sesión...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="box col-6 gap-4" style="height: auto;">

            <h2 class="text-center mb-4 mt-4" style="color: var(--color-barra); font-weight: 700;">
                RECUPERACIÓN DE CONTRASEÑA
            </h2>

            <p class="lead" style="margin-left: 15%; margin-bottom: 4%;">
                Introduce tu correo y te enviaremos instrucciones <br>
                para restablecer tu contraseña
            </p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="d-flex justify-content-center align-items-center mt-4">
                    <input type="email" name="email" id="recuperacion" class="nueva" placeholder="Correo electrónico" required>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-3">
                    <button type="submit" id="enviarCorreo" class="button-rio">Enviar</button>
                </div>
            </form>

            <div style="margin-top: 3%;">
                <a href="{{ route('login') }}" class="olvide"
                   style="text-decoration: underline; font-weight: 600; margin-left: 15%; color: var(--color-barra);">
                    Volver a Inicio de Sesión
                </a>
            </div>

        </div>
    </div>

    <!-- SCRIPT PARA MOSTRAR MODAL Y REDIRECCIONAR -->
    @if (session('status'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('correoEnviadoModal'));
        myModal.show();

        setTimeout(() => {
            window.location.href = "{{ route('login') }}"; 
        }, 3500);
    </script>
    @endif

</body>
</html>
