<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Crear cuenta</h2>
        @if (session('errors'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('errors') }}
            </div>
        @endif

        <form id="registerForm" method="POST" action="/register">
            @csrf
            <label class="block mb-2 font-semibold">Nombre</label>
            <input id="name" name="name" type="text"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-green-300"
                placeholder="Nombre">
            <label class="block mb-2 font-semibold">Apellido</label>
            <input id="lastname" name="lastname" type="text"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-green-300"
                placeholder="Apellido">
            <label class="block mb-2 font-semibold">Correo electrónico</label>
            <input id="email" name="email" type="email"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-green-300"
                placeholder="ejemplo@correo.com">
            <label class="block mb-2 font-semibold">Contraseña</label>
            <input id="password" name="password" type="password"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-green-300"
                placeholder="******">
            <label class="block mb-2 font-semibold">Confirmar contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="w-full border rounded px-3 py-2 mb-4 focus:ring focus:ring-green-300"
                placeholder="******">
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded transition">
                Registrarme
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            ¿Ya tienes cuenta?
            <a href="/login" class="text-blue-600 font-semibold">Iniciar sesión</a>
        </p>
    </div>

    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {

            let name = document.getElementById("name").value.trim();
            let lastname = document.getElementById("lastname").value.trim();
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let pass2 = document.getElementById("password_confirmation").value.trim();

            if (name === "" || lastname === "" || email === "" || password === "" || pass2 === "") {
                e.preventDefault();
                alert("Todos los campos son obligatorios");
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert("La contraseña debe tener mínimo 6 caracteres");
                return;
            }

            if (password !== pass2) {
                e.preventDefault();
                alert("Las contraseñas no coinciden");
                return;
            }
        });
    </script>
</body>
</html>
