<!DOCTYPE html>
<html lang="es">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/FULLMOONSTYLE.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&display=swap" rel="stylesheet" />

<body>
  <div id="Lateral">
    <div class="d-flex flex-column align-items-center mt-2">
        <img src="/css/royal.svg" alt="logo" class="header-logo">
    </div>
    <ul style="list-style-type: none; padding: 0; text-align: center;">
      <li><a href="{{route('teacher.home')}}" class="links">INICIO</a></li>
      <div class="fade-separator"></div>
      <li><a href="{{route('configuration.profile')}}" class="links">PERFIL</a></li>
      <div class="fade-separator"></div>
      <li><a href="{{route('teacher.groups')}}" class="links">GRUPOS</a></li>
      <div class="fade-separator"></div>
      <li><a href="{{route('teacher.homework')}}" class="links">TAREAS</a></li>
      <div class="fade-separator"></div>
      <li><a href="{{route('teacher.forum')}}" class="links">FORO</a></li>
      <div class="fade-separator"></div>
      <li><a href="{{route('teacher.messages')}}" class="links">MENSAJES</a></li>
      <div class="fade-separator"></div>
      <li><a href="{{route('configuration.notifications')}}" class="links">CONFIGURACIÓN</a></li>
    </ul>
  </div>
<div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 100px;">
    <div class="container d-flex mt-5" style="background-color: var(--color-test); border-radius: 20px; height: 90px; padding-top: 20px;">
        <div class="d-flex justify-content-left col-6">
            <h2 style="padding-left: 20px;">  Grupos  </h2>
        </div>
        <div class="d-flex justify-content-end col-6" style="padding-right: 20px; gap: 15px;">
            <a class="link" data-bs-toggle ="modal" data-bs-target="#createGroupModal" >
                <span class="material-symbols-rounded link-icon">add_circle</span>
                <span class="link-title">Nuevo grupo</span>
            </a>
        </div>
    </div>
</div>
<!-- Cuando se crea un grupo -->
 <!-- modals para los botones estaria mucho mejor-->
  <!-- que se expanda el grupo hacia abajo para ver los alumnos y detalles del grupo-->
<div class="col-11 mx-auto mt-4">
    <div class="container py-3 d-flex align-items-center"style="background-color: var(--color-cuadros); border-radius: 20px;">
        <div class="row w-100">
            <div class="col-6 d-flex align-items-center">
                <!--Inicio DESMADRE DINAMICO-->
                <div class="row">
                    @foreach($groups as $group)
                    <div class="col-12 mx-auto mt-4">
                        <div class="container py-3 d-flex align-items-center"style="background-color: var(--color-cuadros); border-radius: 20px;">
        <div class="row w-100">
            <div class="col-6 d-flex align-items-center">
                <h4 style="padding-left: 20px;">| {{ $group->name }}</h4>
            </div>
            <div class="col-8 d-flex justify-content-end" style="gap: 10px;">
                <!-- Ver grupo (mostrar alumnos) -->
                <a class="link" href="{{ route('teacher.groups.show', $group->id) }}">
                    <span class="material-symbols-rounded link-icon">group</span>
                    <span class="link-title">Ver Grupo</span>
                </a>
                <!-- Nuevo alumno -->
                <a class="link" onclick="openAddStudentModal({{$group->id}})" >
                    <span class="material-symbols-rounded link-icon">person_add</span>
                    <span class="link-title">Nuevo alumno</span>
                </a>
                <!-- Editar Grupo -->
                <a href="#" class="link editGroupBtn" 
                    data-id="{{ $group->id }}" data-name="{{ $group->name }}" data-description="{{ $group->description }}" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editGroupModal">
                    <span class="material-symbols-rounded link-icon">edit</span>
                    <span class="link-title">Editar</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
<!--FIN DESMADRE DINAMICO-->
</div>    
        </div>
    </div>
</div>
<!-- hasta aqui -->

