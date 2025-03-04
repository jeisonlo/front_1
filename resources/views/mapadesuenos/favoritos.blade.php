<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mapa de Sueños - Favoritos</title>
    <style>

  
/* Estilos generales */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7f9;
    color: #333;
    background-image: url('/image/Mapadesueños/libros.jpg'); /* Ruta corregida */
    background-size: cover; /* Para que la imagen cubra todo el fondo */
    background-position: center; /* Para centrar la imagen */
    background-attachment: fixed; /* Para que el fondo se quede fijo al hacer scroll */
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}
h1 {
  font-size: 1.5em;
  font-weight: bold;
  text-transform: uppercase; /* Asegura que el texto esté en mayúsculas */
  color: #59009a;
  margin-bottom: 30px;
  margin-top: 50px;
  background: linear-gradient(45deg, #59009a, #e74c3c);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-fill-color: transparent;
  text-align: center;
  font-size: 32px;
}
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.377); /* Capa superpuesta con transparencia (ajusta la opacidad según sea necesario) */  z-index: -1; /* Asegura que esta capa quede detrás del contenido */
    z-index: -1;
}

.main {
    padding: 2rem;
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
    flex: 1; /* Hace que el contenido principal crezca y empuje el footer hacia abajo */
}

/* Título principal */
.favorites-container h1 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: #3a3a3a;
    font-weight: normal;
}

/* Grid de libros - Modificado para ajustar el ancho de las tarjetas */
.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Reducido de 250px a 200px */
    gap: 1.5rem; /* Reducido ligeramente el espacio entre tarjetas */
    margin-top: 2rem;
}

