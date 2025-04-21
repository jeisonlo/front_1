<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Informes1_Profesional/Informe1Profesional.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
  <title>Atención Profesional</title>
</head>

<body>
  <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')

  <div class="container">
    <h2>Registrar Informe</h2>
    <form id="reportForm">
      <label>Nombre del Paciente:</label>
      <input type="text" name="paciente_nombre" required>

      <label>Edad:</label>
      <input type="number" name="paciente_edad" required>

      <label>Género:</label>
      <select name="paciente_genero" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="Otro">Otro</option>
      </select>

      <label>Diagnóstico:</label>
      <input type="text" name="paciente_diagnostico" required>

      <label>Técnicas y Pruebas Aplicadas:</label>
      <textarea name="tecnicas_pruebas_aplicadas" required></textarea>

      <label>Observación:</label>
      <textarea name="observacion" required></textarea>

      <label>Fecha:</label>
      <input type="date" name="fecha" required>

      <label>Evaluador:</label>
      <input type="text" name="evaluador" required>

      <button type="submit">Enviar Informe</button>
    </form>
  </div>

  <!-- Modal para el mensaje emergente -->
  <div id="successModal" class="modal">
    <div class="modal-content">
      <h3>Informe subido con éxito</h3>
      <button onclick="cerrarModal()">Aceptar</button>
    </div>
  </div>
  
  <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')

  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Informes1_Profesional/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>

</body>

</html>