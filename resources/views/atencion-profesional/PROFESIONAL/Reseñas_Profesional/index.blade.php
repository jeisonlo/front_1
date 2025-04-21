<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Reseñas_Profesional/ReseñaProfesional.css') }}">
      <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
  <title>Atención Profesional</title>
</head>
<body>
 <!-- Lugar donde se cargará el header -->
 <div id="header-container"></div>
 @include('atencion-profesional.PROFESIONAL.Header.header')


 <main>
  <section class="comments-section" id="commentsContainer">
            <!-- Los comentarios se cargarán aquí dinámicamente -->
        </section>
</main>
    <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Reseñas_Profesional/script.js') }}"></script>
</body>
</html>
