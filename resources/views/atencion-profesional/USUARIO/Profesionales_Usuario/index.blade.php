<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Profesionales_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>

<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')

    <main>
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Buscar...">
            <button class="search-button">Buscar</button>
        </div>
        <section class="profile-list">
            <div class="profile">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Diego Armando Maradona.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>

                </div class="profile-link">
                <a href="{{ route('perfil.profesional.usuario') }}"><img
                        class="visitar-perfil" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353395/VisitarPerfil_xuzdmd.png" alt="Visitar Perfil"></a>

                <!-- Botón de Calificar -->
                <button class="calificar-button" onclick="abrirModalCalificacion('Diego Armando Maradona', 'res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png')">
                    Calificar
                </button>
            </div>

            <div class="profile">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Juan Roman Riquelme.</h3>
                    <p>Especialista en corregir dinámicas familiares complejas y en facilitar un entorno seguro donde
                        los miembros de la familia puedan expresar sus preocupaciones y trabajar juntos hacia soluciones
                        constructivas.</p>

                </div>
                <a href="{{ route('perfil.profesional.usuario') }}"><img
                        class="visitar-perfil" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353395/VisitarPerfil_xuzdmd.png" alt="Visitar Perfil"></a>
                <!-- Botón de Calificar -->
                <button class="calificar-button" onclick="abrirModalCalificacion('Diego Armando Maradona', '../Imagenes/FotoUsuario.png')">
                    Calificar
                </button>
            </div>

            <div class="profile">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>

                </div>
                <a href="{{ route('perfil.profesional.usuario') }}"><img
                        class="visitar-perfil" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353395/VisitarPerfil_xuzdmd.png" alt="Visitar Perfil"></a>
                <!-- Botón de Calificar -->
                <button class="calificar-button" onclick="abrirModalCalificacion('Diego Armando Maradona', '../Imagenes/FotoUsuario.png')">
                    Calificar
                </button>
            </div>

            <div class="profile">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>

                </div>
                <a href="{{ route('perfil.profesional.usuario') }}"><img
                        class="visitar-perfil" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353395/VisitarPerfil_xuzdmd.png" alt="Visitar Perfil"></a>
                <!-- Botón de Calificar -->
                <button class="calificar-button" onclick="abrirModalCalificacion('Diego Armando Maradona', '../Imagenes/FotoUsuario.png')">
                    Calificar
                </button>
            </div>

            <div class="profile">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>

                </div>
                <a href="{{ route('perfil.profesional.usuario') }}"><img
                        class="visitar-perfil" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353395/VisitarPerfil_xuzdmd.png" alt="Visitar Perfil"></a>
                <!-- Botón de Calificar -->
                <button class="calificar-button" onclick="abrirModalCalificacion('Diego Armando Maradona', '../Imagenes/FotoUsuario.png')">
                    Calificar
                </button>
            </div>

            <div class="profile">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>
                </div>
                <a href="{{ route('perfil.profesional.usuario') }}"><img
                        class="visitar-perfil" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353395/VisitarPerfil_xuzdmd.png" alt="Visitar Perfil"></a>
                <!-- Botón de Calificar -->
                <button class="calificar-button" onclick="abrirModalCalificacion('Diego Armando Maradona', '../Imagenes/FotoUsuario.png')">
                    Calificar
                </button>
            </div>

        </section>


        <div id="modalCalificacion" class="modal">
            <div class="modal-content">
                <span class="close" onclick="cerrarModal()">&times;</span>
                <div class="modal-header">
                    <img id="modalImagen" class="imagen-modal" src="" alt="Foto de perfil">
                    <h2 id="modalNombre"></h2>
                </div>
                <div class="modal-body">
                    <p>Calificación:</p>
                    <div class="estrellas">
                        <span class="estrella" onclick="seleccionarEstrella(1)">★</span>
                        <span class="estrella" onclick="seleccionarEstrella(2)">★</span>
                        <span class="estrella" onclick="seleccionarEstrella(3)">★</span>
                        <span class="estrella" onclick="seleccionarEstrella(4)">★</span>
                        <span class="estrella" onclick="seleccionarEstrella(5)">★</span>
                    </div>
                    <div class="boton-container">
                        <button class="boton-comentar" onclick="abrirComentar()">Comentar</button>
                        <button class="boton-aceptar" onclick="guardarCalificacion()">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para comentar -->
        <div id="modalComentar" class="modal">
            <div class="modal-content">
                <span class="close" onclick="cerrarComentar()">&times;</span>
                <textarea id="comentario" placeholder="Escribe tu comentario..."></textarea>
                <button class="boton-aceptar" onclick="guardarComentario()">Aceptar</button>
            </div>
        </div>

    </main>
    <!-- Lugar donde se cargará el footer -->
    <div id="footer-container"></div>
    @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
    <script src="{{ asset('js/atencion-profesional/USUARIO/Profesionales_Usuario/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
</body>

</html>