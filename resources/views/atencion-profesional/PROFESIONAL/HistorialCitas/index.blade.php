<!DOCTYPE html> 
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/HistorialCitas/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/PROFESIONAL/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head>
    <body>
      <!-- Lugar donde se cargará el header -->
  <div id="header-container"></div>
  @include('atencion-profesional.PROFESIONAL.Header.header')
   
</head>
<body>
  
   
<main>
    <section class="historial-citas">
        <h2>Historial de Citas</h2>
        <table id="citas-table-psicologo"> <!-- Cambia el ID para diferenciarlo -->
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Profesional</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <!-- Las filas se llenarán dinámicamente con JavaScript -->
            </tbody>
        </table>
    </section>
</main>

 <!-- Lugar donde se cargará el footer -->
 <div id="footer-container"></div>
 @include('atencion-profesional.PROFESIONAL.Footer.inicio.inicio')

 <script src="{{ asset('js/atencion-profesional/PROFESIONAL/HistorialCitas/script.js') }}"></script>
          <script src="{{ asset('js/atencion-profesional/PROFESIONAL/Header/script.js') }}"></script>
    </body>
</html> 