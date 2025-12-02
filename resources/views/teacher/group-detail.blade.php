<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/FULLMOONSTYLE.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&display=swap" rel="stylesheet" />
</head>
<body>

<div id="Lateral">
    <!-- Sidebar -->
    <ul style="list-style-type: none; padding: 0; text-align: center;">
        <li><a href="{{ route('teacher.home') }}" class="links">INICIO</a></li>
        <li><a href="{{ route('teacher.groups') }}" class="links">GRUPOS</a></li>
        <li><a href="{{ route('teacher.homework') }}" class="links">TAREAS</a></li>
    </ul>
</div>

<div class="col-11 mx-auto mt-4">
    <div class="container py-3" style="background-color: var(--color-cuadros); border-radius: 20px;">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Alumnos del grupo: {{ $group->name }}</h2>
                <a href="{{ route('teacher.groups') }}" class="btn btn-secondary">Volver a grupos</a>
            </div>
        </div>

        <hr>

        <div class="row mt-3">
            @if($group->students->isEmpty())
                <p class="text-center text-muted">No hay alumnos en este grupo.</p>
            @else
                <ul class="list-group">
                    @foreach($group->students as $student)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $student->name }} {{ $student->lastname }}</strong>
                                <br>
                                <small>{{ $student->email }}</small>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

</body>
</html>
