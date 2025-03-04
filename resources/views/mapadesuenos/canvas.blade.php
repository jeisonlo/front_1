<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editor de Diseño Moderno</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/mapadesuenos/canvas.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   
    <style>


    </style>
    
</head>


<body>
    @include('mapadesuenos.plantillas.header')
    <div class="top-bar">
        <div class="logo"></div>
        <div class="top-controls">
            <button class="btn btn-secondary" onclick="undo()">
                <i class="fas fa-undo"></i> Deshacer
            </button>
            <button class="btn btn-secondary" onclick="redo()">
                <i class="fas fa-redo"></i> Rehacer
            </button>
            <button class="btn btn-primary" id="btn-download">
                <i class="fas fa-image"></i> Descargar imagen
            </button>
            <button class="btn btn-primary" id="btn-save">
                <i class="fas fa-cloud"></i> Guardar en la nube
            </button>
          
          


        
        </div>
    </div>

    <div class="main-container">
        <div class="left-panel">
           

            <div class="panel-section">
                <h3>Herramientas</h3>
                <button class="tool-button" onclick="addTextbox()">
                    <i class="fas fa-font"></i> Texto
                </button>
                <div class="tool-button" onmouseover="showShapesMenu()" onmouseleave="hideShapesMenu()">
                    <i class="fas fa-shapes"></i> Formas
                    <div class="submenu" id="shapesMenu">
                        <button onclick="addShape('rect')">
                            <i class="fas fa-square"></i> Rectángulo
                        </button>
                        <button onclick="addShape('circle')">
                            <i class="fas fa-circle"></i> Círculo
                        </button>
                        <button onclick="addShape('triangle')">
                            <i class="fas fa-play"></i> Triángulo
                        </button>
                        <button onclick="addShape('line')">
                            <i class="fas fa-minus"></i> Línea
                        </button>
                        <button onclick="addShape('star')">
                            <i class="fas fa-star"></i> Estrella
                        </button>
                    </div>

                </div>
                <button class="tool-button" onclick="uploadImage()">
                    <i class="fas fa-image"></i> Imágenes
                </button>
                <div class="tool-button" onmouseover="showStickersMenu()" onmouseleave="hideStickersMenu()">
                    <i class="fas fa-smile"></i> Stickers
                    <div class="submenu" id="stickersMenu">
                        <div class="sticker-grid">
                            <div class="sticker-item" onclick="addSticker('❤️')">❤️</div>
                            <div class="sticker-item" onclick="addSticker('😊')">😊</div>
                            <div class="sticker-item" onclick="addSticker('🌟')">🌟</div>
                            <div class="sticker-item" onclick="addSticker('🎨')">🎨</div>
                            <div class="sticker-item" onclick="addSticker('🎉')">🎉</div>
                            <div class="sticker-item" onclick="addSticker('🌈')">🌈</div>
                            <div class="sticker-item" onclick="addSticker('✨')">✨</div>
                            <div class="sticker-item" onclick="addSticker('🎵')">🎵</div>
                            <div class="sticker-item" onclick="addSticker('🌺')">🌺</div>
                        </div>
                    </div>
                </div>
               
            </div>
       
            
            <div id="miniNotesApp">
                <div class="mini_notes_container">
                  <div class="mini_notes_header">
                    <h1 class="mini_notes_title">✨ Mis Notas ✨</h1>
                  </div>
                  <div class="mini_notes_input_section">
                    <textarea id="miniNotesInput" class="mini_notes_textarea" placeholder="Escribe tu nota aquí..."></textarea>
                    <button id="miniNotesAddButton" class="mini_notes_button">Guardar</button>
                  </div>
                </div>
                
                <div class="mini_notes_list_container" id="miniNotesList">
                  <div class="mini_notes_empty_message" id="miniNotesEmptyMessage">Sin notas</div>
                </div>
              </div>
            
        </div>



<div class="workspace">
    <canvas id="canvas"></canvas>
    <div class="zoom-controlss">
     

        
          <!-- Botón de pantalla completa -->
         <button class="btn btn-secondary zoom-btn full-screen-btn" onclick="toggleFullScreen()">
    <i class="fas fa-expand"></i>
