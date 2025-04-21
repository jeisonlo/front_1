<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención Profesional</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Consulta_Usuario/ConsultaUsuario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
  </head>
  <body>
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')

    
    <main>
    <div class="container">
        <h2>Videollamada con tu Psicólogo</h2>
        <div class="video-container">
            <video id="videoLocal" autoplay></video>
            <video id="videoRemoto" autoplay></video>
        </div>
        <div class="controls">
            <button id="startCall">Iniciar llamada</button>
            <button id="endCall">Finalizar llamada</button>
        </div>
    </div>

    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <h3>Escribe tu reseña</h3>
            <textarea id="reviewText"></textarea>
            <button id="submitReview">Enviar</button>
        </div>
    </div>
    </main>
    <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
    
    
    <script>
        // 1. Submenú desplegable con JavaScript
        const serviciosBtn = document.getElementById('servicios-btn');
        const submenu = document.getElementById('submenu');

        serviciosBtn.addEventListener('click', function() {
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        });

        // 2. Validación de imagen de usuario
        const imgUsuario = document.getElementById('imagen-usuario');
        imgUsuario.onerror = function() {
            imgUsuario.src = 'imagenes/default-user.png'; // Imagen de reemplazo
        };

        // 3. Botones de control de videollamada
        let audioEnabled = true;
        let videoEnabled = true;

        const toggleAudio = document.getElementById('toggle-audio');
        const toggleVideo = document.getElementById('toggle-video');

        toggleAudio.addEventListener('click', function() {
            audioEnabled = !audioEnabled;
            toggleAudio.innerHTML = audioEnabled 
                ? '<img src="imagenes/audio.png" alt="Audio">'
                : '<img src="imagenes/mute.png" alt="Audio Mute">';
        });

        toggleVideo.addEventListener('click', function() {
            videoEnabled = !videoEnabled;
            toggleVideo.innerHTML = videoEnabled 
                ? '<img src="imagenes/video.jpg" alt="Video">'
                : '<img src="imagenes/no-video.png" alt="Video Off">';
        });

        // 4. Simulación de chat
        const sendChatBtn = document.getElementById('send-chat');
        const chatInput = document.getElementById('chat-input');
        const chatBox = document.getElementById('chat-box');

        sendChatBtn.addEventListener('click', function() {
            const message = chatInput.value;
            if (message.trim() !== '') {
                const newMessage = document.createElement('p');
                newMessage.textContent = `Tú: ${message}`;
                chatBox.appendChild(newMessage);
                chatInput.value = ''; // Limpiar el campo de entrada
                chatBox.scrollTop = chatBox.scrollHeight; // Desplazar al final del chat
            }
        });
    </script>
    <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
    <script src="{{ asset('js/atencion-profesional/USUARIO/Consulta_Usuario/script.js') }}"></script>
</body>
</html>
