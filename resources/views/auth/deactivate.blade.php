<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<body style="background-color:#5C77B1; height:100vh; display:flex; justify-content:center; align-items:center;">
<section style="background:#ccc; padding:30px; width:500px; border-radius:10px;">
    
    <h2 style="text-align:center;">Desactivar Usuario</h2>

    <form method="POST" action="{{route('deactivate.user')}}" id="deactivateForm">
        @csrf
        
        <!-- SELECCIONAR ROL-->
        <label class="lbl">Seleccione un rol</label>
        <select name="role_id" id="roleSelect" class="form-control mb-3" required>
            <option value="">-- Rol --</option>
            @foreach($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->description}}</option>
            @endforeach
        </select>

        <!-- Aqui se selecciona el usuario -->
        <label class="lbl">Usuarios disponibles</label>
        <select name="user_id" id="userSelect" class="form-control mb-3" required disabled>
            <option value="">Seleccione un rol primero</option>
        </select>

        <button type="submit" class="btn btn-danger w-100 mt-3">Desactivar Usuario</button>

    </form>

</section>

<script>
document.getElementById("roleSelect").addEventListener("change", function() {
    let roleId = this.value;
    let userSelect = document.getElementById("userSelect");

    userSelect.innerHTML = "<option>Cargando...</option>";
    userSelect.disabled = true;
    if (!roleId) {
        userSelect.innerHTML = "<option>Seleccione un rol primero</option>";
        return;
    }
    fetch("/users/by-role/" + roleId)
        .then(res => res.json())
        .then(data => {
            userSelect.innerHTML = "";

            if (data.length === 0) {
                userSelect.innerHTML = "<option>No hay usuarios activos en este rol</option>";
                return;
            }
            data.forEach(user => {
                userSelect.innerHTML += 
                    `<option value="${user.id}">${user.name} ${user.lastname}</option>`;
            });
            userSelect.disabled = false;
        })
        .catch(err => {
            console.error(err);
            userSelect.innerHTML = "<option>Error al cargar usuarios</option>";
        });
});
</script>

</body>
</html>
