<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Detalles del Ejercicio</title>
    <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/detalles.css') }}">
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

<div class="marca-agua">
    @include('rutinasEjercicios.layouts.header')

  <div class="cont">
    <div class="contenedor">
      <h1 id="exercise-name"></h1>

      <div class="guia">
        <video id="exercise-video" autoplay muted controls width="640" height="360" class="gui">
            <source id="video-source" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
        </video>
        <button class="boton" onclick="toggleInstrucciones()">Instrucciones</button>
      </div>

      <div class="instruccines">
        <h2><span class="title">Instrucciones</span></h2>
        <ul id="exercise-instructions"></ul>
      </div>
    </div>
  </div>
  @include('rutinasEjercicios.layouts.footer')
</div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener el ID del ejercicio desde la URL
        const exerciseId = window.location.pathname.split("/").pop(); 

        axios.get(`http://localhost:8000/api/exercises/${exerciseId}`)
            .then(response => {
                const exercise = response.data;

                // Mostrar el nombre del ejercicio
                

                // Mostrar el video si existe
                if (exercise.video_url) {
                    document.getElementById("video-source").src = exercise.video_url;
                    document.getElementById("exercise-video").load(); // Recargar video
                } else {
                    document.getElementById("exercise-video").outerHTML = "<p>No hay video disponible.</p>";
                }

                // Mostrar las instrucciones como lista
                let instruccionesHTML = exercise.description
                    .split("\n") // Divide por saltos de línea
                    .map(linea => `<li>${linea}</li>`) // Convierte cada línea en <li>
                    .join(""); // Une el HTML
                
                document.getElementById("exercise-instructions").innerHTML = instruccionesHTML;
            })
            .catch(error => {
                console.error("Error al obtener los datos:", error);
                document.body.innerHTML = "<h1>Error: No se encontró el ejercicio.</h1>";
            });
    });

    const menuIcon = document.querySelector('.menu-icon');
  const navbar = document.querySelector('header');
const abrir = document.getElementsByClassName('boton')

  // Añadir un event listener para abrir/cerrar el menú
  menuIcon.addEventListener('click', () => {
    navbar.classList.toggle('menu-open');
  });

  
  const carousel = document.querySelector('.video-carousel');

// Agrega un evento para manejar el scroll horizontal con el mouse
carousel.addEventListener('wheel', (event) => {
event.preventDefault(); // Previene el scroll vertical
carousel.scrollLeft += event.deltaY; // Ajusta el desplazamiento horizontal
});
function openModal() {
  instrucciones.style.display = 'flex';
  
}
abrir.addEventListener('click', () => {
  openModal(); // Mostrar el formulario cuando se hace clic en "Crear Nueva Tarea"
})

function toggleInstrucciones() {

  const contenedor = document.querySelector('.contenedor');
  contenedor.classList.toggle('contenedor2');
  contenedor.classList.toggle('show-instrucciones');
  
}
  </script>

</body>
</html>
