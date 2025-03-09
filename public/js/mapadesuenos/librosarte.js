

// Script para manejar los favoritos (librosarte.js)
document.addEventListener("DOMContentLoaded", function () {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    
    // ------------------ FUNCIONES PARA SESSION ID ------------------
    function getSessionId() {
        let sessionId = localStorage.getItem('favoritos_session_id');
        
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
        try {
            localStorage.setItem('favoritos_session_id', sessionId);
        } catch (e) {
            console.warn('No se pudo guardar en localStorage:', e);
        }
        
        // También guardar en una cookie que pueda ser compartida
        const expirationDate = new Date();
        expirationDate.setMonth(expirationDate.getMonth() + 1); // Expira en 1 mes
        document.cookie = `favoritos_session_id=${sessionId}; expires=${expirationDate.toUTCString()}; path=/; SameSite=Lax`;
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
    
    // ------------------ GET SESSION ID ------------------
    let sessionId = getSessionId();
    
    // ------------------ FUNCIONES PARA FAVORITOS ------------------
    function checkFavoriteStatus(libroId, heartElement) {
        fetch(`${FAVORITOS_API_URL}/check/${libroId}${sessionId ? `?session_id=${sessionId}` : ''}`)
            .then(response => {
                if (!response.ok) throw new Error('Error en la respuesta del servidor');
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
            if (!response.ok) throw new Error('Error en la respuesta del servidor');
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                // Actualizar session_id si es necesario
                if (data.session_id) {
                    saveSessionId(data.session_id);
                    sessionId = data.session_id;
                }
                
                // Actualizar UI
                heartElement.innerHTML = "💜";
                mostrarMensaje(heartElement, '¡Añadido a favoritos!');
            } else {
                throw new Error(data.message || 'Error desconocido');
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
            mostrarMensaje(heartElement, 'Error al añadir a favoritos', 'error');
            
            // Si el error parece ser de conexión o de autorización, ofrecer alternativa directa
            if (error.message.includes('fetch') || error.message.includes('network') || 
                error.message.includes('Failed to fetch') || error.message.includes('unauthorized')) {
                
                // Añadir un enlace directo a la página de favoritos
                const directLink = document.createElement('a');
                directLink.href = `${window.location.origin}/mapadesuenos/favoritos?id=${libroId}`;
                directLink.className = 'direct-link';
                directLink.textContent = 'Ir a favoritos';
                directLink.style.display = 'block';
                directLink.style.marginTop = '5px';
                directLink.style.color = '#7e57c2';
                directLink.style.textDecoration = 'underline';
                
                // Si el mensaje aún existe, añadir debajo, sino al padre del corazón
                const msgElement = heartElement.parentNode.querySelector('.confirmation-msg');
                if (msgElement) {
                    msgElement.parentNode.insertBefore(directLink, msgElement.nextSibling);
                } else {
                    heartElement.parentNode.appendChild(directLink);
                }
                
                // Eliminar después de 5 segundos
                setTimeout(() => {
                    if (directLink.parentNode) {
                        directLink.remove();
                    }
                }, 5000);
            }
        });
    }
    
    function quitarDeFavoritos(libroId, heartElement) {
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
            if (!response.ok) throw new Error('Error en la respuesta del servidor');
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                // Actualizar UI
                heartElement.innerHTML = "🤍";
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
    
    // ------------------ INICIALIZAR CORAZONES ------------------
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
                        e.stopPropagation(); // Evitar que el clic se propague
                        
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
                    
                    // Hacer que el corazón sea claramente clicable
                    heart.style.cursor = 'pointer';
                }
            }
        }
    });
    
    // ------------------ FUNCIÓN DE DEPURACIÓN ------------------
    function mostrarEstadoDebug() {
        console.log('Session ID:', getSessionId());
        console.log('Cookies:', document.cookie);
        console.log('LocalStorage:', localStorage.getItem('favoritos_session_id'));
    }
    
    // Ejecutar depuración para ver el estado actual (comentar en producción)
    // mostrarEstadoDebug();
    
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
        
        @keyframes fadeInOut {
            0% { opacity: 0; }
            15% { opacity: 1; }
            85% { opacity: 1; }
            100% { opacity: 0; }
        }
    `;
    document.head.appendChild(style);
});