<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Informes2_Profesional/Informe2Profesional.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head>
    <body>
      <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')
    
  <main>
        <h2>Informes Disponibles</h2>
        <div class="archivos" id="informesContainer">
            <!-- Aquí se mostrarán los informes dinámicamente -->
        </div>
    </main>

 <!-- Lugar donde se cargará el footer -->
 <div id="footer-container"></div>
 @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
 <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Informes2_Profesional/script.js') }}"></script>
          <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
</html>


                