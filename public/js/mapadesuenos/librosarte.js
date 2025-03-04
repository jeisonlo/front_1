// Script para manejar los favoritos (librosarte.js)
document.addEventListener("DOMContentLoaded", function () {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    
    // ------------------ GET SESSION ID FROM LOCAL STORAGE ------------------
    let sessionId = localStorage.getItem('favoritos_session_id');
    
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
    
    // ------------------ FUNCIONES PARA FAVORITOS ------------------
    function checkFavoriteStatus(libroId, heartElement) {
        fetch(`${FAVORITOS_API_URL}/check/${libroId}${sessionId ? `?session_id=${sessionId}` : ''}`)
            .then(response => response.json())
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
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Actualizar session_id si es necesario
                if (data.session_id) {
                    sessionId = data.session_id;
                    localStorage.setItem('favoritos_session_id', sessionId);
                }
                
                // Actualizar UI
                heartElement.innerHTML = "💜";
                
                // Opcional: Mostrar un mensaje de confirmación
                const confirmationMsg = document.createElement('div');
                confirmationMsg.className = 'confirmation-msg';
                confirmationMsg.textContent = '¡Añadido a favoritos!';
                heartElement.parentNode.appendChild(confirmationMsg);
                
                // Remover mensaje después de 2 segundos
                setTimeout(() => {
                    confirmationMsg.remove();
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
        });
    }
    
    function quitarDeFavoritos(libroId, heartElement) {
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
                // Actualizar UI
                heartElement.innerHTML = "🤍";
                
                // Opcional: Mostrar un mensaje de confirmación
                const confirmationMsg = document.createElement('div');
                confirmationMsg.className = 'confirmation-msg';
                confirmationMsg.textContent = 'Eliminado de favoritos';
                heartElement.parentNode.appendChild(confirmationMsg);
                
                // Remover mensaje después de 2 segundos
                setTimeout(() => {
                    confirmationMsg.remove();
                }, 2000);
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
        });
    }
});