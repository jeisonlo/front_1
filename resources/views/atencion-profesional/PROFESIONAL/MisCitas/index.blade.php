<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención Profesional</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/MisCitas/MisCitas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
</head>

<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.PROFESIONAL.Header.header')
   
   

    <div class="container">
        <h2>Citas Agendadas</h2>
        <div class="contenedor-citas" id="contenedorCitas">
            <!-- Aquí se agregarán las tarjetas dinámicamente -->
        </div>
<!-- Modal para el botón Ingresar -->
<div id="modalIngresar" class="modal">
    <div class="modal-content">
        <h3 id="modalTitulo"></h3>
        <p id="modalDetalles"></p>
    
        <button id="btnAceptarIngresar">Aceptar</button></a>
    </div>
</div>

    </main>
    <!-- Lugar donde se cargará el footer -->
    <div id="footer-container"></div>
    @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/MisCitas/MisCitas.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>

</html>