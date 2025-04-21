<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/CitaActualizada_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>

<body>

    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')
    
    <div class="container">
        <h2>Cita Actualizada</h2>
        <form id="actualizarCitaForm">
            <!-- Campos no editables -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label for="paquete">Paquete:</label>
                <input type="text" id="paquete" name="paquete" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label for="especialidad">Especialidad:</label>
                <input type="text" id="especialidad" name="especialidad" class="form-input" readonly>
            </div>
        
            <!-- Campos editables -->
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios:</label>
                <textarea id="comentarios" name="comentarios" class="form-input"></textarea>
            </div>
        
            <button type="submit" class="form-button">Actualizar Cita</button>
        </form>
    </div>

    <!-- Mensaje Emergente -->
    <div id="mensajeEmergente" class="modal">
        <div class="modal-content">
            <h3>¡Cita Actualizada! 🎉</h3>
            <p>Felicidades, su cita ha sido actualizada exitosamente.</p>
            <button id="btnAceptar">Aceptar</button>
        </div>
    </div>


    
    <!-- Lugar donde se cargará el footer -->
    <div id="footer-container"></div>
    @include('atencion-profesional.USUARIO.Footer.inicio.inicio')

    <script src="{{ asset('js/atencion-profesional/USUARIO/CitaActualizada_Usuario/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
</body>

</html>