<!--Inicio Desmadre de Modal-->
<!-- MODAL CREAR GRUPO -->
<div class="modal fade" id="createGroupModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form method="POST" action="{{ route('teacher.groups.createGroup') }}" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Crear nuevo grupo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            <!-- Nombre del grupo -->
            <label class="form-label fw-bold">Nombre del grupo</label>
            <input 
                type="text" 
                name="name" 
                class="form-control mb-3" 
                required 
                minlength="3"
                placeholder="Ejemplo: Introduccion a la Carne Asada">

            <!-- Descripción -->
            <label class="form-label fw-bold">Descripción (Obligatoria)</label>
            <textarea 
                name="description" 
                class="form-control" 
                rows="3"
                placeholder="Descripción obligatoria del Grupo"></textarea>

        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" type="submit">Crear grupo</button>
        </div>

    </form>
  </div>
</div>
<!--FIN DESMADRE DEL MODAL-->

<!--INICIO DESMADRE DE MODAL-->
<!--Modal para agregar Alumno-->
<!-- MODAL: AGREGAR ALUMNOS AL GRUPO -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form id="addStudentForm" method="POST">
        @csrf

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Agregar alumnos al grupo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div id="studentsContainer">
                    <p class="text-center">Cargando alumnos...</p>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit">Agregar alumnos</button>
            </div>

        </div>

    </form>
  </div>
</div>
<!--FIN DESMADRE DEL MODAL-->
<!--INICIO DESMADRE DEL MODAL-->
<!-- Modal Editar Grupo -->
<div class="modal fade" id="editGroupModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form id="editGroupForm" class="modal-content" data-group-id="">
      <div class="modal-header">
        <h5 class="modal-title">Editar Grupo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <label class="form-label fw-bold">Nombre del grupo</label>
        <input type="text" id="editGroupName" class="form-control mb-3" required minlength="3">

        <label class="form-label fw-bold">Descripción</label>
        <textarea id="editGroupDescription" class="form-control" rows="3" required></textarea>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" type="submit">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>
<!--FIN DESMADRE DEL MODAL-->

<script>
    function openAddStudentModal(groupId) {

        // Cambiar la acción del formulario dinámicamente
        document.getElementById('addStudentForm').action =
            `/teacher/groups/${groupId}/add-students`;

        let container = document.getElementById('studentsContainer');
        container.innerHTML = "<p class='text-center'>Cargando alumnos...</p>";

        // Obtenemos los alumnos disponibles
        fetch(`/teacher/groups/${groupId}/available-students`)
            .then(res => res.json())
            .then(data => {
                if (data.length === 0) {
                    container.innerHTML =
                    "<p class='text-center text-muted'>No hay alumnos disponibles.</p>";
                    return;
                }

                let html = `
                    <div class='list-group'>
                `;

                data.forEach(student => {
                    html += `
                        <label class="list-group-item d-flex align-items-center">
                            <input type="checkbox" class="form-check-input me-3"
                                name="students[]" value="${student.id}">
                            <strong>${student.name} ${student.lastname}</strong>
                            <small class="ms-2 text-muted">(${student.email})</small>
                        </label>
                    `;
                });

                html += "</div>";

                container.innerHTML = html;
            });

        // Abrir modal
        let modal = new bootstrap.Modal(document.getElementById('addStudentModal'));
        modal.show();
    }


    //DESMADRE DEL UPDATE
    document.querySelectorAll(".editGroupBtn").forEach(btn => {
        btn.addEventListener("click", function() {
            let groupId = this.dataset.id;
            let name = this.dataset.name;
            let description = this.dataset.description;

            // Cargar en inputs del modal
            document.getElementById("editGroupName").value = name;
            document.getElementById("editGroupDescription").value = description;

            // Guardar id en el formulario
            document.getElementById("editGroupForm").dataset.groupId = groupId;
        });
    });

    document.getElementById("editGroupForm").addEventListener("submit", function(e){
        e.preventDefault();
        let form = this;
        let groupId = form.dataset.groupId;
        let name = document.getElementById("editGroupName").value;
        let description = document.getElementById("editGroupDescription").value;

        fetch(`/teacher/groups/${groupId}/update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ name, description })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                // Cerrar modal
                var editModal = bootstrap.Modal.getInstance(document.getElementById('editGroupModal'));
                editModal.hide();

                // Actualizar UI en la lista
                let groupHeader = document.querySelector(`.group-header[data-id="${groupId}"]`);
                if(groupHeader){
                    groupHeader.textContent = "| " + name;
                }

                alert("Grupo actualizado con exito");
            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(err => {
            console.error(err);
            alert("Ocurrió un error al actualizar el grupo.");
        });
    });


</script>


</body>
</html>

