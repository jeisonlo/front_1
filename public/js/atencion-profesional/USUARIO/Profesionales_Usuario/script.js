let calificacionSeleccionada = 0; // Variable para almacenar la calificación
let nombreProfesional = ""; // Para almacenar el nombre del profesional

function abrirModalCalificacion(nombre, imagen) {
    nombreProfesional = nombre; // Guarda el nombre del profesional
    document.getElementById("modalNombre").textContent = nombre;
    document.getElementById("modalImagen").src = imagen;
    document.getElementById("modalCalificacion").style.display = "block";
}

function cerrarModal() {
    document.getElementById("modalCalificacion").style.display = "none";
}

function seleccionarEstrella(n) {
    calificacionSeleccionada = n;
    let estrellas = document.querySelectorAll(".estrella");
    estrellas.forEach((estrella, index) => {
        estrella.style.color = index < n ? "purple" : "gray";
    });
}

function abrirComentar() {
    document.getElementById("modalComentar").style.display = "block";
}

function cerrarComentar() {
    document.getElementById("modalComentar").style.display = "none";
}

function guardarComentario() {
    let comentario = document.getElementById("comentario").value;
    
    if (comentario.trim() === "") {
        alert("El comentario no puede estar vacío.");
        return;
    }

    let nuevoComentario = document.createElement("p");
    nuevoComentario.textContent = comentario;
    document.getElementById("modalCalificacion").appendChild(nuevoComentario);

    cerrarComentar();
}

function guardarCalificacion() {
    let comentario = document.getElementById("comentario").value.trim();

    if (calificacionSeleccionada === 0) {
        alert("Por favor, selecciona una calificación.");
        return;
    }

    if (comentario === "") {
        alert("Por favor, ingresa un comentario.");
        return;
    }

    let datos = {
        name: nombreProfesional,
        stars: calificacionSeleccionada,
        comment: comentario
    };

    fetch("http://backendtranquilidad.test/v1/reviews", { // Cambia por la URL de tu backend
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Calificación guardada:', data);
        cerrarModal(); // Cierra el modal
        window.location.href = "/usuario/reseñas"; // Redirige a la sección de comentarios
    })
    .catch(error => console.error('Error:', error));
}
