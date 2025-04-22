<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<style>
  * {
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }


    /* Header */
    header {
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #f9e0f5f7;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        width: calc(100% - 15px); /* Resta un poco para evitar que cubra la barra */
        transition: transform 0.3s ease; /* Transición suave */
    }

    header.hidden {
        transform: translateY(-100%); /* Mueve el header hacia arriba fuera de la vista */
    }
    main {
        margin-top: 120px; /* Ajusta la altura según el header */
        padding: 20px;
    }
    
    .logo-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .logo {
        width: 210px;
        height: 110px;
        border-radius: 50px;
    }

    .app-title {
        font-size: 25px;
        font-weight: bold;
        margin-top: 3px;
        color: #59009A;
        text-decoration: none; /* Elimina el subrayado */
    }

    /* Ajuste de navegación */
    .nav-links {
        display: flex;
        gap: 90px;
        justify-content: center; /* Alinea todo hacia la izquierda */
        flex-grow: 1; /* Permite que el menú ocupe el espacio disponible */
        margin-left: 100px;
        
    }
    /* Sección derecha */
    .nav-right {
        display: flex; /* Usa flexbox para los elementos a la derecha */
        gap: 40px; /* Espacio entre los elementos a la derecha */
        margin-right: 40px;
        color: #000000c2;
        
    }

    .nav-item {
        text-decoration: none;
        color: #59009A;
        font-size: 17px;
        font-weight: 500;
        cursor: pointer;
        position: relative;
        transition: color 0.3s ease; /* Transición de color */
        font-weight: bold; 
    }
    .special-item {
        color: #494949; /* Cambia a tu color deseado */
        transition: color 0.3s ease; /* Añade transición suave al color */
        font-size:13px;
    }

    .special-item:hover {
        color: #59009A; /* Cambia a otro color al pasar el mouse */
    }
    .nav-item:hover {
        color: #5a009ac2; /* Cambia a azul cuando se pasa el mouse */
    }

    /* Estilos para el contenedor del perfil */
    .profile-container {
        position: relative;
    }

    .profile-box {
        background-color: #fddaf8f0;
        border-radius: 10px; /* Bordes redondeados */
        padding: 10px; /* Espaciado interno */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.09); /* Sombra para el efecto de cajita */
        display: flex; /* Usar flexbox para alinear los elementos dentro */
        align-items: center; /* Alinea los elementos en la parte superior */
    }
    .profile-container .profile-box {
        background-color: #fddaf8f0;
    }
    /* Ajusta la posición de Jhon Sebastian */
    .profile-name {
        margin-bottom: 5px; /* Espacio entre el nombre y la imagen */
        font-size: 13px;
        margin-right: 30px;
        color: #5a009ac2;
    }

    a{
        text-decoration: none;
    }

    /* Estilos para la imagen del perfil */
    .container-picture{
        overflow: hidden;
        display: flex;
        justify-content: center;
        width: 45px; /* Ajusta según el tamaño deseado */
        height: 45px; /* Ajusta según el tamaño deseado */
        border-radius: 50%; /* Hacer la imagen redonda */
        cursor: pointer; /* Cambia el cursor al pasar sobre la imagen */
        align-items: center;
    }

    .profile-pic {
        width: 75px; /* Ajusta según el tamaño deseado */
        height: 75px; /* Ajusta según el tamaño deseado */
        border-radius: 50%; /* Hacer la imagen redonda */
        cursor: pointer; /* Cambia el cursor al pasar sobre la imagen */
    }

    /* Menú de perfil */
    .profile-menu {
        display: none; /* Inicialmente oculto */
        position: absolute; /* Para que se posicione sobre la cajita */
        right: 0; /* Alinea a la derecha */
        top: 70px; /* Ajusta la posición */
        width: 150px; /* Ancho del menú */
        background-color: #f9e0f5f7;
        border: 1px solid #ddd; /* Borde del menú */
        border-radius: 8px; /* Bordes redondeados del menú */
        padding: 10px; /* Espaciado interno */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para el menú */
        z-index: 1000; /* Para que se muestre encima de otros elementos */
    }
    
    .profile-menu a {
        display: block;
        padding: 8px;
        text-decoration: none;
        color: #59009A;
        transition: color 0.3s ease; /* Transición en los links */
    }
    
    .profile-menu a:hover {
        color: #5a009ac2;
    }

    /* Pestaña de módulos */
    .modules-overlay {
        display: none;
        position: absolute;
        top: 100px;
        left: 0;
        width: 100%;
        background-color: #f9e0f5f7;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 999;
    }
    
    .module-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }
    .modulo {
        background-color: #f9e0f5f7;
        padding: 20px;
        text-align:left;
        margin-left: 20px;
        border-radius: 6px;
        color: #5a009ac2;
        font-size: 14px;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .modulo:hover {
        background-color: #f9e0f5f7;
        transform: scale(1.05); /* Efecto de zoom */
    }
    .module {
        background-color: #f9e0f5f7;
        padding: 20px;
        text-align: center;
        border-radius: 6px;
        font-weight: bold;
        color: #59009A;
        font-size: 14px;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    
    .module:hover {
        background-color: #f9e0f5f7;
        transform: scale(1.05); /* Efecto de zoom */
    }


    /* Estilos generales del menú hamburguesa */
    .hamburger {
        display: none; /* Oculto por defecto */
        background: none;
        border: none;
        font-size: 30px; /* Tamaño del icono */
        color: #59009A;
        cursor: pointer;
    }

    /* Menú hamburguesa */
    .hamburger-menu {
        display: none; /* Oculto por defecto */
        position: absolute;
        top: 100px; /* Alinea debajo del header */
        left: 0;
        width: 100%;
        background-color: #f9e0f5f7;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .hamburger-item {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #59009A;
        transition: color 0.3s ease;
    }

    .hamburger-item:hover {
        color: #5a009ac2; /* Cambia el color al pasar el mouse */
    }

    /* Media Queries para Responsividad */
    @media (max-width: 1100px) {
        .nav-links {
            display: none; /* Oculta el menú en pantallas pequeñas */
        }

        .hamburger {
            display: block; /* Muestra el botón hamburguesa */
        }

        .hamburger-menu {
            display: none; /* Oculto por defecto */
        }

        .hamburger-menu.active {
            display: block; /* Muestra el menú cuando está activo */
        }
        

        .profile-container {
            display: none; /* Oculta el perfil en pantallas pequeñas */
        }
        .nav-right{
            display: none;
        }

        /* Reajusta el título */
        .app-title {
            margin-left: auto; /* Alinea el título a la izquierda */
            margin-right: auto; /* Alinea el título a la derecha */
        }
        .module-grid{
            display: none;
        }
    
    }

</style>

    <header class="main-header">
        <div class="logo-container">
            <a href="{{ url('/inicioSesion/home') }}"><img href="{{ url('/inicioSesion/home') }}" src="{{ asset('css/inicioSesion/img/logo.png') }}"alt="Logo" class="logo"></a>
           
        </div>
        <button2 class="hamburger" onclick="toggleHamburgerMenu()">☰</button2>
        <nav class="nav-links">
            <a href="{{ url('/inicioSesion/home') }}" class="nav-item">Inicio</a>
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
                <img id="profile-image" src="https://res.cloudinary.com/dlmbupndo/image/upload/v1745249136/kq9tw0o9pyc58l9ngaiv.jpg" alt="Foto de perfil" class="profile-pic" onclick="toggleProfileMenu()">
               </div>
                <div id="profile-menu" class="profile-menu">
                    <a href="{{ url('/perfil') }}">Perfil</a>
                    
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
        <a href="{{ url('/inicio-alimentacion') }}"><div class="modulo">Alimentación</div></a>
        <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="modulo">Musicoterapia</div></a>
        <a href="{{ url('/einicio') }}"><div class="modulo">Ejercicios</div></a>
        <a href="{{ url('/usuario/home') }}"><div class="modulo">Atención Profesional</div></a>
    </div>
    <a href="#perfil" class="hamburger-item">Perfil</a>
</div>
        <!-- Pestaña de módulos -->
        <div id="modules-overlay" class="modules-overlay">
            <div class="module-grid">
               <a href="{{ url('/mapadesuenos/iniciomapa') }}"> <div class="module">Mapa de sueños</div></a>
               <a href="{{ url('/inicio-alimentacion') }}"><div class="module">Alimentación</div></a>
                <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="module">Musicoterapia</div></a>
                <a href="{{ url('/einicio') }}"><div class="module">Ejercicios</div></a>
                <a href="{{ url('/usuario/home') }}"><div class="module">Atención Profesional</div></a>
            </div>
        </div>
    </header>
    
      
    <script>
        function toggleProfileMenu() {
          const menu = document.getElementById("profile-menu");
          menu.style.display = menu.style.display === "block" ? "none" : "block";
        }
      
        function toggleModules() {
          const overlay = document.getElementById("modules-overlay");
          overlay.style.display = overlay.style.display === "block" ? "none" : "block";
        }
      
        function toggleHamburgerMenu() {
          const hamburgerMenu = document.getElementById('hamburger-menu');
          hamburgerMenu.classList.toggle('active');
        }
      
        function toggleModulues() {
          const modulesContent = document.getElementById("modules-content");
          modulesContent.style.display = modulesContent.style.display === "block" ? "none" : "block";
        }
      
        // Ocultar menús al hacer clic fuera
        document.addEventListener("click", function (e) {
          if (!e.target.closest(".profile-container")) {
            document.getElementById("profile-menu").style.display = "none";
          }
          if (!e.target.closest(".modules-item")) {
            document.getElementById("modules-overlay").style.display = "none";
          }
        });
      
        // Cuando carga el DOM
        document.addEventListener('DOMContentLoaded', () => {
          const userData = localStorage.getItem('userData');
          const profileName = document.getElementById('profile-name');
          const profileImage = document.getElementById('profile-image');
          const botonSesion = document.getElementById('boton-sesion'); // Usa este ID en el HTML
      
          if (userData && profileName && botonSesion) {
            try {
              const usuario = JSON.parse(userData);
              profileName.textContent = usuario.nombre || 'Invitado';
              
              // Actualizar la foto de perfil si existe
              if (usuario.foto) {
                profileImage.src = usuario.foto;
              } else {
                // Imagen por defecto si no hay foto
                profileImage.src = "https://res.cloudinary.com/dlmbupndo/image/upload/v1745249136/kq9tw0o9pyc58l9ngaiv.jpg";
              }
      
              // Mostrar "Cerrar sesión" si hay datos de usuario
              botonSesion.textContent = 'Cerrar sesión';
              botonSesion.onclick = function (e) {
                e.preventDefault();
                localStorage.removeItem('authToken');
                localStorage.removeItem('userData');
                window.location.href = "{{ url('/inicioSesion/home') }}";
              };
            } catch (error) {
              console.error('Error al parsear userData:', error);
              mostrarIniciarSesion();
            }
          } else {
            mostrarIniciarSesion();
          }
      
          function mostrarIniciarSesion() {
            const profileName = document.getElementById('profile-name');
            const profileImage = document.getElementById('profile-image');
            const botonSesion = document.getElementById('boton-sesion');
            
            if (profileName) profileName.textContent = 'Invitado';
            if (profileImage) profileImage.src = "https://res.cloudinary.com/dlmbupndo/image/upload/v1745249136/kq9tw0o9pyc58l9ngaiv.jpg";
            if (botonSesion) {
              botonSesion.textContent = 'Iniciar sesión';
              botonSesion.onclick = function (e) {
                e.preventDefault();
                window.location.href = "{{ url('/login') }}";
              };
            }
          }
        });
      </script>
      
</body>
</html>