</button>
    </div>
</div>

        <div class="right-panel">
            <div class="properties-panel text-properties">
                <div class="property-group">
                    <h4>Texto</h4>
                    <div class="property-controls">
                        <button class="btn btn-secondary" onclick="toggleBold()">
                            <i class="fas fa-bold"></i>
                        </button>
                        <button class="btn btn-secondary" onclick="toggleItalic()">
                            <i class="fas fa-italic"></i>
                        </button>
                        
                    </div>
                </div>
                <div class="property-group">
                    <h4>Alineación</h4>
                    <div class="property-controls">
                        <button class="btn btn-secondary" onclick="alignText('left')">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="btn btn-secondary" onclick="alignText('center')">
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button class="btn btn-secondary" onclick="alignText('right')">
                            <i class="fas fa-align-right"></i>
                        </button>
                    </div>
                </div>
                <input type="text" id="colorPicker" class="color-picker">

                <button id="deleteBtn" onclick="deleteObject()">
                    <i class="fas fa-trash"></i> Eliminar
                </button>


                
       <!-- Añadir los botones de zoom después del canvas en el workspace -->
       <div class="zoomir">
        <button class="zoom-btn zoom-in" onclick="zoomIn()">
            <i class="fas fa-search-plus"></i>
        </button>
       
        <button class="zoom-btn zoom-out" onclick="zoomOut()">
            <i class="fas fa-search-minus"></i>
        </button>
    </div>
    

</div>
            </div>
        </div>
    </div>

   
  
</main>

