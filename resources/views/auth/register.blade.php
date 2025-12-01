<!DOCTYPE html>
<html lang="es">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="FULLMOONSTYLE.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #5C77B1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    section {
      width: 800px;
      height: 600px; ;
      background-color: #cccccc;
      padding: 30px;
      border-radius: 10px;
    }

    h1 {
      color: #102A5E;
      font-size: 36px;
      margin-bottom: 10px;
    }

    h2 {
      color: #102A5E;
      margin-bottom: 20px;
    }

    .form-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    
    }

    .form-group {
      width: 45%;
      text-align: left;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #102A5E;
    }

    input {
      width: 150px;
      height: 40px;
      padding: 2px;
      border: none;
      border-radius: 5px;
      background-color: #7c95cb;
      font-size: 10px;
    }

    button {
      width: 100px;
      height: 60px;
      margin-top: 30px;
      background-color: #5C77B1;
      color: white;
      font-size: 18px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    button:hover {
      background-color: #3f5a8d;
    }
    .input-registro {
        width: 320px;
        height: 55px;
        padding: 15px;
        border: none;
        border-radius: 5px;
        font-size: 20px;
        background-color: var(--color-input);
        color: var(--color-test);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .input-registro::placeholder {
    color: var(--color-test);
}
  </style>

<body>
  <section>
        <h2 style="text-align:center;">Crear nueva cuenta</h2>
        <form id="registerForm" method="POST" action="/register" style="margin-top: 20px;">
      
            <div class="form-container">    
                <div class="form-group">
                @csrf
                    <label class="lbl">Nombre</label>
                    <input id="name" type="text" name="name" class="input-registro" placeholder="Nombre" required>
             
                    <label class="lbl">Apellido</label>
                    <input id="lastname" type="text" name="lastname" class="input-registro" placeholder="Apellido" required>

                    <label class="lbl">Correo electronico</label>
                    <input id="email" type="email" name="email" class="input-registro" placeholder="correo@example.com" required>

                    <label class="lbl">Teléfono (opcional)</label>
                    <input id="cellphone" type="tel" name="cellphone" class="input-registro" placeholder="Telefono (opcional)">
                </div>

                <div class="form-group" text-align="left" alinh>
                    <label class="lbl">Rol</label>
                    <select id="role" name="role_id" class="input-registro" required>
                        <option value="">Seleccione un rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Profesor</option>
                        <option value="3">Estudiante</option>
                        <option value="4">Padre/Madre</option>
                    </select>
                <!-- Contraseña -->
                    <label class="lbl">Contraseña</label>
                    <input id="password" type="password" name="password" class="input-registro" placeholder="**" required>              
                <!-- Confirmación -->              
                    <label class="lbl">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="input-registro" placeholder="**" required>
                </div>
                <div style="text-align: center; margin-top: 25px;">
                <button class="button-jumena" type="submit" style="font-size: 20px; padding: 12px 40px; width: 350px;">
                    Confirmar Registro
                </button>
            </div>

        </form>
  




  </section>
</body>


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


</html>