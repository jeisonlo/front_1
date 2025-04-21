<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Consulta Psicológica</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/GenerarInforme2_Profesional/Informe2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
</head>

<body>
    <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')
    
    <div id="header-container"></div>
    
    <main>
        <div class="formulario-container">
            <form class="formulario">
                <h2>Observación</h2>
                <textarea id="observacion" name="observacion" rows="5"></textarea>
                
                <h2>Indagación</h2>
                <textarea id="indagacion" name="indagacion" rows="5"></textarea>
                
                <h2>Confirmación</h2>
                <textarea id="confirmacion" name="confirmacion" rows="5"></textarea>
                
                <h2>Diagnóstico</h2>
                <textarea id="diagnostico" name="diagnostico" rows="5"></textarea>
                
                <h2>Prónostico</h2>
                <textarea id="pronostico" name="pronostico" rows="5"></textarea>
                
                <h2>Sugerencias</h2>
                <textarea id="sugerencias" name="sugerencias" rows="5"></textarea>
                
                <div class="button-container">
                    <a href="{{ route('mis.citas.profesional') }}">
                        <button type="button">Siguiente</button>
                    </a>
                </div>
            </form>
        </div>
    </main>

    <div id="footer-container"></div>
    @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/GenerarInforme2_Profesional/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
</body>
<div id="footer-container"></div>
</html>