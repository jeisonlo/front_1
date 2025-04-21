// Función para cargar los datos de los pagos
async function cargarHistorialPagos() {
    try {
        const response = await fetch('https://back1-production-67bf.up.railway.app/v1/payments');
        if (!response.ok) throw new Error('Error al obtener los pagos');
        
        const { data: pagos } = await response.json();
        const tbody = document.querySelector('#tabla-pagos tbody');
        tbody.innerHTML = '';

        if (!pagos || pagos.length === 0) {
            tbody.innerHTML = '<tr><td colspan="4" class="no-data">No hay pagos registrados</td></tr>';
            return;
        }

        pagos.forEach(pago => {
            const tr = document.createElement('tr');
            
            // Titular
            const tdTitular = document.createElement('td');
            tdTitular.textContent = pago.nombre_tarjeta || 'N/A';
            
            // Método de pago
            const tdMetodo = document.createElement('td');
            tdMetodo.textContent = pago.metodo_pago || 'Nequi';
            
            // Fecha
            const tdFecha = document.createElement('td');
            tdFecha.textContent = new Date(pago.created_at).toLocaleDateString('es-ES', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            
            // Botón de detalles
            const tdAcciones = document.createElement('td');
            const btnDetalles = document.createElement('button');
            btnDetalles.className = 'boton-detalles';
            btnDetalles.innerHTML = '<i class="fas fa-eye"></i> Ver';
            btnDetalles.onclick = () => mostrarDetalles(pago);
            tdAcciones.appendChild(btnDetalles);
            
            tr.append(tdTitular, tdMetodo, tdFecha, tdAcciones);
            tbody.appendChild(tr);
        });
    } catch (error) {
        console.error('Error:', error);
        document.querySelector('#tabla-pagos tbody').innerHTML = `
            <tr><td colspan="4" class="error">Error al cargar datos: ${error.message}</td></tr>
        `;
    }
}

function mostrarDetalles(pago) {
    const modal = document.createElement('div');
    modal.className = 'modal-detalles';
    modal.innerHTML = `
        <div class="contenido-modal">
            <h3>Detalles del Pago</h3>
            <div class="detalles-grid">
                <div class="detalle-item">
                    <span class="detalle-label">Titular:</span>
                    <span class="detalle-valor">${pago.nombre_tarjeta || 'N/A'}</span>
                </div>
                <div class="detalle-item">
                    <span class="detalle-label">Tarjeta:</span>
                    <span class="detalle-valor">${pago.numero_tarjeta ? '•••• •••• •••• ' + pago.numero_tarjeta.slice(-4) : 'N/A'}</span>
                </div>
                <div class="detalle-item">
                    <span class="detalle-label">Vencimiento:</span>
                    <span class="detalle-valor">${pago.fecha_vencimiento || 'N/A'}</span>
                </div>
                <div class="detalle-item">
                    <span class="detalle-label">Documento:</span>
                    <span class="detalle-valor">${pago.cc || 'N/A'}</span>
                </div>
                <div class="detalle-item">
                    <span class="detalle-label">Monto:</span>
                    <span class="detalle-valor">$${parseFloat(pago.monto || 0).toFixed(2)}</span>
                </div>
                <div class="detalle-item">
                    <span class="detalle-label">Fecha:</span>
                    <span class="detalle-valor">${new Date(pago.created_at).toLocaleString('es-ES')}</span>
                </div>
            </div>
            <button class="boton-cerrar">Cerrar</button>
        </div>
    `;
    
    document.body.appendChild(modal);
    modal.querySelector('.boton-cerrar').addEventListener('click', () => modal.remove());
}

document.addEventListener('DOMContentLoaded', cargarHistorialPagos);