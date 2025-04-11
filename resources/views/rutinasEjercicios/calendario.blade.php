<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/calendario.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <title>Rutinas de Ejercicios</title>
</head>
<body>
    <style>  .marca-agua::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("{{ asset('css/rutinasEjercicios/img/woman-digital-disconnecting-home-by-doing-yoga.jpg') }}");
        background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
        background-repeat: no-repeat;
        background-position: center;
        opacity: 0.5; /* Ajusta la transparencia de la marca de agua */
        z-index: 1;
    }</style>
    <div class="marca-agua">
        @include('rutinasEjercicios.layouts.header')
        <div class="container">
            <aside class="sidebar">
                <div class="menu-item">
                  <a href="{{ url('/inicio') }}">
                      <img src="{{ asset('css/rutinasEjercicios/img/home.svg') }}" alt="Icon" />
                      <span>Inicio</span>
                  </a>
              </div>
                <div class="menu-item active">
                  <a href="{{ url('/calendario') }}">
                    <img src="{{ asset('css/rutinasEjercicios/img/calendario.svg') }}" alt="Icon" />
                    <span>Calendario</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{ route('favoritos') }}" class="btn-favoritos">
                    <img src="{{ asset('css/rutinasEjercicios/img/favorito.svg') }}" alt="Icon" />
                    <span href="#">Favoritos</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{ url('/notificaciones') }}">
                    <img src="{{ asset('css/rutinasEjercicios/img/notificacion.svg') }}" alt="Icon" />
                    <span href="#">Notificaciones</span>
                  </a>
                </div>
              </aside>
            <div class="cal">
                <div class="datepicker">
                    <div class="datepicker-top">
                        <div class="month-selector"> 
                            <button id="prev-month">&lt;</button>
                            <span class="month-name" id="current-month-year">Mayo 2024</span>
                            <button id="next-month">&gt;</button>
                        </div>
                    </div>
                    <div class="datepicker-calendar" id="calendar-grid">
                        <!-- Los días del calendario se generarán dinámicamente -->
                    </div>
                    <div>
                        <button id="create-task-btn">+</button>
                    </div>
                </div>
            </div>
            <main>
                <h2 class="title">Mis Tareas - <span id="selected-date-display">Hoy</span></h2>
                <div class="notes-container" id="tasks-container">
                    <!-- Aquí se mostrarán las tareas del día seleccionado -->
                </div>
            </main>
        </div>

        <div id="add-task-modal" class="modal">
            <div class="add-task">
                <span class="close" id="close-modal">&times;</span>
                <h2>Agregar Tarea</h2>
                <form id="task-form">
                    <input type="hidden" id="task-id">
                    <input type="hidden" id="task-date">
                    
                    <label for="task-title">Título:</label>
                    <input type="text" id="task-title" name="task-title" required>

                    <label for="task-details">Detalles:</label>
                    <textarea id="task-details" name="task-details" rows="4" required></textarea>

                    <button type="submit" class="save">Guardar</button>
                </form>
            </div>
        </div>
        @include('rutinasEjercicios.layouts.footer')
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const apiUrl = "http://localhost:8000/api/tasks";
            
            // Elementos del DOM
            const calendarGrid = document.getElementById("calendar-grid");
            const currentMonthYear = document.getElementById("current-month-year");
            const prevMonthBtn = document.getElementById("prev-month");
            const nextMonthBtn = document.getElementById("next-month");
            const selectedDateDisplay = document.getElementById("selected-date-display");
            const tasksContainer = document.getElementById("tasks-container");
            
            const taskForm = document.getElementById("task-form");
            const taskTitleInput = document.getElementById("task-title");
            const taskDetailsInput = document.getElementById("task-details");
            const taskIdInput = document.getElementById("task-id");
            const taskDateInput = document.getElementById("task-date");
            
            const modal = document.getElementById("add-task-modal");
            const createTaskBtn = document.getElementById("create-task-btn");
            const closeModal = document.getElementById("close-modal");
    
            // Variables de estado
            let currentDate = new Date();
            let selectedDate = new Date();
            let allTasks = [];
    
            // Inicializar el calendario
            function initCalendar() {
                loadAllTasks().then(() => {
                    renderCalendar();
                    loadTasksForSelectedDate();
                });
                
                // Event listeners
                prevMonthBtn.addEventListener("click", () => {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    renderCalendar();
                });
                
                nextMonthBtn.addEventListener("click", () => {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    renderCalendar();
                });
            }
    
            // Cargar todas las tareas
            async function loadAllTasks() {
                try {
                    const response = await axios.get(apiUrl);
                    allTasks = response.data;
                    return response.data;
                } catch (error) {
                    console.error("⚠️ Error al cargar tareas:", error);
                    return [];
                }
            }
    
            // Función corregida para formatear fechas
            function formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
    
            // Renderizar el calendario
            function renderCalendar() {
                currentMonthYear.textContent = getMonthYearString(currentDate);
                
                const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                const firstDayOfWeek = firstDay.getDay();
                const adjustedFirstDayOfWeek = firstDayOfWeek === 0 ? 6 : firstDayOfWeek - 1;
                
                calendarGrid.innerHTML = '';
                
                // Días de la semana
                ['lun', 'mar', 'mie', 'ju', 'vi', 'sa', 'do'].forEach(day => {
                    const dayElement = document.createElement("span");
                    dayElement.classList.add("day");
                    dayElement.textContent = day;
                    calendarGrid.appendChild(dayElement);
                });
                
                // Días vacíos del mes anterior
                for (let i = 0; i < adjustedFirstDayOfWeek; i++) {
                    calendarGrid.appendChild(document.createElement("div"));
                }
                
                // Días del mes actual
                for (let day = 1; day <= lastDay.getDate(); day++) {
                    const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                    date.setHours(12, 0, 0, 0); // Normalizar hora
                    
                    const dateButton = document.createElement("button");
                    dateButton.classList.add("date");
                    
                    // Estilo para día seleccionado
                    if (isSameDay(date, selectedDate)) {
                        dateButton.classList.add("selected-day");
                        dateButton.style.backgroundColor = "#6a1b9a";
                        dateButton.style.color = "white";
                    }
                    
                    // Día actual
                    if (isSameDay(date, new Date())) {
                        dateButton.classList.add("current-day");
                    }
                    
                    // Verificar tareas para este día (corregido)
                    const hasTasks = allTasks.some(task => {
                        const [year, month, day] = task.date.split('-');
                        const taskDate = new Date(year, month - 1, day);
                        taskDate.setHours(12, 0, 0, 0);
                        return isSameDay(taskDate, date);
                    });
                    
                    if (hasTasks) {
                        dateButton.classList.add("has-tasks");
                    }
                    
                    dateButton.textContent = day;
                    dateButton.addEventListener("click", () => {
                        selectedDate = date;
                        renderCalendar();
                        loadTasksForSelectedDate();
                    });
                    
                    calendarGrid.appendChild(dateButton);
                }
            }
            
            // Cargar tareas para la fecha seleccionada (corregido)
            function loadTasksForSelectedDate() {
                const compareDate = new Date(selectedDate);
                compareDate.setHours(12, 0, 0, 0);
                
                const tasksForDate = allTasks.filter(task => {
                    const [year, month, day] = task.date.split('-');
                    const taskDate = new Date(year, month - 1, day);
                    taskDate.setHours(12, 0, 0, 0);
                    return isSameDay(taskDate, compareDate);
                });
                
                renderTasks(tasksForDate);
                updateSelectedDateDisplay();
            }
            
            // Renderizar tareas
            function renderTasks(tasks) {
                tasksContainer.innerHTML = tasks.length ? 
                    tasks.map(task => `
                        <div class="note" data-id="${task.id}">
                            <h3>${task.title}</h3>
                            <p>${task.details}</p>
                            <div class="note-buttons">
                                <button class="edit">Editar</button>
                                <button class="delete">Eliminar</button>
                            </div>
                        </div>
                    `).join('') : '<p>No hay tareas para este día.</p>';
                
                // Agregar event listeners a los botones
                document.querySelectorAll('.delete').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        deleteTask(e.target.closest('.note').dataset.id);
                    });
                });
                
                document.querySelectorAll('.edit').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const taskId = e.target.closest('.note').dataset.id;
                        const task = allTasks.find(t => t.id == taskId);
                        editTask(task);
                    });
                });
            }
            
            // Guardar tarea (corregido)
            async function handleTaskForm(event) {
                event.preventDefault();
                const selectedDateLocal = new Date(selectedDate);
                selectedDateLocal.setHours(12, 0, 0, 0);
                
                const taskData = {
                    title: taskTitleInput.value,
                    details: taskDetailsInput.value,
                    date: formatDate(selectedDateLocal)
                };
                
                try {
                    if (taskIdInput.value) {
                        await axios.put(`${apiUrl}/${taskIdInput.value}`, taskData);
                    } else {
                        await axios.post(apiUrl, taskData);
                    }
                    
                    allTasks = await loadAllTasks();
                    renderCalendar();
                    loadTasksForSelectedDate();
                    closeModalWindow();
                } catch (error) {
                    console.error("Error al guardar tarea:", error);
                }
            }
            
            // Eliminar tarea
            async function deleteTask(id) {
                try {
                    await axios.delete(`${apiUrl}/${id}`);
                    allTasks = await loadAllTasks();
                    renderCalendar();
                    loadTasksForSelectedDate();
                } catch (error) {
                    console.error("Error al eliminar tarea:", error);
                }
            }
            
            // Editar tarea
            function editTask(task) {
                taskIdInput.value = task.id;
                taskTitleInput.value = task.title;
                taskDetailsInput.value = task.details;
                taskDateInput.value = task.date;
                openModal();
            }
            
            // Funciones auxiliares
            function getMonthYearString(date) {
                const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                              "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                return `${months[date.getMonth()]} ${date.getFullYear()}`;
            }
            
            function isSameDay(date1, date2) {
                return date1.getFullYear() === date2.getFullYear() &&
                       date1.getMonth() === date2.getMonth() &&
                       date1.getDate() === date2.getDate();
            }
            
            function updateSelectedDateDisplay() {
                selectedDateDisplay.textContent = isSameDay(selectedDate, new Date()) ? 
                    "Hoy" : selectedDate.toLocaleDateString('es-ES', {
                        weekday: 'long', 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric'
                    });
            }
            
            function openModal() {
                const selectedDateLocal = new Date(selectedDate);
                selectedDateLocal.setHours(12, 0, 0, 0);
                taskDateInput.value = formatDate(selectedDateLocal);
                modal.style.display = "flex";
            }
            
            function closeModalWindow() {
                modal.style.display = "none";
                taskForm.reset();
                taskIdInput.value = "";
            }
            
            // Event listeners
            createTaskBtn.addEventListener("click", openModal);
            closeModal.addEventListener("click", closeModalWindow);
            taskForm.addEventListener("submit", handleTaskForm);
            window.addEventListener("click", (event) => {
                if (event.target === modal) closeModalWindow();
            });
            
            // Iniciar
            initCalendar();
        });
    </script>
</html>