document.addEventListener("DOMContentLoaded", function() {
    const FAVORITES_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    
    // Get all heart icons
    const heartButtons = document.querySelectorAll('.heart');
    
    // Check favorite status for each book and update heart appearance
    heartButtons.forEach(heart => {
        const libroId = heart.getAttribute('data-libro-id');
        checkFavoriteStatus(libroId, heart);
        
        // Add click event listener to each heart
        heart.addEventListener('click', function() {
            toggleFavorite(libroId, heart);
        });
    });
    
    // Function to check if a book is favorited
    function checkFavoriteStatus(libroId, heartElement) {
        fetch(`${FAVORITES_API_URL}/check/${libroId}`)
            .then(response => response.json())
            .then(data => {
                if (data.isFavorite) {
                    heartElement.textContent = '💜'; // Purple heart for favorites
                    heartElement.dataset.favoriteId = data.favorito.id;
                } else {
                    heartElement.textContent = '🤍'; // White heart for non-favorites
                    delete heartElement.dataset.favoriteId;
                }
            })
            .catch(error => console.error('Error checking favorite status:', error));
    }
    
    // Function to toggle favorite status
    function toggleFavorite(libroId, heartElement) {
        if (heartElement.textContent === '🤍') {
            // Add to favorites
            fetch(FAVORITES_API_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ libro_id: libroId })
            })
            .then(response => response.json())
            .then(data => {
                heartElement.textContent = '💜'; // Change to purple heart
                heartElement.dataset.favoriteId = data.id;
                alert('¡Libro añadido a favoritos!');
            })
            .catch(error => console.error('Error adding favorite:', error));
        } else {
            // Remove from favorites
            const favoriteId = heartElement.dataset.favoriteId;
            fetch(`${FAVORITES_API_URL}/${favoriteId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(() => {
                heartElement.textContent = '🤍'; // Change back to white heart
                delete heartElement.dataset.favoriteId;
                alert('Libro eliminado de favoritos');
            })
            .catch(error => console.error('Error removing favorite:', error));
        }
    }
});