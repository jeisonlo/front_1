<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libro 2</title>
    <style>
        

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7f9;
    color: #333;
    background-image: url('/image/Mapadesueños/libros.jpg'); /* Ruta corregida */
    background-size: cover; /* Para que la imagen cubra todo el fondo */
    background-position: center; /* Para centrar la imagen */
    background-attachment: fixed; /* Para que el fondo se quede fijo al hacer scroll */
    display: flex;
    flex-direction: column;
   
    min-height: 100vh;
  }
  main {
    padding: 20px;
  }
  
  body::before {
  content: '';
  position: fixed;
  
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.377); /* Capa superpuesta con transparencia (ajusta la opacidad según sea necesario) */  z-index: -1; /* Asegura que esta capa quede detrás del contenido */
  pointer-events: none; /* Permite que se puedan hacer clics en los elementos del fondo */
  }
  
  
  .pregunta {
    margin-bottom: 1.25rem;
    margin: 2.5rem;
    margin-top: auto;
  }
  
  button {
    padding: 0.625rem 1.875rem;
    border: none;
    border-radius: 1.875rem;
    cursor: pointer;
    margin-left: auto;
    margin-right: 12.5rem;
  }
  
  button:hover {
    background-color: #651e98;
  }
  .main {
    width: 95%; /* Aumenta el ancho al 95% del viewport */
    max-width: 1300px; /* O establece un ancho máximo más grande */
    margin-left: auto; /* Centra el contenedor */
    margin-right: auto; /* Centra el contenedor */
    align-items: center;
  }
  
  
  .book {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    padding: 1.25rem;
    flex-grow: 1;
    margin-right: 1.25rem;
    position: relative;
    min-height: 20rem;
  }
  
  .book img {
    max-width: 9.375rem;
    margin-right: 1.25rem;
    border-radius: 0.5rem;
    width: 20rem;
    height: 14rem;
  }
  
  .book-info {
    max-width: 37.5rem;
    font-size: 0.9375rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }
  .book-info p.description {
    max-width: 112.5rem;
    font-size: 0.9375rem;
    word-wrap: break-word; /* Permite que las palabras largas se dividan */
    text-align: justify; /* Justifica el texto */
  }
  
  .book-info h1 {
    margin: 0;
    color: #59009A;
  }
  
  .book-info p {
    color: #444444;
    margin: 0.3125rem 0;
  }
  
  .rating {
    display: flex;
    align-items: center;
    position: absolute;
    top: 16.25rem;
    left: 1.875rem;
  }
  
  .rating .star {
    width: 1.25rem;
    height: 1.25rem;
    background: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23444444"><path d="M12 2.5l2.2 6.8h7.1l-5.7 4.1 2.2 6.8-5.8-4.2-5.8 4.2 2.2-6.8-5.7-4.1h7.1z"/></svg>') no-repeat center;
    background-size: contain;
    cursor: pointer;
    transition: background 0.3s ease;
    
  }
  
  /* Estrellas amarillas cuando están seleccionadas */
  .rating .star.selected {
    background: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%236A0DAD"><path d="M12 2.5l2.2 6.8h7.1l-5.7 4.1 2.2 6.8-5.8-4.2-5.8 4.2 2.2-6.8-5.7-4.1h7.1z"/></svg>') no-repeat center;
    background-size: contain;
    
  }
  
  /* Estrellas amarillas al pasar el mouse */
  .rating .star:hover,
  .rating .star.hovered {
    background: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%236A0DAD"><path d="M12 2.5l2.2 6.8h7.1l-5.7 4.1 2.2 6.8-5.8-4.2-5.8 4.2 2.2-6.8-5.7-4.1h7.1z"/></svg>') no-repeat center;
    background-size: contain;
  }
  
  
  /* Contenedor principal */
  .comentarios {
    max-width: 100%; /* Asegura que el contenedor pueda expandirse al 100% */
    margin: 0 20px; /* Margen a los lados */
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.551); /* Capa superpuesta con transparencia (ajusta la opacidad según sea necesario) */  z-index: -1; /* Asegura que esta capa quede detrás del contenido */
    margin-top: 90px;
    border-radius: 10px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  /* Campo de texto */
  textarea {
    width: 99%;
    height: 100px;
    padding: 10px;
    margin-bottom: 12px;
    border-radius: 5px;
    border: 1px solid #d1d1d1;
    font-size: 14px;
    background-color: #f9f9f9;
    resize: vertical;
    transition: border-color 0.3s ease;
  }
  
  textarea:focus {
    border-color: #59009A;
    outline: none;
  }
  
  /* Botones */
  button {
    padding: 8px 16px;
    background-color: #59009A;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  
  button:hover {
    background-color: #7a00cf;
    transform: scale(1.05);
  }
  
  /* Botón de cancelar */
  #cancelarBtn {
    margin-left: -190px;
    background-color: #b0b0b0;
    
  }
  
  #cancelarBtn:hover {
    background-color: #d9534f;
  }
  /* Lista de comentarios dentro de .comentarios */
  .comentarios ul {
    list-style: none;
    padding: 0;
    margin-top: 18px;
  }
  
  /* Tarjeta de comentario dentro de .comentarios */
  .comentarios ul li {
    margin-bottom: 15px;
    padding: 15px;
    background-color: #fafafa;
    border-radius: 8px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #59009A;
    transition: background-color 0.3s ease;
    overflow-wrap: break-word;
  }
  
  .comentarios ul li:hover {
    background-color: #f5f5f5;
  }
  
  /* Encabezado del comentario */
  .comment-header {
    font-weight: bold;
    color: #333333;
    margin-bottom: 6px;
    font-size: 16px;
  }
  
  /* Cuerpo del comentario */
  .comment-body {
    font-size: 14px;
    color: #555555;
    line-height: 1.5;
  }
  
  /* Acciones de comentario */
  .comment-actions {
    margin-top: 12px;
  }
  
  .comment-actions button {
    margin-right: 8px;
    padding: 5px 12px;
    background-color: #59009A;
    border-radius: 4px;
    border: none;
    font-size: 13px;
  }
  
  .comment-actions button:hover {
    background-color: #7a00cf;
    opacity: 0.9;
  }
  
  /* Botón de eliminar */
  .comment-actions .deleteBtn {
    background-color: #59009A;
  }
  
  .comment-actions .deleteBtn:hover {
    background-color: #59009A;
  }
  
  /* Botón de me gusta */
  .comment-actions .likeBtn {
    background-color: #59009A;
  }
  
  .comment-actions .likeBtn:hover {
    background-color: #59009A;
  }
  
  /* Deshabilitar el botón */
  button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
  }
  
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const libroId = 2; // ID del libro
            const apiUrl = `http://api.codersfree.com/v1/libros/${libroId}`;

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se pudo obtener el libro');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('titulo').textContent = data.titulo;
                    document.getElementById('descripcion').textContent = data.descripcionlibro;
                    document.getElementById('autor').textContent = data.autor;
                    document.getElementById('editorial').textContent = data.editorial;
                    document.getElementById('link').href = data.link;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</head>
