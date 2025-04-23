<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención Profesional - Citas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Cita_Profesional/CitaProfesional.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
  </head>
  <body>
    <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')

  
  <main>
    <div class="main-container">
      <div class="card">
          <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353819/Agendarcita_efo1be.jpg') }}" alt="Imagen de la tarjeta">
          <div class="card-content">
              <h3 class="card-title">Buzon</h3>
              <p class="card-description">Visualiza y organiza tus peticiones de citas .</p>
              <a href="{{ route('programar.cita.profesional') }}" class="card-button">Ingresar</a>
          </div>
      </div>
  
      <div class="card">
        <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745354333/Miscitas_pgz73o.jpg') }}" alt="imagen de la tarjeta">
          <div class="card-content">
              <h3 class="card-title">Mis Citas</h3>
              <p class="card-description">Encuentra tus citas aceptadas; ingresa, edita o cancela a tu gusto.</p>
              <a href="{{ route('mis.citas.profesional') }}" class="card-button">Ingresar</a>
          </div>
      </div>
  </div>
  </main>
   <!-- Lugar donde se cargará el footer -->
   <div id="footer-container"></div>
   @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
   <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Cita_Profesional/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>

</body>
</html>