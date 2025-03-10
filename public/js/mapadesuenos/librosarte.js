document.addEventListener("DOMContentLoaded", function() {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    
    // ------------------ GET SESSION ID FROM LOCAL STORAGE ------------------
    let sessionId = localStorage.getItem('favoritos_session_id');
    
    // ------------------ SELECCIONAR TODOS LOS CORAZONES ------------------
    const hearts = document.querySelectorAll('.heart');
    
    // ------------------ VERIFICAR ESTADO DE FAVORITOS ------------------
    function verificarFavoritos() {
        if (!sessionId) return; // Si no hay sesión, no hay favoritos que verificar
        
        // Para cada corazón, verificar si el libro correspondiente está en favoritos
        hearts.forEach(heart => {
            const section = heart.closest('.dream-map');
            const link = section.querySelector('a');
            const libroId = new URLSearchParams(link.href.split('?')[1]).get('id');
            
            fetch(`${FAVORITOS_API_URL}/check/${libroId}?session_id=${sessionId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.isFavorite) {
                        heart.textContent = '💜'; // Corazón morado si es favorito
                    } else {
                        heart.textContent = '🤍'; // Corazón blanco si no es favorito
                    }
                })
                .catch(error => {
                    console.error('Error al verificar favorito:', error);
                });
        });
    }
    
    // ------------------ AÑADIR A FAVORITOS ------------------
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
                
                // Cambiar el corazón a morado
                heartElement.textContent = '💜';
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error al agregar a favoritos:', error);
        });
    }
    
    // ------------------ QUITAR DE FAVORITOS ------------------
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
                // Cambiar el corazón a blanco
                heartElement.textContent = '🤍';
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => {
            console.error('Error al quitar de favoritos:', error);
        });
    }
    
    // ------------------ AÑADIR EVENT LISTENERS A LOS CORAZONES ------------------
    hearts.forEach(heart => {
        heart.addEventListener('click', function() {
            const section = this.closest('.dream-map');
            const link = section.querySelector('a');
            const libroId = new URLSearchParams(link.href.split('?')[1]).get('id');
            
            if (this.textContent === '🤍') {
                // Si el corazón es blanco, añadir a favoritos
                agregarAFavoritos(libroId, this);
            } else {
                // Si el corazón es morado, quitar de favoritos
                quitarDeFavoritos(libroId, this);
            }
        });
    });
    
    // ------------------ VERIFICAR FAVORITOS AL CARGAR LA PÁGINA ------------------
    verificarFavoritos();
});