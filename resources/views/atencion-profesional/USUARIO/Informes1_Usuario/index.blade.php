<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Informes1_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head>
    <body>  
       <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')
           
    <main>
        <h2>Informes Disponibles</h2>
        <div class="archivos" id="informesContainer">
            <!-- Aquí se mostrarán los informes dinámicamente -->
        </div>
    </main>
         <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>    
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  <script src="/atencion-profesional/PROFESIONAL/Header/script.js"></script>    
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/Informes1_Usuario/script.js') }}"></script>

    </div>
</body>
</html>