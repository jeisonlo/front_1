document.addEventListener("DOMContentLoaded", async function () {
    const contenedorCitas = document.getElementById("contenedorCitas");
    const modalIngresar = document.getElementById("modalIngresar");
    const modalTitulo = document.getElementById("modalTitulo");
    const modalDetalles = document.getElementById("modalDetalles");
    const btnAceptarIngresar = document.getElementById("btnAceptarIngresar");

    const API_URL = "https://back1-production-67bf.up.railway.app/v1/appointments";

    // Definir las rutas como variables
    const RUTAS = {
        consultaUsuario: "/usuario/consulta", // Ruta relativa
        citaActualizadaUsuario: "/usuario/cita-actualizada", // Ruta relativa
        cancelarCitaUsuario: "/usuario/cancelar-cita", // Ruta relativa
    };

    // Función para obtener las citas desde el backend
    async function obtenerCitas() {
        try {
            const response = await fetch(API_URL);
            if (!response.ok) {
                throw new Error("Error al obtener citas");
            }
            const data = await response.json();
            console.log("Citas obtenidas:", data);
            return data.data || []; // Retornar el array de citas
        } catch (error) {
            console.error("Error:", error);
            contenedorCitas.innerHTML = "<p>Error al cargar citas</p>";
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
                <p><strong>Paquete:</strong> ${cita.paquete}</p>
                <p><strong>Especialidad:</strong> ${cita.especialidad}</p>
                <p><strong>Profesional:</strong> ${cita.profesional}</p>
                <p><strong>Fecha:</strong> ${cita.fecha}</p>
                <p><strong>Hora:</strong> ${cita.hora}</p>
                <p><strong>Comentarios:</strong> ${cita.comentarios || 'Sin comentarios'}</p>
                <button class="btn-ingresar" data-index="${index}">Ingresar</button>
                <button class="btn-editar" data-index="${index}">Editar</button>
                <button class="btn-cancelar" data-index="${index}">Cancelar</button>
            `;
            contenedorCitas.appendChild(tarjeta);
        });
    }

    // Obtener las citas al cargar la página
    const citasIniciales = await obtenerCitas();
    mostrarCitas(citasIniciales);

    // Manejar clics en los botones de Ingresar, Editar y Cancelar
    contenedorCitas.addEventListener("click", function (event) {
        const button = event.target;
        if (!button.matches("button")) return;

        const index = button.getAttribute("data-index");
        obtenerCitas().then((citas) => {
            // Verificar que citas sea un array válido
            if (!Array.isArray(citas)) {
                console.error("Error: citas no es un array válido");
                return;
            }

            // Verificar que el índice sea válido
            if (index < 0 || index >= citas.length) {
                console.error("Índice de cita no válido:", index);
                return;
            }

            const cita = citas[index];
            if (!cita) {
                console.error("Cita no encontrada en el índice:", index);
                return;
            }

            if (button.classList.contains("btn-ingresar")) {
                // Redirigir a la vista de Ingresar
                localStorage.setItem("citaActual", JSON.stringify(cita));
                window.location.href = RUTAS.consultaUsuario;
            } else if (button.classList.contains("btn-editar")) {
                // Redirigir a la vista de Editar
                localStorage.setItem("citaEditar", JSON.stringify(cita));
                window.location.href = RUTAS.citaActualizadaUsuario;
            } else if (button.classList.contains("btn-cancelar")) {
                // Redirigir a la vista de Cancelar
                localStorage.setItem("citaCancelar", JSON.stringify(cita));
                window.location.href = RUTAS.cancelarCitaUsuario;
            }
        });
    });

    // Manejar el modal de Ingresar (si es necesario)
    if (btnAceptarIngresar) {
        btnAceptarIngresar.addEventListener("click", function () {
            window.location.href = RUTAS.consultaUsuario;
        });
    }

    // Cerrar el modal al hacer clic fuera de él
    if (modalIngresar) {
        modalIngresar.addEventListener("click", function (event) {
            if (event.target === modalIngresar) {
                modalIngresar.classList.remove("show");
                setTimeout(() => {
                    modalIngresar.style.display = "none";
                }, 300);
            }
        });
    }
});

// Código para el menú desplegable
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const navbar = document.querySelector('.navbar');

    if (menuIcon && dropdownMenu && navbar) {
        menuIcon.addEventListener('click', function (event) {
            event.stopPropagation(); // Previene que el click se propague al documento
            dropdownMenu.classList.toggle('show');
        });

        // Cerrar el menú cuando se hace clic fuera de él
        document.addEventListener('click', function (event) {
            if (!navbar.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
});