@include('mapadesuenos.plantillas.footer')
    <script>  // Inicializar el canvas
        const canvas = new fabric.Canvas('canvas', {
            width: 890,
            height: 560,
            backgroundColor: '#ffffff'
        });
        
        // Historial para deshacer/rehacer
        let history = [];
        let historyIndex = -1;
        
        function saveState() {
            historyIndex++;
            history = history.slice(0, historyIndex);
            history.push(JSON.stringify(canvas));
        }
        
        function undo() {
            if (historyIndex > 0) {
                historyIndex--;
                loadState();
            }
        }
        
        function redo() {
            if (historyIndex < history.length - 1) {
                historyIndex++;
                loadState();
            }
        }
        
        function loadState() {
            canvas.loadFromJSON(history[historyIndex], canvas.renderAll.bind(canvas));
        }
        
        // Funciones para formas y stickers
        function showShapesMenu() {
            document.getElementById('shapesMenu').style.display = 'block';
        }
        
        function hideShapesMenu() {
            document.getElementById('shapesMenu').style.display = 'none';
        }
        
        function showStickersMenu() {
            document.getElementById('stickersMenu').style.display = 'block';
        }
        
        function hideStickersMenu() {
            document.getElementById('stickersMenu').style.display = 'none';
        }
        
        function addShape(shapeType) {
            let shape;
            const randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
            
            switch(shapeType) {
                case 'rect':
                    shape = new fabric.Rect({
                        left: 100,
                        top: 100,
                        width: 100,
                        height: 100,
                        fill: randomColor,
                    });
                    break;
                case 'circle':
                    shape = new fabric.Circle({
                        left: 100,
                        top: 100,
                        radius: 50,
                        fill: randomColor,
                    });
                    break;
                case 'triangle':
                    shape = new fabric.Triangle({
                        left: 100,
                        top: 100,
                        width: 100,
                        height: 100,
                        fill: randomColor,
                    });
                    break;
                case 'line':
                    shape = new fabric.Line([50, 50, 150, 50], {
                        left: 100,
                        top: 100,
                        stroke: randomColor,
                        strokeWidth: 4
                    });
                    break;
                case 'star':
                    const points = [
                        {x: 0, y: -50},
                        {x: 19.1, y: -15.5},
                        {x: 48.8, y: -15.5},
                        {x: 23.6, y: 5.9},
                        {x: 38.2, y: 40.5},
                        {x: 0, y: 25},
                        {x: -38.2, y: 40.5},
                        {x: -23.6, y: 5.9},
                        {x: -48.8, y: -15.5},
                        {x: -19.1, y: -15.5}
                    ];
                    shape = new fabric.Polygon(points, {
                        left: 100,
                        top: 100,
                        fill: randomColor,
                        scaleX: 1,
                        scaleY: 1
                    });
                    break;
            }
            
            if (shape) {
                canvas.add(shape);
                canvas.setActiveObject(shape);
                saveState();
            }
        }
        
        function addSticker(emoji) {
            const sticker = new fabric.Text(emoji, {
                left: 100,
                top: 100,
                fontSize: 50,
                selectable: true,
                hasControls: true
            });
            
            canvas.add(sticker);
            canvas.setActiveObject(sticker);
            saveState();
        }
        
        function addTextbox() {
            const text = new fabric.Textbox('Escribe aquí', {
                left: 100,
                top: 100,
                width: 200,
                fontSize: 20,
                fontFamily: 'Arial'
            });
            canvas.add(text);
            canvas.setActiveObject(text);
            saveState();
        }
        
        function uploadImage() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function(event) {
                    fabric.Image.fromURL(event.target.result, function(img) {
                        img.scaleToWidth(200);
                        canvas.add(img);
                        canvas.setActiveObject(img);
                        saveState();
                    });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        }
        
        // Funciones de estilo de texto
        function toggleBold() {
            const activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'textbox') {
                activeObject.set('fontWeight', activeObject.fontWeight === 'bold' ? 'normal' : 'bold');
                canvas.renderAll();
                saveState();
            }
        }
        
        function toggleItalic() {
            const activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'textbox') {
                activeObject.set('fontStyle', activeObject.fontStyle === 'italic' ? 'normal' : 'italic');
                canvas.renderAll();
                saveState();
            }
        }
        
        function alignText(alignment) {
            const activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'textbox') {
                activeObject.set('textAlign', alignment);
                canvas.renderAll();
                saveState();
            }
        }
        
        // Inicializar el selector de color
        $(document).ready(function() {
            $("#colorPicker").spectrum({
                color: "#000",  // Color inicial
                showInput: true,
                showPalette: true,
                preferredFormat: "hex",
                change: function(color) {
                    const activeObject = canvas.getActiveObject();
                    if (activeObject) {
                        // Cambiar el color del objeto seleccionado
                        activeObject.set('fill', color.toHexString());
                        canvas.renderAll();
                        saveState();
                    } else {
                        // Si no hay objeto seleccionado, cambia el color de fondo del lienzo
                        canvas.setBackgroundColor(color.toHexString(), canvas.renderAll.bind(canvas));
                        saveState();
                    }
                }
            });
        });
        
        // Esta función es opcional si quieres abrir el selector manualmente
        function showColorPicker() {
            $("#colorPicker").spectrum("show");
        }
        
        // Funciones de descarga y compartir
        function downloadDesign() {
            const dataURL = canvas.toDataURL({
                format: 'png',
                quality: 1
            });
            const link = document.createElement('a');
            link.download = 'diseño.png';
            link.href = dataURL;
            link.click();
        }
        
        function shareDesign() {
            // Implementación básica de compartir
            alert('Funcionalidad de compartir en desarrollo');
        }
        
        // Evento de selección para mostrar/ocultar propiedades
        canvas.on('selection:created', function(e) {
            showProperties(e.target);
        });
        
        canvas.on('selection:cleared', function() {
            hideProperties();
        });
        
        function showProperties(object) {
            if (object.type === 'textbox') {
                document.querySelector('.text-properties').classList.add('active');
            }
        }
        
        function hideProperties() {
            document.querySelector('.text-properties').classList.remove('active');
        }
        
        // Variables para el zoom
        let zoomLevel = 1;
        const ZOOM_STEP = 0.1;
        const MAX_ZOOM = 3;
        const MIN_ZOOM = 0.5;
        
        // Función para hacer zoom in
        function zoomIn() {
            if (zoomLevel < MAX_ZOOM) {
                zoomLevel += ZOOM_STEP;
                canvas.setZoom(zoomLevel);
                canvas.renderAll();
            }
        }
        
        // Función para hacer zoom out
        function zoomOut() {
            if (zoomLevel > MIN_ZOOM) {
                zoomLevel -= ZOOM_STEP;
                canvas.setZoom(zoomLevel);
                canvas.renderAll();
            }
        }
        
        let isFullscreen = false;
        const canvasContainer = document.querySelector('.workspace');
        
        function toggleFullScreen() {
            const fullscreenIcon = document.querySelector('.full-screen-btn i');
            
            if (!document.fullscreenElement) {
                // Entrar en modo pantalla completa
                if (canvasContainer.requestFullscreen) {
                    canvasContainer.requestFullscreen();
                } else if (canvasContainer.mozRequestFullScreen) {
                    canvasContainer.mozRequestFullScreen();
                } else if (canvasContainer.webkitRequestFullscreen) {
                    canvasContainer.webkitRequestFullscreen();
                } else if (canvasContainer.msRequestFullscreen) {
                    canvasContainer.msRequestFullscreen();
                }
                isFullscreen = true;
                if (fullscreenIcon) {
                    fullscreenIcon.classList.remove('fa-expand');
                    fullscreenIcon.classList.add('fa-compress');
                }
                adjustCanvasSize();
            } else {
                // Salir del modo pantalla completa
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
                isFullscreen = false;
                if (fullscreenIcon) {
                    fullscreenIcon.classList.remove('fa-compress');
                    fullscreenIcon.classList.add('fa-expand');
                }
                resetCanvasSize();
            }
        }
        
        document.addEventListener('fullscreenchange', function() {
            const fullscreenIcon = document.querySelector('.full-screen-btn i');
            if (document.fullscreenElement) {
                if (fullscreenIcon) {
                    fullscreenIcon.classList.remove('fa-expand');
                    fullscreenIcon.classList.add('fa-compress');
                }
            } else {
                if (fullscreenIcon) {
                    fullscreenIcon.classList.remove('fa-compress');
                    fullscreenIcon.classList.add('fa-expand');
                }
            }
        });
        
        // Ajustar el tamaño del canvas en pantalla completa
        function adjustCanvasSize() {
            const viewportWidth = window.innerWidth;
            const viewportHeight = window.innerHeight - 120; // Restamos 50px para dar espacio al botón
            
            // Mantener la proporción original del canvas (750:500 = 1.5)
            const aspectRatio = 1.59;
            
            let newWidth, newHeight;
            
            if (viewportWidth / viewportHeight > aspectRatio) {
                newHeight = viewportHeight * 1;
                newWidth = newHeight * aspectRatio;
            } else {
                newWidth = viewportWidth * 1;
                newHeight = newWidth / aspectRatio;
            }
            
            canvas.setWidth(newWidth);
            canvas.setHeight(newHeight);
            canvas.setZoom(newWidth / 890);
            canvas.renderAll();
        }
        
        // Restaurar el tamaño original del canvas
        function resetCanvasSize() {
            canvas.setWidth(890);
            canvas.setHeight(560); 
            canvas.setZoom(1);
            canvas.renderAll();
        }
        
        // Manejar cambios en el estado de pantalla completa
        document.addEventListener('fullscreenchange', function() {
            const fullscreenIcon = document.querySelector('.zoom-btn .fas');
            if (!document.fullscreenElement) {
                isFullscreen = false;
                if (fullscreenIcon) {
                    fullscreenIcon.classList.remove('fa-compress');
                    fullscreenIcon.classList.add('fa-expand');
                }
                resetCanvasSize();
            }
        });
        
        // Ajustar el tamaño cuando cambie el tamaño de la ventana en modo pantalla completa
        window.addEventListener('resize', function() {
            if (isFullscreen) {
                adjustCanvasSize();
            }
        });
        
        (function() {
            function initializeMiniNotes() {
                const noteInput = document.getElementById('miniNotesInput');
                const addNoteButton = document.getElementById('miniNotesAddButton');
                const noteListContainer = document.getElementById('miniNotesList');
                const noNotesMessage = document.getElementById('miniNotesEmptyMessage');
                
                const LOCAL_STORAGE_KEY = 'mini_notes_data';
                let notes = [];
                
                if (localStorage.getItem(LOCAL_STORAGE_KEY)) {
                    try {
                        notes = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY));
                        renderNotes();
                    } catch (e) {
                        notes = [];
                    }
                }
                
                addNoteButton.addEventListener('click', function() {
                    const noteText = noteInput.value.trim();
                    
                    if (noteText) {
                        const timestamp = new Date();
                        notes.push({
                            text: noteText,
                            date: timestamp.toLocaleString(),
                            id: 'mini_note_' + Date.now()
                        });
                        
                        localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(notes));
                        noteInput.value = '';
                        renderNotes();
                    }
                });
                
                function renderNotes() {
                    if (notes.length === 0) {
                        noNotesMessage.style.display = 'block';
                        
                        const accordions = noteListContainer.querySelectorAll('.mini_notes_accordion');
                        accordions.forEach(accordion => {
                            const panel = accordion.nextElementSibling;
                            if (panel) {
                                noteListContainer.removeChild(panel);
                            }
                            noteListContainer.removeChild(accordion);
                        });
                        
                        return;
                    }
                    
                    noNotesMessage.style.display = 'none';
                    
                    const accordions = noteListContainer.querySelectorAll('.mini_notes_accordion');
                    accordions.forEach(accordion => {
                        const panel = accordion.nextElementSibling;
                        if (panel) {
                            noteListContainer.removeChild(panel);
                        }
                        noteListContainer.removeChild(accordion);
                    });
                    
                    notes.forEach((note, index) => {
                        const accordion = document.createElement('button');
                        accordion.className = 'mini_notes_accordion';
                        accordion.id = 'mini_notes_accordion_' + index;
                        
                        const headerDiv = document.createElement('div');
                        headerDiv.className = 'mini_notes_header_actions';
                        
                        const noteTitle = document.createElement('span');
                        noteTitle.className = 'mini_notes_preview_text';
                        noteTitle.textContent = note.text;
                        
                        const deleteButton = document.createElement('button');
                        deleteButton.className = 'mini_notes_delete_button';
                        deleteButton.innerHTML = '×';
                        deleteButton.onclick = function(e) {
                            e.stopPropagation();
                            notes.splice(index, 1);
                            localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(notes));
                            renderNotes();
                        };
                        
                        headerDiv.appendChild(noteTitle);
                        headerDiv.appendChild(deleteButton);
                        
                        accordion.appendChild(headerDiv);
                        noteListContainer.appendChild(accordion);
                        
                        const panel = document.createElement('div');
                        panel.className = 'mini_notes_panel';
                        panel.id = 'mini_notes_panel_' + index;
                        
                        const noteContent = document.createElement('div');
                        noteContent.className = 'mini_notes_content';
                        noteContent.textContent = note.text;
                        
                        const dateInfo = document.createElement('small');
                        dateInfo.className = 'mini_notes_date';
                        dateInfo.textContent = note.date;
                        
                        panel.appendChild(noteContent);
                        panel.appendChild(dateInfo);
                        
                        noteListContainer.appendChild(panel);
                        
                        accordion.addEventListener('click', function() {
                            this.classList.toggle('mini_notes_active');
                            const panel = this.nextElementSibling;
                            if (panel.style.maxHeight) {
                                panel.style.maxHeight = null;
                            } else {
                                panel.style.maxHeight = panel.scrollHeight + 'px';
                            }
                        });
                    });
                }
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initializeMiniNotes);
            } else {
                initializeMiniNotes();
            }
        })();
        
        // Variables para almacenar los objetos copiados
        let copiedObjects = [];
        
        // Función para eliminar objetos seleccionados
        function deleteSelectedObjects() {
            const activeObjects = canvas.getActiveObjects();
            
            if (activeObjects.length) {
                // Si hay objetos seleccionados, los eliminamos
                activeObjects.forEach(obj => {
                    canvas.remove(obj);
                });
                
                // Limpiar la selección actual
                canvas.discardActiveObject();
                canvas.renderAll();
                saveState();
            }
        }
        
        // Función para copiar objetos seleccionados
        function copySelectedObjects() {
            copiedObjects = [];
            const activeObjects = canvas.getActiveObjects();
            
            if (activeObjects.length) {
                // Clonamos cada objeto seleccionado
                activeObjects.forEach(obj => {
                    // Convertimos el objeto a JSON para crear una copia profunda
                    const objectJSON = obj.toJSON();
                    copiedObjects.push(objectJSON);
                });
                
                // Indicar al usuario que se han copiado los objetos
                console.log('Objetos copiados: ' + copiedObjects.length);
            }
        }
        
        // Función para pegar objetos copiados
        function pasteObjects() {
            if (copiedObjects.length === 0) {
                return; // No hay objetos para pegar
            }
            
            // Deseleccionar cualquier objeto actualmente seleccionado
            canvas.discardActiveObject();
            
            // Crear un grupo con los objetos pegados para seleccionarlos juntos
            const newObjects = [];
            
            // Cargar los objetos copiados
            copiedObjects.forEach(objJSON => {
                // Calculamos un pequeño desplazamiento para no pegar exactamente encima
                const offset = 20;
                
                // Cargar el objeto desde JSON
                fabric.util.enlivenObjects([objJSON], function(objects) {
                    objects.forEach(obj => {
                        // Ajustar la posición para no pegar exactamente encima
                        obj.set({
                            left: obj.left + offset,
                            top: obj.top + offset
                        });
                        
                        // Añadir al canvas
                        canvas.add(obj);
                        newObjects.push(obj);
                        
                        // Si es el último objeto, lo seleccionamos
                        if (newObjects.length === copiedObjects.length) {
                            // Si hay más de un objeto, creamos un grupo de selección
                            if (newObjects.length > 1) {
                                const selection = new fabric.ActiveSelection(newObjects, {
                                    canvas: canvas
                                });
                                canvas.setActiveObject(selection);
                            } else {
                                canvas.setActiveObject(newObjects[0]);
                            }
                            canvas.renderAll();
                            saveState();
                        }
                    });
                });
            });
        }
        
        // Asociar atajos de teclado
        document.addEventListener('keydown', function(e) {
            // Verificar si hay elementos de formulario activos para no interferir con la escritura
            const activeElement = document.activeElement;
            const isInput = activeElement.tagName === 'INPUT' || 
                            activeElement.tagName === 'TEXTAREA' || 
                            activeElement.isContentEditable;
            
            // Solo procesamos los atajos si no estamos en un campo de entrada
            if (!isInput) {
                // Delete o Backspace para eliminar
                if (e.key === 'Delete' || e.key === 'Backspace') {
                    deleteSelectedObjects();
                }
                
                // Ctrl+C para copiar
                if (e.key === 'c' && (e.ctrlKey || e.metaKey)) {
                    copySelectedObjects();
                }
                
                // Ctrl+V para pegar
                if (e.key === 'v' && (e.ctrlKey || e.metaKey)) {
                    pasteObjects();
                }
            }
        });
       
       
       // Funciones para interactuar con la API de Laravel
       
       // URL base de la API
       const API_URL = 'https://back1-production-67bf.up.railway.app/v1';
       
       // Función para guardar el lienzo en la API
