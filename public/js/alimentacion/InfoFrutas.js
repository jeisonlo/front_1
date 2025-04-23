document.addEventListener("DOMContentLoaded", () => {
    fetch("https://back1-production-67bf.up.railway.app/v1/InformacionFrutas")  // Asegúrate de que el backend está corriendo en este puerto
        .then(response => response.json())  // Convertimos la respuesta en JSON
        .then(data => {
            const cardContainer = document.getElementById("card-container");
            cardContainer.innerHTML = data.map(card => `
                <div class="card">
                    <img src="${card.image_url}" alt="${card.title}">
                    <h3>${card.title}</h3>
                    <p>${card.description}</p>
                </div>
            `).join('');
        })
        .catch(error => console.error("Error al obtener los datos:", error));
});

