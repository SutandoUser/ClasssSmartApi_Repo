<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>

    <link rel="stylesheet" href="/css/FULLMOONSTYLE.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: var(--font-subtitulo);
            background: linear-gradient(-45deg,
                    var(--color-fondo),
                    var(--color-fondo-morado),
                    var(--color-input),
                    var(--color-fondo));
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite, fadeIn 1s ease-out;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }

        .top-bar {
            width: 100%;
            padding: 0.5% 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top-bar img {
            width: 140px;
        }

        .content-box {
            background-color: #ebebeb;
            width: 40%;
            min-width: 380px;
            margin-top: 40px;
            padding: 35px 45px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .20);
        }

        .content-box h2 {
            text-align: center;
            color: var(--color-barra);
            font-family: var(--font-titulo);
            font-weight: bold;
            margin-bottom: 25px;
        }

        label {
            color: var(--color-label);
            font-size: 15px;
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            margin-top: 12px;
            margin-left: 5%;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid var(--color-barra);
            background-color: #ffffff;
            font-size: 15px;
            outline: none;
        }

        .button-rio {
            width: 90% !important;
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            background: var(--color-boton);
            color: white;
            font-size: 17px;
            font-family: var(--font-titulo);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .button-rio:hover {
            background: var(--color-boton-hover);
        }

        .footer-link {
            text-align: center;
            margin-top: 18px;
        }

        .footer-link a {
            text-decoration: underline;
            font-weight: bold;
            color: var(--color-barra);
        }

        #email, #password, #password_confirmation {
            width: 85% !important;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <img src="/css/royal.svg" alt="Logo">
    </div>

    <!-- MODAL ÉXITO -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header text-center" style="background: var(--color-boton); color: white;">
                    <h5 class="modal-title">CONTRASEÑA ACTUALIZADA</h5>
                </div>
                <div class="modal-body text-center">
                    <p>Tu contraseña ha sido cambiada exitosamente.</p>
                    <p class="text-muted">Serás redirigido al inicio de sesión...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-box">
        <h2 style="margin-bottom: 8%;">RESTABLECER CONTRASEÑA</h2>

        <form method="POST" action="{{ route('password.update') }}" id="resetForm">
            @csrf
            <div> 
                <input type="hidden" name="token" value="{{ $token }}">
            </div>

            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Nueva contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div style="margin-bottom: 8%;">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div>
                <button type="submit" class="button-rio">
                    Guardar nueva contraseña
                </button>
            </div>
        </form>

        <div class="footer-link">
            <a href="{{ route('login') }}">
                Volver al inicio de sesión
            </a>
        </div>
    </div>

    <!-- SCRIPT PARA MOSTRAR MODAL -->
    @if (session('status'))
    <script>
        const modal = new bootstrap.Modal(document.getElementById('successModal'));
        modal.show();

        setTimeout(() => {
            window.location.href = "{{ route('login') }}";
        }, 2000);
    </script>
    @endif

</body>
</html>