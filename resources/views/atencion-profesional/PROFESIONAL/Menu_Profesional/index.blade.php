<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Profesional</title>
    <!-- Fuentes externas -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- CSS Propio -->
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Menu_Profesional/Menu-prof.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
</head>
<body>
    <!-- Header -->
    <div id="header-container">
        @include('atencion-profesional.PROFESIONAL.Header.header')
    </div>

    
    <!-- Contenido Principal -->
    <main>
      <br>
        <!-- Carrusel de Mensajes -->
        <div class="carrusel">
            <h2>Respira. Todo estará bien. A veces, es necesario solo un paso a la vez.</h2>
        </div>
        
        <br>
        <br>
    
        <!-- Script para el Carrusel -->
        <script>
            const mensajes = [
                "Respira. Todo estará bien. A veces, es necesario solo un paso a la vez.",
                "Cada pequeño paso cuenta hacia tu bienestar.",
                "Tu salud mental es importante. Vamos a cuidarla."
            ];

            let mensajeActual = 0;
            const carrusel = document.querySelector(".carrusel h2");

            function cambiarMensaje() {
                mensajeActual = (mensajeActual + 1) % mensajes.length;
                carrusel.textContent = mensajes[mensajeActual];
            }

            setInterval(cambiarMensaje, 4000); // Cambia el mensaje cada 4 segundos
        </script>

        <!-- Cards de Navegación -->
        <div class="cards">
          <a href="{{ route('citas.profesional') }}">
                <div class="cuadro">
                    <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353853/Citas_rugpyb.jpg') }}" alt="Citas">
                    <h3>Citas</h3>
                </div>
            </a>
            <a href="{{ route('profesionales.profesional') }}">
                <div class="cuadro">
                    <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353904/Profesionales_ghqweq.jpg') }}" alt="Profesionales">
                    <h3>Profesionales</h3>
                </div>
            </a>
            <a href="{{ route('recursos.profesional') }}">
                <div class="cuadro">
                    <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353953/Recursos_xbryb2.jpg') }}" alt="Recursos">
                    <h3>Recursos</h3>
                </div>
            </a>
            <a href="{{ route('notificaciones.profesional') }}">
                <div class="cuadro">
                    <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353854/Notificaciones_e6fios.jpg') }}" alt="Notificaciones">
                    <h3>Notificaciones</h3>
                </div>
            </a>
            <a href="{{ route('historial.pagos.profesional') }}">
                <div class="cuadro">
                    <img src="{{ asset('https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353882/Pagos_gfjdbb.jpg') }}" alt="Historial de pagos">
                    <h3>Historial de pagos</h3>
                </div>
            </a>
        </div>
    </main>

    <!-- Footer -->
    <div id="footer-container">
        @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
    </div>

    <!-- Scripts Propios -->
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Menu_Profesional/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
</html>