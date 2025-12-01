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
        <li><a href="{{route('profile')}}" class="links">PERFIL</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('teacher.groups')}}" class="links">GRUPOS</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('teacher.homework')}}" class="links">TAREAS</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('teacher.forum')}}" class="links">FORO</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('teacher.messages')}}" class="links">MENSAJES</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('teacher.home')}}" class="links">CONFIGURACIÓN</a></li>
    </ul>
</div>
<div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 100px;">
    <div class="container d-flex mt-5" style="background-color: var(--color-test); border-radius: 20px; height: 90px; padding-top: 20px;">
        <div class="d-flex justify-content-left col-6">
            <h2 style="padding-left: 20px;">  Grupos  </h2>
        </div>
        <div class="d-flex justify-content-end col-6" style="padding-right: 20px; gap: 15px;">
            <a class="link">
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
                <a class="link" href="#">
                    <span class="material-symbols-rounded link-icon">person_add</span>
                    <span class="link-title">Nuevo alumno</span>
                </a>
                <!-- Editar Grupo -->
                <a class="link" href="#">
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
</body>
</html>

