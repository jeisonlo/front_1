document.addEventListener("DOMContentLoaded", () => {
    let posts = [];
    const API_URL = 'https://back1-production-67bf.up.railway.app/v1/foro';

    // Cargar publicaciones iniciales
    const cargarPublicaciones = async () => {
        try {
            const response = await fetch(API_URL);
            posts = await response.json();
            renderizarPublicaciones();
        } catch (error) {
            mostrarNotificacion('Error al cargar publicaciones', 'error');
        }
    };

    // Renderizar publicaciones
    const renderizarPublicaciones = () => {
        const container = document.querySelector('main.container');
        container.innerHTML = '';

        posts.forEach(post => {
            const cardHTML = `
                <div class="card" data-id="${post.id}">
                    <div class="profile">
                        <div>
                            <p class="name">${post.nombre}</p>
                            <p class="time">⏰ ${new Date(post.created_at).toLocaleDateString()}</p>
                        </div>
                    </div>
                    <p class="contenido">${post.contenido}</p>
                    
                    <div class="actions-right">
                        <button class="like-button" data-liked="false">
                            ❤️ <span class="like-count">${post.likes}</span>
                        </button>
                        <button class="edit-button">📝</button>
                        <button class="delete-button">🚮</button>
                    </div>
                    
                    <div class="comment-container">
                        <div class="comments">
                            ${post.comentarios ? post.comentarios.map(comentario => `
                                <div class="comment">
                                    <p><strong>${comentario.autor}:</strong> ${comentario.texto}</p>
                                </div>
                            `).join('') : ''}
                        </div>
                        <input type="text" class="nuevo-comentario" placeholder="Escribe un comentario...">
                        <button class="add-comment">💬</button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', cardHTML);
        });

        agregarEventos();
    };

    // Configurar eventos
    const agregarEventos = () => {
        document.querySelectorAll('.like-button').forEach(btn => {
            btn.addEventListener('click', manejarLike);
        });
        
        document.querySelectorAll('.edit-button').forEach(btn => {
            btn.addEventListener('click', manejarEdicion);
        });
        
        document.querySelectorAll('.delete-button').forEach(btn => {
            btn.addEventListener('click', manejarEliminacion);
        });
        
        document.querySelectorAll('.add-comment').forEach(btn => {
            btn.addEventListener('click', manejarComentario);
        });
    };

    // Manejar likes
    const manejarLike = async (e) => {
        const card = e.target.closest('.card');
        const postId = card.dataset.id;
        
        try {
            const response = await fetch(`${API_URL}/${postId}/like`, { method: 'POST' });
            const data = await response.json();
            
            const likeCount = card.querySelector('.like-count');
            likeCount.textContent = data.likes;
            
            e.target.dataset.liked = e.target.dataset.liked === 'true' ? 'false' : 'true';
            mostrarNotificacion('Like actualizado');
        } catch (error) {
            mostrarNotificacion('Error al dar like', 'error');
        }
    };

    // Manejar edición
    const manejarEdicion = async (e) => {
        const card = e.target.closest('.card');
        const postId = card.dataset.id;
        const contenidoActual = card.querySelector('.contenido').textContent;
        const nuevoContenido = prompt('Editar publicación:', contenidoActual);
        
        if (nuevoContenido && nuevoContenido !== contenidoActual) {
            try {
                const response = await fetch(`${API_URL}/${postId}`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ contenido: nuevoContenido })
                });
                
                const data = await response.json();
                card.querySelector('.contenido').textContent = data.contenido;
                mostrarNotificacion('Publicación actualizada');
            } catch (error) {
                mostrarNotificacion('Error al editar', 'error');
            }
        }
    };

    // Manejar eliminación
    const manejarEliminacion = async (e) => {
        const card = e.target.closest('.card');
        const postId = card.dataset.id;
        
        if (confirm('¿Estás seguro de eliminar esta publicación?')) {
            try {
                await fetch(`${API_URL}/${postId}`, { method: 'DELETE' });
                card.remove();
                mostrarNotificacion('Publicación eliminada');
            } catch (error) {
                mostrarNotificacion('Error al eliminar', 'error');
            }
        }
    };

    // Manejar comentarios
    const manejarComentario = async (e) => {
        const card = e.target.closest('.card');
        const postId = card.dataset.id;
        const input = card.querySelector('.nuevo-comentario');
        const texto = input.value.trim();
        
        if (!texto) return;
        
        try {
            const response = await fetch(`${API_URL}/${postId}/comentario`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ texto })
            });
            
            const data = await response.json();
            const commentsContainer = card.querySelector('.comments');
            
            const commentHTML = `
                <div class="comment">
                    <p><strong>${data.autor}:</strong> ${data.texto}</p>
                </div>
            `;
            
            commentsContainer.insertAdjacentHTML('beforeend', commentHTML);
            input.value = '';
            mostrarNotificacion('Comentario agregado');
        } catch (error) {
            mostrarNotificacion('Error al comentar', 'error');
        }
    };

    // Configurar modal
    const configurarModal = () => {
        const modal = document.getElementById('postModal');
        const btnPublicar = document.getElementById('publishPostBtn');
        
        document.getElementById('createPostBtn').addEventListener('click', () => {
            modal.style.display = 'block';
        });

        document.querySelector('.close-modal').addEventListener('click', () => {
            modal.style.display = 'none';
        });

        btnPublicar.addEventListener('click', async () => {
            const nombre = document.getElementById('nombreUsuario').value.trim();
            const contenido = document.getElementById('newPostContent').value.trim();
            
            if (!nombre || !contenido) {
                mostrarNotificacion('Nombre y contenido son requeridos', 'error');
                return;
            }

            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ nombre, contenido })
                });
                
                const nuevaPublicacion = await response.json();
                posts.unshift(nuevaPublicacion);
                renderizarPublicaciones();
                modal.style.display = 'none';
                mostrarNotificacion('Publicación creada');
            } catch (error) {
                mostrarNotificacion('Error al publicar', 'error');
            }
        });
    };

    // Notificaciones
    const mostrarNotificacion = (mensaje, tipo = 'success') => {
        const notificacion = document.createElement('div');
        notificacion.className = `notificacion ${tipo}`;
        notificacion.textContent = mensaje;
        document.body.appendChild(notificacion);
        
        setTimeout(() => notificacion.remove(), 3000);
    };

    // Inicializar
    cargarPublicaciones();
    configurarModal();
});