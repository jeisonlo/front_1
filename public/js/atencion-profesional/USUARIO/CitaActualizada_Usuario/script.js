document.addEventListener("DOMContentLoaded", function () {
    // Obtener los datos de la cita a editar desde localStorage
    const citaEditar = JSON.parse(localStorage.getItem("citaEditar"));
    
    if (!citaEditar || !citaEditar.id) {
        console.error("No hay datos de cita para editar o falta el ID");
        alert("No se encontraron datos de la cita para editar");
        return;
    }
    
    console.log("Datos de cita a editar:", citaEditar);
    
    if (citaEditar) {
        // Llenar el formulario con los datos de la cita
        const nombre = document.getElementById("nombre");
        const correo = document.getElementById("correo");
        const telefono = document.getElementById("telefono");
        const paquete = document.getElementById("paquete");
        const especialidad = document.getElementById("especialidad");
        const fecha = document.getElementById("fecha");
        const hora = document.getElementById("hora");
        const comentarios = document.getElementById("comentarios");
        
        if (nombre) nombre.value = citaEditar.nombre;
        if (correo) correo.value = citaEditar.correo;
        if (telefono) telefono.value = citaEditar.telefono;
        if (paquete) paquete.value = citaEditar.paquete;
        if (especialidad) especialidad.value = citaEditar.especialidad;
        if (fecha) fecha.value = citaEditar.fecha;
        if (hora) hora.value = citaEditar.hora;
        if (comentarios) comentarios.value = citaEditar.comentarios || '';
    }
    
    // Manejar el envío del formulario
    const form = document.getElementById("actualizarCitaForm");
    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            
            // Crear un objeto solo con los campos editables
            const citaActualizada = {
                fecha: document.getElementById("fecha").value,
                hora: document.getElementById("hora").value,
                comentarios: document.getElementById("comentarios").value,
            };
            
            console.log("Enviando datos actualizados:", citaActualizada);
            
            // Enviar la solicitud PUT al backend
            fetch(`http://backendtranquilidad.test/v1/appointments/${citaEditar.id}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify(citaActualizada),
            })
            .then(response => {
                if (!response.ok) {
                    // Si falla con PUT, intentar con método POST
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
                
                // Incluso si hay un error, redirigir a la página de citas
                if (confirm("Hubo un error al actualizar la cita. ¿Desea volver a la lista de citas programadas?")) {
                    window.location.href = "/usuario/citas-programadas";
                }
            });
        });
    }
    
    function intentarConFormMethodSpoofing(citaActualizada) {
        // Algunos servidores de Laravel están configurados para aceptar solo POST
        // con un campo _method=PUT para simular PUT
        const formData = new FormData();
        
        // Agregar _method=PUT para Laravel Form Method Spoofing
        formData.append('_method', 'PUT');
        
        // Agregar solo los campos editables
        for (const key in citaActualizada) {
            formData.append(key, citaActualizada[key]);
        }
        
        return fetch(`/appointments/${citaEditar.id}`, {
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
    
    function mostrarMensajeExito() {
        // Mostrar mensaje emergente de éxito
        const mensajeEmergente = document.getElementById("mensajeEmergente");
        if (mensajeEmergente) {
            mensajeEmergente.style.display = "flex";
        } else {
            alert("Cita actualizada correctamente");
            window.location.href = "/usuario/citas-programadas"; // Redirigir si no hay mensaje emergente
        }
    }
    
    // Redirigir al apartado de citas agendadas al hacer clic en "Aceptar"
    const btnAceptar = document.getElementById("btnAceptar");
    if (btnAceptar) {
        btnAceptar.addEventListener("click", function () {
            window.location.href = "/usuario/citas-programadas"; // URL directa en lugar de usar route()
        });
    }
});