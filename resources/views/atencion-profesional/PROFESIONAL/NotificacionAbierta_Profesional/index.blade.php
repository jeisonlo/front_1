<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/NotificacionAbierta_Profesional/NotificacionAbiertaProfesional.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
  <title>Atención Profesional</title>
</head>

<body>
  <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')


  
  <main>
    <section class="email-header">
      <div class="email-subject">
        <h2>Asunto del Correo</h2>
      </div>
      <div class="email-details">
        <p><strong>De:</strong> remitente@example.com</p>
        <p><strong>Para:</strong> juanito@example.com</p>
        <p><strong>Fecha:</strong> 24 de julio de 2024</p>
      </div>
    </section>

    <section class="email-content">
      <p>Estimado Juanito,</p>
      <p>Queríamos compartir una emocionante noticia: ¡Millonarios está en camino a coronarse campeón! Con el increíble
        desempeño del equipo y la pasión inquebrantable de nuestros seguidores, estamos seguros de que la victoria está
        a la vuelta de la esquina.
        <br><br>
        ¡Prepárate para celebrar este histórico triunfo con nosotros!
      </p>
      <p>Atentamente,<br>Remitente</p>
    </section>
  </main>
  <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/NotificacionAbierta_Profesional/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>

</html>