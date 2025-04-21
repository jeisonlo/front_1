<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Recursos_Usuario/RecursoUsuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>

<body>
   <!-- Lugar donde se cargará el header -->
   <div id="header-container"></div>
   @include('atencion-profesional.USUARIO.Header.header')

   
    <main>
        <div class="grid">
            <a href="{{ route('archivos.usuario') }}" class="card">
                <div class="card-content">
                    <i class="fas fa-folder-open card-icon"></i>
                    <h2 class="card-title">Archivos</h2>
                </div>
            </a>
            <a href="{{ route('informe.usuario') }}" class="card">
                <div class="card-content">
                    <i class="fas fa-file-alt card-icon"></i>
                    <h2 class="card-title">Informes</h2>
                </div>
            </a>
            <a href="{{ route('reseñas.usuario') }}" class="card">
                <div class="card-content">
                    <i class="fas fa-star card-icon"></i>
                    <h2 class="card-title">Reseñas</h2>
                </div>
            </a>
            <a href="{{ route('historial.citas.usuario') }}" class="card">
                <div class="card-content">
                    <i class="fas fa-calendar-alt card-icon"></i>
                    <h2 class="card-title">Historial de citas</h2>
                </div>
            </a>
        </div>
    </main>
   <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/Recursos_Usuario/script.js') }}"></script>
</body>

</html>