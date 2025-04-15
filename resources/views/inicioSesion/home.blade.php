<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tranquilidad y Bienestar</title>
    <link rel="stylesheet" href="{{ asset('css/inicioSesion/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .marca-agua::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('css/inicioSesion/imagenes/fondoooo.webp') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.5;
            z-index: -3;
        }
        
        /* Estilos para las cards de tips */
        .tips-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .tip-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .tip-card:hover {
            transform: translateY(-5px);
        }
        
        .tip-card h3 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        
        .tip-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        
        .tip-recommendation {
            color: #7f8c8d;
            font-size: 0.9rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 5px;
        }
        
        .pagination button {
            padding: 8px 15px;
            border: 1px solid #ddd;
            background: white;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .pagination button.active {
            background: #59009A;
            color: white;
            border-color: #59009A;
        }
        
        .pagination button:hover:not(.active) {
            background: #f1f1f1;
        }
        
        #scrollToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #59009A;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        #scrollToTop.show {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="marca-agua">
        <!-- Lugar donde se cargará el header -->
        @include('inicioSesion.layouts.header')
        <br>
        <br><br>

        <main class="main-content">
            <div class="container mt-5">
                <!-- Carrusel -->
                <main class="body">
                    <div id="carouselExampleIndicators" class="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('css/inicioSesion/imagenes/atardecer.jpg') }}" alt="Imagen1" class="carousel-image">
                            </div>
                            <div class="carousel-item active">
                                <img src="{{ asset('css/inicioSesion/imagenes/atardecer2.jpg') }}" alt="Imagen2" class="carousel-image">
                            </div>
                            <div class="carousel-item active">
                                <img src="{{ asset('css/inicioSesion/imagenes/atardecer3.jpg') }}" alt="Imagen3" class="carousel-image">
                            </div>
                        </div>
                        <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
                        <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
                    </div>
                </main>

                <!-- Frases y Tips -->
                <div class="tips">
                    <p id="motivational-quote">"La tranquilidad es el camino hacia la paz interior."</p>
                </div>

                <!-- Título del apartado de Tips -->
                <h1 id="modulosTitle">Tips</h1>

                <!-- Tips y Recomendaciones -->
                <div id="tips-container" class="tips-container">
                    <!-- Las tarjetas de tips se generarán dinámicamente aquí -->
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="mt-2">Cargando tips...</p>
                    </div>
                </div>

                <!-- Paginación -->
                <div class="pagination" id="pagination-container">
                    <!-- La paginación se generará dinámicamente -->
                </div>

                <!-- Título de Módulos -->
                <h2 class="text-center mt-5 mb-4" id="modulosTitle">Módulos</h2>

                <!-- Tarjetas principales -->
                <div class="main-card-container">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card text-center" onclick="window.location.href='/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html';">
                                <div class="card-body">
                                    <h5 class="card-title">Atención Profesional</h5>
                                    <img src="{{ asset('css/inicioSesion/imagenes/imagen3.jpg') }}" alt="">
                                    <p class="card-text">Recibe apoyo de expertos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center" onclick="window.location.href='/mapa-de-suenos/Inicio/Inicio.html';">
                                <div class="card-body">
                                    <h5 class="card-title">Mapa de Sueños</h5>
                                    <img src="{{ asset('css/inicioSesion/imagenes/imagen2.jpg') }}" alt="">
                                    <p class="card-text">Visualiza tus metas y sueños.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center" onclick="window.location.href='/musicoterapia/Vistas1.1/bienvenido_a_musicoterapia.html';">
                                <div class="card-body">
                                    <h5 class="card-title">Musicoterapia</h5>
                                    <img src="{{ asset('css/inicioSesion/imagenes/imagen1.jpg') }}" alt="">
                                    <p class="card-text">La música como herramienta de sanación.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón Ver Más centrado -->
                    <div class="ver-mas-container text-center">
                        <button class="btn-ver-mas" onclick="mostrarModulos()">Ver Más</button>
                    </div>

                    <!-- Módulos ocultos al inicio con animación de aparición -->
                    <div id="modulos-extras" class="modulos-ocultos animate-fade-in">
                        <div class="row mt-4">
                            <!-- Módulo de Alimentación -->
                            <div class="col-md-6">
                                <div class="card text-center" onclick="window.location.href='/alimentacion/Inicio/index.html';">
                                    <div class="card-body">
                                        <h5 class="card-title">Alimentación</h5>
                                        <img src="{{ asset('css/inicioSesion/imagenes/imagen4.jpg') }}" alt="Alimentación" class="img-fluid">
                                        <p class="card-text">Consejos de alimentación saludable.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Módulo de Ejercicios -->
                            <div class="col-md-6">
                                <div class="card text-center" onclick="window.location.href='/rutinas-de-ejercicios/inicio/index.html';">
                                    <div class="card-body">
                                        <h5 class="card-title">Ejercicios</h5>
                                        <img src="{{ asset('css/inicioSesion/imagenes/imagen5.jpg') }}" alt="Ejercicios" class="img-fluid">
                                        <p class="card-text">Rutinas de ejercicio recomendadas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flecha de scroll hacia arriba -->
                <div id="scrollToTop" onclick="scrollToTop()">
                    &#9650;
                </div>
            </div>
        </main>
    </div>

    <!-- Lugar donde se cargará el footer -->
    @include('inicioSesion.layouts.footer')

    <script>
        // URL de tu API backend
        const API_URL = 'https://back1-production-67bf.up.railway.app/api/tips'; // Ajusta según tu configuración
        
        // Variables de control
        let currentPage = 1;
        let isLoading = false;

        // Función para cargar tips desde la API
        async function loadTips(page = 1) {
            if (isLoading) return;
            isLoading = true;
            currentPage = page;
            
            try {
                // Mostrar loader
                document.getElementById('tips-container').innerHTML = `
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="mt-2">Cargando tips...</p>
                    </div>
                `;
                
                const response = await fetch(`${API_URL}?page=${page}`);
                
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                
                const data = await response.json();
                
                // Verificar si hay datos
                if (!data || !data.data || data.data.length === 0) {
                    throw new Error('No hay tips disponibles');
                }
                
                displayTips(data.data);
                updatePagination(data);
                
            } catch (error) {
                console.error('Error:', error);
                
                let errorMessage = 'Error al cargar los tips. Por favor, intenta nuevamente.';
                if (error.message.includes('Failed to fetch')) {
                    errorMessage = 'No se pudo conectar al servidor. Verifica tu conexión.';
                } else if (error.message.includes('No hay tips')) {
                    errorMessage = 'No hay tips disponibles en este momento.';
                }
                
                document.getElementById('tips-container').innerHTML = `
                    <div class="alert alert-danger">
                        ${errorMessage}
                        <button onclick="loadTips(${currentPage})" class="btn btn-sm btn-outline-danger ms-3">
                            Reintentar
                        </button>
                    </div>
                `;
            } finally {
                isLoading = false;
            }
        }

        // Función para mostrar los tips en el contenedor
        function displayTips(tips) {
            const container = document.getElementById('tips-container');
            
            if (!tips || tips.length === 0) {
                container.innerHTML = `
                    <div class="alert alert-info">
                        No hay tips disponibles actualmente.
                    </div>
                `;
                return;
            }
            
            container.innerHTML = tips.map(tip => `
                <div class="tip-card" onclick="viewTipDetail(${tip.id})">
                    <h3>${tip.title || 'Sin título'}</h3>
                    <img src="${tip.image_url || '{{ asset('css/inicioSesion/imagenes/default-tip.jpg') }}'}" 
                         alt="${tip.title || 'Tip'}" 
                         class="img-fluid"
                         onerror="this.src='{{ asset('css/inicioSesion/imagenes/default-tip.jpg') }}'">
                    <p class="tip-recommendation">${tip.recommendation || 'Descripción no disponible'}</p>
                    <button class="btn btn-sm btn-outline-primary">Ver más detalles</button>
                </div>
            `).join('');
        }

        // Función para redirigir a la vista de detalle
        function viewTipDetail(tipId) {
            const baseUrl = '{{ url("/tips") }}';
    // Y luego concatena el ID con JavaScript
    window.location.href = `${baseUrl}/${tipId}`;
}

        // Función para actualizar la paginación
        function updatePagination(data) {
            const paginationContainer = document.getElementById('pagination-container');
            paginationContainer.innerHTML = '';
            
            // Botón Anterior
            if (data.prev_page_url) {
                paginationContainer.innerHTML += `
                    <button onclick="loadTips(${data.current_page - 1})">&laquo; Anterior</button>
                `;
            }
            
            // Botones de página
            for (let i = 1; i <= data.last_page; i++) {
                paginationContainer.innerHTML += `
                    <button class="${i === data.current_page ? 'active' : ''}" 
                            onclick="loadTips(${i})">
                        ${i}
                    </button>
                `;
            }
            
            // Botón Siguiente
            if (data.next_page_url) {
                paginationContainer.innerHTML += `
                    <button onclick="loadTips(${data.current_page + 1})">Siguiente &raquo;</button>
                `;
            }
        }

        // Función para hacer scroll hasta el carrusel
        function scrollToTop() {
            const carousel = document.getElementById("carouselExampleIndicators");
            carousel.scrollIntoView({ behavior: "smooth" });
        }
        
        // Frases motivacionales
        const quotes = [
            "La tranquilidad es el camino hacia la paz interior.",
            "Respira profundamente y encuentra tu centro.",
            "Cada día es una nueva oportunidad para encontrar la paz."
        ];
        
        let currentQuote = 0;
        setInterval(() => {
            currentQuote = (currentQuote + 1) % quotes.length;
            document.getElementById('motivational-quote').innerText = quotes[currentQuote];
        }, 5000);
        
        // Función para mostrar módulos adicionales
        function mostrarModulos() {
            const modulos = document.getElementById("modulos-extras");
            const botonVerMas = document.querySelector(".btn-ver-mas");
            
            modulos.style.display = "block";
            botonVerMas.style.display = "none";
            modulos.classList.add("animate-fade-in");
        }
        
        // Mostrar u ocultar la flecha según la posición de scroll
        window.onscroll = function() {
            const scrollToTopBtn = document.getElementById("scrollToTop");
            if (window.scrollY > 200) {
                scrollToTopBtn.classList.add("show");
            } else {
                scrollToTopBtn.classList.remove("show");
            }
        };
        
        // Funciones del carrusel
        function prevSlide() {
            // Implementa la lógica para el carrusel si es necesario
        }
        
        function nextSlide() {
            // Implementa la lógica para el carrusel si es necesario
        }
        
        // Cargar tips al iniciar la página
        document.addEventListener('DOMContentLoaded', () => {
            loadTips();
        });
    </script>
</body>
</html>