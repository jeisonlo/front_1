document.addEventListener("DOMContentLoaded", function () {
    // Crear session_id si no existe
    if (!localStorage.getItem('favoritos_session_id')) {
        // Generar un UUID simple
        const uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0;
            const v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
        localStorage.setItem('favoritos_session_id', uuid);
        console.log("Nueva session_id creada:", uuid);
    }
    
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";

    // ------------------ GET SESSION ID FROM LOCAL STORAGE ------------------
    let sessionId = localStorage.getItem('favoritos_session_id');
    console.log("Usando session_id:", sessionId);

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
                    console.log("Libro encontrado con ID:", libroId);
                    
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
                }
            }
        }
    });

    // ------------------ FUNCIONES PARA FAVORITOS ------------------
    function checkFavoriteStatus(libroId, heartElement) {
        if (!sessionId) {
            console.warn("No hay session_id disponible para verificar favoritos");
            heartElement.innerHTML = "🤍";
            return;
        }
        
        console.log(`Verificando estado de favorito para libro ${libroId} con session_id ${sessionId}`);
        fetch(`${FAVORITOS_API_URL}/check/${libroId}?session_id=${sessionId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log("Respuesta de verificación:", data);
                heartElement.innerHTML = data.isFavorite ? "💜" : "🤍";
            })
            .catch(error => {
                console.error('Error al verificar favorito:', error);
                heartElement.innerHTML = "🤍"; // Estado por defecto
            });
    }
//////////////////////

function agregarAFavoritos(libroId, heartElement) {
    if (!sessionId) {
        console.warn("No hay session_id disponible para agregar a favoritos");
        return;
    }
    
    console.log(`Agregando libro ${libroId} a favoritos con session_id ${sessionId}`);
    
    // Mostrar indicador de carga
    heartElement.innerHTML = "⏳";
    
    // Asegurar que libroId sea tratado como número
    const libro_id = parseInt(libroId, 10);
    
    // Verificar que tenemos un número válido
    if (isNaN(libro_id)) {
        console.error("ID de libro inválido:", libroId);
        heartElement.innerHTML = "🤍";
        return;
    }
    
    const requestData = {
        libro_id: libro_id,
        session_id: sessionId
    };
    
    console.log("Enviando datos:", requestData);
    
    fetch(FAVORITOS_API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
    .then(response => {
        console.log("Respuesta status:", response.status);
        
        // Intentar obtener el cuerpo de la respuesta como JSON
        return response.json().then(data => {
            if (!response.ok) {
                throw {
                    status: response.status,
                    statusText: response.statusText,
                    data: data
                };
            }
            return data;
        }).catch(jsonError => {
            // Si no podemos obtener JSON, creamos un objeto de error con la información disponible
            if (!response.ok) {
                throw {
                    status: response.status,
                    statusText: response.statusText,
                    message: 'Error al procesar la respuesta del servidor'
                };
            }
            return { status: 'error', message: 'Respuesta no válida del servidor' };
        });
    })
    .then(data => {
        console.log("Respuesta completa:", data);
        
        if (data.status === 'success') {
            // Actualizar session_id si es necesario
            if (data.session_id) {
                sessionId = data.session_id;
                localStorage.setItem('favoritos_session_id', sessionId);
                console.log("Session_id actualizada:", sessionId);
            }
            
            // Actualizar UI
            heartElement.innerHTML = "💜";
            
            // Mostrar mensaje de confirmación
            const confirmationMsg = document.createElement('div');
            confirmationMsg.className = 'confirmation-msg';
            confirmationMsg.textContent = '¡Añadido a favoritos!';
            confirmationMsg.style.position = 'absolute';
            confirmationMsg.style.backgroundColor = 'rgba(0,0,0,0.7)';
            confirmationMsg.style.color = 'white';
            confirmationMsg.style.padding = '5px 10px';
            confirmationMsg.style.borderRadius = '5px';
            confirmationMsg.style.zIndex = '1000';
            confirmationMsg.style.fontSize = '12px';
            
            heartElement.parentNode.style.position = 'relative';
            heartElement.parentNode.appendChild(confirmationMsg);
            
            setTimeout(() => {
                confirmationMsg.remove();
            }, 2000);
        } else {
            console.warn("Respuesta inesperada:", data);
            heartElement.innerHTML = "🤍";
        }
    })
    .catch(error => {
        console.error('Error al agregar a favoritos:', error);
        
        // Mostrar detalles del error en consola
        if (error.data) {
            console.error('Detalles del error:', error.data);
        }
        
        // Restaurar estado del corazón
        heartElement.innerHTML = "🤍";
        
        // Mostrar mensaje de error
        const errorMsg = document.createElement('div');
        errorMsg.className = 'error-msg';
        errorMsg.textContent = error.data && error.data.message 
            ? error.data.message 
            : 'Error al añadir a favoritos';
        errorMsg.style.position = 'absolute';
        errorMsg.style.backgroundColor = 'rgba(255,0,0,0.7)';
        errorMsg.style.color = 'white';
        errorMsg.style.padding = '5px 10px';
        errorMsg.style.borderRadius = '5px';
        errorMsg.style.zIndex = '1000';
        errorMsg.style.fontSize = '12px';
        
        heartElement.parentNode.style.position = 'relative';
        heartElement.parentNode.appendChild(errorMsg);
        
        setTimeout(() => {
            errorMsg.remove();
        }, 3000);
    });
}

    ////////////////////////////
    function quitarDeFavoritos(libroId, heartElement) {
        if (!sessionId) {
            console.warn("No hay session_id disponible para quitar de favoritos");
            return;
        }
        
        console.log(`Eliminando libro ${libroId} de favoritos con session_id ${sessionId}`);
        
        // Mostrar indicador de carga
        heartElement.innerHTML = "⏳";
        
        fetch(`${FAVORITOS_API_URL}/${libroId}?session_id=${sessionId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => {
                    throw new Error(`Error del servidor: ${errorData.message || response.statusText}`);
                });
            }
            return response.json();
        })
        .then(data => {
            console.log("Respuesta de eliminación:", data);
            
            if (data.status === 'success') {
                // Actualizar UI
                heartElement.innerHTML = "🤍";
                
                // Opcional: Mostrar un mensaje de confirmación
                const confirmationMsg = document.createElement('div');
                confirmationMsg.className = 'confirmation-msg';
                confirmationMsg.textContent = 'Eliminado de favoritos';
                confirmationMsg.style.position = 'absolute';
                confirmationMsg.style.backgroundColor = 'rgba(0,0,0,0.7)';
                confirmationMsg.style.color = 'white';
                confirmationMsg.style.padding = '5px 10px';
                confirmationMsg.style.borderRadius = '5px';
                confirmationMsg.style.zIndex = '1000';
                confirmationMsg.style.fontSize = '12px';
                
                heartElement.parentNode.style.position = 'relative';
                heartElement.parentNode.appendChild(confirmationMsg);
                
                // Remover mensaje después de 2 segundos
                setTimeout(() => {
                    confirmationMsg.remove();
                }, 2000);
            } else {
                console.warn("Respuesta inesperada:", data);
                heartElement.innerHTML = "💜";
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
            heartElement.innerHTML = "💜"; // Restaurar estado
            
            // Mostrar mensaje de error
            const errorMsg = document.createElement('div');
            errorMsg.className = 'error-msg';
            errorMsg.textContent = 'Error al eliminar de favoritos';
            errorMsg.style.position = 'absolute';
            errorMsg.style.backgroundColor = 'rgba(255,0,0,0.7)';
            errorMsg.style.color = 'white';
            errorMsg.style.padding = '5px 10px';
            errorMsg.style.borderRadius = '5px';
            errorMsg.style.zIndex = '1000';
            errorMsg.style.fontSize = '12px';
            
            heartElement.parentNode.style.position = 'relative';
            heartElement.parentNode.appendChild(errorMsg);
            
            setTimeout(() => {
                errorMsg.remove();
            }, 2000);
        });
    }
});