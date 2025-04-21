<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informe de Consulta Psicológica</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/GenerarInforme1_Profesional/Informe.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
</head>
<body>
  <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')

<div class="body">
  <div class="formulario"  >
    <h2>Datos Generales</h2>
    <label for="nombres">Apellidos y Nombres:</label>
    <input type="text" id="nombres" name="nombres" required>
    
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
      <option value="">Seleccione</option>
      <option value="masculino">Masculino</option>
      <option value="femenino">Femenino</option>
      <option value="otro">Otro</option>
    </select>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" min="0" required>
    
    <label for="lugar_nacimiento">Lugar de Nacimiento:</label>
    <input type="text" id="lugar_nacimiento" name="lugar_nacimiento" required>
    
    <label for="ocupacion">Ocupación:</label>
    <input type="text" id="ocupacion" name="ocupacion" required>
    
    <label for="fecha_consulta">Fecha de Consulta:</label>
    <input type="date" id="fecha_consulta" name="fecha_consulta" required>
    
    <label for="fecha_informe">Fecha de Informe:</label>
    <input type="date" id="fecha_informe" name="fecha_informe" required>
    
    <label for="evaluador">Evaluador:</label>
    <input type="text" id="evaluador" name="evaluador" required>
    
    <label for="tecnicas_pruebas">Técnicas y Pruebas Aplicadas:</label>
    <textarea id="tecnicas_pruebas" name="tecnicas_pruebas" required></textarea>
    <div class="button-container">
      <a href="{{ route('generar.informe2.profesional') }}"><button type="siguiente">Siguiente</button></a></div>
  </div>
  
</div>
 <!-- Lugar donde se cargará el footer -->
 <div id="footer-container"></div>
 @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
 <script src="{{ asset('js/atencion-profesional/PROFESIONAL/GenerarInforme1_Profesional/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
</html>