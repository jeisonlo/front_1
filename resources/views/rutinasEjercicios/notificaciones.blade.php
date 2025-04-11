<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Notifications</title>
    <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/notificaciones.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <style>  .marca-agua::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("{{ asset('css/rutinasEjercicios/img/woman-digital-disconnecting-home-by-doing-yoga.jpg') }}");
        background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
        background-repeat: no-repeat;
        background-position: center;
        opacity: 0.5; /* Ajusta la transparencia de la marca de agua */
        z-index: -2;
    }</style>
   

    <div class="marca-agua"> 
        @include('rutinasEjercicios.layouts.header')
        <div class="container">
            <aside class="sidebar">
                <div class="menu-item">
                  <a href="{{ url('/einicio') }}">
                      <img src="{{ asset('css/rutinasEjercicios/img/home.svg') }}"alt="Icon" />
                      <span>Inicio</span>
                  </a>
              </div>
                <div class="menu-item">
                  <a href="{{ url('/calendario') }}">
                    <img src="{{ asset('css/rutinasEjercicios/img/calendario.svg') }}"alt="Icon" />
                    <span>Calendario</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{ route('favoritos') }}" class="btn-favoritos">
                    <img src="{{ asset('css/rutinasEjercicios/img/favorito.svg') }}"alt="Icon" />
                    <span href="#">Favoritos</span>
                  </a>
                </div>
                <div class="menu-item active">
                  <a href="{{ url('/notificaciones') }}">
                    <img src="{{ asset('css/rutinasEjercicios/img/notificacion.svg') }}" alt="Icon" />
                    <span href="#">Notificaciones</span>
                  </a>
                </div>
               
              </aside>

            <div class="content">
                <div class="titulo">
                    <h2>Notificaciones</h2>
                </div>
                <div id="notifications-container">
                    <p>Cargando notificaciones...</p>
                </div>
            </div>
        </div>
    </div>

    @include('rutinasEjercicios.layouts.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const notificationsContainer = document.getElementById('notifications-container');

            // Obtener notificaciones desde la API
            axios.get('https://back1-production-67bf.up.railway.app/v1/api/notifications')
                .then(response => {
                    notificationsContainer.innerHTML = ''; // Limpiar mensaje de carga
                    const notifications = response.data;

                    if (notifications.length === 0) {
                        notificationsContainer.innerHTML = '<p>No hay notificaciones.</p>';
                        return;
                    }

                    // Crear las notificaciones dinámicamente
                    notifications.forEach(notification => {
                        const notificationElement = document.createElement('div');
                        notificationElement.classList.add('notificationn');
                        notificationElement.innerHTML = `
                            <div class="notification">
                            <p>${notification.message}</p>
                            <span class="time">${notification.time}</span>
                            </div>
                            <hr>
                        `;
                        notificationsContainer.appendChild(notificationElement);
                    });
                })
                .catch(error => {
                    console.error('Error al cargar las notificaciones:', error);
                    notificationsContainer.innerHTML = '<p>Error al cargar notificaciones.</p>';
                });
        });
    </script>

</body>
</html>
