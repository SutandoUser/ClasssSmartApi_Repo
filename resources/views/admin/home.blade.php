<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="FULLMOONSTYLE.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<head>
  <title>Admin</title>
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
      width: 950px;
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
      width: 100%;
      height: 40px;
      padding: 2px;
      border: none;
      border-radius: 5px;
      background-color: #7c95cb;
      font-size: 16px;
    }

    button {
      width: 100%;
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
  </style>
</head>
<body>
    <section>
        <div style="text-align: center;">
            <h1>Administrador</h1>
            <div class="form-container">
                <div class="form-group">
                    <button onclick="window.location='{{route('register')}}'">Crear nuevo usuario</button>
                </div>
                <div class="form-group">
                    <button onclick="window.location='{{route('deactivate.form')}}'">Desactivar usuario</button>
                </div>
                <div class="form-group">
                    <button onclick="window.location='{{route('reactivate.form')}}'">Reactivar usuario</button>
                </div>
            </div>
            <button onclick="window.location='{{ route('forceLogout') }}'"style="width: 150px; height: 60px;">Cerrar Sesion</button>
        </div>
    </section>
</body>
</html>