/* Tarjeta de libro */
.book-card {
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    padding: 1rem;
    text-align: center;
    display: flex;
    flex-direction: column;
    height: auto; /* Altura automática basada en contenido */
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

/* Contenedor del libro para mantener proporciones */
.book {
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* Portada del libro - Modificado para respetar proporciones */
.book-cover {
    width: 100%;
    height: auto; /* Cambiado de altura fija a automática */
    max-height: 280px; /* Altura máxima para evitar que sean demasiado grandes */
    object-fit: contain; /* Cambiado de 'cover' a 'contain' para que la imagen se muestre completa */
    border-radius: 5px;
    margin-bottom: 1rem;
}

/* Información del libro */
.book-info {
    padding: 0.5rem;
    display: flex;
    flex-direction: column;
    flex-grow: 1; /* Para que ocupe el espacio disponible */
}

.book-info h2 {
    font-size: 1.1rem; /* Ligeramente más pequeño */
    margin: 0.5rem 0;
    color: #333;
    text-align: center;
    /* Limitar a 2 líneas para títulos largos */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.3;
}

/* Botón de corazón */
.book-actions {
    display: flex;
    justify-content: center;
    margin-top: auto; /* Push to bottom */
    padding-top: 0.5rem;
}

.remove-favorite {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #7e57c2;
    transition: transform 0.3s ease;
}

.remove-favorite:hover {
    transform: scale(1.2);
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 3rem;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.empty-state p {
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
}
.footer {
   
    margin-top: auto; /* Empuja el footer hacia la parte inferior */
}
.btn {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    background-color: #7e57c2;
    color: white;
    text-decoration: none;
    border-radius: 30px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn:hover {
    background-color: #6a48b0;
    transform: translateY(-2px);
}

/* Select para filtrar libros */
.select-container {
    margin-bottom: 2rem;
    grid-column: 1 / -1;
    text-align: center;
}

.libro-select {
    padding: 0.8rem 1.5rem;
    border: 1px solid #ddd;
    border-radius: 30px;
    background-color: white;
    font-size: 1rem;
    width: 300px;
    cursor: pointer;
    outline: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.libro-select:focus {
    border-color: #7e57c2;
    box-shadow: 0 0 0 2px rgba(126, 87, 194, 0.25);
}

/* Estilos para los estados de carga y error */
.loading, .error {
    text-align: center;
    padding: 2rem;
    grid-column: 1 / -1;
}

/* Responsive design */
@media (max-width: 768px) {
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 1rem;
    }
    
    .main {
        padding: 1rem;
    }
    
    .libro-select {
        width: 100%;
    }
}

/* Para pantallas más grandes, permitir más columnas */
@media (min-width: 1200px) {
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    }
}
    </style>
 
        

    
 
@include('mapadesuenos.plantillas.header')
<main class="main">
    <div class="favorites-container">
        <h1>Mis Libros Favoritos</h1>
        
        <div id="favorites-list" class="books-grid">
            <!-- Los favoritos se cargarán dinámicamente aquí -->
            <div class="loading">Cargando favoritos...</div>
        </div>
        
        <div id="empty-favorites" class="empty-state" style="display: none;">
            <p>No tienes libros favoritos todavía.</p>
            <a href="{{ route('categorias') }}" class="btn">Explorar libros</a>
        </div>
    </div>
</main>
@include('mapadesuenos.plantillas.footer')


<script>
document.addEventListener("DOMContentLoaded", function() {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";   
    const LIBRO_API_URL = "https://back1-production-67bf.up.railway.app/v1/api/libros";
    
    // ------------------ GET LIBRO ID FROM URL PARAMETERS ------------------
    const urlParams = new URLSearchParams(window.location.search);
    const LIBRO_ID = urlParams.get('id');
    
    // ------------------ GET SESSION ID FROM LOCAL STORAGE ------------------
    let sessionId = localStorage.getItem('favoritos_session_id');
    
    // ------------------ CARGAR FAVORITOS ------------------
    function cargarFavoritos() {
        fetch(`${FAVORITOS_API_URL}${sessionId ? `?session_id=${sessionId}` : ''}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('No se pudieron obtener los favoritos');
                }
                return response.json();
            })
            .then(data => {
                // Guardar el session_id para futuras peticiones
                if (data.session_id) {
                    sessionId = data.session_id;
                    localStorage.setItem('favoritos_session_id', sessionId);
                }
                
                const favoritesList = document.getElementById('favorites-list');
                const emptyState = document.getElementById('empty-favorites');
                
                // Limpiar la lista
                favoritesList.innerHTML = '';
                
                if (data.data && data.data.length > 0) {
                    // Tenemos favoritos
                    emptyState.style.display = 'none';
                    favoritesList.style.display = 'grid';
                    
                    // Crear un select si recibimos un ID en la URL
                    if (LIBRO_ID) {
                        const selectContainer = document.createElement('div');
                        selectContainer.className = 'select-container';
                        const select = document.createElement('select');
                        select.id = 'libroSelect';
                        select.className = 'libro-select';
                        
                        // Añadir opción "Ver todos"
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Ver todos mis favoritos';
                        select.appendChild(defaultOption);
                        
                        // Añadir los libros favoritos como opciones
                        data.data.forEach(favorito => {
                            const option = document.createElement('option');
                            option.value = favorito.libro_id;
                            
                            // Si el libro_id coincide con el de la URL, seleccionarlo
                            if (favorito.libro_id == LIBRO_ID) {
                                option.selected = true;
                            }
                            
                            // Cargar los detalles del libro para mostrar el título
                            fetch(`${LIBRO_API_URL}/${favorito.libro_id}`)
                                .then(response => response.json())
                                .then(libro => {
                                    option.textContent = libro.titulo;
                                })
                                .catch(error => {
                                    console.error('Error al cargar libro:', error);
                                    option.textContent = `Libro #${favorito.libro_id}`;
                                });
                                
                            select.appendChild(option);
                        });
                        
                        // Event listener para cambios en el select
                        select.addEventListener('change', function() {
                            const selectedId = this.value;
                            if (selectedId) {
                                // Redireccionar a la misma página con el nuevo ID
                                window.location.href = `/mapadesuenos/favoritos?id=${selectedId}`;
                            } else {
                                // Ver todos
                                window.location.href = '/mapadesuenos/favoritos';
                            }
                        });
                        
                        selectContainer.appendChild(select);
                        favoritesList.appendChild(selectContainer);
                    }
                    
                    // Filtrar por ID si se especifica
                    const favoritosToShow = LIBRO_ID 
                        ? data.data.filter(f => f.libro_id == LIBRO_ID)
                        : data.data;
                    
                    // Mostrar los libros favoritos
                    favoritosToShow.forEach(favorito => {
                        const libroId = favorito.libro_id;
                        
                        // Cargar detalles del libro
                        fetch(`${LIBRO_API_URL}/${libroId}`)
                            .then(response => response.json())
                            .then(libro => {
                                const bookCard = document.createElement('div');
                                bookCard.className = 'book-card';
                                bookCard.dataset.id = libroId;
                                
                                bookCard.innerHTML = `
                                    <div class="book">
                                        <img src="${libro.portada_url || 'https://via.placeholder.com/360x360?text=Sin+Portada'}" 
                                             alt="${libro.titulo}" class="book-cover">
                                        <div class="book-info">
                                            <h2>${libro.titulo}</h2>
                                         
                                          
                                            <div class="book-actions">
                                                
                                                <button class="remove-favorite" data-id="${libroId}">
                                                    <span>💜</span> 
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                
                                // Event listener para eliminar de favoritos
                                bookCard.querySelector('.remove-favorite').addEventListener('click', function() {
                                    const id = this.dataset.id;
                                    quitarDeFavoritos(id);
                                });
                                
                                favoritesList.appendChild(bookCard);
                            })
                            .catch(error => {
                                console.error('Error al cargar libro:', error);
                            });
                    });
                    
                } else {
                    // No hay favoritos
                    emptyState.style.display = 'block';
                    favoritesList.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error al cargar favoritos:', error);
                document.getElementById('favorites-list').innerHTML = 
                    '<div class="error">Error al cargar favoritos. Intente nuevamente.</div>';
            });
    }
    
    // ------------------ AÑADIR A FAVORITOS ------------------
    function agregarAFavoritos(libroId) {
        fetch(FAVORITOS_API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                libro_id: libroId,
                session_id: sessionId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Actualizar session_id si es necesario
                if (data.session_id) {
                    sessionId = data.session_id;
                    localStorage.setItem('favoritos_session_id', sessionId);
                }
                
                // Recargar favoritos
                cargarFavoritos();
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
        });
    }
    
    // ------------------ QUITAR DE FAVORITOS ------------------
    function quitarDeFavoritos(libroId) {
        fetch(`${FAVORITOS_API_URL}/${libroId}?session_id=${sessionId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Recargar favoritos
                cargarFavoritos();
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
        });
    }
    
    // ------------------ PROCESAR LIBRO_ID DE LA URL ------------------
    if (LIBRO_ID) {
        // Si recibimos un ID en la URL, verificar si ya está en favoritos
        fetch(`${FAVORITOS_API_URL}/check/${LIBRO_ID}?session_id=${sessionId}`)
            .then(response => response.json())
            .then(data => {
                if (!data.isFavorite) {
                    // Si no está en favoritos, añadirlo
                    agregarAFavoritos(LIBRO_ID);
                } else {
                    // Ya está en favoritos, solo cargar la lista
                    cargarFavoritos();
                }
            })
            .catch(error => {
                console.error('Error al verificar favorito:', error);
                // Cargar favoritos de todos modos
                cargarFavoritos();
            });
    } else {
        // Si no hay ID en la URL, simplemente cargar todos los favoritos
        cargarFavoritos();
    }
});
</script>