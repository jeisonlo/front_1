<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <!-- Estilos -->
  <link rel="stylesheet" href="{{ asset('css/musicoterapia.css/Header/style copy.css') }}">
  <link rel="stylesheet" href="{{ asset('css/musicoterapia.css/MIS_CREACIONES/style.css') }}">

   <style>
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



/* Contenido del body */

.imag {
  width: 100%;
  max-width: 24.5625rem; /* 393px -> 24.5625rem */
  height: auto;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  z-index: 2;
}

.imag:hover {
  cursor: pointer;
  transform: translateY(-0.625rem); /* 10px -> 0.625rem */
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2); /* 8px 16px -> 0.5rem 1rem */
}

.img {
  margin: 1.25rem; /* 20px -> 1.25rem */
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #59009A;
}

.imagen {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 70px;
}


.sidebar {
  width: 385px;
  background-color: #d2b7fecc;
  padding: 20px;
  transition: width 0.0s ease;
  margin-right: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-bottom: 20px;

}

  /* Modified for smoother transition */

.sidebar .menu-item {
  padding: 10px; /* Ajustado de 12px a 10px */
  margin: 8px 0; /* Reducido de 15px a 8px */
  background: #fff;
  border-radius: 15px;
  align-items: center;
  transition: background 0.3s ease, transform 0.3s ease;
  cursor: pointer;
}
.sidebar .menu-item.active,
.sidebar .menu-item:hover {
  background:  #ba7fe7;;

  transform: scale(1.05);
}

.sidebar .menu-item img {
  width: 24px;
  height: 24px;
  margin-right: 10px;
}

.sidebar .menu-item a {
  display: flex;
  align-items: center;
  color: inherit;
  text-decoration: none;
  justify-content: center;
}

.sidebar .menu-item span {
  flex-grow: 1;
  text-align: center;
  font-size: 16px;
}



a {
  text-decoration: none;
}

.container {
  position: relative;
  display: flex;
  font-family: sans-serif;
  margin-top: 80px;
  margin-bottom: -80px;
  z-index: 2;
  
}

.part1 {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.part2 {
  margin-bottom: 60px; /* 60px -> 3.75rem */
}



/* Estilos Globales */


  /* no poner nada, daña el todo, llamas a body y afecta a todos los body */

/* Header */




@media (max-width: 768px) {

  .imagen{
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .part1{
    margin-left: 20px;
    width: 100%;
    align-items: center;
  }

  /* Ajustes adicionales para el contenido dentro del container */
  .cal, .datepicker, .historial {
    width: 100%; /* Asegura que los elementos ocupen el 100% del ancho del contenedor */
    margin-right: 0;
  }
  .cal{
    flex-direction: column;
  }
}

.marca-agua::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('/rutinas-de-ejercicios/includes/woman-digital-disconnecting-home-by-doing-yoga.jpg'); /* Cambia la URL por tu imagen */
  background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
  background-repeat: no-repeat;
  background-position: center;
  opacity: 0.5; /* Ajusta la transparencia de la marca de agua */
  z-index: 1;
}
/* ... [previous styles remain the same] ... */

.container {
    position: relative;
    display: flex;
    font-family: sans-serif;
    margin-top: 80px;
    margin-bottom: -80px;
    z-index: 2;
}

/* New styles for main content */
.contenido-principal {
    flex: 1;
    margin: 20px;
    padding: 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(89, 0, 154, 0.1);
}

.grid-creaciones {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.tarjeta-creacion {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.tarjeta-creacion:hover {
    transform: translateY(-5px);
}

.video-preview {
    width: 100%;
    height: 180px;
    background: #f0f0f0;
    position: relative;
}

.video-info {
    padding: 15px;
}

.video-title {
    font-size: 18px;
    color: #59009A;
    margin-bottom: 8px;
}

.video-meta {
    font-size: 14px;
    color: #666;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.video-actions {
    display: flex;
    justify-content: space-between;
    padding: 10px 15px;
    border-top: 1px solid #eee;
}

.action-btn {
    padding: 8px 15px;
    border: none;
    border-radius: 20px;
    background: #ba7fe7;
    color: white;
    cursor: pointer;
    transition: background 0.3s ease;
}

.action-btn:hover {
    background: #59009A;
}

.filtros-creaciones {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    padding: 15px;
    background: #f8f8f8;
    border-radius: 10px;
}

.filtro-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 20px;
    background: #d2b7fe;
    color: #59009A;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filtro-btn.activo {
    background: #ba7fe7;
    color: white;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }
    
    .contenido-principal {
        margin: 20px 10px;
    }
    
    .grid-creaciones {
        grid-template-columns: 1fr;
    }
    
    .filtros-creaciones {
        flex-wrap: wrap;
        justify-content: center;
    }
}
.main-content {
    flex: 1;
    margin: 100px 20px 50px; /* Aumenté el margen inferior a 50px */
    padding: 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(89, 0, 154, 0.1);
    min-height: calc(100vh - 120px);
}

/* Existing styles for grid and cards */
.grid-creaciones {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.tarjeta-creacion {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.tarjeta-creacion:hover {
    transform: translateY(-5px);
}

/* Rest of your existing styles... */

@media (max-width: 768px) {
    .app-container {
        flex-direction: column;
    }
    .main-content {
        margin: 20px 10px;
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
            <br />
            <br />
            <br>
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

        <div class="main-content">
          <h2 style="color:#59009A; text-align: center; margin-bottom: 60px;">Mis Creaciones</h2>


            <div class="filtros-creaciones">
                <button class="filtro-btn activo">Todos</button>
                <button class="filtro-btn">Podcasts</button>
                <button class="filtro-btn">Grabaciones</button>
                <button class="filtro-btn">Editados</button>
            </div>

            <div class="grid-creaciones">
                <div class="tarjeta-creacion">
                    <div class="video-preview">
                        </div>
                    <div class="video-info">
                        <h3 class="video-title">Mi Primer Podcast</h3>
                        <div class="video-meta">
                            <span>Duración: 15:30</span>
                            <span>Fecha: 15/02/2024</span>
                        </div>
                    </div>
                    <div class="video-actions">
                        <button class="action-btn">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="action-btn">
                            <i class="fas fa-share"></i> Compartir
                        </button>
                    </div>
                </div>

                <div class="tarjeta-creacion">
                    <div class="video-preview">
                        </div>
                    <div class="video-info">
                        <h3 class="video-title">Grabación de Voz</h3>
                        <div class="video-meta">
                            <span>Duración: 08:45</span>
                            <span>Fecha: 14/02/2024</span>
                        </div>
                    </div>
                    <div class="video-actions">
                        <button class="action-btn">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="action-btn">
                            <i class="fas fa-share"></i> Compartir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    <br>
    <br>
    <br>
    <br>
{{-- Footer --}}
@include('musicoterapia.Fotter.inicio.footer')

<!-- Script -->
<script src="{{ asset('js/musicoterapia.js/MIS _CREACIONES/scrip.js') }}"></script>
</body>
</html>