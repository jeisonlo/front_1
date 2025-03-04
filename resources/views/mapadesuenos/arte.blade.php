<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros de Arte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }

        .book-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-cover {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .book-info {
            padding: 15px;
        }

        .book-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-top: 1px solid #eee;
        }

        .view-btn {
            background-color: #4a6bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .view-btn:hover {
            background-color: #3a56d4;
        }

        .fav-btn {
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #aaa;
            transition: color 0.3s ease;
        }

        .fav-btn.active {
            color: #8a2be2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Libros de Arte</h1>
        
        <div class="books-grid" id="books-container">
            <!-- Las tarjetas de libros se generarán dinámicamente con JavaScript -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cargar los libros de la categoría Arte
            cargarLibrosArte();

            // Función para cargar los libros de la categoría Arte
            function cargarLibrosArte() {
                // Aquí normalmente harías una llamada a tu API para obtener los libros
                // Para este ejemplo, usaremos datos estáticos simulados
                
                // Simula una llamada a la API para obtener libros de la categoría Arte
                setTimeout(() => {
                    const libros = [
                        {
                            id: 1,
                            titulo: 'Historia del Arte',
                            portada_url: 'https://via.placeholder.com/300x450?text=Historia+del+Arte',
                            esFavorito: false
                        },
                        {
                            id: 2,
                            titulo: 'Técnicas de Pintura',
                            portada_url: 'https://via.placeholder.com/300x450?text=Técnicas+de+Pintura',
                            esFavorito: true
                        },
                        {
                            id: 3,
                            titulo: 'Escultura Moderna',
                            portada_url: 'https://via.placeholder.com/300x450?text=Escultura+Moderna',
                            esFavorito: false
                        },
                        {
                            id: 4,
                            titulo: 'Arte Contemporáneo',
                            portada_url: 'https://via.placeholder.com/300x450?text=Arte+Contemporáneo',
                            esFavorito: false
                        }
                    ];
                    
                    renderizarLibros(libros);
                    comprobarEstadoFavoritos();
                }, 300);
            }
            
            // Función para renderizar los libros en la interfaz
            function renderizarLibros(libros) {
                const container = document.getElementById('books-container');
                container.innerHTML = '';
                
                libros.forEach(libro => {
                    const bookCard = document.createElement('div');
                    bookCard.className = 'book-card';
                    bookCard.dataset.id = libro.id;
                    
                    bookCard.innerHTML = `
                        <img src="${libro.portada_url || 'https://via.placeholder.com/300x450?text=Sin+Portada'}" alt="${libro.titulo}" class="book-cover">
                        <div class="book-info">
                            <h3 class="book-title">${libro.titulo}</h3>
                        </div>
                        <div class="card-footer">
                            <a href="arte-detalle.html?id=${libro.id}" class="view-btn">Ver detalles</a>
                            <button class="fav-btn ${libro.esFavorito ? 'active' : ''}" data-id="${libro.id}">
                                <i class="fa${libro.esFavorito ? 's' : 'r'} fa-heart"></i>
                            </button>
                        </div>
                    `;
                    
                    container.appendChild(bookCard);
                });
                
                // Agregar eventos a los botones de favorito
                document.querySelectorAll('.fav-btn').forEach(btn => {
                    btn.addEventListener('click', toggleFavorito);
                });
            }
            
            // Función para alternar el estado de favorito
            function toggleFavorito(e) {
                const btn = e.currentTarget;
                const libroId = btn.dataset.id;
                const iconHeart = btn.querySelector('i');
                
                // En una aplicación real, aquí enviarías una solicitud a tu API
                // Para este ejemplo, simplemente alternamos el estado
                if (btn.classList.contains('active')) {
                    // Quitar de favoritos
                    btn.classList.remove('active');
                    iconHeart.classList.remove('fas');
                    iconHeart.classList.add('far');
                    
                    // Simular llamada a la API para quitar de favoritos
                    console.log(`Libro ${libroId} quitado de favoritos`);
                } else {
                    // Agregar a favoritos
                    btn.classList.add('active');
                    iconHeart.classList.remove('far');
                    iconHeart.classList.add('fas');
                    
                    // Simular llamada a la API para agregar a favoritos
                    console.log(`Libro ${libroId} agregado a favoritos`);
                }
                
                // En una implementación real, enviarías algo como esto:
                /*
                fetch('/favoritos/toggle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        libro_id: libroId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'added') {
                        btn.classList.add('active');
                        iconHeart.classList.remove('far');
                        iconHeart.classList.add('fas');
                    } else {
                        btn.classList.remove('active');
                        iconHeart.classList.remove('fas');
                        iconHeart.classList.add('far');
                    }
                });
                */
            }
            
            // Función para comprobar el estado de favoritos
            function comprobarEstadoFavoritos() {
                // En una aplicación real, aquí consultarías a tu API para saber qué libros son favoritos
                // Para este ejemplo, ya lo tenemos en la estructura de datos inicial
                console.log('Estado de favoritos comprobado');
            }
        });
    </script>
</body>
</html>