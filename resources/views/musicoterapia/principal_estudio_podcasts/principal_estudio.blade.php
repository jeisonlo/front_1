<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <!-- Estilos -->
  <link rel="stylesheet" href="{{ asset('css/musicoterapia.css/Header/style copy.css') }}">
  <link rel="stylesheet" href="{{ asset('css/musicoterapia.css/PRINCIPAL_ESTUDIO PODCASTS/style.css') }}">
    <style>
        /* Estilos originales */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: sans-serif;
            padding: 0;
            width: 100%;
            left: 0%;
        }

        .container {
            position: relative;
            display: flex;
            font-family: sans-serif;
            margin-top: 80px;
            margin-bottom: -80px;
            z-index: 2;
        }

        .sidebar {
            width: 380px;
            background-color: #d2b7fecc;
            padding: 20px;
            transition: width 0.0s ease;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-bottom: 20px;
        }

        /* Estilos del menú lateral original */
        .sidebar .menu-item {
            padding: 10px;
            margin: 8px 0;
            background: #fff;
            border-radius: 15px;
            align-items: center;
            transition: background 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .sidebar .menu-item.active,
        .sidebar .menu-item:hover {
            background: #ba7fe7;
            transform: scale(1.05);
        }

        /* Nuevos estilos para el estudio de podcast */
        main.podcast-content {
            flex: 1;
            margin: 80px 20px 50px;
            /* Aumenté el margen inferior a 50px */
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(89, 0, 154, 0.1);
        }


        .podcast-studio {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Estilos de las pestañas */
        .podcast-tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            padding: 10px 0;
            border-bottom: 2px solid #ba7fe7;
        }

        .podcast-tab {
            padding: 12px 24px;
            border: none;
            border-radius: 15px;
            background: #f0f0f0;
            color: #59009A;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .podcast-tab.active {
            background: #ba7fe7;
            color: white;
            transform: translateY(-5px);
        }

        .podcast-tab:hover {
            background: #d2b7fe;
            color: #59009A;
        }

        /* Contenido de las pestañas */
        .tab-content {
            display: none;
            padding: 20px;
            background: #f8f8f8;
            border-radius: 15px;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        /* Controles de grabación */
        .recording-controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .control-btn {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            background: #ba7fe7;
            color: white;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .control-btn:hover {
            background: #59009A;
            transform: translateY(-2px);
        }

        /* Previsualizador de video */
        .video-preview {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background: #000;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Editor de audio */
        .audio-editor {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .waveform {
            width: 100%;
            height: 150px;
            background: #f0f0f0;
            border-radius: 10px;
            margin: 20px 0;
            position: relative;
        }

        .editor-controls {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        /* Biblioteca de grabaciones */
        .recordings-list {
            display: grid;
            gap: 15px;
        }

        .recording-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .recording-item:hover {
            transform: translateY(-2px);
        }

        .recording-info {
            flex: 1;
        }

        .recording-actions {
            display: flex;
            gap: 10px;
        }

        /* Animaciones */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                max-width: 450px;
                margin: 150px auto 20px;
                padding: 15px;
                border-radius: 25px;
                border: 2px solid #59009A;
            }

            main.podcast-content {
                margin: 10px;
                padding: 15px;
            }

            .podcast-tabs {
                flex-wrap: wrap;
            }

            .podcast-tab {
                padding: 8px 16px;
                font-size: 14px;
            }

            .recording-controls {
                flex-direction: column;
            }

            .editor-controls {
                grid-template-columns: 1fr;
            }
        }

        /* Utilidades */
        .text-primary {
            color: #59009A;
        }

        .bg-primary {
            background-color: #59009A;
        }

        .text-secondary {
            color: #ba7fe7;
        }

        .bg-secondary {
            background-color: #ba7fe7;
        }

        /* Media queries para responsive */
        @media (max-width: 768px) {

            .recording-controls,
            .primary-controls,
            .secondary-controls {
                justify-content: center;
            }

            .effects-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .audio-editor {
                padding: 10px;
            }

            h3,
            h4 {
                font-size: 18px;
            }

            .current-recording-info {
                font-size: 14px;
            }

            .recording-controls {
                flex-direction: column;
                width: 100%;
            }

            .recording-controls .control-btn {
                width: 100%;
            }

            .primary-controls,
            .secondary-controls {
                flex-direction: column;
                width: 100%;
            }

            .primary-controls .control-btn,
            .secondary-controls .control-btn {
                width: 100%;
            }

            .effects-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .category-options {
                flex-direction: column;
                gap: 10px;
            }

            .input-group {
                flex-direction: column;
            }

            .input-group input,
            .input-group button {
                width: 100%;
            }

            /* Ajustar textos para botones en móvil */
            .btn-text {
                display: none;
            }

            .control-btn {
                padding: 10px;
            }

            .control-btn i {
                font-size: 1.2em;
            }

            /* Hacer visible el texto en botones específicos */
            .save-btn .btn-text,
            .publish-btn .btn-text {
                display: inline;
            }
        }


        /* Estilos base */
        .audio-editor {
            font-family: Arial, sans-serif;
            padding: 15px;
            max-width: 100%;
        }

        .text-primary {
            color: #59009A;
            margin-bottom: 15px;
        }

        .current-recording-info {
            margin-bottom: 15px;
            font-size: 16px;
            color: #59009A;
        }

        /* Controles de grabación */
        .recording-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        /* Contenedor del reproductor de audio */
        .audio-player-container {
            margin-bottom: 15px;
        }

        .audio-player-container audio {
            width: 100%;
        }



        #visualizer-canvas {
            width: 100%;
            height: 150px;
        }

        /* Controles del editor */
        .editor-controls {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .primary-controls,
        .secondary-controls {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .control-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }



        .save-btn:hover {
            background: #4a0080;
        }

        /* Sección de efectos */
        .effects-section {
            margin-top: 30px;
        }

        .effects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }

        /* Sección de publicación */


        .small-title span {
            font-size: 18px;
            color: #59009A;
            font-weight: bold;
        }

        #publish-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 15px;
        }

        .category-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .category-options label {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .input-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .input-group input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1;
        }

        .publish-btn {
            background: #59009A;
            color: white;
            white-space: nowrap;
        }

        .publish-btn:hover {
            background: #4a0080;
        }

        /* Media queries para responsive */
        @media (max-width: 768px) {

            .recording-controls,
            .primary-controls,
            .secondary-controls {
                justify-content: center;
            }

            .effects-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .audio-editor {
                padding: 10px;
            }

            h3,
            h4 {
                font-size: 18px;
            }

            .current-recording-info {
                font-size: 14px;
            }

            .recording-controls {
                flex-direction: column;
                width: 100%;
            }

            .recording-controls .control-btn {
                width: 100%;
            }

            .primary-controls,
            .secondary-controls {
                flex-direction: column;
                width: 100%;
            }

            .primary-controls .control-btn,
            .secondary-controls .control-btn {
                width: 100%;
            }

            .effects-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .category-options {
                flex-direction: column;
                gap: 10px;
            }

            .input-group {
                flex-direction: column;
            }

            .input-group input,
            .input-group button {
                width: 100%;
            }

            /* Ajustar textos para botones en móvil */
            .btn-text {
                display: none;
            }

            .control-btn {
                padding: 10px;
            }

            .control-btn i {
                font-size: 1.2em;
            }

            /* Hacer visible el texto en botones específicos */
            .save-btn .btn-text,
            .publish-btn .btn-text {
                display: inline;
            }
        }
    </style>
 <style>
    body {
      background-image: 
        linear-gradient(rgba(240, 230, 255, 0.85), rgba(240, 230, 255, 0.85)), 
        url('{{ asset('image/images/fondo_principal 2 abastrato.png') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
    }
  </style>

    <title>tranquilidad</title>
    <script>
        async function includeHTML() {
            const elements = document.querySelectorAll('[include-html]');
            for (let el of elements) {
                const file = el.getAttribute('include-html');
                try {
                    const response = await fetch(file);
                    if (response.ok) {
                        el.innerHTML = await response.text();
                        // Cargar el JS del footer después de insertarlo
                        if (file.includes("header.html")) {
                            const script = document.createElement("script");
                            script.src = "/rutinas-de-ejercicios/includes/Header/script.js";
                            document.body.appendChild(script);
                        }
                    } else {
                        el.innerHTML = "<p>Error al cargar el contenido.</p>";
                    }
                } catch (error) {
                    el.innerHTML = "<p>Error de conexión al cargar el contenido.</p>";
                }
            }
        }
        document.addEventListener("DOMContentLoaded", includeHTML);
    </script>


</head>

<body>
    {{-- Header --}}
    @include('musicoterapia.Header.header')


    <div class="container">
        <aside class="sidebar">
            <br /><br /><br>
            <div class="menu-item {{ request()->routeIs('generos') ? 'active' : '' }}">
                <a href="{{ route('generos') }}">
                  <img src="{{ asset('image/images/genero.png') }}" alt="Icon" />
                  <span>Géneros</span>
                </a>
              </div>
            <div class="menu-item {{ request()->routeIs('album') ? 'active' : '' }}">
                <a href="{{ route('album') }}">
                  <img src="{{ asset('image/images/album.png') }}" alt="Icon" />
                  <span>Álbum</span>
                </a>
              </div>
              <div class="menu-item {{ request()->routeIs('podcast') ? 'active' : '' }}">
                <a href="{{ route('podcast') }}">
                  <img src="{{ asset('image/images/pod.png') }}" alt="Icon" />
                  <span>Podcast</span>
                </a>
              </div>
              <div class="menu-item {{ request()->routeIs('binaurales') ? 'active' : '' }}">
                <a href="{{ route('binaurales') }}">
                  <img src="{{ asset('image/images/binaural.png') }}" alt="Icon" />
                  <span>Sonidos Binaurales</span>
                </a>
              </div>
              <div class="menu-item {{ request()->routeIs('playlist') ? 'active' : '' }}">
                <a href="{{ route('playlist') }}">
                  <img src="{{ asset('image/images/playL.png') }}" alt="Icon" />
                  <span>PlayList</span>
                </a>
              </div>
              <div class="menu-item {{ request()->routeIs('me-gusta') ? 'active' : '' }}">
                <a href="{{ route('me-gusta') }}">
                  <img src="{{ asset('image/images/like.png') }}" alt="Icon" />
                  <span>Me gusta</span>
                </a>
              </div>
              <div class="menu-item {{ request()->routeIs('buscar') ? 'active' : '' }}">
                <a href="{{ route('buscar') }}">
                  <img src="{{ asset('image/images/buscar boton.png') }}" alt="Icon" />
                  <span>Buscar</span>
                </a>
              </div>
        </aside>
    
        <main class="podcast-content">
            <div class="podcast-studio">
                <h2 style="color: #59009A; text-align: center; margin-bottom: 20px;">Estudio de Podcast</h2>
    
                <div class="podcast-tabs">
                    <button class="podcast-tab active" data-tab="record">
                        <i class="fas fa-microphone"></i> Grabar
                    </button>
                    <button class="podcast-tab" data-tab="edit">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                    <button class="podcast-tab" data-tab="library">
                        <i class="fas fa-folder"></i> Biblioteca
                    </button>
                </div>
    
                <div class="tab-content active" id="record-tab">
                    {{-- Aquí va el contenido de grabar --}}
                </div>
    
                <div class="tab-content" id="edit-tab">
                    <div class="audio-editor">
                        <h3 class="text-primary">Editor de Audio</h3>
    
                        <div class="current-recording-info">
                            <span id="current-recording-name">Ninguna grabación seleccionada</span>
                        </div>
    
                        <div class="recording-controls">
                            <button class="control-btn" id="start-audio-recording">
                                <i class="fas fa-microphone"></i> <span class="btn-text">Iniciar Grabación</span>
                            </button>
                            <button class="control-btn" id="stop-audio-recording" disabled>
                                <i class="fas fa-stop"></i> <span class="btn-text">Detener</span>
                            </button>
                            <button class="control-btn" id="pause-audio-recording" disabled>
                                <i class="fas fa-pause"></i> <span class="btn-text">Pausar</span>
                            </button>
                        </div>
    
                        <div class="audio-player-container">
                            <audio id="audio-player" controls></audio>
                        </div>
    
                        <div class="waveform" id="waveform">
                            <canvas id="visualizer-canvas" width="800" height="150"></canvas>
                        </div>
    
                        <div class="editor-controls">
                            <div class="primary-controls">
                                <button class="control-btn" id="btn-play-pause">
                                    <i class="fas fa-play"></i> <span class="btn-text">Reproducir</span>
                                </button>
                                <button class="control-btn" id="btn-stop">
                                    <i class="fas fa-stop"></i> <span class="btn-text">Detener</span>
                                </button>
                            </div>
                            <div class="secondary-controls">
                                <button class="control-btn" id="btn-volume-up">
                                    <i class="fas fa-volume-up"></i> <span class="btn-text">Subir</span>
                                </button>
                                <button class="control-btn" id="btn-volume-down">
                                    <i class="fas fa-volume-down"></i> <span class="btn-text">Bajar</span>
                                </button>
                                <button class="control-btn save-btn" id="btn-save-changes">
                                    <i class="fas fa-save"></i> <span class="btn-text">Guardar</span>
                                </button>
                            </div>
                        </div>
    
                        <div class="effects-section">
                            <h4 class="text-primary">Efectos de sonido</h4>
                            <div class="effects-grid">
                                <button class="control-btn effect-btn" data-effect="reverb">Reverb</button>
                                <button class="control-btn effect-btn" data-effect="echo">Eco</button>
                                <button class="control-btn effect-btn" data-effect="compressor">Compresor</button>
                                <button class="control-btn effect-btn" data-effect="normalize">Normalizar</button>
                            </div>
                        </div>
    
                        <div class="publish-section">
                            <div class="title small-title">
                                <span>Elige Categoría</span>
                            </div>
    
                            <form id="publish-form">
                                <div class="category-options">
                                    <label>
                                        <input type="radio" name="category" value="atracciones">
                                        <span>Atracciones</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="category" value="motivacional">
                                        <span>Motivacional</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="category" value="autoestima">
                                        <span>Autoestima</span>
                                    </label>
                                </div>
    
                                <div class="input-group">
                                    <input type="text" placeholder="Nombre">
                                    <button type="button" id="btn-publish" class="control-btn publish-btn">
                                        <i class="fas fa-upload"></i> <span class="btn-text">Publicar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    
                <div class="tab-content" id="library-tab">
                    {{-- Aquí va el contenido de la pestaña biblioteca --}}
                </div>
            </div>
        </main>
    </div>
    
    <br><br><br><br>
    
    @include('musicoterapia.Fotter.inicio.footer')
    
    <script src="{{ asset('js/musicoterapia.js/PRINCIPAL ESTUDIO PODCASTS/script.js') }}"></script>
</body>

</html>