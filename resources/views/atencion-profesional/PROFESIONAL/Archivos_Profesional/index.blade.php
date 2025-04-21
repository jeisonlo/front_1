<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Archivos_Profesional/ArchivoProfesional.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
  <title>Atención Profesional</title>
  </head>
  <body>
    <!-- Lugar donde se cargará el header -->
  <div id="header"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')
  <br><br><br><br><br><br><br><br><br>
  <main>
        <h2>Documentos Disponibles</h2>
        <div id="documentList" class="main-container"></div>
    </main>
    
   <!-- Contenedor del botón -->
<div class="upload-container">
    <button id="uploadButton" class="upload-btn">
        Subir Archivo
    </button>
</div>

 <!-- Lugar donde se cargará el footer -->
 <div id="footer"></div>
 @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
 <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Archivos_Profesional/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
</html>