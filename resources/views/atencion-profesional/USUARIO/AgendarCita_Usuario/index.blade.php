<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/AgendarCita_Usuario/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
  <title>Agendar Cita con un Psicólogo</title>
</head>
@include('atencion-profesional.USUARIO.Header.header')
<body>
  <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  <main>
  <div class="container">
    <h2>Agenda tu Cita</h2>
    <form id="citaForm">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" required>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" required>

        <label for="paquete">Seleccionar Paquete:</label>
        <select id="paquete">
            <option value="basico">Básico - 1 sesión</option>
            <option value="intermedio">Intermedio - 3 sesiones</option>
            <option value="premium">Premium - 5 sesiones</option>
        </select>

        <label for="especialidad">Especialidad:</label>
        <select id="especialidad">
            <option value="clinica">Psicología Clínica</option>
            <option value="cognitiva">Psicología Cognitiva</option>
            <option value="desarrollo">Psicología del Desarrollo</option>
        </select>
        
        <label for="profesional">Nombre del Profesional:</label>
<select id="profesional">
    <option value="Dr. Diego Armando Maradona">Dr. Diego Armando Maradona</option>
    <option value="Dr. Juan Roman Riquelme">Dr. Juan Roman Riquelme</option>
    <option value="Lic. Zinedine Zidane ">Lic. Zinedine Zidane</option>
    <option value="Lic. Maria Cordoba ">Lic. Maria Cordoba</option>
    <option value="Dra. Christine Lopez ">Dra. Christine Lopez </option>
</select>
        <label for="fecha">Seleccionar Fecha:</label>
        <input type="date" id="fecha" required>

        <label for="hora">Seleccionar Hora:</label>
        <input type="time" id="hora" required>

        <label for="comentarios">Comentarios Adicionales:</label>
        <textarea id="comentarios" rows="4"></textarea>

        <button type="submit">Agendar Cita</button>
    </form>
</div>

<!-- Mensaje Emergente -->
<div id="mensajeEmergente" class="modal">
    <div class="modal-content">
        <h3>¡Cita Agendada con Éxito! 🎉</h3>
        <p>Tu cita ha sido programada. Para más detalles, accede a la sección de citas.</p>
        <button id="btnAceptar">Aceptar</button>
    </div>
</div>
</main>
  

  <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  <!-- Scripts -->
  <script src="{{ asset('js/atencion-profesional/USUARIO/AgendarCita_Usuario/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
</body>

</html>