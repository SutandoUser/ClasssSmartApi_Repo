<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/FULLMOONSTYLE.css">
</head>
<body>
    <header>
        <h1>Registro de Usuario</h1>
    </header>
    <div class="box" style="max-width: 900px; margin: 40px auto;">
        <h2 style="text-align:center;">Crear nueva cuenta</h2>
        <div class="separator"></div>
        <form id="registerForm" method="POST" action="/register" style="margin-top: 20px;">
            @csrf
            <div class="form-container">
                <div class="form-group">
                    <label class="lbl">Nombre</label>
                    <input id="name" type="text" name="name" class="input-registro" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label class="lbl">Apellido</label>
                    <input id="lastname" type="text" name="lastname" class="input-registro" placeholder="Apellido" required>
                </div>
                <div class="form-group">
                    <label class="lbl">Correo electrónico</label>
                    <input id="email" type="email" name="email" class="input-registro" placeholder="correo@example.com" required>
                </div>
                <div class="form-group">
                    <label class="lbl">Teléfono (opcional)</label>
                    <input id="cellphone" type="tel" name="cellphone" class="input-registro" placeholder="Teléfono (opcional)">
                </div>
                <div class="form-group">
                    <label class="lbl">Rol</label>
                    <select id="role" name="role_id" class="input-registro" required>
                        <option value="">Seleccione un rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Profesor</option>
                        <option value="3">Estudiante</option>
                        <option value="4">Padre/Madre</option>
                    </select>
                </div>
                <!-- Contraseña -->
                <div class="form-group">
                    <label class="lbl">Contraseña</label>
                    <input id="password" type="password" name="password" class="input-registro" placeholder="******" required>
                </div>
                <!-- Confirmación -->
                <div class="form-group">
                    <label class="lbl">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="input-registro" placeholder="******" required>
                </div>
            </div>
            <div style="text-align: center; margin-top: 25px;">
                <button class="button-jumena" type="submit" style="font-size: 20px; padding: 12px 40px;">
                    Confirmar Registro
                </button>
            </div>

        </form>
    </div>

    <!-- VALIDACIÓN JAVASCRIPT -->
    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {

            let name = document.getElementById("name").value.trim();
            let lastname = document.getElementById("lastname").value.trim();
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let pass2 = document.getElementById("password_confirmation").value.trim();
            let role = document.getElementById("role").value.trim();

            // Campos obligatorios
            if (!name || !lastname || !email || !password || !pass2 || !role) {
                e.preventDefault();
                alert("Por favor completa todos los campos obligatorios.");
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert("La contraseña debe tener al menos 6 caracteres.");
                return;
            }

            if (password !== pass2) {
                e.preventDefault();
                alert("Las contraseñas no coinciden.");
                return;
            }
        });
    </script>

</body>
</html>