function saveCanvasToAPI() {
    // Mostrar modal o input para título
    const title = prompt('Ingresa un título para tu diseño:', 'Mi Diseño');
    
    if (!title) return; // Si cancela, no guardamos
    
    // Convertir el canvas a imagen PNG (base64)
    const imageData = canvas.toDataURL({
        format: 'png',
        quality: 1
    });
    
    // Obtener el JSON del canvas para restaurarlo después
    const canvasData = JSON.stringify(canvas);
    
    // Enviar los datos a la API
    fetch(`${API_URL}/canvases`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            title: title,
            image: imageData,
            canvas_data: canvasData
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Guardar el ID del nuevo lienzo para futuras actualizaciones
            canvas.canvasId = data.data.id; // Asegúrate de que la API devuelva el ID en data.data.id
            alert('¡Diseño guardado con éxito!');
        } else {
            alert('Error al guardar el diseño: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al conectar con el servidor');
    });
}

// Modificar la función para crear un nuevo lienzo
function createNewCanvas() {
    // Reiniciar el canvas
    canvas.clear();
    
    // Importante: Eliminar el ID del canvas actual para permitir guardar uno nuevo
    delete canvas.canvasId;
    
    // Reiniciar el historial
    history = [];
    historyIndex = -1;
    saveState();
    
    // Opcional: Configuración inicial del canvas
    // ...
    
    // Renderizar el canvas vacío
    canvas.renderAll();
}