<body>
    @include('mapadesuenos.plantillas.header')
    <main class="main" >
    <div class="book" data-libro-id="1">
        <img id="portada" src="" alt="Portada del libro">
        <div class="book-info">
    <h1 id="titulo"></h1>
    <p><strong>Autor:</strong> <span id="autor">Cargando autor...</span></p>
    <p><strong>Editorial:</strong> <span id="editorial">Cargando editorial...</span></p>
    <p><strong>Enlace:</strong><a id="link" href="#" target="_blank">Leer libro</a></p>
    <p><strong>Descripción:</strong> <span id="descripcion">Cargando descripción...</span></p>
    
    <div class="rating">
        <div class="star" data-value="1"></div>
        <div class="star" data-value="2"></div>
        <div class="star" data-value="3"></div>
        <div class="star" data-value="4"></div>
        <div class="star" data-value="5"></div>
        <span id="average-rating">0</span>
      </div>
    </div>
 </div>


      <div class="comentarios">
        <form id="formComentario">
            <textarea id="comentarioInput" placeholder="Escribe tu comentario..."></textarea>
            <div id="contadorLetras">0 caracteres</div>
            <button type="submit">Comentar</button>
            <button type="button" id="cancelarBtn" class="cancelacion">Cancelar</button>
        </form>

        <ul id="listaComentarios"></ul>
    </div>
 </main>
 @include('mapadesuenos.plantillas.footer')
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    // ------------------ URLS DE LA API ------------------
    const RATING_API_URL = "http://api.codersfree.com/v1/calificaciones";
    const COMMENTS_API_URL = 'http://api.codersfree.com/v1/comentarios';
    const AVERAGE_API_URL = "http://api.codersfree.com/v1/promediocalificacion";
    const LIBRO_ID = 2; // ID del libro actual
    
    // ------------------ CARGAR DETALLES DEL LIBRO ------------------
    const apiUrl = `http://api.codersfree.com/v1/libros/${LIBRO_ID}`;
    
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudo obtener el libro');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('titulo').textContent = data.titulo;
            document.getElementById('descripcion').textContent = data.descripcionlibro;
            document.getElementById('autor').textContent = data.autor;
            document.getElementById('editorial').textContent = data.editorial;
            document.getElementById('link').href = data.link;
            
            // Cargar la portada desde la URL almacenada
            const portadaImg = document.getElementById('portada');
            if (data.portada_url) {
                portadaImg.src = data.portada_url;
            } else {
                // URL de imagen por defecto si no hay portada
                portadaImg.src = "https://via.placeholder.com/360x360?text=Sin+Portada";
            }
        })
        .catch(error => {
            console.error('Error al cargar detalles del libro:', error);
        });

    // ------------------ SISTEMA DE CALIFICACIONES ------------------
    const estrellas = document.querySelectorAll(".star");
    const averageRatingSpan = document.getElementById("average-rating");
    let currentRating = 0; // Para mantener la calificación actual del usuario

    function clearStars() {
        estrellas.forEach(estrella => {
            estrella.classList.remove("selected");
        });
    }

    function markStars(value, isUserRating = false) {
        clearStars();
        if (isUserRating) {
            currentRating = value; // Actualizar la calificación actual del usuario
        }
        estrellas.forEach(estrella => {
            if (parseFloat(estrella.dataset.value) <= (isUserRating ? currentRating : value)) {
                estrella.classList.add("selected");
            }
        });
    }

    async function saveAverageRating(average, totalRatings) {
        try {
            // Primero intentamos hacer un POST para crear un nuevo registro
            const response = await fetch(AVERAGE_API_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    libro_id: LIBRO_ID,
                    promedioestrellas: parseFloat(average).toFixed(1),
                    numerodecalificaciones: totalRatings
                })
            });

            if (!response.ok) {
                throw new Error('Error al guardar el promedio');
            }

            const data = await response.json();
            console.log('Promedio guardado exitosamente:', data);
            return data;
        } catch (error) {
            console.error('Error al guardar el promedio:', error);
            // Si falla el POST, intentamos hacer un PUT/PATCH para actualizar el registro existente
            try {
                const updateResponse = await fetch(`${AVERAGE_API_URL}/${LIBRO_ID}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        libro_id: LIBRO_ID,
                        promedioestrellas: parseFloat(average).toFixed(1),
                        numerodecalificaciones: totalRatings
                    })
                });

                if (!updateResponse.ok) {
                    throw new Error('Error al actualizar el promedio');
                }

                const updateData = await updateResponse.json();
                console.log('Promedio actualizado exitosamente:', updateData);
                return updateData;
            } catch (updateError) {
                console.error('Error al actualizar el promedio:', updateError);
            }
        }
    }

    function loadRatings() {
        fetch(`${RATING_API_URL}?libro_id=${LIBRO_ID}`)
            .then(response => {
                if (!response.ok) throw new Error('Error al cargar calificaciones');
                return response.json();
            })
            .then(data => {
                const ratings = Array.isArray(data) ? data : (data.data || []);
                
                if (ratings.length > 0) {
                    const average = ratings.reduce((acc, curr) => acc + parseFloat(curr.estrellas), 0) / ratings.length;
                    averageRatingSpan.textContent = average.toFixed(1);
                    
                    // Si no hay calificación del usuario, mostrar el promedio
                    if (!currentRating) {
                        markStars(average);
                    } else {
                        markStars(currentRating, true);
                    }
                    
                    // Guardar el promedio en la base de datos
                    saveAverageRating(average, ratings.length);
                }
            })
            .catch(error => console.error('Error al cargar calificaciones:', error));
    }

    async function submitRating(rating) {
        try {
            const response = await fetch(RATING_API_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    libro_id: LIBRO_ID,
                    estrellas: parseFloat(rating)
                })
            });

            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || 'Error al enviar calificación');
            }

            console.log('Calificación enviada:', data);
            currentRating = rating; // Actualizar la calificación actual
            markStars(rating, true); // Marcar las estrellas seleccionadas
            loadRatings(); // Recargar y actualizar el promedio
            alert("¡Calificación enviada con éxito!");
        } catch (error) {
            console.error("Error al enviar calificación:", error);
            alert("No se pudo enviar la calificación. Por favor, intente nuevamente.");
        }
    }

    // Event listeners para las estrellas
    if (estrellas.length > 0) {
        estrellas.forEach(estrella => {
            estrella.addEventListener('mouseover', function() {
                const value = parseFloat(this.dataset.value);
                estrellas.forEach(s => {
                    if (parseFloat(s.dataset.value) <= value) {
                        s.classList.add("hover");
                    } else {
                        s.classList.remove("hover");
                    }
                });
            });

            estrella.addEventListener('mouseout', function() {
                estrellas.forEach(s => s.classList.remove("hover"));
                // Mostrar la calificación actual al quitar el mouse
                if (currentRating) {
                    markStars(currentRating, true);
                }
            });

            estrella.addEventListener('click', function() {
                const value = parseFloat(this.dataset.value);
                submitRating(value);
            });
        });
    }

    // Cargar calificaciones iniciales
    loadRatings();

    // ------------------ SISTEMA DE COMENTARIOS ------------------
    const listaComentarios = document.getElementById('listaComentarios');
    const formComentario = document.getElementById('formComentario');
    const comentarioInput = document.getElementById('comentarioInput');
    const contadorLetras = document.getElementById('contadorLetras');
    const cancelarBtn = document.getElementById('cancelarBtn');
    const enviarBtn = formComentario?.querySelector('button[type="submit"]');

    if (listaComentarios && formComentario && comentarioInput) {
        cargarComentarios();

        formComentario.addEventListener('submit', (e) => {
            e.preventDefault();
            enviarComentario();
        });

        comentarioInput.addEventListener('input', () => {
            const letraCount = comentarioInput.value.replace(/\s/g, "").length;
            contadorLetras.textContent = `${letraCount} caracteres`;
            contadorLetras.style.color = letraCount > 500 ? 'red' : '';
        });

        if (cancelarBtn) {
            cancelarBtn.addEventListener('click', () => {
                comentarioInput.value = '';
                contadorLetras.textContent = "0 caracteres";
            });
        }
    }

    function cargarComentarios() {
        fetch(`${COMMENTS_API_URL}?libro_id=${LIBRO_ID}`)
            .then(response => response.ok ? response.json() : Promise.reject(response.status))
            .then(data => {
                listaComentarios.innerHTML = '';
                const comentarios = data.data ?? data;
                comentarios.forEach(comentario => agregarComentarioAlDOM(comentario));
            })
            .catch(error => console.error('Error al obtener comentarios:', error));
    }

    function agregarComentarioAlDOM(comentario) {
        const li = document.createElement('li');
        li.classList.add('comentario-item');
        li.dataset.id = comentario.id;
        li.innerHTML = `
            <div class="comment-header">
                <span class="author">Usuario</span> | <span class="date">${formatDate(comentario.fechacreacion)}</span>
            </div>
            <div class="comment-body">${comentario.comentario}</div>
            <div class="comment-actions">
                <button class="deleteBtn" data-id="${comentario.id}">Eliminar</button>
            </div>
        `;

        li.querySelector('.deleteBtn').addEventListener('click', function() {
            borrarComentario(comentario.id, li);
        });

        listaComentarios.appendChild(li);
    }

    function enviarComentario() {
        const textoComentario = comentarioInput.value.trim();
        if (!textoComentario) {
            alert("Por favor, escribe un comentario.");
            return;
        }

        if (textoComentario.replace(/\s/g, "").length > 500) {
            alert("El comentario no debe superar los 500 caracteres.");
            return;
        }

        enviarBtn.disabled = true;
        enviarBtn.textContent = "Enviando...";

        fetch(COMMENTS_API_URL, {
            method: "POST",
            headers: { 
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                libro_id: LIBRO_ID,
                comentario: textoComentario,
                fechacreacion: new Date().toISOString().replace("T", " ").slice(0, 19)
            })
        })
        .then(response => response.ok ? response.json() : Promise.reject(response.status))
        .then(data => {
            agregarComentarioAlDOM(data);
            comentarioInput.value = "";
            contadorLetras.textContent = "0 caracteres";
        })
        .catch(error => {
            console.error("Error al enviar comentario:", error);
            alert("No se pudo enviar el comentario.");
        })
        .finally(() => {
            enviarBtn.disabled = false;
            enviarBtn.textContent = "Comentar";
        });
    }

    function borrarComentario(id, li) {
        fetch(`${COMMENTS_API_URL}/${id}?libro_id=${LIBRO_ID}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            }
        })
        .then(response => response.ok ? response.json() : Promise.reject(response.status))
        .then(() => li.remove())
        .catch(error => {
            console.error("Error al borrar comentario:", error);
            alert("No se pudo eliminar el comentario.");
        });
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('es-ES', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
        });
    }
});
    </script>
</body>
</html>
