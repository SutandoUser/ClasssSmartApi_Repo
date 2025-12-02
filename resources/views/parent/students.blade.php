<!DOCTYPE html>
<html lang="es">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/FULLMOONSTYLE.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
      <body>
            <div id="Lateral">
                  <div class="d-flex flex-column align-items-center mt-2">
                        <img src="/css/royal.svg" alt="logo" class="header-logo">
                  </div>
                  <ul style="list-style-type: none; padding: 0; text-align: center;">
                        <li><a href="{{route('parent.home')}}" class="links">INICIO</a></li>
                        <div class="fade-separator"></div>
                        <li><a href="{{route('configuration.profile')}}" class="links">PERFIL</a></li>
                        <div class="fade-separator"></div>
                        <li><a href="{{route('parent.grades')}}"class="links">CALIFICACIONES</a></li>
                        <div class="fade-separator"></div>
                        <li><a href="{{route('parent.forum')}}"" class="links">FORO</a></li>
                        <div class="fade-separator"></div>
                        <li><a href="{{route('parent.students')}}"  class="links">ALUMNOS</a></li>
                        <div class="fade-separator"></div>
                        <li><a href="{{route('configuration.notifications')}}"  class="links">CONFIGURACIÓN</a></li>
                  </ul>
            </div>
            <div class="col-11 d-flex justify-content-center mt-2" style="padding-left: 100px;">
                  <div class="container d-flex justify-content-center mt-5" style="background-color: var(--color-test); border-radius: 20px; height: 80px; padding-top: 20px;">
                        <h2> Alumnos de Padre  </h2>
                  </div>
            </div>
      </div>  
</body>