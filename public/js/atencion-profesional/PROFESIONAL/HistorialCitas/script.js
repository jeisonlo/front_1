// Función para obtener y mostrar las citas
async function fetchAppointmentsPsicologo() {
    try {
        // Hacer una solicitud a la API
        const response = await fetch('https://back1-production-67bf.up.railway.app/v1/appointments');
        if (!response.ok) {
            throw new Error('Error al obtener las citas');
        }

        // Convertir la respuesta a JSON
        const data = await response.json();

        // Obtener la tabla y su cuerpo
        const tableBody = document.querySelector('#citas-table-psicologo tbody');

        // Verificar si el elemento existe
        if (!tableBody) {
            throw new Error('No se encontró la tabla en el DOM');
        }

        // Limpiar el contenido actual de la tabla
        tableBody.innerHTML = '';

        // Verificar si hay datos
        if (data.data.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="4">No hay citas disponibles.</td>
                </tr>
            `;
            return;
        }

        // Llenar la tabla con los datos
        data.data.forEach(appointment => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${appointment.fecha}</td>
                <td>${appointment.profesional}</td>
                <td>${appointment.paquete}</td>
                <td>Completada</td> <!-- Puedes cambiar esto por un campo de la base de datos -->
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un error al cargar las citas.');
    }
}

// Llamar a la función cuando la página se cargue
document.addEventListener('DOMContentLoaded', fetchAppointmentsPsicologo);