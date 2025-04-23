<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención Profesional - Citas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Citas_Usuario/CitaUsuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
  </head>
  <body>
   <!-- Lugar donde se cargará el header -->
   <div id="header-container"></div>
   @include('atencion-profesional.USUARIO.Header.header')


  <br><br>
  <main>
    <div class="main-container">
        <div class="card">
            <img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353819/Agendarcita_efo1be.jpg" alt="Agendar Cita">
            <h3>Agendar Cita</h3>
            <p class="card-description">Da el primer paso hacia tu objetivo, agenda tu cita hoy.</p>
            <div class="card-button-container">
                <a href="{{ route('agendar.cita.usuario') }}" class="card-button">Ingresar</a>
            </div>
        </div>

        <div class="card">
            <img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745354333/Miscitas_pgz73o.jpg" alt="Citas Programadas">
            <h3>Citas Programadas</h3>
            <p class="card-description">Revisa y gestiona tus citas fácilmente en un solo lugar.</p>
            <div class="card-button-container">
                <a href="{{ route('citas.programadas.usuario') }}" class="card-button">Ingresar</a>
            </div>
        </div>
    </div>
</main>
<!-- Lugar donde se cargará el footer -->
<div id="footer-container"></div>
@include('atencion-profesional.USUARIO.Footer.inicio.inicio')

<script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
<script src="{{ asset('js/atencion-profesional/USUARIO/Citas_Usuario/script.js') }}"></script>
</body>
</html>