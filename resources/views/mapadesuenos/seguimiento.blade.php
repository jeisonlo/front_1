<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--background);
    color: var(--text);
    margin: 0;
    padding: 0;
    min-height: 100vh;
    
    background-image: url('/image/Mapadesueños/seguimiento.webp'); /* Ruta corregida */
    background-size: cover; /* Para que la imagen cubra todo el fondo */
    background-position: center; /* Para centrar la imagen */
    background-attachment: fixed; /* Para que el fondo se quede fijo al hacer scroll */
    position: relative;
}

body::before {
    content: '';
    position: fixed;
  
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.377); /* Capa superpuesta con transparencia (ajusta la opacidad según sea necesario) */  z-index: -1; /* Asegura que esta capa quede detrás del contenido */
    pointer-events: none; /* Permite que se puedan hacer clics en los elementos del fondo */
  }
        
           /* Encapsulamos todos los estilos dentro de un namespace para la página de tareas */
           .task-management-app {
            /* Variables de colores para la app de tareas */
            --primary: #f4a6c0;
            --secondary: #e8a0d1;
            --tertiary: #caa1dd;
            --background: #f9eefc;
            --card-bg: #ffffff;
            --text: #666666;
        }

        /* Aplicamos un estilo neutro al contenedor principal que no afecte al header/footer */
        .task-management-app {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         
            padding: 20px;
            min-height: 100vh;
            box-sizing: border-box;
        }

        /* Todos los demás estilos quedan encapsulados dentro del namespace */
        .task-management-app .board-container {
            display: flex;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .task-management-app .column {
            flex: 1;
            min-width: 300px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
        }

        .task-management-app .column-header {
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-management-app .column:nth-child(1) .column-header { background-color: var(--primary); }
        .task-management-app .column:nth-child(2) .column-header { background-color: var(--secondary); }
        .task-management-app .column:nth-child(3) .column-header { background-color: var(--tertiary); }

        .task-management-app .task-count {
            background: rgba(255, 255, 255, 0.2);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 14px;
        }

        .task-management-app .tasks-container {
            padding: 15px;
            min-height: 200px;
        }

        .task-management-app .task-card {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s;
            max-width: 100%;
            overflow: hidden;
        }

        .task-management-app .task-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .task-management-app .task-card h3 {
            margin: 0 0 10px 0;
            color: var(--text);
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .task-management-app .task-description {
            font-size: 14px;
            color: #666;
            margin: 10px 0;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Muestra máximo 3 líneas */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word; /* Asegura que las palabras largas se rompan */
            max-height: 60px; /* Altura máxima aproximada para 3 líneas */
            line-height: 1.4; /* Espaciado entre líneas */
        }

        /* En el modal de detalles, mostrar la descripción completa */
        .task-management-app .detail-section .task-description {
            display: block;
            max-height: none;
            -webkit-line-clamp: unset;
            overflow: visible;
            white-space: pre-wrap; /* Preserva los saltos de línea */
        }

        .task-management-app .task-dates {
            font-size: 12px;
            color: #888;
            margin: 10px 0;
        }

        .task-management-app .task-actions {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .task-management-app .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            color: white;
        }

        .task-management-app .btn-move { background-color: var(--secondary); }
        .task-management-app .btn-delete { background-color: #ff6b6b; }

        .task-management-app .add-task-btn {
            width: calc(100% - 30px);
            margin: 15px;
            padding: 10px;
            background: var(--tertiary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        /* Modal styles - mantenemos estos fuera del namespace común ya que los modales 
           suelen estar al nivel del body y no dentro del contenedor principal */
        .task-management-app .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000; /* Aseguramos que quede por encima de todo */
        }

        .task-management-app .modal-content {
            background: white;
            width: 90%;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
        }

        .task-management-app .form-group {
            margin-bottom: 15px;
        }

        .task-management-app .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .task-management-app .form-group input,
        .task-management-app .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Modal de detalles */
        .task-management-app .detail-modal .modal-content {
            background: white;
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 15px;
            position: relative;
        }

        .task-management-app .detail-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary);
        }

        .task-management-app .detail-header h2 {
            margin: 0;
            color: var(--text);
            word-wrap: break-word;
        }

        .task-management-app .detail-content {
            margin: 20px 0;
        }

        .task-management-app .detail-section {
            margin-bottom: 15px;
        }

        .task-management-app .detail-section h3 {
            color: var(--secondary);
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        .task-management-app .detail-section p {
            margin: 5px 0;
            line-height: 1.5;
        }

        .task-management-app .close-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }

        .task-management-app .close-btn:hover {
            color: #333;
        }

        /* Media Queries para Responsividad */
        @media (max-width: 1024px) {
            .task-management-app .board-container {
                flex-direction: column;
                align-items: center;
            }

            .task-management-app .column {
                width: 90%;
                min-width: unset;
            }
        }

        @media (max-width: 768px) {
            .task-management-app .board-container {
                flex-direction: column;
                gap: 15px;
                padding: 10px;
            }

            .task-management-app .column {
                width: 100%;
            }

            .task-management-app .modal-content {
                width: 95%;
            }

            .task-management-app .detail-modal .modal-content {
                width: 95%;
            }

            .task-management-app .task-card h3 {
                font-size: 14px;
            }

            .task-management-app .task-description {
                font-size: 13px;
            }

            .task-management-app .btn {
                font-size: 10px;
                padding: 5px 10px;
            }
        }

        @media (max-width: 480px) {
            .task-management-app .task-card {
                padding: 10px;
            }

            .task-management-app .task-card h3 {
                font-size: 12px;
            }

            .task-management-app .task-description {
                font-size: 12px;
            }

            .task-management-app .task-actions {
                flex-direction: column;
            }

            .task-management-app .btn {
                font-size: 10px;
                padding: 6px;
            }

            .task-management-app .modal-content {
                width: 90%;
                padding: 15px;
            }

            .task-management-app .close-btn {
                font-size: 20px;
                right: 10px;
                top: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Incluir el header -->
    @include('mapadesuenos.plantillas.header')

    <!-- Contenido principal encapsulado en el namespace -->
    <div class="task-management-app">
        <div class="board-container">
            <div class="column">
                <div class="column-header">
                    <span>Tareas</span>
                    <span class="task-count" id="tareas-count">0</span>
                </div>
                <div class="tasks-container" id="tareas-container"></div>
                <button class="add-task-btn" onclick="showModal()">+ Añadir tarea</button>
            </div>
            
            <div class="column">
                <div class="column-header">
                    <span>En Progreso</span>
                    <span class="task-count" id="progreso-count">0</span>
                </div>
                <div class="tasks-container" id="progreso-container"></div>
            </div>
            
            <div class="column">
                <div class="column-header">
                    <span>Completado</span>
                    <span class="task-count" id="completado-count">0</span>
                </div>
                <div class="tasks-container" id="completado-container"></div>
            </div>
        </div>

        <!-- Modal para nueva tarea -->
        <div id="taskModal" class="modal">
            <div class="modal-content">
                <h2>Nueva Tarea</h2>
                <form id="taskForm">
                    <div class="form-group">
                        <label for="nombre_tarea">Nombre de la tarea</label>
                        <input type="text" id="nombre_tarea" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_tarea">Descripción</label>
                        <textarea id="descripcion_tarea" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" id="fecha_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha límite</label>
                        <input type="date" id="fecha_fin" required>
                    </div>
                    <input type="hidden" id="estado" value="tarea">
                    <div class="task-actions">
                        <button type="submit" class="btn btn-move">Guardar</button>
                        <button type="button" class="btn btn-delete" onclick="hideModal()">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal para detalles de tarea -->
        <div id="taskDetailModal" class="modal detail-modal">
            <div class="modal-content">
                <button class="close-btn" onclick="hideDetailModal()">&times;</button>
                <div class="detail-header">
                    <h2 id="detail-title"></h2>
                </div>
                <div class="detail-content">
                    <div class="detail-section">
                        <h3>Descripción</h3>
                        <p id="detail-description"></p>
                    </div>
                    <div class="detail-section">
                        <h3>Fechas</h3>
                        <p>Inicio: <span id="detail-fecha-inicio"></span></p>
                        <p>Límite: <span id="detail-fecha-fin"></span></p>
                    </div>
                    <div class="detail-section">
                        <h3>Estado</h3>
                        <p id="detail-estado"></p>
                    </div>
                    <div class="task-actions" id="detail-actions">
                        <!-- Los botones se agregarán dinámicamente -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir el footer -->
    @include('mapadesuenos.plantillas.footer')
    <script>
        // [Previous JavaScript remains the same until createTaskCard]
      // Constants and State
const API_URL = "http://api.codersfree.com/v1/seguimiento";

// Utility Functions
function formatEstado(estado) {
    return {
        'tarea': 'Tareas',
        'en_progreso': 'En Progreso',
        'completado': 'Completado'
    }[estado] || estado;
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('es-ES');
}

// Task Card Creation
function createTaskCard(task) {
    const card = document.createElement('div');
    card.className = 'task-card';
    card.innerHTML = `
        <h3>${task.nombre_tarea}</h3>
        <div class="task-description">${task.descripcion_tarea || "Sin descripción"}</div>
        <div class="task-dates">
            <div>Inicio: ${formatDate(task.fecha_inicio)}</div>
            <div>Límite: ${formatDate(task.fecha_fin)}</div>
        </div>
        <div class="task-actions">
            ${getActionButtons(task)}
        </div>
    `;
    
    // Add click event for task details
    card.addEventListener('click', (e) => {
        if (!e.target.classList.contains('btn')) {
            showTaskDetails(task);
        }
    });
    
    return card;
}

function getActionButtons(task) {
    const buttons = [];
    
    switch(task.estado) {
        case 'tarea':
            buttons.push(`
                <button class="btn btn-move" onclick="moverTarea(${task.id}, 'avanzar')">
                    Mover a Progreso
                </button>
            `);
            break;
        case 'en_progreso':
            buttons.push(`
                <button class="btn btn-move" onclick="moverTarea(${task.id}, 'avanzar')">
                    Completar
                </button>
                <button class="btn btn-move" onclick="moverTarea(${task.id}, 'regresar')">
                    Volver a Tareas
                </button>
            `);
            break;
        case 'completado':
            buttons.push(`
                <button class="btn btn-move" onclick="moverTarea(${task.id}, 'regresar')">
                    Volver a Progreso
                </button>
            `);
            break;
    }
    
    buttons.push(`
        <button class="btn btn-delete" onclick="eliminarTarea(${task.id})">
            Eliminar
        </button>
    `);
    
    return buttons.join('');
}

// Task Management Functions
async function moverTarea(id, accion) {
    try {
        const response = await fetch(`${API_URL}/${accion}/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        await fetchTasks(); // Refresh all tasks
    } catch (error) {
        console.error('Error al mover la tarea:', error);
        alert('Error al mover la tarea');
    }
}

async function eliminarTarea(id) {
    if (!confirm('¿Estás seguro de que deseas eliminar esta tarea?')) {
        return;
    }

    try {
        const response = await fetch(`${API_URL}/${id}`, {
            method: 'DELETE'
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        await fetchTasks(); // Refresh all tasks
    } catch (error) {
        console.error('Error al eliminar la tarea:', error);
        alert('Error al eliminar la tarea');
    }
}

// Task Loading and Display
async function fetchTasks() {
    try {
        const response = await fetch(API_URL);
        const tasks = await response.json();

        // Clear all containers
        const containers = ['tareas', 'progreso', 'completado'];
        containers.forEach(container => {
            document.getElementById(`${container}-container`).innerHTML = '';
        });

        // Distribute tasks
        tasks.forEach(task => {
            const card = createTaskCard(task);
            const containerId = {
                'tarea': 'tareas',
                'en_progreso': 'progreso',
                'completado': 'completado'
            }[task.estado];
            
            document.getElementById(`${containerId}-container`).appendChild(card);
        });

        // Update counters
        updateCounters(tasks);
    } catch (error) {
        console.error('Error al cargar las tareas:', error);
        alert('Error al cargar las tareas');
    }
}

function updateCounters(tasks) {
    const counts = {
        'tarea': 0,
        'en_progreso': 0,
        'completado': 0
    };

    tasks.forEach(task => counts[task.estado]++);

    document.getElementById('tareas-count').textContent = counts['tarea'];
    document.getElementById('progreso-count').textContent = counts['en_progreso'];
    document.getElementById('completado-count').textContent = counts['completado'];
}

// Form Handling
document.getElementById('taskForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = {
        nombre_tarea: document.getElementById('nombre_tarea').value,
        descripcion_tarea: document.getElementById('descripcion_tarea').value,
        fecha_inicio: document.getElementById('fecha_inicio').value,
        fecha_fin: document.getElementById('fecha_fin').value,
        estado: 'tarea' // Always starts as 'tarea'
    };

    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        hideModal();
        await fetchTasks();
    } catch (error) {
        console.error('Error al crear la tarea:', error);
        alert('Error al crear la tarea');
    }
});

// Modal Functions
function showModal() {
    document.getElementById('taskModal').style.display = 'block';
}

function hideModal() {
    document.getElementById('taskModal').style.display = 'none';
    document.getElementById('taskForm').reset();
}

function showTaskDetails(task) {
    document.getElementById('detail-title').textContent = task.nombre_tarea;
    document.getElementById('detail-description').textContent = task.descripcion_tarea || 'Sin descripción';
    document.getElementById('detail-fecha-inicio').textContent = formatDate(task.fecha_inicio);
    document.getElementById('detail-fecha-fin').textContent = formatDate(task.fecha_fin);
    document.getElementById('detail-estado').textContent = formatEstado(task.estado);
    
    document.getElementById('detail-actions').innerHTML = getActionButtons(task);
    document.getElementById('taskDetailModal').style.display = 'block';
}

function hideDetailModal() {
    document.getElementById('taskDetailModal').style.display = 'none';
}

// Initialize
document.addEventListener('DOMContentLoaded', fetchTasks);

// Close modals when clicking outside
window.onclick = (event) => {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
};
        // [Rest of the JavaScript remains the same]


    </script>
</body>

</html>