<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Informes2_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head>
    <body>
       
     <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')
     
    <main>
        <div class="container">
            <div class="paciente-section">
                <h2>Detalles del Paciente</h2>
                <div class="paciente-info">
                    <p><strong>Nombre Paciente:</strong> {{ $reporte->paciente_nombre }}</p>
                    <p><strong>Edad:</strong> {{ $reporte->paciente_edad }} años</p>
                    <p><strong>Género:</strong> {{ $reporte->paciente_genero }}</p>
                </div>
            </div>

            <div class="paciente-section">
                <h2>Detalles del Informe</h2>
                <div class="paciente-info">
                    <p><strong>Diagnóstico:</strong> {{ $reporte->paciente_diagnostico }}</p>
                    <p><strong>Técnicas Aplicadas:</strong> {{ $reporte->tecnicas_pruebas_aplicadas }}</p>
                    <p><strong>Observación:</strong> {{ $reporte->observacion }}</p>
                    <p><strong>Fecha:</strong> {{ $reporte->fecha }}</p>
                    <p><strong>Evaluador:</strong> {{ $reporte->evaluador }}</p>
                </div>
            </div>
        </div>
    </main>

       <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/Informes2_Usuario/script.js') }}"></script>
</body>
</html>


                