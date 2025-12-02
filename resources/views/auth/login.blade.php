<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/estiloLogin.css">
    <title>Login</title>
</head>

<body class="cont">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <div class="wrapped">
        <div class="contenedor">
            
            <div>
                <img src="/css/royal.svg" alt="logo_vector" width="100px">
            </div>
            <h2 class="login">Log In</h2>
            <!-- BLOQUE DE ERRORES -->
            @if ($errors->any())
                <div class="alert alert-danger w-100">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- FIN BLOQUE DE ERRORES -->
            <form method="POST" action="login">
                @csrf
                <div>
                    <label for="email"></label>
                    <input type="text" id="Email" name="email" class="nueva" placeholder="Ingresa tu correo electronico">
                </div>

                <div>
                    <label for="password"></label>
                    <input type="password" id="Password" name="password" class="nueva" placeholder="Ingresa tu Contraseña">
                </div>
                <button class="button-rio">Log In</button>
                
                <a href="{{route('forgotPassword')}}" class="olvide">¿Olvidaste tu contraseña?</a>
            </form>

        </div>
    </div>

</body>
</html>
