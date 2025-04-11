<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/favoritos.css')}}">
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
    z-index: -1;
}</style>
    @include('rutinasEjercicios.layouts.header')
  <div class="marca-agua">
    <div class="main-container">

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
            <div class="menu-item active">
              <a href="{{ route('favoritos') }}" class="btn-favoritos">
                <img src="{{ asset('css/rutinasEjercicios/img/favorito.svg') }}"alt="Icon" />
                <span href="#">Favoritos</span>
              </a>
            </div>
            <div class="menu-item">
              <a href="{{ url('/notificaciones') }}">
                <img src="{{ asset('css/rutinasEjercicios/img/notificacion.svg') }}" alt="Icon" />
                <span href="#">Notificaciones</span>
              </a>
            </div>
           
          </aside>

        <div class="task-card">
          <h2 class="task-title">Mis Favoritos</h2>
          <br>
          <div id="favoritos-container" class="tasks">
            <p>Cargando ejercicios favoritos...</p>
          </div>
        </div>
        
    </div>
  </div>

  <script>
      document.addEventListener("DOMContentLoaded", function () {
          cargarEjerciciosFavoritos();
      });

      function cargarEjerciciosFavoritos() {
          axios.get("https://back1-production-67bf.up.railway.app/v1/liked-exercises")
              .then(response => {
                  let ejerciciosIds = response.data;

                  if (ejerciciosIds.length === 0) {
                      document.getElementById("favoritos-container").innerHTML = "<p>No tienes ejercicios en favoritos.</p>";
                      return;
                  }

                  axios.get(`https://back1-production-67bf.up.railway.app/v1/exercisesByIds?ids=${ejerciciosIds.join(",")}`)
                      .then(response => {
                          let ejercicios = response.data;
                          let contenedor = document.getElementById("favoritos-container");
                          contenedor.innerHTML = "";

                          ejercicios.forEach(ejercicio => {
                              let ejercicioHTML = `
                                  <div class="task">
                                      <div class="date">${new Date().toISOString().split("T")[0]}</div>
                                       <a href="{{ url('/detalles') }}/${ejercicio.id}">
                                      <img src="${ejercicio.image_url}" alt="${ejercicio.name}" class="favorite-img">
                                      </a>
                                      <button class="material-symbols-outlined" onclick="quitarLike(${ejercicio.id})">💜</button>
                                  </div>
                              `;
                              contenedor.innerHTML += ejercicioHTML;
                          });
                      })
                      .catch(error => console.error("Error al obtener datos de los ejercicios:", error));
              })
              .catch(error => console.error("Error al cargar favoritos:", error));
      }

      function quitarLike(ejercicioId) {
          axios.delete(`https://back1-production-67bf.up.railway.app/v1/unlike/${ejercicioId}`)
              .then(response => {
                  cargarEjerciciosFavoritos();
              })
              .catch(error => console.error("Error al quitar like:", error));
      }
  </script>
@include('rutinasEjercicios.layouts.footer')
</body>
</html>
