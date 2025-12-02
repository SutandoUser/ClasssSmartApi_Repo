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
        <li><a href="{{route('student.home')}}" class="links">INICIO</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('configuration.profile')}}" class="links">PERFIL</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('student.groups')}}" class="links">GRUPOS/CLASES</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('student.schedule')}}" class="links">HORARIO</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('student.homework')}}"  class="links">TAREAS</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('student.forum')}}" class="links">FORO</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('student.messages')}}"  class="links">MENSAJES</a></li>
        <div class="fade-separator"></div>
        <li><a href="{{route('configuration.notifications')}}"  class="links">CONFIGURACIÓN</a></li>
    </ul>
  </div>

<div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 100px;">
    <div class="container d-flex mt-5" style="background-color: var(--color-test); border-radius: 20px; height: 90px; padding-top: 20px;">
        <div class="d-flex justify-content-left col-6">
            <h2 style="padding-left: 20px;">  Grupos  </h2>
        </div>
    </div>
</div>

<!-- Listado de Grupos para Student -->
<div class="col-11 mx-auto mt-4">
    <div class="row w-100">
        @foreach($groups as $group)
        <div class="col-12 mx-auto mt-4">
            <div class="container py-3 d-flex align-items-center" style="background-color: var(--color-cuadros); border-radius: 20px;">
                <div class="row w-100">
                    <div class="col-12 d-flex align-items-center">
                        <h4 style="padding-left: 20px;">| {{ $group->name }}</h4>
                        <span class="ms-3 text-muted">{{ $group->description }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
