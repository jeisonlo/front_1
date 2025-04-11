<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/ejercicios.css') }}">
    <title>Lista de Rutinas</title>
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
    }
    </style>


    <div class="marca-agua">
<main>
    @include('rutinasEjercicios.layouts.header')


        <div id="contenido-rutinas"></div> 
   
</main>



@include('rutinasEjercicios.layouts.footer')
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    let categoriaId = params.get("categoria_id");

    if (!categoriaId) {
        document.getElementById("contenido-rutinas").innerHTML = "<p>No se especificó una categoría.</p>";
        return;
    }

    axios.get(`https://back1-production-67bf.up.railway.app/v1/api/exercises?categoria_id=${categoriaId}`)
        .then(response => {
            let ejercicios = response.data;
            let rutinasHTML = "";
            let numRutina = 1;

            if (ejercicios.length === 0) {
                rutinasHTML = "<p>No hay ejercicios en esta categoría.</p>";
            } else {
                // Agrupar ejercicios en bloques de 5
                for (let i = 0; i < ejercicios.length; i += 5) {
                    let rutina = ejercicios.slice(i, i + 5);
                    let rutinaId = `rutina-${numRutina}`;

                    rutinasHTML += `
                        <div class="rutina">
                            <div class="card-container">
                                ${rutina.map(e => `
                                    <div class="card">
                                        <a href="{{ url('/detalles') }}/${e.id}">
                                            <img src="${e.image_url}" alt="${e.name}">
                                            <h2>${e.name}</h2>
                                        </a>
                                    </div>
                                `).join("")}
                            </div>
                            <div class="go">
                                <a href="{{ route('reproRutina') }}?rutina_id=${numRutina}&ejercicios=${rutina.map(e => e.id).join(',')}">
                                    <button class="boton-fijo">Comenzar Rutina</button>
                                </a>
                            </div>
                            
                        </div>
                    `;
                    numRutina++;
                }
            }

            document.getElementById("contenido-rutinas").innerHTML = rutinasHTML;
        })
        .catch(error => {
            console.error("Error al cargar los ejercicios:", error);
            document.getElementById("contenido-rutinas").innerHTML = "<p>Error al cargar los datos</p>";
        });
});
</script>

</body>
</html>
