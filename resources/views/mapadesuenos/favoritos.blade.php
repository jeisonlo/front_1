@include('mapadesuenos.plantillas.header')
<main class="main">
    <h1>Mis Libros Favoritos</h1>
    
    <div class="favorites-container" id="favorites-container">
        <!-- Favorites will be loaded here dynamically -->
        <p id="loading-message">Cargando favoritos...</p>
        <p id="no-favorites-message" style="display: none;">No tienes libros favoritos aún.</p>
    </div>
</main>
@include('mapadesuenos.plantillas.footer')

<style>
.favorites-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

.favorite-card {
    width: 200px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    position: relative;
}

.favorite-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.favorite-card h3 {
    padding: 10px;
    margin: 0;
    text-align: center;
    font-size: 16px;
}

.favorite-card .heart {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    text-shadow: 0 0 3px rgba(0,0,0,0.5);
}
</style>

<script>

document.addEventListener("DOMContentLoaded", function() {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    const LIBRO_API_URL = "https://api.codersfree.com/v1/api/libros";
    
    // ------------------ FUNCIONES PARA SESSION ID ------------------
    function getSessionId() {
        let sessionId = null;
        
        // Primero intentar obtener de localStorage
        try {
            sessionId = localStorage.getItem('favoritos_session_id');
        } catch (e) {
            console.warn('No se pudo acceder a localStorage:', e);
        }
        
        // Si no existe en localStorage, intentar obtenerlo de cookies
        if (!sessionId) {
            const cookies = document.cookie.split(';');
            for (let cookie of cookies) {
                const [name, value] = cookie.trim().split('=');
                if (name === 'favoritos_session_id') {
                    sessionId = value;
                    // Guardar en localStorage para futuros usos
                    try {
                        localStorage.setItem('favoritos_session_id', sessionId);
                    } catch (e) {
                        console.warn('No se pudo guardar en localStorage:', e);
                    }
                    break;
                }
            }
        }
        
        return sessionId;
    }

    function saveSessionId(sessionId) {
        if (!sessionId) return;
        
        try {
            localStorage.setItem('favoritos_session_id', sessionId);
        } catch (e) {
            console.warn('No se pudo guardar en localStorage:', e);
        }
        
        // También guardar en una cookie que pueda ser compartida
        const expirationDate = new Date();
        expirationDate.setMonth(expirationDate.getMonth() + 1); // Expira en 1 mes
        
        // Asegurarse que funcione en diferentes subdominios
        const domain = extractDomain(window.location.hostname);
        document.cookie = `favoritos_session_id=${sessionId}; expires=${expirationDate.toUTCString()}; path=/; SameSite=Lax; ${domain ? 'domain=.' + domain : ''}`;
    }
    
    // Función para extraer el dominio principal (example.com de subdomain.example.com)
    function extractDomain(hostname) {
        const parts = hostname.split('.');
        if (parts.length <= 2) return hostname; // ya es un dominio simple
        return parts.slice(parts.length - 2).join('.');
    }
    
    // ------------------ FUNCIÓN PARA MOSTRAR MENSAJES ------------------
    function mostrarMensaje(elemento, mensaje, tipo = 'success') {
        const confirmationMsg = document.createElement('div');
        confirmationMsg.className = `confirmation-msg ${tipo}`;
        confirmationMsg.textContent = mensaje;
        
        // Asegurarse de que el elemento padre tenga posición relativa
        if (elemento.parentNode) {
            const style = window.getComputedStyle(elemento.parentNode);
            if (style.position === 'static') {
                elemento.parentNode.style.position = 'relative';
            }
            elemento.parentNode.appendChild(confirmationMsg);
        } else {
            // Si no hay padre, añadir al propio elemento
            elemento.appendChild(confirmationMsg);
        }
        
        // Remover mensaje después de 2 segundos
        setTimeout(() => {
            confirmationMsg.remove();
        }, 2000);
    }
    
    // ------------------ FUNCIÓN PARA DEBUG ------------------
    function debugInfo(message) {
        console.log(`[DEBUG] ${message}`);
    }
    
    // ------------------ GET SESSION ID ------------------
    let sessionId = getSessionId();
    debugInfo(`Session ID inicial: ${sessionId}`);
    
    // ------------------ CARGAR FAVORITOS ------------------
    function cargarFavoritos() {
        const favoritesList = document.getElementById('favorites-list');
        const emptyState = document.getElementById('empty-favorites');
        
        if (!favoritesList) {
            console.error('No se encontró el contenedor de favoritos');
            return;
        }
        
        // Mostrar estado de carga
        favoritesList.innerHTML = '<div class="loading">Cargando favoritos...</div>';
        
        // Reobtenemos el sessionId por si ha cambiado
        sessionId = getSessionId();
        debugInfo(`Cargando favoritos con session_id: ${sessionId}`);
        
        fetch(`${FAVORITOS_API_URL}${sessionId ? `?session_id=${sessionId}` : ''}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`No se pudieron obtener los favoritos: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                debugInfo(`Datos de favoritos recibidos: ${JSON.stringify(data)}`);
                
                // Guardar el session_id para futuras peticiones
                if (data.session_id) {
                    saveSessionId(data.session_id);
                    sessionId = data.session_id;
                    debugInfo(`Nuevo session_id guardado: ${sessionId}`);
                }
                
                // Limpiar la lista
                favoritesList.innerHTML = '';
                
                if (data.data && data.data.length > 0) {
                    // Tenemos favoritos
                    emptyState.style.display = 'none';
                    favoritesList.style.display = 'grid';
                    
                    // Resto del código de cargarFavoritos...
                    // [Código original para mostrar favoritos]
                    
                    // Obtener parámetros de URL
                    const urlParams = new URLSearchParams(window.location.search);
                    const LIBRO_ID = urlParams.get('id');
                    
                    // Crear un select si hay más de un favorito
                    if (data.data.length > 1 || LIBRO_ID) {
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
                                .then(response => {
                                    if (!response.ok) throw new Error('Error al cargar libro');
                                    return response.json();
                                })
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
                                window.location.href = `${window.location.origin}/mapadesuenos/favoritos?id=${selectedId}`;
                            } else {
                                // Ver todos
                                window.location.href = `${window.location.origin}/mapadesuenos/favoritos`;
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
                            .then(response => {
                                if (!response.ok) throw new Error('Error al cargar libro');
                                return response.json();
                            })
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
                                    quitarDeFavoritos(id, this);
                                });
                                
                                favoritesList.appendChild(bookCard);
                            })
                            .catch(error => {
                                console.error('Error al cargar libro:', error);
                                // Crear una tarjeta de error para mostrar algo
                                const errorCard = document.createElement('div');
                                errorCard.className = 'book-card error-card';
                                errorCard.innerHTML = `
                                    <div class="book">
                                        <div class="book-info">
                                            <h2>Error al cargar libro #${libroId}</h2>
                                            <div class="book-actions">
                                                <button class="remove-favorite" data-id="${libroId}">
                                                    <span>💜</span> 
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                
                                // Event listener para eliminar de favoritos
                                errorCard.querySelector('.remove-favorite').addEventListener('click', function() {
                                    const id = this.dataset.id;
                                    quitarDeFavoritos(id, this);
                                });
                                
                                favoritesList.appendChild(errorCard);
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
                favoritesList.innerHTML = 
                    '<div class="error">Error al cargar favoritos. Intente nuevamente.</div>';
            });
    }
    
    // ------------------ AÑADIR A FAVORITOS ------------------
    function agregarAFavoritos(libroId, element) {
        // Reobtenemos el sessionId por si ha cambiado
        sessionId = getSessionId();
        debugInfo(`Agregando a favoritos libro ${libroId} con session_id: ${sessionId}`);
        
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
        .then(response => {
            if (!response.ok) {
                debugInfo(`Error en respuesta: ${response.status}`);
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            debugInfo(`Respuesta de agregar favorito: ${JSON.stringify(data)}`);
            
            if (data.status === 'success') {
                // Actualizar session_id si es necesario
                if (data.session_id) {
                    saveSessionId(data.session_id);
                    sessionId = data.session_id;
                    debugInfo(`Nuevo session_id guardado: ${sessionId}`);
                }
                
                // Si tenemos un elemento DOM, actualizar su UI
                if (element) {
                    // Actualizar UI
                    if (element.tagName === 'BUTTON') {
                        element.innerHTML = "<span>💜</span>";
                    } else {
                        element.innerHTML = "💜";
                    }
                    mostrarMensaje(element, '¡Añadido a favoritos!');
                }
                
                // Recargar favoritos
                setTimeout(() => cargarFavoritos(), 500);
            } else {
                throw new Error(data.message || 'Error desconocido');
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
            if (element) {
                mostrarMensaje(element, 'Error al añadir a favoritos', 'error');
            }
            
            // Alternativa directa en caso de error
            ofrecerAlternativaDirecta(libroId, element);
        });
    }
    
    function ofrecerAlternativaDirecta(libroId, element) {
        if (!element) return;
        
        // Añadir un enlace directo a la página de favoritos
        const directLink = document.createElement('a');
        directLink.href = `${window.location.origin}/mapadesuenos/favoritos?id=${libroId}`;
        directLink.className = 'direct-link';
        directLink.textContent = 'Ir directamente a favoritos';
        directLink.style.display = 'block';
        directLink.style.marginTop = '5px';
        directLink.style.color = '#7e57c2';
        directLink.style.textDecoration = 'underline';
        
        // Si el mensaje aún existe, añadir debajo, sino al padre del elemento
        const msgElement = element.parentNode.querySelector('.confirmation-msg');
        if (msgElement) {
            msgElement.parentNode.insertBefore(directLink, msgElement.nextSibling);
        } else {
            element.parentNode.appendChild(directLink);
        }
        
        // Eliminar después de 8 segundos
        setTimeout(() => {
            if (directLink.parentNode) {
                directLink.remove();
            }
        }, 8000);
    }
    
    // ------------------ QUITAR DE FAVORITOS ------------------
    function quitarDeFavoritos(libroId, element) {
        // Reobtenemos el sessionId por si ha cambiado
        sessionId = getSessionId();
        
        if (!sessionId) {
            console.error('No hay session_id disponible');
            if (element) {
                mostrarMensaje(element, 'Error: Sesión no disponible', 'error');
            }
            return;
        }
        
        debugInfo(`Quitando de favoritos libro ${libroId} con session_id: ${sessionId}`);
        
        fetch(`${FAVORITOS_API_URL}/${libroId}?session_id=${sessionId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Error en la respuesta del servidor');
            return response.json();
        })
        .then(data => {
            debugInfo(`Respuesta de quitar favorito: ${JSON.stringify(data)}`);
            
            if (data.status === 'success') {
                // Si tenemos un elemento DOM, actualizar su UI
                if (element) {
                    // Actualizar UI
                    if (element.tagName === 'BUTTON') {
                        element.innerHTML = "<span>🤍</span>";
                    } else {
                        element.innerHTML = "🤍";
                    }
                    mostrarMensaje(element, 'Eliminado de favoritos');
                }
                
                // Recargar favoritos
                setTimeout(() => cargarFavoritos(), 500);
            } else {
                throw new Error(data.message || 'Error desconocido');
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
            if (element) {
                mostrarMensaje(element, 'Error al eliminar de favoritos', 'error');
            }
        });
    }
    
    // ------------------ PROCESAR LIBRO_ID DE LA URL ------------------
    const urlParams = new URLSearchParams(window.location.search);
    const LIBRO_ID = urlParams.get('id');
    
    if (LIBRO_ID) {
        debugInfo(`ID del libro en URL: ${LIBRO_ID}`);
        
        // Si recibimos un ID en la URL, verificar si ya está en favoritos
        fetch(`${FAVORITOS_API_URL}/check/${LIBRO_ID}${sessionId ? `?session_id=${sessionId}` : ''}`)
            .then(response => {
                if (!response.ok) {
                    debugInfo(`Error al verificar favorito: ${response.status}`);
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                debugInfo(`Estado del favorito: ${JSON.stringify(data)}`);
                
                if (!data.isFavorite) {
                    // Si no está en favoritos, añadirlo
                    debugInfo('No está en favoritos, añadiendo...');
                    agregarAFavoritos(LIBRO_ID);
                } else {
                    // Ya está en favoritos, solo cargar la lista
                    debugInfo('Ya está en favoritos, cargando lista...');
                    cargarFavoritos();
                }
            })
            .catch(error => {
                console.error('Error al verificar favorito:', error);
                // Intentar añadirlo de todos modos
                debugInfo('Error al verificar, intentando añadir directamente...');
                agregarAFavoritos(LIBRO_ID);
            });
    } else {
        // Si no hay ID en la URL, simplemente cargar todos los favoritos
        debugInfo('No hay ID en la URL, cargando todos los favoritos...');
        cargarFavoritos();
    }
    
    // ------------------ MOSTRAR ESTADO DEBUG ------------------
    function mostrarEstadoDebug() {
        console.group('Estado de Favoritos');
        console.log('Session ID:', getSessionId());
        console.log('Cookies:', document.cookie);
        console.log('LocalStorage:', localStorage.getItem('favoritos_session_id'));
        console.groupEnd();
    }
    
    // Activar depuración en consola
    mostrarEstadoDebug();
    
    // ------------------ CSS PARA MENSAJES ------------------
    // Añadir CSS para los mensajes de confirmación dinámicamente
    const style = document.createElement('style');
    style.textContent = `
        .confirmation-msg {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(126, 87, 194, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            animation: fadeInOut 2s ease-in-out;
            z-index: 100;
        }
        
        .confirmation-msg.error {
            background-color: rgba(231, 76, 60, 0.9);
        }
        
        .direct-link {
            display: inline-block;
            margin-top: 10px;
            color: #7e57c2;
            text-decoration: underline;
            cursor: pointer;
        }
        
        @keyframes fadeInOut {
            0% { opacity: 0; }
            15% { opacity: 1; }
            85% { opacity: 1; }
            100% { opacity: 0; }
        }
    `;
    document.head.appendChild(style);
    
    // ------------------ FUNCIÓN PARA REINICIAR DATOS ------------------
    window.resetFavoritosData = function() {
        localStorage.removeItem('favoritos_session_id');
        document.cookie = 'favoritos_session_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        alert('Datos de favoritos reiniciados. Por favor, recarga la página.');
        location.reload();
    };
    
    // Hacer accesible externamente para depuración
    window.debugFavoritos = {
        mostrarEstado: mostrarEstadoDebug,
        reset: resetFavoritosData,
        agregarFavorito: agregarAFavoritos
    };
});
</script>