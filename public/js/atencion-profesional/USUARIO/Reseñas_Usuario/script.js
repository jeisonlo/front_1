document.addEventListener("DOMContentLoaded", () => {
    cargarReseñas();
});

function cargarReseñas() {
    fetch("https://back1-production-67bf.up.railway.app/v1/reviews") // Cambia esto por la URL de tu backend
        .then(response => response.json())
        .then(data => mostrarReseñas(data))
        .catch(error => console.error("Error al obtener las reseñas:", error));
}

function mostrarReseñas(reseñas) {
    const commentsContainer = document.getElementById("commentsContainer");
    commentsContainer.innerHTML = ""; // Limpiar la sección antes de cargar nuevas reseñas

    if (reseñas.length === 0) {
        commentsContainer.innerHTML = "<p>No hay reseñas disponibles.</p>";
        return;
    }

    reseñas.forEach(reseña => {
        const div = document.createElement("div");
        div.classList.add("comment-card");

        div.innerHTML = `
            <div class="comment">
                <img class="imagen-usuario" src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353416/FotoUsuario_mhli8b.png" alt="Foto de perfil del usuario">
                <div class="comment-info">
                    <h3>${reseña.name}</h3>
                    <p class="stars" style="color: #6200ea;">${'★'.repeat(reseña.stars)}</p>
                    <p class="comment-text">${reseña.comment}</p>
                </div>
            </div>
        `;

        commentsContainer.appendChild(div);
    });
}