document.addEventListener('DOMContentLoaded', function () {
    const buzonContainer = document.getElementById('buzonContainer');
    const API_URL = "https://back1-production-67bf.up.railway.app/v1/appointments"; // URL de tu API
    const RUTAS = {
        miscitas: "/profesional/mis-citas", // Ruta relativa
    };

    // Función para cargar citas desde el backend
    async function cargarCitas() {
        try {
            const response = await fetch(API_URL); // Obtener todas las citas
            if (!response.ok) {
                throw new Error('Error al obtener citas');
            }

            const data = await response.json(); // Obtener la respuesta JSON
            console.log("Citas obtenidas:", data); // Verificar en consola

            // Verificar si la respuesta tiene la propiedad "data" y es un arreglo
            if (!data.data || !Array.isArray(data.data)) {
                throw new Error('La respuesta de la API no tiene la estructura esperada');
            }

            // Obtener citas aceptadas del localStorage
            const citasAceptadas = JSON.parse(localStorage.getItem('citasAceptadas')) || [];
            console.log("Citas aceptadas en localStorage:", citasAceptadas); // Verificar en consola
            
            // Convertir todos los IDs en el localStorage a string para comparación consistente
            const citasAceptadasIds = citasAceptadas.map(id => id.toString());
            console.log("IDs de citas aceptadas (como strings):", citasAceptadasIds);

            // Filtrar citas pendientes (las que no están en citasAceptadas)
            const citasPendientes = data.data.filter(cita => {
                const citaIdStr = cita.id.toString();
                const estaPendiente = !citasAceptadasIds.includes(citaIdStr);
                console.log(`Cita ID: ${citaIdStr}, ¿Está pendiente?: ${estaPendiente}`);
                return estaPendiente;
            });
            
            console.log("Citas pendientes:", citasPendientes); // Verificar en consola

            if (citasPendientes.length === 0) {
                buzonContainer.innerHTML = `
                    <div class="empty-message">
                        <i class="fas fa-inbox fa-2x" style="color: #59009A; margin-bottom: 10px;"></i>
                        <p>No hay citas pendientes de revisión</p>
                    </div>
                `;
                return;
            }

            buzonContainer.innerHTML = '';

            citasPendientes.forEach((cita) => {
                const citaCard = document.createElement('div');
                citaCard.className = 'cita-card';
                citaCard.innerHTML = `
                    <div class="cita-header">
                        <div class="cita-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <div class="cita-info">
                            <div class="cita-tipo">${cita.paquete || 'Cita Regular'}</div>
                            <h3>${cita.nombre}</h3>
                        </div>
                    </div>
                    <div class="cita-detalles">
                        <p><i class="far fa-envelope"></i> ${cita.correo}</p>
                        <p><i class="fas fa-phone"></i> ${cita.telefono}</p>
                        <p><i class="fas fa-user-md"></i> ${cita.especialidad}</p>
                        <p><i class="far fa-calendar-alt"></i> ${cita.fecha}</p>
                        <p><i class="far fa-clock"></i> ${cita.hora}</p>
                        ${cita.comentarios ? `<p><i class="far fa-comment"></i> ${cita.comentarios}</p>` : ''}
                    </div>
                    <div class="cita-actions">
                        <button class="btn-aceptar" data-id="${cita.id}">
                            <i class="fas fa-check"></i> Aceptar
                        </button>
                        <button class="btn-rechazar" data-id="${cita.id}">
                            <i class="fas fa-times"></i> Rechazar
                        </button>
                    </div>
                `;
                buzonContainer.appendChild(citaCard);
            });

            // Manejar clic en botones de aceptar y rechazar
            document.querySelectorAll('.btn-aceptar').forEach(btn => {
                btn.addEventListener('click', async function () {
                    const citaId = this.getAttribute('data-id');
                    await aceptarCita(citaId);
                });
            });

            document.querySelectorAll('.btn-rechazar').forEach(btn => {
                btn.addEventListener('click', async function () {
                    const citaId = this.getAttribute('data-id');
                    await rechazarCita(citaId);
                });
            });

        } catch (error) {
            console.error('Error:', error);
            buzonContainer.innerHTML = `<p>Error al cargar citas: ${error.message}</p>`;
        }
    }

    // Función para aceptar una cita
    async function aceptarCita(citaId) {
        try {
            // Obtener citas aceptadas del localStorage
            const citasAceptadas = JSON.parse(localStorage.getItem('citasAceptadas')) || [];
            
            // Convertir el ID a string para consistencia
            const citaIdStr = citaId.toString();
            
            // Agregar la cita aceptada a la lista solo si no existe ya
            if (!citasAceptadas.map(id => id.toString()).includes(citaIdStr)) {
                citasAceptadas.push(citaIdStr);
                localStorage.setItem('citasAceptadas', JSON.stringify(citasAceptadas));
                console.log("Cita aceptada guardada:", citaIdStr); 
                console.log("Citas aceptadas actualizadas:", JSON.stringify(citasAceptadas));
            } else {
                console.log("La cita ya estaba aceptada:", citaIdStr);
            }

            // Recargar las citas después de aceptar
            cargarCitas();

            // Opcionalmente, agregar un mensaje de éxito antes de redirigir
            alert('Cita aceptada con éxito');
            
            // Redirigir a la vista de Mis Citas
            window.location.href = RUTAS.miscitas;
        } catch (error) {
            console.error('Error:', error);
            alert('Error al aceptar la cita');
        }
    }

    // Función para rechazar una cita
    async function rechazarCita(citaId) {
        if (confirm('¿Estás seguro de que deseas rechazar esta cita?')) {
            try {
                const response = await fetch(`${API_URL}/${citaId}`, {
                    method: 'DELETE', // Método para eliminar la cita
                });

                if (!response.ok) {
                    throw new Error('Error al rechazar la cita');
                }

                // Recargar las citas después de rechazar
                cargarCitas();
            } catch (error) {
                console.error('Error:', error);
                alert('Error al rechazar la cita');
            }
        }
    }

    // Cargar citas al iniciar la página
    cargarCitas();
});