document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencias a los elementos del formulario
    const form = document.getElementById("actualizarCitaForm");
    const nombreInput = document.getElementById("nombre");
    const correoInput = document.getElementById("correo");
    const telefonoInput = document.getElementById("telefono");
    const paqueteSelect = document.getElementById("paquete");
    const especialidadSelect = document.getElementById("especialidad");
    const fechaInput = document.getElementById("fecha");
    const horaInput = document.getElementById("hora");
    const comentariosInput = document.getElementById("comentarios");
    const mensajeEmergente = document.getElementById("mensajeEmergente");

    // URL base de la API
    const API_URL = "https://back1-production-67bf.up.railway.app/v1/appointments";

    // Obtener la cita a editar del localStorage
    let citaEditar = JSON.parse(localStorage.getItem("citaEditar"));

    if (citaEditar) {
        // Rellenar los campos con la información de la cita
        nombreInput.value = citaEditar.nombre;
        correoInput.value = citaEditar.correo;
        telefonoInput.value = citaEditar.telefono;
        paqueteSelect.value = citaEditar.paquete;
        especialidadSelect.value = citaEditar.especialidad;
        fechaInput.value = citaEditar.fecha;
        horaInput.value = citaEditar.hora;
        comentariosInput.value = citaEditar.comentarios || '';

        // Deshabilitar los campos no editables
        nombreInput.disabled = true;
        correoInput.disabled = true;
        telefonoInput.disabled = true;
        paqueteSelect.disabled = true;
        especialidadSelect.disabled = true;

        // Habilitar los campos editables
        fechaInput.disabled = false;
        horaInput.disabled = false;
        comentariosInput.disabled = false;
    }

    // Manejar el envío del formulario
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        // Crear un objeto con los campos editables
        const citaActualizada = {
            fecha: fechaInput.value,
            hora: horaInput.value,
            comentarios: comentariosInput.value,
        };

        console.log("Enviando datos actualizados:", citaActualizada);

        // Enviar solicitud PUT al backend
        fetch(`${API_URL}/${citaEditar.id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(citaActualizada),
        })
        .then(response => {
            if (!response.ok) {
                // Intentar con método POST y _method=PUT si PUT falla
                if (response.status === 404 || response.status === 405) {
                    console.warn("Método PUT no soportado, intentando con POST y _method=PUT");
                    return intentarConFormMethodSpoofing(citaActualizada);
                }
                return response.text().then(text => {
                    console.error("Respuesta del servidor:", text);
                    throw new Error("Error al actualizar la cita");
                });
            }
            return response.json();
        })
        .then(data => {
            console.log("Actualización exitosa:", data);
            mostrarMensajeExito();
        })
        .catch(error => {
            console.error("Error detallado:", error);
            if (confirm("Hubo un error al actualizar la cita. ¿Desea volver a la lista de citas programadas?")) {
                window.location.href = "/profesional/mis-citas";
            }
        });
    });

    // Método alternativo con POST y _method=PUT para servidores Laravel
    function intentarConFormMethodSpoofing(citaActualizada) {
        const formData = new FormData();
        formData.append('_method', 'PUT');
        for (const key in citaActualizada) {
            formData.append(key, citaActualizada[key]);
        }

        return fetch(`${API_URL}/${citaEditar.id}`, {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => {
                    console.error("Respuesta del servidor (POST con _method):", text);
                    throw new Error("No se pudo actualizar la cita");
                });
            }
            return response.json();
        });
    }

    // Mostrar mensaje de éxito
    function mostrarMensajeExito() {
        if (mensajeEmergente) {
            mensajeEmergente.style.display = "flex";
        } else {
            alert("Cita actualizada correctamente");
            window.location.href = "/profesional/mis-citas";
        }
    }

    // Redirigir al apartado de citas agendadas
    const btnAceptar = document.getElementById("btnAceptar");
    if (btnAceptar) {
        btnAceptar.addEventListener("click", function () {
            window.location.href = "/profesional/mis-citas";
        });
    }
});