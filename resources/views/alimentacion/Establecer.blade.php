<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Test de Bienestar</title>

    <link rel="stylesheet" href="{{ asset('css/alimentacion/Header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alimentacion/Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alimentacion/Establecer_M_S.css') }}">
</head>


<header class="main-header">
    <div class="logo-container">
        <a href="{{ url('/home') }}"><img href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" src="alimentacion/Inclued/lOGO.jpg" alt="Logo" class="logo"></a>
       
    </div>
    <button2 class="hamburger" onclick="toggleHamburgerMenu()">☰</button2>
    <nav class="nav-links">
        <a href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" class="nav-item">Inicio</a>
        <div class="nav-item modules-item" onclick="toggleModules()">Módulos</div>
        <a href="/mapa-de-suenos/todohh/inicio/link/quienessomos.html" class="nav-item  ">Acerca de </a>
        <a href="/mapa-de-suenos/todohh/inicio/link/contacto.html" class="nav-item ">Contacto</a>
        <div id="modules-indicator" class="modules-indicator"></div>
        
    </nav>
    <div class="nav-right">
       
        
    </div>
    <div class="profile-container">
        <div class="profile-box">
            <!-- aqui debe estar el nombre del usuario -->
            <a id="profile-name" href="#nombre" class="nav-item special-item profile-name">Invitado</a>
            <div class="container-picture">
            <img src="https://res.cloudinary.com/dlmbupndo/image/upload/v1745249136/kq9tw0o9pyc58l9ngaiv.jpg" alt="Foto de perfil" class="profile-pic" onclick="toggleProfileMenu()">
           </div>
            <div id="profile-menu" class="profile-menu">
                <a href="{{ url('/usuario') }}">Perfil</a>
                <a href="{{ url('/confi') }}">Configuracion</a> 
                 <!-- dale funcionalidad a cerrar sesion  -->
                 <a href="#" id="boton-sesion">Cerrar sesión</a>
            </div>
        </div>
    </div>
    <!-- Menú hamburguesa -->
<div id="hamburger-menu" class="hamburger-menu">
<a href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" class="hamburger-item">Inicio</a>
<a href="#"><div class="hamburger-item" onclick="toggleModulues()">Módulos</div></a>
<!-- Contenedor de módulos (oculto por defecto) -->
<div id="modules-content" class="modules-content" style="display: none;">
    <a href="{{ url('/mapadesuenos/iniciomapa') }}"><div class="modulo">Mapa de sueños</div></a>
    <a href="/alimentacion/Inicio/index.html"><div class="modulo">Alimentación</div></a>
    <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="modulo">Musicoterapia</div></a>
    <a href="{{ url('/einicio') }}"><div class="modulo">Ejercicios</div></a>
    <a href="/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html"><div class="modulo">Atención Profesional</div></a>
</div>
<a href="#perfil" class="hamburger-item">Perfil</a>
</div>
    <!-- Pestaña de módulos -->
    <div id="modules-overlay" class="modules-overlay">
        <div class="module-grid">
           <a href="{{ url('/mapadesuenos/iniciomapa') }}"> <div class="module">Mapa de sueños</div></a>
           <a href="/alimentacion/Inicio/index.html"><div class="module">Alimentación</div></a>
            <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="module">Musicoterapia</div></a>
            <a href="{{ url('/einicio') }}"><div class="module">Ejercicios</div></a>
            <a href="/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html"><div class="module">Atención Profesional</div></a>
        </div>
    </div>
</header>

