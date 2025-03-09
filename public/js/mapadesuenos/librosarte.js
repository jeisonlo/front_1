document.addEventListener("DOMContentLoaded", function() {
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
    
    // ------------------ DEBUG MODE ------------------
    const DEBUG = true;
    
    function log(...args) {
        if (DEBUG) console.log(...args);
    }
    
    // ------------------ GET SESSION ID FROM LOCAL STORAGE ------------------
    let sessionId = localStorage.getItem('favoritos_session_id');
    log("Session ID from storage:", sessionId);
    
    // ------------------ VERIFICAR ESTADO DE FAVORITO ------------------
    function verificarFavorito(libroId) {
        if (!sessionId) {
            return Promise.resolve(false);
        }
        
        return fetch(`${FAVORITOS_API_URL}/check/${libroId}?session_id=${sessionId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                log("Estado de favorito:", data);
                return data.isFavorite;
            })
            .catch(error => {
                console.error('Error al verificar favorito:', error);
                return false;
            });
    }
    
    function agregarAFavoritos(libroId) {
        log("Agregando a favoritos libro ID:", libroId, "con session ID:", sessionId);
        
        // Crear el objeto de datos con solo lo esencial
        const datos = {
            libro_id: parseInt(libroId)
        };
        
        // Solo agregar session_id si existe
        if (sessionId) {
            datos.session_id = sessionId;
        }
        
        fetch(FAVORITOS_API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(datos),
            credentials: 'include' // Para que envíe cookies si existen
        })
        .then(response => {
            log("Response status:", response.status);
            if (!response.ok) {
                return response.json().then(errorData => {
                    throw new Error(`HTTP error! Status: ${response.status}, Mensaje: ${errorData.message || 'No hay mensaje de error'}`);
                }).catch(() => {
                    // Si no podemos obtener JSON del error, lanzamos el error genérico
                    throw new Error(`HTTP error! Status: ${response.status}`);
                });
            }
            return response.json();
        })
        .then(data => {
            log("Respuesta al agregar favorito:", data);
            
            if (data.status === 'success') {
                // Actualizar session_id si es necesario
                if (data.session_id) {
                    sessionId = data.session_id;
                    localStorage.setItem('favoritos_session_id', sessionId);
                    log("Nuevo session_id guardado:", sessionId);
                }
                
                // Actualizar UI
                const heartButton = document.querySelector(`.heart[data-id="${libroId}"]`);
                if (heartButton) {
                    heartButton.textContent = '💜';
                }
            } else {
                console.error('Error:', data.message);
                alert('Error al añadir a favoritos: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
            alert(error.message);
        });
    }
    // ------------------ QUITAR DE FAVORITOS ------------------
    function quitarDeFavoritos(libroId) {
        log("Quitando de favoritos libro ID:", libroId, "con session ID:", sessionId);
        
        if (!sessionId) {
            console.error('No hay session_id para quitar de favoritos');
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
            log("Response status:", response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            log("Respuesta al quitar favorito:", data);
            
            if (data.status === 'success') {
                alert('Libro eliminado de favoritos');
            } else {
                console.error('Error:', data.message);
                alert('Error al quitar de favoritos: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
            alert('Error al quitar de favoritos: ' + error.message);
        });
    }
    
    // ------------------ INICIALIZAR BOTONES DE CORAZÓN ------------------
    function inicializarBotonesCorazon() {
        // Buscar todos los corazones en la página
        document.querySelectorAll('.heart').forEach(heart => {
            // Obtener el ID del libro del atributo data-id o del elemento padre
            const libroId = heart.dataset.id || heart.closest('section')?.dataset.id;
            
            if (!libroId) {
                console.error("El botón de corazón no tiene ID de libro asociado", heart);
                return;
            }
            
            // Asegurarse de que el elemento tenga data-id para referencia futura
            heart.dataset.id = libroId;
            
            log("Inicializando botón de corazón para libro ID:", libroId);
            
            // Verificar si este libro ya está en favoritos
            verificarFavorito(libroId)
                .then(isFavorite => {
                    // Actualizar el corazón según el estado
                    heart.textContent = isFavorite ? '💜' : '🤍';
                    
                    // Asignar evento de clic
                    heart.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevenir navegación si está dentro de un enlace
                        
                        if (this.textContent === '🤍') {
                            this.textContent = '💜';
                            agregarAFavoritos(libroId);
                        } else {
                            this.textContent = '🤍';
                            quitarDeFavoritos(libroId);
                        }
                    });
                });
        });
    }
    
    // Iniciar la configuración de los botones de corazón
    inicializarBotonesCorazon();
});