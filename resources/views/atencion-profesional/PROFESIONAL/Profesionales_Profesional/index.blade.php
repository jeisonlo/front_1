<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Profesionales_Profesional/ProfesionalesProfesional.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>

<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.PROFESIONAL.Header.header')
    
    <main>
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Buscar...">
            <button class="search-button">Buscar</button>
        </div>
        <section class="profile-list">
            <div class="profile">
                <img class="imagen-usuario" src="../Imagenes/FotoUsuario.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Diego Armando Maradona.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>
                </div class="profile-link">
                <a href="{{ route('perfil.profesional') }}"><img class="visitar-perfil"
                        src="../Imagenes/VisitarPerfil.png" alt="Visitar Perfil"></a>
            </div>
            <div class="profile">
                <img class="imagen-usuario" src="../Imagenes/FotoUsuario.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Juan Roman Riquelme.</h3>
                    <p>Especialista en corregir dinámicas familiares complejas y en facilitar un entorno seguro donde
                        los miembros de la familia puedan expresar sus preocupaciones y trabajar juntos hacia soluciones
                        constructivas.</p>
                </div>
                <a href="{{ route('perfil.profesional') }}"><img class="visitar-perfil"
                        src="../Imagenes/VisitarPerfil.png" alt="Visitar Perfil"></a>
            </div>
            <div class="profile">
                <img class="imagen-usuario" src="../Imagenes/FotoUsuario.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>
                </div>
                <a href="{{ route('perfil.profesional') }}"><img class="visitar-perfil"
                        src="../Imagenes/VisitarPerfil.png" alt="Visitar Perfil"></a>
            </div>
            <div class="profile">
                <img class="imagen-usuario" src="../Imagenes/FotoUsuario.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>
                </div>
                <a href="{{ route('perfil.profesional') }}"><img class="visitar-perfil"
                        src="../Imagenes/VisitarPerfil.png" alt="Visitar Perfil"></a>
            </div>
            <div class="profile">
                <img class="imagen-usuario" src="../Imagenes/FotoUsuario.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>
                </div>
                <a href="{{ route('perfil.profesional') }}"><img class="visitar-perfil"
                        src="../Imagenes/VisitarPerfil.png" alt="Visitar Perfil"></a>
            </div>
            <div class="profile">
                <img class="imagen-usuario" src="../Imagenes/FotoUsuario.png" alt="Foto de perfil del usuario">
                <div class="profile-info">
                    <h3>Zinedine Zidane.</h3>
                    <p>Especialista en salud mental es un profesional altamente capacitado que trabaja en el campo de la
                        psicología y psiquiatría para proporcionar evaluaciones, diagnósticos, tratamientos y apoyo a
                        individuos que enfrentan desafíos relacionados con su bienestar emocional, mental y conductual.
                    </p>
                </div>
                <a href="{{ route('perfil.profesional') }}"><img class="visitar-perfil"
                        src="../Imagenes/VisitarPerfil.png" alt="Visitar Perfil"></a>
            </div>
        </section>
    </main>
    <!-- Lugar donde se cargará el footer -->
    <div id="footer-container"></div>
    @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Profesionales_Profesional/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>

</html>