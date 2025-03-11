<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario TUI (Versión Antigua)</title>
    
    <!-- DEPENDENCIAS PARA LA VERSIÓN ANTIGUA -->
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
    
    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.js"></script>
    <script src="https://uicdn.toast.com/tui.dom/latest/tui-dom.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.js"></script>
    <script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>
    
    <style>
        #calendar {
            height: 600px;
        }
        #addTaskBtn {
            padding: 10px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <h1>Calendario TUI (Versión Antigua)</h1>
    
    <div id="calendar"></div>
    <button id="addTaskBtn">Agregar Tarea</button>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar si la librería está disponible
            if (typeof tui !== 'undefined' && tui.Calendar) {
                console.log('TUI Calendar está disponible');
                
                var calendar = new tui.Calendar('#calendar', {
                    defaultView: 'month',
                    taskView: false,
                    scheduleView: ['time']
                });
                
                // Añadir un evento de prueba
                calendar.createSchedules([
                    {
                        id: '1',
                        calendarId: '1',
                        title: 'Evento de prueba',
                        category: 'time',
                        start: '2024-05-11T10:00:00',
                        end: '2024-05-11T11:00:00',
                        isVisible: true,
                        color: '#ffffff',
                        bgColor: '#ff4040'
                    }
                ]);
                
                console.log('Calendario inicializado correctamente');
            } else {
                console.error('TUI Calendar no está disponible');
            }
        });
    </script>
</body>
</html>