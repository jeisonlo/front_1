<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/EscribirReseña_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>

<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')
    
    <div class="review-container">
        <h2>Escribe tu reseña sobre nuestro especialista</h2>
        <div class="review-box">
            <div class="review-header">
                <div class="user-icon">
                    <img src="../Imagenes/FotoUsuario.png" alt="User Icon">
                </div>
                <div class="user-info">
                    <p>Juanito Alimaña #1202</p>
                </div>
            </div>
            <form action="#" method="POST">
                <textarea name="review" rows="5" placeholder="Escribe tu reseña aquí..."></textarea>
                <a href="{{ route('home.usuario') }}"><button>ENVIAR</button></a>
            </form>
        </div>
    </div>
    <!-- Lugar donde se cargará el footer -->
    <div id="footer-container"></div>
    @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
    <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>t>
    <script src="{{ asset('js/atencion-profesional/USUARIO/EscribirReseña_Usuario/script.js') }}"></script>
</body>

</html>