// Modificar la función saveDesign para incluir una opción de guardar como nuevo
function saveDesign() {
    if (canvas.canvasId) {
        const saveOption = confirm('Este diseño ya existe. ¿Deseas actualizarlo?\nAceptar para actualizar, Cancelar para guardar como nuevo');
        if (saveOption) {
            updateCanvas();
        } else {
            // Importante: Eliminar el ID para guardar como nuevo
            delete canvas.canvasId;
            saveCanvasToAPI();
        }
    } else {
        saveCanvasToAPI();
    }
}


// Inicializar cuando se carga la página
document.addEventListener('DOMContentLoaded', function() {
   
    addNewCanvasButton(); // Agregar botón para nuevo lienzo
    
    // Modificar la función downloadDesign original
    window.downloadDesign = downloadDesign;
});

       
       // Función para cargar la lista de lienzos
       function loadCanvasList() {
           // Crear un modal o un contenedor para mostrar la lista
           const listContainer = document.createElement('div');
           listContainer.className = 'canvas-list-modal';
           listContainer.innerHTML = `
               <div class="canvas-list-content">
                   <h2>Mis Diseños Guardados</h2>
                   <div class="canvas-items-container" id="canvasItemsContainer">
                       <p></p>
                   </div>
                   <button class="close-btn" onclick="closeCanvasList()">Cerrar</button>
               </div>
           `;
           
           document.body.appendChild(listContainer);
           
           // Cargar la lista desde la API
           fetch(`${API_URL}/canvases`)
               .then(response => response.json())
               .then(data => {
                   if (data.success) {
                       const container = document.getElementById('canvasItemsContainer');
                       
                       if (data.data.length === 0) {
                           container.innerHTML = '<p>No hay diseños guardados</p>';
                           return;
                       }
                       
                       container.innerHTML = '';
                       
                       data.data.forEach(item => {
                           const canvasItem = document.createElement('div');
                           canvasItem.className = 'canvas-item';
                           canvasItem.innerHTML = `
                               <img src="${item.cloudinary_url}" alt="${item.title}">
                               <div class="canvas-item-info">
                                   <h3>${item.title}</h3>
                                   <p>Creado: ${new Date(item.created_at).toLocaleDateString()}</p>
                                   <div class="canvas-item-actions">
                                       <button onclick="loadCanvas(${item.id})">Editar</button>
                                       <button onclick="deleteCanvas(${item.id})">Eliminar</button>
                                   </div>
                               </div>
                           `;
                           container.appendChild(canvasItem);
                       });
                   } else {
                       alert('Error al cargar la lista de diseños: ' + data.message);
                   }
               })
               .catch(error => {
                   console.error('Error:', error);
                   const container = document.getElementById('canvasItemsContainer');
                   container.innerHTML = '<p>Error al conectar con el servidor</p>';
               });
       }
       
       // Función para cerrar la lista de lienzos
       function closeCanvasList() {
           const listModal = document.querySelector('.canvas-list-modal');
           if (listModal) {
               document.body.removeChild(listModal);
           }
       }
       
       // Función para cargar un lienzo específico para editar
       function loadCanvas(canvasId) {
           fetch(`${API_URL}/canvases/${canvasId}`)
               .then(response => response.json())
               .then(data => {
                   if (data.success) {
                       // Guardar el ID del lienzo actual para actualizarlo más tarde
                       canvas.canvasId = canvasId;
                       
                       // Cargar el JSON del canvas
                       canvas.loadFromJSON(data.data.canvas_data, function() {
                           canvas.renderAll();
                           // Cerrar la ventana de lista
                           closeCanvasList();
                           // Reiniciar el historial
                           history = [];
                           historyIndex = -1;
                           saveState();
                       });
                   } else {
                       alert('Error al cargar el diseño: ' + data.message);
                   }
               })
               .catch(error => {
                   console.error('Error:', error);
                   alert('Error al conectar con el servidor');
               });
       }
       
       // Función para actualizar un lienzo ya guardado
       function updateCanvas() {
           if (!canvas.canvasId) {
               saveCanvasToAPI(); // Si no tiene ID, guardamos como nuevo
               return;
           }
           
           // Convertir el canvas a imagen PNG (base64)
           const imageData = canvas.toDataURL({
               format: 'png',
               quality: 1
           });
           
           // Obtener el JSON del canvas
           const canvasData = JSON.stringify(canvas);
           
           // Enviar los datos a la API
           fetch(`${API_URL}/canvases/${canvas.canvasId}`, {
               method: 'PUT',
               headers: {
                   'Content-Type': 'application/json',
                   'Accept': 'application/json'
               },
               body: JSON.stringify({
                   image: imageData,
                   canvas_data: canvasData
               })
           })
           .then(response => response.json())
           .then(data => {
               if (data.success) {
                   alert('¡Diseño actualizado con éxito!');
               } else {
                   alert('Error al actualizar el diseño: ' + data.message);
               }
           })
           .catch(error => {
               console.error('Error:', error);
               alert('Error al conectar con el servidor');
           });
       }
       
       // Función para eliminar un lienzo
       function deleteCanvas(canvasId) {
           if (!confirm('¿Estás seguro de que deseas eliminar este diseño?')) {
               return;
           }
           
           fetch(`${API_URL}/canvases/${canvasId}`, {
               method: 'DELETE',
               headers: {
                   'Accept': 'application/json'
               }
           })
           .then(response => response.json())
           .then(data => {
               if (data.success) {
                   alert('Diseño eliminado con éxito');
                   // Actualizar la lista
                   loadCanvasList();
               } else {
                   alert('Error al eliminar: ' + data.message);
               }
           })
           .catch(error => {
               console.error('Error:', error);
               alert('Error al conectar con el servidor');
           });
       }
       document.getElementById('btn-download').addEventListener('click', downloadImage);
       document.getElementById('btn-save').addEventListener('click', saveDesign);
       
       function downloadImage() {
           const dataURL = canvas.toDataURL({
               format: 'png',
               quality: 1
           });
           const link = document.createElement('a');
           link.download = 'diseño.png';
           link.href = dataURL;
           link.click();
       }
       
       function saveDesign() {
    if (canvas.canvasId) {
        const saveOption = confirm('Este diseño ya existe. ¿Deseas actualizarlo?\nAceptar para actualizar, Cancelar para guardar como nuevo');
        if (saveOption) {
            updateCanvas(); // Actualiza el lienzo existente
        } else {
            canvas.canvasId = null; // Limpia el ID para que se guarde como nuevo
            saveCanvasToAPI();
        }
    } else {
        saveCanvasToAPI(); // Guarda como nuevo si no hay ID
    }
}
       
       
       // Agregar botón para ver diseños guardados
       function addLoadDesignsButton() {
           const topControls = document.querySelector('.top-controls');
           
           const loadButton = document.createElement('button');
           loadButton.className = 'btn btn-primary';
           loadButton.innerHTML = '<i class="fas fa-folder-open"></i> Mis Diseños';
           loadButton.onclick = loadCanvasList;
           
           // Insertar antes del botón de descargar
           const downloadButton = document.querySelector('.btn.btn-primary');
           topControls.insertBefore(loadButton, downloadButton);
       }
       
       // Inicializar cuando se carga la página
       document.addEventListener('DOMContentLoaded', function() {
           addLoadDesignsButton();
           
           // Modificar la función downloadDesign original
           window.downloadDesign = downloadDesign;
       });
       </script>
</body>

</html>