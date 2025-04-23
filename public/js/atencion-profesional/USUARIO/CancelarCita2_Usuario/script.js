document.addEventListener("DOMContentLoaded", function () {
    const staticElements = document.querySelectorAll('.form-input.static');
    const citaCancelar = JSON.parse(localStorage.getItem("citaCancelar"));
    
    if (citaCancelar && staticElements.length === 4) {
        staticElements[0].textContent = citaCancelar.nombre || 'No disponible';
        staticElements[1].textContent = citaCancelar.especialidad || 'No disponible';
        staticElements[2].textContent = citaCancelar.fecha || 'No disponible';
        staticElements[3].textContent = citaCancelar.hora || 'No disponible';
    }

    const form = document.getElementById("cancellationForm");
    const enviarButton = document.querySelector('.form-button');

    if (form && enviarButton) {
        enviarButton.addEventListener('click', function (event) {
            event.preventDefault();

            const motivoInput = form.querySelector('input[type="text"]');
            const reprogramarSelect = form.querySelector('select');
            const notasTextarea = form.querySelector('textarea');

            if (!motivoInput.value || !reprogramarSelect.value) {
                alert("Por favor complete todos los campos requeridos");
                return;
            }

            const motivo = motivoInput.value;
            const reprogramar = reprogramarSelect.value;
            const notas = notasTextarea ? notasTextarea.value : '';

            if (reprogramar === "no" && citaCancelar && citaCancelar.id) {
                // 🟢 Hacer la petición DELETE para eliminar la cita
                fetch(`http://backendtranquilidad.test/v1/appointments/${citaCancelar.id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        alert("Cita cancelada exitosamente.");
                        window.location.href = "/usuario/citas-programadas";
                    } else {
                        alert("Hubo un problema al cancelar la cita.");
                    }
                })
                .catch(error => {
                    console.error("Error al cancelar la cita:", error);
                    alert("Error de conexión. Inténtelo más tarde.");
                });
            } else if (reprogramar === "si" && citaCancelar) {
                // 🟢 Redireccionar a la vista de editar con los datos de la cita
                localStorage.setItem("citaEditar", JSON.stringify(citaCancelar));
                window.location.href = "/usuario/cita-actualizada";
            }
        });
    }
});