<body class="frutas-page">

    <main>
    <div class="container">
        <h2>Test de Bienestar</h2>
        <form id="testForm" method="POST" action="{{ route('test.store') }}">
            @csrf

            <!-- 🔹 Sección 1: Datos Básicos -->
            <fieldset>
                <legend>Datos Básicos del Usuario</legend>
                <label for="peso">Peso actual (kg):</label>
                <input type="number" id="peso" name="peso" required>

                <label for="altura">Altura (cm):</label>
                <input type="number" id="altura" name="altura" required>

                <label for="edad">Edad (años):</label>
                <input type="number" id="edad" name="edad" required>

                <label for="sexo">Sexo biológico:</label>
                <select id="sexo" name="sexo" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Masculino">Hombre</option>
                    <option value="Femenino">Mujer</option>
                    <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                </select>

                <label for="complexion">Complexión corporal:</label>
                <select id="complexion" name="complexion" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Delgada">Delgada</option>
                    <option value="Promedio">Promedio</option>
                    <option value="Musculosa">Musculosa</option>
                    <option value="Con sobrepeso">Con sobrepeso</option>
                </select>
            </fieldset>

            <!-- 🔹 Sección 2: Actividad Física y Estilo de Vida -->
            <fieldset>
                <legend>Hábitos de Actividad Física y Estilo de Vida</legend>
                <label for="actividad">Nivel de actividad física semanal:</label>
                <select id="actividad" name="actividad" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Sedentario">Sedentario - No hago ejercicio</option>
                    <option value="Ligero">Ligero - 1 a 2 veces por semana</option>
                    <option value="Moderado">Moderado - 3 a 4 veces</option>
                    <option value="Alto">Alto - 5 o más veces por semana</option>
                </select>

                <label for="suenio">Horas de sueño promedio por noche:</label>
                <select id="suenio" name="suenio" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Menos de 5">Menos de 5</option>
                    <option value="5-6">5-6</option>
                    <option value="7-8">7-8</option>
                    <option value="Mas de 8">Más de 8</option>
                </select>
            </fieldset>

            <!-- 🔹 Sección 3: Estrés y Salud Mental -->
            <fieldset>
                <legend>Estrés y Salud Mental</legend>
                <label for="estres">Nivel de estrés actual:</label>
                <select id="estres" name="estres" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Bajo">Bajo</option>
                    <option value="Moderado">Moderado</option>
                    <option value="Alto">Alto</option>
                    <option value="Muy alto">Muy alto</option>
                </select>
            </fieldset>

            <!-- 🔹 Sección 4: Objetivo de Salud -->
            <fieldset>
                <legend>Objetivo de Salud</legend>
                <label for="objetivo">¿Cuál es tu principal objetivo de salud?</label>
                <select id="objetivo" name="objetivo">
                    <option value="Perder peso">Perder peso</option>
                    <option value="Mantener peso">Mantener peso</option>
                    <option value="Ganar peso">Ganar peso</option>
                    <option value="Mejorar habitos alimenticios">Mejorar hábitos alimenticios</option>
                    <option value="Mejorar mi salud en general">Mejorar mi salud en general</option>
                </select>
            </fieldset>

            <div class="boton-container">
                <button id="guardar" class="button" type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <!-- 🔹 Meta Box (Inicialmente Oculto) -->
    <div class="meta-box" id="metaBox" style="display: none;">
        <h3 id="meta">Meta personalizada:</h3>
        <div class="image-container">
            <img src="{{ asset('Inclued/imagen.resultadoBien.svg') }}" alt="Icono de resultados">
        </div>
        <a class="continue-button" href="#">Continuar al inicio</a>
    </div>
    </main>
</body>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h4>Acerca de Tranquilidad</h4>
            <ul>
                <li><a href="/alimentacion/Inicio/link/quienessomos.html">Acerca de</a></li>
                <li><a href="/alimentacion/Inicio/link/beneficiosdetranquilidad.html">Beneficios de la Tranquilidad</a></li>
                <li><a href="/alimentacion/inicio/link/consejodebienestar.html">Consejos de Bienestar</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Ayuda y Soporte</h4>
            <ul>
                <li><a href="/alimentacion/inicio/link/contacto.html">Contacto</a></li>
                <li><a href="/alimentacion/inicio/link/sugerencias.html">Sugerencias</a></li>
                <li><a href="/alimentacion/inicio/link/guiadeuso.html">Guía de uso</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Información Legal</h4>
            <ul>
                <li><a href="/alimentacion/inicio/link/terminosycondiciones.html">Términos y condiciones</a></li>
                <li><a href="/alimentacion/inicio/link/politica de privacidad .html">Política de privacidad</a></li>
                <li><a href="/alimentacion/inicio/link/avisolegal.html">Aviso legal</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>Copyright © 2024 Tranquilidad. Todos los derechos reservados.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</footer>

<script src="{{ asset('js/alimentacion/Establecer.js') }}"></script>
<script src="{{ asset('js/alimentacion/Header.js') }}"></script>


</html>