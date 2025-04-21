<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atencion Profesional</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/CitaActualizada-Profesional/CitaActualizada.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
</head>
<body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.PROFESIONAL.Header.header')
    <div class="container">
        <h2>Actualizar Cita</h2>
        <form id="actualizarCitaForm">
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" required>
            </div>

            <div class="form-group">
                <label for="paquete">Seleccionar Paquete:</label>
                <select id="paquete" required>
                    <option value="basico">Básico - 1 sesión</option>
                    <option value="intermedio">Intermedio - 3 sesiones</option>
                    <option value="premium">Premium - 5 sesiones</option>
                </select>
            </div>

            <div class="form-group">
                <label for="especialidad">Especialidad:</label>
                <select id="especialidad" required>
                    <option value="clinica">Psicología Clínica</option>
                    <option value="cognitiva">Psicología Cognitiva</option>
                    <option value="desarrollo">Psicología del Desarrollo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Nueva Fecha:</label>
                <input type="date" id="fecha" required>
            </div>

            <div class="form-group">
                <label for="hora">Nueva Hora:</label>
                <input type="time" id="hora" required>
            </div>

            <div class="form-group">
                <label for="comentarios">Comentarios Adicionales:</label>
                <textarea id="comentarios" rows="4"></textarea>
            </div>

            <button type="submit" class="btn-actualizar">Actualizar Cita</button>
        </form>
    </div>

    <!-- Mensaje Emergente -->
    <div id="mensajeEmergente" class="modal">
        <div class="modal-content">
            <h3>¡Cita Actualizada! 🎉</h3>
            <p>Su cita ha sido actualizada exitosamente.</p>
            <button id="btnAceptar">Aceptar</button>
        </div>
    </div>

    <!-- Lugar donde se cargará el footer -->
    <div id="footer-container"></div>
    @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/CitaActualizada-Profesional/script.js') }}"></script>
    <script src="/atencion-profesional/PROFESIONAL/Header/script.js"></script>
</body>
</html>