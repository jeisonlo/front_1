<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
    
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="#"><img href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" src="/atencion-profesional/PROFESIONAL/Header/Logo.jpeg" alt="Logo" class="logo"></a>
           
        </div>
        <button2 class="hamburger" onclick="toggleHamburgerMenu()">☰</button2>
        <nav class="nav-links">
            <a href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" class="nav-item">Inicio</a>
            <div class="nav-item modules-item" onclick="toggleModules()">Módulos</div>
            <a href="/atencion-profesional/PROFESIONAL/Footer/inicio/link/quienessomos.html" class="nav-item  ">Acerca de </a>
            <a href="/atencion-profesional/PROFESIONAL/Footer/inicio/link/contacto.html" class="nav-item ">Contacto</a>
            <div id="modules-indicator" class="modules-indicator"></div>
            
            
        </nav>
        <div class="nav-right">
           
            
        </div>
        <div class="profile-container">
            <div class="profile-box">
                <a href="#nombre" class="nav-item special-item profile-name">Jhon Sebastian</a>
                <img src="https://media-bog2-2.cdn.whatsapp.net/v/t61.24694-24/464251565_515510564641224_6041331179142873332_n.jpg?ccb=11-4&oh=01_Q5AaICnwz63t7DHwbUzq6FWac1TQ_I-SzEdUmOnmaAtiBuu0&oe=6741C773&_nc_sid=5e03e0&_nc_cat=104" alt="Foto de perfil" class="profile-pic" onclick="toggleProfileMenu()">
                <div id="profile-menu" class="profile-menu">
                    <a href="/inicio-de-sesion/Modulo-iniciar-sesion/usuario/usuario.html">Perfil</a>
                    <a href="/inicio-de-sesion/Modulo-iniciar-sesion/configuracion/configuracion.html">Configuracion</a>
                    <a href="/inicio-de-sesion/Modulo-iniciar-sesion/login/login.html">Cerrar sesión</a>
                </div>
            </div>
        </div>
        <!-- Menú hamburguesa -->
<div id="hamburger-menu" class="hamburger-menu">
    <a href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" class="hamburger-item">Inicio</a>
    <a href="#"><div class="hamburger-item" onclick="toggleModulues()">Módulos</div></a>
    <!-- Contenedor de módulos (oculto por defecto) -->
    <div id="modules-content" class="modules-content" style="display: none;">
        <a href="/mapa-de-suenos/Inicio/Inicio.html"><div class="modulo">Mapa de sueños</div></a>
        <a href="/alimentacion/Inicio/index.html"><div class="modulo">Alimentación</div></a>
        <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="modulo">Musicoterapia</div></a>
        <a href="/rutinas-de-ejercicios/inicio/index.html"><div class="modulo">Ejercicios</div></a>
        <a href="/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html"><div class="modulo">Atención Profesional</div></a>
    </div>
    <a href="#perfil" class="hamburger-item">Perfil</a>
</div>
        <!-- Pestaña de módulos -->
        <div id="modules-overlay" class="modules-overlay">
            <div class="module-grid">
               <a href="/mapa-de-suenos/Inicio/Inicio.html"> <div class="module">Mapa de sueños</div></a>
               <a href="/alimentacion/Inicio/index.html"><div class="module">Alimentación</div></a>
                <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="module">Musicoterapia</div></a>
                <a href="/rutinas-de-ejercicios/inicio/index.html"><div class="module">Ejercicios</div></a>
                <a href="/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html"><div class="module">Atención Profesional</div></a>
            </div>
        </div>
    </header>
    
      
    
</body>
</html>