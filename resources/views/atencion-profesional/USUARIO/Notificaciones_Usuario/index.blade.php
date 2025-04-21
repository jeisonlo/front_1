<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Notificaciones_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
</head>
<body>
   
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')

       
    <main class="body">
        <div class="search-bar">
            <input type="text" placeholder="Buscar...">
            <button class="search-button">Buscar</button>
            <button class="clear-button">Eliminar</button>
        </div>
        <div class="main-content">
            <div class="sidebar">
                <p>Recibidos</p>
                <p>Citas</p>
            </div>
            <div class="content">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Cita</td>
                            <td>ANUNCIO</td>
                            <td>Tu cita ha sido agendada con el psicologo</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Tranquilidad</td>
                            <td>REPORTE</td>
                            <td>Tu contraseña ha sido actualizada</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Rene H.</td>
                            <td>ANUNCIO</td>
                            <td>Rene le ha dado me gusta a tu comentario</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Tranquilidad</td>
                            <td>REPORTE</td>
                            <td>Nuevos perfiles disponibles! Desbloquéalos ahora</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Cita</td>
                            <td>ANUNCIO</td>
                            <td>Tu cita ha sido cancelada con el psicologo</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Cita</td>
                            <td>ANUNCIO</td>
                            <td>El psicologo ha subido los archivos de tu cita</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Cita</td>
                            <td>ANUNCIO</td>
                            <td>Tu cita ha sido agendada con el psicologo</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Cita</td>
                            <td>ANUNCIO</td>
                            <td>Tu cita ha sido agendada con el psicologo</td>
                        </tr>
                        <tr class="clickable-row" data-url="{{ route('notificacion.abierta.usuario') }}">
                            <td><input type="checkbox"></td>
                            <td>Cita</td>
                            <td>ANUNCIO</td>
                            <td>Tu cita ha sido agendada con el psicologo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
     <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
    
    <script>
        // JavaScript para redirigir al hacer clic en una fila
        document.querySelectorAll('.clickable-row').forEach(row => {
            row.addEventListener('click', () => {
                const url = row.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>
    <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/USUARIO/Notificaciones_Usuario/script.js') }}"></script>
</body>
</html>
