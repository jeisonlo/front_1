

// Script para manejar los favoritos (librosarte.js)
document.addEventListener("DOMContentLoaded", function () {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    
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
    }
    
    // ------------------ GET SESSION ID ------------------
    let sessionId = getSessionId();
    
    document.querySelectorAll(".dream-map").forEach(section => {
        const heart = section.querySelector(".heart");
        const bookLink = section.querySelector(".book-link, a");
        
        if (heart && bookLink) {
            // Obtener el ID del libro desde el enlace <a>
            const href = bookLink.getAttribute('href');
            if (href && href.includes('?')) {
                const urlParams = new URLSearchParams(href.split("?")[1]);
                const libroId = urlParams.get("id");
                
                if (libroId) {
                    // Verificar estado inicial del corazón
                    checkFavoriteStatus(libroId, heart);
                    
                    // Añadir evento click
                    heart.addEventListener("click", function (e) {
                        e.preventDefault(); // Prevenir navegación
                        
                        // Cambiar el color del corazón
                        const isFavorite = heart.innerHTML === "💜";
                        
                        if (isFavorite) {
                            // Quitar de favoritos
                            quitarDeFavoritos(libroId, heart);
                        } else {
                            // Añadir a favoritos
                            agregarAFavoritos(libroId, heart);
                        }
                    });
                }
            }
        }
    });
    
    // ------------------ FUNCIÓN PARA MOSTRAR MENSAJES ------------------
    function mostrarMensaje(elemento, mensaje, tipo = 'success') {
        const confirmationMsg = document.createElement('div');
        confirmationMsg.className = `confirmation-msg ${tipo}`;
        confirmationMsg.textContent = mensaje;
        
        elemento.parentNode.appendChild(confirmationMsg);
        
        // Remover mensaje después de 2 segundos
        setTimeout(() => {
            confirmationMsg.remove();
        }, 2000);
    }
    
    // ------------------ FUNCIONES PARA FAVORITOS ------------------
    function checkFavoriteStatus(libroId, heartElement) {
        // Reobtenemos el sessionId para asegurar que tenemos el más actualizado
        sessionId = getSessionId();
        
        fetch(`${FAVORITOS_API_URL}/check/${libroId}${sessionId ? `?session_id=${sessionId}` : ''}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                heartElement.innerHTML = data.isFavorite ? "💜" : "🤍";
            })
            .catch(error => {
                console.error('Error al verificar favorito:', error);
                heartElement.innerHTML = "🤍"; // Estado por defecto
            });
    }
    
    function agregarAFavoritos(libroId, heartElement) {
        // Reobtenemos el sessionId para asegurar que tenemos el más actualizado
        sessionId = getSessionId();
        
        // Log the request for debugging
        console.log('Request payload:', {
            libro_id: libroId,
            session_id: sessionId
        });
        
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
            // Log response details for debugging
            console.log('Response status:', response.status);
            console.log('Response headers:', [...response.headers.entries()]);
            
            if (!response.ok) {
                return response.text().then(text => {
                    console.error('Error response body:', text);
                    throw new Error(`Error: ${response.status}`);
                });
            }
            return response.json();
        })
        .then(data => {
            console.log('Success data:', data);
            if (data.status === 'success') {
                // Actualizar session_id si es necesario
                if (data.session_id) {
                    sessionId = data.session_id;
                    saveSessionId(sessionId);
                }
                
                // Actualizar UI
                heartElement.innerHTML = "💜";
                
                // Mostrar mensaje de confirmación
                mostrarMensaje(heartElement, '¡Añadido a favoritos!');
            } else {
                throw new Error(data.message || 'Error desconocido');
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
            mostrarMensaje(heartElement, 'Error al añadir a favoritos', 'error');
        });
    }
    
    
    
    function quitarDeFavoritos(libroId, heartElement) {
        // Reobtenemos el sessionId para asegurar que tenemos el más actualizado
        sessionId = getSessionId();
        
        if (!sessionId) {
            console.error('No hay session_id disponible');
            mostrarMensaje(heartElement, 'Error: Sesión no disponible', 'error');
            return;
        }
        
        fetch(`${FAVORITOS_API_URL}/${libroId}?session_id=${sessionId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                // Actualizar UI
                heartElement.innerHTML = "🤍";
                
                // Mostrar mensaje de confirmación
                mostrarMensaje(heartElement, 'Eliminado de favoritos');
            } else {
                throw new Error(data.message || 'Error desconocido');
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
            mostrarMensaje(heartElement, 'Error al eliminar de favoritos', 'error');
        });
    }
    
    // ------------------ CSS PARA MENSAJES ------------------
    // Añadir CSS para los mensajes de confirmación dinámicamente si no existe ya
    if (!document.querySelector('style[data-id="favoritos-css"]')) {
        const style = document.createElement('style');
        style.dataset.id = "favoritos-css";
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
            
            @keyframes fadeInOut {
                0% { opacity: 0; }
                15% { opacity: 1; }
                85% { opacity: 1; }
                100% { opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    }
});
