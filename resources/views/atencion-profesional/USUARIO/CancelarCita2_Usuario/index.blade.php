<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atencion Profesional</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/CancelarCita2_Usuario/CancelarCita2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
</head>
<body>
  <div id="header-container"></div>
  @include('atencion-profesional.USUARIO.Header.header')
  <main>
    <div class="form-container">
      <!-- Formulario izquierdo (no editable) -->
      <div class="form-section">
        <div class="form-group">
            <label class="form-label">Usuario:</label>
            <div class="form-input static"></div>
        </div>
        <div class="form-group">
            <label class="form-label">Especialidad:</label>
            <div class="form-input static"></div>
        </div>
        <div class="form-group">
            <label class="form-label">Fecha:</label>
            <div class="form-input static"></div>
        </div>
        <div class="form-group">
            <label class="form-label">Hora:</label>
            <div class="form-input static"></div>
        </div>
    </div>
    
      <!-- Formulario derecho (editable) -->
      <form class="form-section" id="cancellationForm">
        <div class="form-group">
            <label class="form-label">Motivo de cancelación:</label>
            <input type="text" class="form-input" placeholder="Ingrese el motivo de cancelación" required>
        </div>
        <div class="form-group">
            <label class="form-label">¿Desea reprogramar?:</label>
            <select class="form-input" required>
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Notas adicionales:</label>
            <textarea class="form-input" placeholder="Ingrese notas adicionales"></textarea>
        </div>
        
    </form>
    
    </div>

    <div class="button-container">
      <button class="form-button" type="submit">Enviar</button>
  </div>
    </div>
    </div>
  </main>

  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/CancelarCita2_Usuario/script.js') }}"></script>
</body>
</html>