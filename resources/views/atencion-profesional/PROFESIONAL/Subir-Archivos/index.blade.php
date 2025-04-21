<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Subir-Archivos/SubirArchivoProfesional.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atención Profesional</title>
</head>
<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.PROFESIONAL.Header.header')
    <br><br>
    <div class="container">
  <h2>Subir Documento</h2>
  <form id="uploadForm">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"></textarea>

    <label for="archivo">Archivo:</label>
    <input type="file" id="archivo" name="archivo" required>

    <label for="profesional">Nombre del Psicólogo:</label>
    <input type="text" id="profesional" name="profesional" required>

    <button type="submit">Subir Documento</button>
  </form>

  <!-- Modal para el mensaje emergente -->
  <div id="successModal" class="modal">
    <div class="modal-content">
      <h3>Documento subido con éxito</h3>
      <button onclick="cerrarModal()">Aceptar</button>
    </div>
  </div>
</div>
     <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Subir-Archivos/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
</html>
