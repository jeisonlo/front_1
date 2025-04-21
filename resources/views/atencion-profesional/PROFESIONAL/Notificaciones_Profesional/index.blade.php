<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Notificaciones_Profesional/NotificacionProfesional.css') }}">
      <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>
<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.PROFESIONAL.Header.header')

    <br><br>
    <main>
        <div class="notifications-search">
            <input type="text" id="searchNotifications" placeholder="Buscar notificaciones...">
            <button class="search-button"><i class="fas fa-search"></i> Buscar</button>
            <button class="clear-button"><i class="fas fa-times"></i> Limpiar</button>
        </div>

        <div class="notifications-container">
            <div class="notifications-list" id="notificationsList">
                <!-- Notificaciones se cargarán dinámicamente -->
            </div>
        </div>
    </main>
  <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Notificaciones_Profesional/script.js') }}"></script>
      <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
</html>
