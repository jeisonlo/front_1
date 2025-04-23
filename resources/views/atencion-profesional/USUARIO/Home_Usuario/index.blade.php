<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Home_Usuario/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
  <title>Atención Profesional</title>
</head>
<body>
  <!-- Header -->
  <header id="header-container"></header>
  @include('atencion-profesional.USUARIO.Header.header')
  <!-- Main Content -->
  <main>
  <div class="stories-wrapper">
    <div class="story-container">
        <div class="story">
            <img id="story-image-1" src="sunset1.jpg" alt="Atardecer">
            <div class="story-description">
                <p id="story-text-1"></p>
            </div>
        </div>
    </div>

    <div class="story-container">
        <div class="story">
            <img id="story-image-2" src="sunset2.jpg" alt="Atardecer">
            <div class="story-description">
                <p id="story-text-2"></p>
            </div>
        </div>
    </div>

    <div class="story-container">
        <div class="story">
            <img id="story-image-3" src="sunset3.jpg" alt="Atardecer">
            <div class="story-description">
                <p id="story-text-3"></p>
            </div>
        </div>
    </div>
</div>


    <div class="frases">
      <p>← Respira. Todo estará bien. A veces, es necesario solo un paso a la vez →</p>
    </div>

    <div class="cards">
      <a href="{{ route('citas.usuario') }}"><div class="cuadro"><img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353853/Citas_rugpyb.jpg" alt="Citas"><h3>Citas</h3></div></a>
      <a href="{{ route('profesionales.usuario') }}"><div class="cuadro"><img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353904/Profesionales_ghqweq.jpg" alt="Profesionales"><h3>Profesionales</h3></div></a>
      <a href="{{ route('recursos.usuario') }}"><div class="cuadro"><img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353953/Recursos_xbryb2.jpg" alt="Recursos"><h3>Recursos</h3></div></a>

      <a href="{{ route('comprar.codigos.usuario') }}"><div class="cuadro"><img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353882/Pagos_gfjdbb.jpg" alt="Pagos"><h3>Paquetes</h3></div></a>
    </div>

   

    <section class="section">
      <div class="purple-section">
        <h2>¿Por qué es importante consultar?</h2>
      </div>
      <div class="white-section">
        <p>Consultar ayuda a ganar perspectiva sobre nuestras propias emociones y pensamientos, facilitando una mejor comprensión de nosotros mismos. Al expresar lo que sentimos y pensamos, podemos clarificar nuestras preocupaciones y encontrar formas constructivas de abordarlas. Además, nos proporciona una oportunidad invaluable para recibir retroalimentación y orientación externa, lo cual es crucial para el crecimiento personal y el desarrollo de estrategias efectivas para manejar situaciones difíciles.</p>
      </div>
    </section>

    <section class="section2">
      <div class="white-section2">
        <p>La consulta psicológica proporciona un espacio seguro para explorar y procesar emociones complejas, lo que puede aliviar el estrés, mejorar la autoestima y fortalecer la resiliencia emocional</p>
      </div>
      <div class="purple-section2">
        <h2>¿Cómo puede la consulta psicológica mejorar mi bienestar emocional?</h2>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer-container"></footer>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  
  <script src="{{ asset('js/atencion-profesional/USUARIO/Home_Usuario/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
</body>
</html>