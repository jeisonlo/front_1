document.addEventListener("DOMContentLoaded", async function () {
    const contenedorCitas = document.getElementById("contenedorCitas");
    const API_URL = "https://back1-production-67bf.up.railway.app/v1/appointments"; // URL de tu API

    // Definir las rutas como variables
    const RUTAS = {
        consultaProfesional: "/profesional/consulta", // Ruta relativa para ingresar a la consulta
        editarCitaProfesional: "/profesional/cita-actualizada", // Ruta relativa para editar la cita
        cancelarCitaProfesional: "/profesional/cancelar-cita2", // Ruta relativa para cancelar la cita
        googleMeet: "https://meet.google.com" // URL de Google Meet
    };

    // Código para depuración - TEMPORAL
    const citasAceptadas = JSON.parse(localStorage.getItem('citasAceptadas')) || [];
    const debugElement = document.createElement('div');
    debugElement.style.padding = '10px';
    debugElement.style.border = '1px solid #59009A';
    debugElement.style.margin = '10px';
    debugElement.style.borderRadius = '5px';
    debugElement.style.backgroundColor = '#f8f9fa';
    debugElement.innerHTML = `
        <h3>Información de depuración</h3>
        <p>Citas aceptadas en localStorage: ${JSON.stringify(citasAceptadas)}</p>
    `;
    document.body.prepend(debugElement);

    // Función para obtener las citas desde el backend
    async function obtenerCitas() {
        try {
            const response = await fetch(API_URL);
            if (!response.ok) {
                throw new Error("Error al obtener citas");
            }
            // Mostrar respuesta cruda para debugging
            const responseText = await response.text();
            console.log("Respuesta cruda del API:", responseText);
            
            // Convertir la respuesta a JSON
            const data = JSON.parse(responseText);
            console.log("Citas obtenidas:", data);
            return data.data || []; // Retornar el array de citas
        } catch (error) {
            console.error("Error:", error);
            contenedorCitas.innerHTML = `<p>Error al cargar citas: ${error.message}</p>`;
            return []; // Retornar un array vacío en caso de error
        }
    }

    // Función para mostrar las citas en la vista
    function mostrarCitas(citas) {
        contenedorCitas.innerHTML = "";

        if (citas.length === 0) {
            contenedorCitas.innerHTML = "<p>No hay citas agendadas</p>";
            return;
        }

        citas.forEach((cita, index) => {
            const tarjeta = document.createElement("div");
            tarjeta.classList.add("tarjeta");
            tarjeta.innerHTML = `
                <h3>${cita.nombre}</h3>
                <p><strong>Correo:</strong> ${cita.correo}</p>
                <p><strong>Teléfono:</strong> ${cita.telefono}</p>
                <p><strong>Paquete:</strong> ${cita.paquete || 'No especificado'}</p>
                <p><strong>Especialidad:</strong> ${cita.especialidad}</p>
                <p><strong>Profesional:</strong> ${cita.profesional || 'No asignado'}</p>
                <p><strong>Fecha:</strong> ${cita.fecha}</p>
                <p><strong>Hora:</strong> ${cita.hora}</p>
                <p><strong>Comentarios:</strong> ${cita.comentarios || 'Sin comentarios'}</p>
                <button class="btn-ingresar" data-id="${cita.id}" data-index="${index}">Ingresar</button>
                <button class="btn-editar" data-id="${cita.id}" data-index="${index}">Editar</button>
                <button class="btn-cancelar" data-id="${cita.id}" data-index="${index}">Cancelar</button>
            `;
            contenedorCitas.appendChild(tarjeta);
        });
    }

    // Obtener las citas al cargar la página
    const citasIniciales = await obtenerCitas();
    console.log("Total de citas iniciales:", citasIniciales.length);

    // Obtener citas aceptadas del localStorage
    console.log("Citas aceptadas en localStorage:", citasAceptadas); // Verificar en consola
    
    // Convertir todos los IDs en el localStorage a string para comparación consistente
    const citasAceptadasIds = citasAceptadas.map(id => id.toString());
    console.log("IDs de citas aceptadas (como strings):", citasAceptadasIds);

    // Filtrar citas aceptadas con mejor depuración
    const citasFiltradas = citasIniciales.filter(cita => {
        const citaIdStr = cita.id.toString();
        const estaAceptada = citasAceptadasIds.includes(citaIdStr);
        console.log(`Cita ID: ${citaIdStr}, ¿Está aceptada?: ${estaAceptada}`);
        return estaAceptada;
    });
    
    console.log("Citas filtradas aceptadas:", citasFiltradas); // Verificar en consola
    console.log("Número de citas aceptadas:", citasFiltradas.length);

    // Mostrar solo las citas aceptadas
    mostrarCitas(citasFiltradas);

    // Manejar clics en los botones de Ingresar, Editar y Cancelar
    contenedorCitas.addEventListener("click", function (event) {
        const button = event.target;
        if (!button.matches("button")) return;

        const index = parseInt(button.getAttribute("data-index"));
        const citaId = button.getAttribute("data-id");
        const cita = citasFiltradas[index];

        if (!cita) {
            console.error("Error: Cita no encontrada en el índice", index);
            alert("Error al encontrar la información de la cita");
            return;
        }

        console.log("Cita seleccionada:", cita);

        if (button.classList.contains("btn-ingresar")) {
            // Redirigir a Google Meet en lugar de la vista de consulta
            window.open(RUTAS.googleMeet, '_blank');
        } else if (button.classList.contains("btn-editar")) {
            // Redirigir a la vista de Editar
            localStorage.setItem("citaEditar", JSON.stringify(cita));
            window.location.href = `${RUTAS.editarCitaProfesional}?id=${citaId}`;
        } else if (button.classList.contains("btn-cancelar")) {
            if (confirm("¿Estás seguro de que deseas cancelar esta cita?")) {
                // Guardar la info de la cita en localStorage para la vista de cancelación
                localStorage.setItem("citaCancelar", JSON.stringify(cita));
                window.location.href = `${RUTAS.cancelarCitaProfesional}?id=${citaId}`;
            }
        }
    });

    // Eliminar bloque de depuración después de 15 segundos
    setTimeout(() => {
        if (debugElement && debugElement.parentNode) {
            debugElement.parentNode.removeChild(debugElement);
        }
    }, 15000);
});