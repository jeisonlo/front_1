<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Encuesta_Inicial/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
  <title>Atención Profesional</title>
</head>
<body>
 

<div class="background-animation">
  <div class="ball ball1"></div>
  <div class="ball ball2"></div>
</div>

 <!-- Lugar donde se cargará el header -->
 <div id="header-container"></div>
 @include('atencion-profesional.USUARIO.Header.header')

<main class="body">
  <h2>Formulario de Evaluación</h2>
  <div class="container">
    <form>
      <div class="pregunta">
        <label for="tratamiento">¿Has recibido tratamiento profesional para tus problemas anteriormente?</label><br>
        <input type="radio" id="si" name="tratamiento" value="si">
        <label for="si">Sí</label>
        <input type="radio" id="no" name="tratamiento" value="no">
        <label for="no">No</label>
      </div>
      <div class="pregunta">
        <label for="problemas">¿Qué tipos de problemas estás experimentando?</label><br>
        <select id="problemas" name="problemas">
          <option value="ansiedad">Ansiedad</option>
          <option value="depresion">Depresión</option>
          <option value="estres">Estrés</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="impacto">¿En qué medida te afectan estos problemas en tu vida diaria?</label><br>
        <select id="impacto" name="impacto">
          <option value="minimo">Mínimo</option>
          <option value="moderado">Moderado</option>
          <option value="severo">Severo</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="tratamiento">¿Has recibido tratamiento profesional para tus problemas anteriormente?</label><br>
        <input type="radio" id="si" name="tratamiento" value="si">
        <label for="si">Sí</label>
        <input type="radio" id="no" name="tratamiento" value="no">
        <label for="no">No</label>
      </div>
      <div class="pregunta">
        <label for="problemas">¿Qué tipos de problemas estás experimentando?</label><br>
        <select id="problemas" name="problemas">
          <option value="ansiedad">Ansiedad</option>
          <option value="depresion">Depresión</option>
          <option value="estres">Estrés</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="impacto">¿En qué medida te afectan estos problemas en tu vida diaria?</label><br>
        <select id="impacto" name="impacto">
          <option value="minimo">Mínimo</option>
          <option value="moderado">Moderado</option>
          <option value="severo">Severo</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="tratamiento">¿Has recibido tratamiento profesional para tus problemas anteriormente?</label><br>
        <input type="radio" id="si" name="tratamiento" value="si">
        <label for="si">Sí</label>
        <input type="radio" id="no" name="tratamiento" value="no">
        <label for="no">No</label>
      </div>
      <div class="pregunta">
        <label for="problemas">¿Qué tipos de problemas estás experimentando?</label><br>
        <select id="problemas" name="problemas">
          <option value="ansiedad">Ansiedad</option>
          <option value="depresion">Depresión</option>
          <option value="estres">Estrés</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="impacto">¿En qué medida te afectan estos problemas en tu vida diaria?</label><br>
        <select id="impacto" name="impacto">
          <option value="minimo">Mínimo</option>
          <option value="moderado">Moderado</option>
          <option value="severo">Severo</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="tratamiento">¿Has recibido tratamiento profesional para tus problemas anteriormente?</label><br>
        <input type="radio" id="si" name="tratamiento" value="si">
        <label for="si">Sí</label>
        <input type="radio" id="no" name="tratamiento" value="no">
        <label for="no">No</label>
      </div>
      <div class="pregunta">
        <label for="problemas">¿Qué tipos de problemas estás experimentando?</label><br>
        <select id="problemas" name="problemas">
          <option value="ansiedad">Ansiedad</option>
          <option value="depresion">Depresión</option>
          <option value="estres">Estrés</option>
        </select>
      </div>
      <div class="pregunta">
        <label for="impacto">¿En qué medida te afectan estos problemas en tu vida diaria?</label><br>
        <select id="impacto" name="impacto">
          <option value="minimo">Mínimo</option>
          <option value="moderado">Moderado</option>
          <option value="severo">Severo</option>
        </select>
      </div>
    </form>
    <a href="{{ route('home.usuario') }}">
      <button>Enviar</button>
    </a>
  </div>
</main>
<!-- Lugar donde se cargará el footer -->
<div id="footer-container"></div>
@include('atencion-profesional.USUARIO.Footer.inicio.inicio')
<script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
<script src="{{ asset('js/atencion-profesional/USUARIO/Encuesta_Inicial/script.js') }}"></script>

</body>
</html>
