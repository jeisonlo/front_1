document.addEventListener("DOMContentLoaded", function() {
    // ------------------ URLS DE LA API ------------------
    const FAVORITOS_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    
    // ------------------ OBTENER SESSION ID ------------------
    let sessionId = localStorage.getItem('favoritos_session_id');

    // ------------------ SELECCIONAR TODOS LOS CORAZONES ------------------
    const hearts = document.querySelectorAll('.heart');

    // ------------------ FUNCIÓN PARA OBTENER EL ID DEL LIBRO ------------------
    function obtenerLibroId(heartElement) {
        const section = heartElement.closest('.dream-map');
        const link = section.querySelector('a.book-link');
        if (!link) return null; 

        const urlParams = new URLSearchParams(new URL(link.href, window.location.origin).search);
        return urlParams.get('id'); 
    }

    // ------------------ VERIFICAR FAVORITOS ------------------
    function verificarFavoritos() {
        if (!sessionId) return; 

        hearts.forEach(heart => {
            const libroId = obtenerLibroId(heart);
            if (!libroId) return;

            fetch(`${FAVORITOS_API_URL}/check/${libroId}?session_id=${sessionId}`)
                .then(response => response.json())
                .then(data => {
                    heart.textContent = data.isFavorite ? '💜' : '🤍';
                })
                .catch(error => console.error('Error al verificar favorito:', error));
        });
    }

    // ------------------ AÑADIR A FAVORITOS ------------------
    function agregarAFavoritos(libroId, heartElement) {
        fetch(FAVORITOS_API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ libro_id: libroId, session_id: sessionId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                if (data.session_id) {
                    sessionId = data.session_id;
                    localStorage.setItem('favoritos_session_id', sessionId);
                }
                heartElement.textContent = '💜';
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => console.error('Error al agregar a favoritos:', error));
    }

    // ------------------ QUITAR DE FAVORITOS ------------------
    function quitarDeFavoritos(libroId, heartElement) {
        fetch(`${FAVORITOS_API_URL}/${libroId}?session_id=${sessionId}`, {  // 🔴 Se corrigió la interpolación
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                heartElement.textContent = '🤍';
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => console.error('Error al quitar de favoritos:', error));
    }

    // ------------------ ASIGNAR EVENTO CLICK A LOS CORAZONES ------------------
    hearts.forEach(heart => {
        heart.addEventListener('click', function() {
            const libroId = obtenerLibroId(this);
            if (!libroId) return; 

            if (this.textContent === '🤍') {
                agregarAFavoritos(libroId, this);
            } else {
                quitarDeFavoritos(libroId, this);
            }
        });
    });

    // ------------------ VERIFICAR FAVORITOS AL CARGAR LA PÁGINA ------------------
    verificarFavoritos();
});
