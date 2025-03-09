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
    const FAVORITES_API_URL = "https://back1-production-67bf.up.railway.app/v1/favoritos";
    const BOOKS_API_URL = "https://back1-production-67bf.up.railway.app/v1/api/libros";
    
    const favoritesContainer = document.getElementById('favorites-container');
    const loadingMessage = document.getElementById('loading-message');
    const noFavoritesMessage = document.getElementById('no-favorites-message');
    
    // Load favorite books
    loadFavorites();
    
    function loadFavorites() {
        fetch(FAVORITES_API_URL)
            .then(response => response.json())
            .then(data => {
                loadingMessage.style.display = 'none';
                
                if (!data.length) {
                    noFavoritesMessage.style.display = 'block';
                    return;
                }
                
                // Create a card for each favorite book
                data.forEach(favorito => {
                    fetchBookDetails(favorito.libro_id, favorito.id);
                });
            })
            .catch(error => {
                console.error('Error loading favorites:', error);
                loadingMessage.textContent = 'Error al cargar favoritos. Intenta refrescar la página.';
            });
    }
    
    function fetchBookDetails(libroId, favoritoId) {
        fetch(`${BOOKS_API_URL}/${libroId}`)
            .then(response => response.json())
            .then(book => {
                createFavoriteCard(book, favoritoId);
            })
            .catch(error => console.error(`Error fetching book details for ID ${libroId}:`, error));
    }
    
    function createFavoriteCard(book, favoritoId) {
        const card = document.createElement('div');
        card.className = 'favorite-card';
        card.setAttribute('data-favorito-id', favoritoId);
        
        const portadaUrl = book.portada_url || 'https://via.placeholder.com/200x300?text=Sin+Portada';
        
        card.innerHTML = `
            <a href="/mapadesuenos/libro1?id=${book.id}">
                <img src="${portadaUrl}" alt="${book.titulo}">
            </a>
            <h3>${book.titulo}</h3>
            <div class="heart" data-favorito-id="${favoritoId}">💜</div>
        `;
        
        // Add event listener to heart button
        const heartButton = card.querySelector('.heart');
        heartButton.addEventListener('click', function() {
            removeFromFavorites(favoritoId, card);
        });
        
        favoritesContainer.appendChild(card);
    }
    
    function removeFromFavorites(favoritoId, cardElement) {
        fetch(`${FAVORITES_API_URL}/${favoritoId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(() => {
            // Remove the card with animation
            cardElement.style.opacity = '0';
            setTimeout(() => {
                cardElement.remove();
                
                // Check if there are any favorites left
                if (favoritesContainer.querySelectorAll('.favorite-card').length === 0) {
                    noFavoritesMessage.style.display = 'block';
                }
            }, 300);
        })
        .catch(error => console.error('Error removing favorite:', error));
    }
});
</script>