<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Iniciar sesión</h2>
         @if (session('errors'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('errors') }}
            </div>
        @endif
        <form id="loginForm" method="POST" action="/login">
            @csrf
            <label class="block mb-2 font-semibold">Correo electrónico</label>
            <input id="email" name="email" type="email"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-blue-300"
                placeholder="ejemplo@correo.com">
            <label class="block mb-2 font-semibold">Contraseña</label>
            <input id="password" name="password" type="password"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-blue-300"
                placeholder="******">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded transition">
                Iniciar sesión
            </button>
        </form>
        <p class="mt-4 text-center text-sm">
            ¿No tienes cuenta?
            <a href="/register" class="text-blue-600 font-semibold">Registrate aquí</a>
        </p>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();

            if (email === "" || password === "") {
                e.preventDefault();
                alert("Todos los campos son obligatorios");
            }
        });
    </script>

</body>
</html>
