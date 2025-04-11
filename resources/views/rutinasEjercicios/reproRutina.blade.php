<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/reproRutina.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <title>Rutinas de Ejercicios</title>
  <style>
    /* Estilos para la ventana emergente */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    
    .modal-container {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
      width: 300px;
      text-align: center;
    }
    
    .modal-buttons {
      margin-top: 20px;
      display: flex;
      justify-content: space-around;
    }
    
    .modal-buttons button {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .btn-confirm {
      background-color: #dc3545;
      color: white;
    }
    
    .btn-cancel {
      background-color: #6c757d;
      color: white;
    }
    .marca-agua::before {
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
</head>
<body>
    @include('rutinasEjercicios.layouts.header')
    <div class="marca-agua">
    <div class="container">
        <div class="player-container">
            <div class="album-art">
                <video id="video" width="640" height="360" controls></video>
                <div class="playhead"></div>
            </div>

            <div class="actions">
                <button id="likeBtn" class="favorite" onclick="toggleLike()">🤍</button>
                <button id="optionsBtn">&#8942;</button>
            </div>
        
            <div id="optionsMenu" class="options-menu">
                <button class="menu-option" onclick="setPlaybackRate(0.5)">Velocidad 0.5x</button>
                <button class="menu-option" onclick="setPlaybackRate(1)">Velocidad 1x</button>
                <button class="menu-option" onclick="setPlaybackRate(1.5)">Velocidad 1.5x</button>
                <button class="menu-option" onclick="toggleSubtitles()">Subtítulos</button>
            </div>
        
            <div class="time-container">
                <span id="currentTime" class="time">0:00</span>
                <span id="duration" class="time">0:00</span>
            </div>

            <div class="progress-bar-container">
                <div class="progress-bar"></div>
                <div class="progress" id="progress"></div>
                <div class="progress-thumb" id="progressThumb"></div>
            </div>
        
            <div class="controls">
                <button id="prevBtn" onclick="prevVideo()">&#9664;&#9664;</button>
                <button id="playPauseBtn" onclick="togglePlayPause()">▶</button>
                <button id="nextBtn" onclick="nextVideo()">&#9654;&#9654;</button>
                <button id="fullscreenBtn">&#x26F6;</button> <!-- Botón de pantalla completa -->
            </div>
        </div>

        <!-- Sección de comentarios -->
        <div class="comentarios">
            <h3>Comentarios</h3>
            <form id="formComentario">
                <textarea id="comentarioInput" placeholder="Escribe tu comentario..." required></textarea>
                <button type="submit">Enviar</button>
            </form>
            <ul id="listaComentarios"></ul>
        </div>
    </div>

    <!-- Ventana emergente para confirmar eliminación -->
    <div id="modalConfirm" class="modal-overlay">
        <div class="modal-container">
            <h4>Confirmar eliminación</h4>
            <p>¿Estás seguro que deseas eliminar este comentario?</p>
            <div class="modal-buttons">
                <button id="cancelDelete" class="btn-cancel">Cancelar</button>
                <button id="confirmDelete" class="btn-confirm">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@include('rutinasEjercicios.layouts.footer')
<script>
    const API_URL = "https://back1-production-67bf.up.railway.app/v1/api"; 
    let videos = [];
    let currentVideoIndex = 0;
    let videoElement = document.getElementById("video");
    let likeBtn = document.getElementById("likeBtn");
    let listaComentarios = document.getElementById("listaComentarios");
    let modalConfirm = document.getElementById("modalConfirm");
    let currentCommentId = null;
    let currentCommentElement = null;

    document.addEventListener("DOMContentLoaded", function () {
        const params = new URLSearchParams(window.location.search);
        let ejerciciosIds = params.get("ejercicios");

        if (!ejerciciosIds) {
            alert("No se han recibido ejercicios.");
            return;
        }

        axios.get(`${API_URL}/exercisesByIds?ids=${ejerciciosIds}`)
            .then(response => {
                videos = response.data;
                if (videos.length === 0) {
                    alert("No se encontraron videos.");
                    return;
                }
                loadVideo(currentVideoIndex);
            })
            .catch(error => console.error("Error al cargar videos:", error));
            
        // Configurar eventos de la ventana modal
        document.getElementById("confirmDelete").addEventListener("click", function() {
            confirmarEliminacion();
        });
        
        document.getElementById("cancelDelete").addEventListener("click", function() {
            cerrarModal();
        });
    });

    function loadVideo(index) {
        if (videos[index]) {
            videoElement.src = videos[index].video_url;
            videoElement.load();
            checkLike(videos[index].id);
            cargarComentarios();
        }
    }

    function toggleLike() {
        let ejercicioId = videos[currentVideoIndex]?.id;
        if (!ejercicioId) return;

        if (likeBtn.innerHTML === "💜") {
            axios.delete(`${API_URL}/unlike/${ejercicioId}`)
                .then(() => likeBtn.innerHTML = "🤍")
                .catch(error => console.error("Error al quitar like:", error));
        } else {
            axios.post(`${API_URL}/like/${ejercicioId}`)
                .then(() => likeBtn.innerHTML = "💜")
                .catch(error => console.error("Error al dar like:", error));
        }
    }

    function checkLike(ejercicioId) {
        axios.get(`${API_URL}/liked-exercises`)
            .then(response => {
                let likedExercises = response.data;
                likeBtn.innerHTML = likedExercises.includes(ejercicioId) ? "💜" : "🤍";
            })
            .catch(error => console.error("Error al verificar like:", error));
    }

    function togglePlayPause() {
        if (videoElement.paused) {
            videoElement.play();
            document.getElementById("playPauseBtn").innerHTML = "⏸";
        } else {
            videoElement.pause();
            document.getElementById("playPauseBtn").innerHTML = "▶";
        }
    }

    function nextVideo() {
        if (currentVideoIndex < videos.length - 1) {
            currentVideoIndex++;
            loadVideo(currentVideoIndex);
        }
    }

    function prevVideo() {
        if (currentVideoIndex > 0) {
            currentVideoIndex--;
            loadVideo(currentVideoIndex);
        }
    }

    function cargarComentarios() {
        let ejercicioId = videos[currentVideoIndex]?.id;
        if (!ejercicioId) return;

        axios.get(`${API_URL}/comments/${ejercicioId}`)
            .then(response => {
                listaComentarios.innerHTML = "";
                response.data.forEach(comentario => {
                    crearComentario(comentario.texto, comentario.id, comentario.created_at, comentario.usuario);
                });
            })
            .catch(error => console.error("Error al cargar comentarios:", error));
    }

    function crearComentario(texto, id, fecha, usuario = "Usuario") {
        const comentario = document.createElement('li');
        comentario.classList.add('comentario-item');
        comentario.setAttribute('data-id', id);

        comentario.innerHTML = `
            <div class="comment-header">
                <span class="author">${usuario}</span> | <span class="date">${new Date(fecha).toLocaleString()}</span>
            </div>
            <div class="comment-body">${texto}</div>
            <div class="comment-actions">
                <button class="deleteBtn">Eliminar</button>
            </div>
        `;

        // Botón de "Eliminar"
        comentario.querySelector('.deleteBtn').addEventListener('click', () => {
            mostrarModal(id, comentario);
        });

        listaComentarios.appendChild(comentario);
    }
    
    function mostrarModal(id, comentarioElement) {
        currentCommentId = id;
        currentCommentElement = comentarioElement;
        modalConfirm.style.display = "flex";
    }
    
    function cerrarModal() {
        modalConfirm.style.display = "none";
    }
    
    function confirmarEliminacion() {
        if (currentCommentId) {
            axios.delete(`${API_URL}/comments/${currentCommentId}`)
                .then(() => {
                    currentCommentElement.remove();
                    cerrarModal();
                })
                .catch(error => console.error("Error al eliminar comentario:", error));
        }
    }

    document.getElementById("formComentario").addEventListener("submit", function(event) {
        event.preventDefault();

        let comentarioInput = document.getElementById("comentarioInput").value.trim();
        let ejercicioId = videos[currentVideoIndex]?.id; 

        if (!comentarioInput) {
            alert("El comentario no puede estar vacío.");
            return;
        }

        if (!ejercicioId) {
            console.error("Error: No se encontró un ID de ejercicio válido.");
            return;
        }

        axios.post(`${API_URL}/comments`, {
            exercise_id: ejercicioId,
            texto: comentarioInput
        })
        .then(response => {
            document.getElementById("comentarioInput").value = "";
            crearComentario(response.data.texto, response.data.id, response.data.created_at, response.data.usuario);
        })
        .catch(error => console.error("Error al enviar comentario:", error));
    });
    videoElement.addEventListener('timeupdate', () => {
    const progressPercent = (videoElement.currentTime / videoElement.duration) * 100;
    progress.style.width = `${progressPercent}%`;
    progressThumb.style.left = `${progressPercent}%`;
    currentTimeDisplay.textContent = formatTime(videoElement.currentTime);
    durationDisplay.textContent = formatTime(videoElement.duration);
});

function formatTime(seconds) {
    const min = Math.floor(seconds / 60);
    const sec = Math.floor(seconds % 60).toString().padStart(2, '0');
    return `${min}:${sec}`;
}

optionsButton.addEventListener('click', () => {
    optionsMenu.style.display = optionsMenu.style.display === 'none' ? 'block' : 'none';
});
</script>

</body>
</html>