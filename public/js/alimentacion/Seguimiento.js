let goalChart, progressChart;

document.addEventListener("DOMContentLoaded", () => {
    inicializarGraficas();
    configurarEventos();
    cargarDatosIniciales();
});

async function cargarDatosIniciales() {
    try {
        const response = await fetch('http://localhost:8000/api/progreso');
        const data = await response.json();
        
        actualizarFormulario(data);
        actualizarHistorial(data);
        actualizarGraficas(data);
        
    } catch (error) {
        console.error('Error:', error);
        actualizarGraficas({evolucion: []});
    }
}

function inicializarGraficas() {
    // Gráfica de Línea
    const ctxLinea = document.getElementById('progressChart').getContext('2d');
    progressChart = new Chart(ctxLinea, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Evolución de Peso',
                data: [],
                borderColor: '#6d0eb1',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(109, 14, 177, 0.1)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    title: { display: true, text: 'Kilogramos' }
                }
            }
        }
    });

    // Gráfica Circular
    const ctxCircular = document.getElementById('goalChart').getContext('2d');
    goalChart = new Chart(ctxCircular, {
        type: 'doughnut',
        data: {
            labels: ['Peso Actual', 'Diferencia'],
            datasets: [{
                data: [1, 1], // Valores iniciales
                backgroundColor: ['#6d0eb1', '#f0f0f0']
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { enabled: false }
            }
        }
    });
}

function actualizarFormulario(data) {
    if(data.peso_actual) {
        document.getElementById('pesoActual').value = data.peso_actual;
        document.getElementById('metaPeso').value = data.meta_actual;
    }
}

function actualizarHistorial(data) {
    const historialHTML = data.historial.map(objetivo => `
        <li>
            <span class="fecha">${new Date(objetivo.created_at).toLocaleDateString()}</span>
            <span class="peso">${objetivo.peso_actual} kg</span>
            <span class="meta">Meta: ${objetivo.meta_peso} kg</span>
        </li>
    `).join('');
    
    document.getElementById('historial').innerHTML = historialHTML;
}

function actualizarGraficas(data) {
    // Actualizar gráfica de línea
    const evolucion = data.evolucion || [];
    progressChart.data.labels = evolucion.map((_, i) => `Reg. ${i + 1}`);
    progressChart.data.datasets[0].data = evolucion;
    progressChart.update();

    // Actualizar gráfica circular
    if(data.peso_actual && data.meta_actual) {
        const diferencia = Math.abs(data.meta_actual - data.peso_actual);
        goalChart.data.datasets[0].data = [
            data.peso_actual, 
            diferencia
        ];
        goalChart.update();
    }
}

async function configurarEventos() {
    document.getElementById('guardar').addEventListener('click', async (e) => {
        e.preventDefault();
        
        const objetivoData = {
            descripcion: document.getElementById('descripcion').value,
            fecha_objetivo: document.getElementById('fechaObjetivo').value,
            peso_actual: document.getElementById('pesoActual').value,
            meta_peso: document.getElementById('metaPeso').value
        };

        try {
            const response = await fetch('http://localhost:8000/api/objetivos', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(objetivoData)
            });

            const result = await response.json();
            
            if(!response.ok) {
                throw new Error(result.message || 'Error al guardar');
            }

            document.getElementById('planDieta').value = result.data.plan_dieta;
            await cargarDatosIniciales();
            mostrarNotificacion('✅ Objetivo guardado correctamente');
            
        } catch (error) {
            mostrarNotificacion(`❌ Error: ${error.message}`, 'error');
        }
    });
}

function mostrarNotificacion(mensaje, tipo = 'success') {
    const notificacion = document.createElement('div');
    notificacion.className = `notificacion ${tipo}`;
    notificacion.textContent = mensaje;
    
    document.body.appendChild(notificacion);
    
    setTimeout(() => {
        notificacion.remove();
    }, 3000);
}