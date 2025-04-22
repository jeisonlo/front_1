<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
        }
        
        .profile-card {
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px -10px rgba(126, 34, 206, 0.2);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px -10px rgba(126, 34, 206, 0.3);
        }
        
        .profile-photo {
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px -5px rgba(126, 34, 206, 0.6);
        }
        
        .profile-photo:hover {
            transform: scale(1.05);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(124, 58, 237, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px -1px rgba(124, 58, 237, 0.4);
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 100%);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        }
        
        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #ddd;
        }
        
        .input-field:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(139, 92, 246, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(139, 92, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(139, 92, 246, 0); }
        }
        
        .section-title {
            position: relative;
            padding-bottom: 8px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #8b5cf6, #c4b5fd);
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <!-- Contenedor Principal -->
        <div id="profile-container" class="max-w-4xl mx-auto profile-card rounded-xl overflow-hidden p-8 fade-in">
            <!-- Foto y Nombre -->
            <div class="flex flex-col items-center mb-10">
                <div class="relative group">
                    <img id="profile-photo" src="/images/default-profile.png" 
                         class="w-36 h-36 rounded-full object-cover border-4 border-purple-200 profile-photo pulse">
                    <div class="absolute inset-0 bg-purple-500 bg-opacity-20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <i class="fas fa-camera text-white text-2xl"></i>
                    </div>
                </div>
                <input type="file" id="photo-input" class="hidden" accept="image/*">
                <button onclick="document.getElementById('photo-input').click()" 
                        class="mt-6 px-6 py-2 btn-primary text-white rounded-full font-medium">
                    <i class="fas fa-camera mr-2"></i>Cambiar Foto
                </button>
                <div id="photo-error" class="text-sm mt-3 hidden px-4 py-2 rounded-lg"></div>
            </div>

            <!-- Información del Usuario -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <!-- Columna Izquierda -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold text-purple-800 section-title">Información Personal</h2>
                    <div class="space-y-5">
                        <div class="bg-purple-50 p-4 rounded-lg transition-all hover:bg-purple-100">
                            <label class="block text-sm font-medium text-purple-600 mb-1">Nombre:</label>
                            <span id="user-nombre" class="block text-gray-800 font-medium"></span>
                            <input type="text" id="edit-nombre" class="hidden input-field w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200">
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-purple-600 mb-1">Email:</label>
                            <span id="user-email" class="block text-gray-800 font-medium"></span>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg transition-all hover:bg-purple-100">
                            <label class="block text-sm font-medium text-purple-600 mb-1">Vive en:</label>
                            <span id="user-vive_en" class="block text-gray-800 font-medium"></span>
                            <input type="text" id="edit-vive_en" class="hidden input-field w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200">
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg transition-all hover:bg-purple-100">
                            <label class="block text-sm font-medium text-purple-600 mb-1">De donde es:</label>
                            <span id="user-de_donde_es" class="block text-gray-800 font-medium"></span>
                            <input type="text" id="edit-de_donde_es" class="hidden input-field w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200">
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold text-purple-800 section-title">Detalles</h2>
                    <div class="space-y-5">
                        <div class="bg-purple-50 p-4 rounded-lg transition-all hover:bg-purple-100">
                            <label class="block text-sm font-medium text-purple-600 mb-1">Estudios:</label>
                            <span id="user-estudios" class="block text-gray-800 font-medium"></span>
                            <input type="text" id="edit-estudios" class="hidden input-field w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200">
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg transition-all hover:bg-purple-100">
                            <label class="block text-sm font-medium text-purple-600 mb-1">Fecha Nacimiento:</label>
                            <span id="user-fecha_nacimiento" class="block text-gray-800 font-medium"></span>
                            <input type="date" id="edit-fecha_nacimiento" class="hidden input-field w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200">
                        </div>
                        <div id="professional-fields" class="hidden space-y-5">
                            <div class="bg-purple-50 p-4 rounded-lg transition-all hover:bg-purple-100">
                                <label class="block text-sm font-medium text-purple-600 mb-1">Licencia:</label>
                                <span id="user-licencia" class="block text-gray-800 font-medium"></span>
                                <input type="text" id="edit-licencia" class="hidden input-field w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acerca de mí - Campo de texto largo -->
            <div class="mb-10">
                <h2 class="text-2xl font-semibold text-purple-800 mb-5 section-title">Acerca de mí</h2>
                <div class="bg-purple-50 p-6 rounded-lg transition-all hover:bg-purple-100">
                    <span id="user-acerca_de_mi" class="block text-gray-800"></span>
                    <textarea id="edit-acerca_de_mi" rows="5" class="hidden input-field w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-200"></textarea>
                </div>
            </div>

            <!-- Mensajes del sistema -->
            <div id="profile-message" class="mb-6 text-center hidden px-4 py-3 rounded-lg"></div>

            <!-- Botones -->
            <div class="flex justify-center space-x-6">
                <button id="edit-button" onclick="toggleEditMode()" 
                        class="px-8 py-3 btn-primary text-white rounded-full font-medium transition-all">
                    <i class="fas fa-edit mr-2"></i>Editar Perfil
                </button>
                <button id="save-button" onclick="saveProfileChanges()" 
                        class="hidden px-8 py-3 btn-secondary text-white rounded-full font-medium transition-all">
                    <i class="fas fa-save mr-2"></i>Guardar Cambios
                </button>
                <button id="cancel-button" onclick="cancelEdit()" 
                        class="hidden px-8 py-3 bg-gray-200 text-gray-700 rounded-full font-medium hover:bg-gray-300 transition-all">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Verificar autenticación al cargar
        document.addEventListener('DOMContentLoaded', () => {
            if (!localStorage.getItem('authToken')) {
                window.location.href = '/login.html';
            } else {
                fetchProfile();
            }
            
            // Agregar animación de carga inicial
            const profileContainer = document.getElementById('profile-container');
            setTimeout(() => {
                profileContainer.classList.remove('opacity-0');
            }, 100);
        });

        // Obtener datos del perfil
        async function fetchProfile() {
            try {
                const response = await fetch('https://back1-production-67bf.up.railway.app/v1/profile?_=' + Date.now(), {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('authToken'),
                        'Accept': 'application/json'
                    }
                });
                
                if (response.status === 401) {
                    localStorage.removeItem('authToken');
                    window.location.href = '/login.html';
                    return;
                }
                
                const data = await response.json();
                
                if (response.ok) {
                    updateUI(data);
                } else {
                    throw new Error(data.message || 'Error al cargar perfil');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage(error.message, 'error');
            }
        }

        // Actualizar la interfaz
        function updateUI(data) {
            const user = data.user;
            
            // Foto
            document.getElementById('profile-photo').src = user.foto_url || '/images/default-profile.png';
            
            // Datos básicos
            document.getElementById('user-nombre').textContent = user.nombre || 'No especificado';
            document.getElementById('user-email').textContent = user.email || 'No especificado';
            document.getElementById('user-vive_en').textContent = user.vive_en || 'No especificado';
            document.getElementById('user-estudios').textContent = user.estudios || 'No especificado';
            document.getElementById('user-de_donde_es').textContent = user.de_donde_es || 'No especificado';
            document.getElementById('user-acerca_de_mi').textContent = user.acerca_de_mi || 'No especificado';
            
            // Formatear fecha correctamente
            if (user.fecha_nacimiento) {
                const fecha = new Date(user.fecha_nacimiento);
                const formattedDate = fecha.toISOString().split('T')[0];
                document.getElementById('user-fecha_nacimiento').textContent = formattedDate;
                document.getElementById('edit-fecha_nacimiento').value = formattedDate;
            } else {
                document.getElementById('user-fecha_nacimiento').textContent = 'No especificada';
                document.getElementById('edit-fecha_nacimiento').value = '';
            }
            
            // Campos profesionales
            if (data.is_professional) {
                document.getElementById('professional-fields').classList.remove('hidden');
                document.getElementById('user-licencia').textContent = user.licencia || 'No especificada';
                document.getElementById('edit-licencia').value = user.licencia || '';
            }
            
            // Quitar animación de pulso después de cargar
            setTimeout(() => {
                document.getElementById('profile-photo').classList.remove('pulse');
            }, 2000);
        }

        // Cambiar entre modo visualización y edición
        function toggleEditMode() {
            const fields = ['nombre', 'vive_en', 'estudios', 'fecha_nacimiento', 'licencia', 'de_donde_es', 'acerca_de_mi'];
            
            fields.forEach(field => {
                const displayElement = document.getElementById(`user-${field}`);
                const inputElement = document.getElementById(`edit-${field}`);
                
                if (displayElement && inputElement) {
                    if (displayElement.classList.contains('hidden')) {
                        // Volver a modo visualización
                        displayElement.classList.remove('hidden');
                        inputElement.classList.add('hidden');
                        displayElement.textContent = inputElement.value || 'No especificado';
                    } else {
                        // Cambiar a modo edición
                        displayElement.classList.add('hidden');
                        inputElement.classList.remove('hidden');
                        inputElement.value = displayElement.textContent !== 'No especificado' 
                            ? displayElement.textContent 
                            : '';
                    }
                }
            });
            
            // Alternar botones
            document.getElementById('edit-button').classList.toggle('hidden');
            document.getElementById('save-button').classList.toggle('hidden');
            document.getElementById('cancel-button').classList.toggle('hidden');
            
            // Animación de cambio de modo
            const profileContainer = document.getElementById('profile-container');
            profileContainer.classList.add('transform', 'transition-all', 'duration-300');
            setTimeout(() => {
                profileContainer.classList.remove('transform');
            }, 300);
        }

        // Cancelar edición
        function cancelEdit() {
            toggleEditMode();
            fetchProfile(); // Recargar datos originales
        }

        // Guardar cambios
        async function saveProfileChanges() {
            const saveButton = document.getElementById('save-button');
            const originalButtonText = saveButton.innerHTML;
            
            try {
                // Mostrar estado de carga
                saveButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Guardando...';
                saveButton.disabled = true;

                // Recolectar todos los datos del formulario
                const updatedData = {
                    nombre: document.getElementById('edit-nombre').value,
                    vive_en: document.getElementById('edit-vive_en').value,
                    estudios: document.getElementById('edit-estudios').value,
                    fecha_nacimiento: document.getElementById('edit-fecha_nacimiento').value,
                    de_donde_es: document.getElementById('edit-de_donde_es').value,
                    acerca_de_mi: document.getElementById('edit-acerca_de_mi').value
                };

                // Agregar campo de licencia si es profesional
                const professionalFields = document.getElementById('professional-fields');
                if (professionalFields && !professionalFields.classList.contains('hidden')) {
                    updatedData.licencia = document.getElementById('edit-licencia').value;
                }

                // Validar datos antes de enviar
                if (!updatedData.nombre || updatedData.nombre.trim() === '') {
                    throw new Error('El nombre es requerido');
                }

                // Enviar la solicitud PUT
                const response = await fetch('https://back1-production-67bf.up.railway.app/v1/profile', {
                    method: 'PUT',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('authToken'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(updatedData)
                });

                // Manejar respuesta del servidor
                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Error al actualizar perfil');
                }

                // Obtener los datos actualizados del servidor
                const responseData = await response.json();
                
                // Actualizar localStorage con los nuevos datos
                const userData = JSON.parse(localStorage.getItem('userData'));
                const mergedData = {
                    ...userData,
                    ...responseData.user
                };
                localStorage.setItem('userData', JSON.stringify(mergedData));

                // Actualizar la interfaz con los datos actualizados
                updateUI({
                    user: responseData.user || mergedData,
                    is_professional: professionalFields && !professionalFields.classList.contains('hidden')
                });

                showMessage('Perfil actualizado correctamente', 'success');
                toggleEditMode();

            } catch (error) {
                console.error('Error al guardar cambios:', error);
                showMessage(error.message, 'error');
            } finally {
                // Restaurar estado del botón
                saveButton.innerHTML = originalButtonText;
                saveButton.disabled = false;
            }
        }

        // Subir foto
        document.getElementById('photo-input').addEventListener('change', async (e) => {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                
                // Validar tipo y tamaño de archivo
                if (!file.type.match('image.*')) {
                    showMessage('Por favor, selecciona una imagen válida', 'error', 'photo-error');
                    return;
                }
                
                if (file.size > 2 * 1024 * 1024) { // 2MB
                    showMessage('La imagen no debe exceder los 2MB', 'error', 'photo-error');
                    return;
                }
                
                const formData = new FormData();
                formData.append('photo', file);
                
                try {
                    // Mostrar indicador de carga para la foto
                    const photoError = document.getElementById('photo-error');
                    photoError.textContent = 'Subiendo foto...';
                    photoError.classList.remove('hidden', 'text-red-500', 'text-green-500');
                    photoError.classList.add('text-purple-500', 'bg-purple-50');
                    
                    const response = await fetch('https://back1-production-67bf.up.railway.app/v1/profile/photo', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('authToken')
                        },
                        body: formData
                    });
                    
                    if (response.ok) {
                        const result = await response.json();
                        
                        // Asegurarnos de que estamos usando la URL correcta de Cloudinary
                        const photoUrl = result.photo_url || result.foto_url;
                        
                        if (photoUrl) {
                            // Animación de cambio de foto
                            const profilePhoto = document.getElementById('profile-photo');
                            profilePhoto.classList.add('opacity-0', 'transform', 'scale-95');
                            
                            setTimeout(() => {
                                // Forzar recarga de la imagen añadiendo timestamp para evitar caché
                                profilePhoto.src = photoUrl + '?t=' + new Date().getTime();
                                profilePhoto.classList.remove('opacity-0', 'transform', 'scale-95');
                                profilePhoto.classList.add('pulse');
                                
                                // Actualizar localStorage
                                const userData = JSON.parse(localStorage.getItem('userData') || '{}');
                                userData.foto_url = photoUrl;
                                localStorage.setItem('userData', JSON.stringify(userData));
                                
                                showMessage('Foto de perfil actualizada', 'success', 'photo-error');
                                setTimeout(() => {
                                    document.getElementById('photo-error').classList.add('hidden');
                                }, 3000);
                            }, 300);
                        } else {
                            throw new Error('No se recibió la URL de la foto');
                        }
                    } else {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Error al subir foto');
                    }
                } catch (error) {
                    console.error('Error al subir foto:', error);
                    showMessage(error.message, 'error', 'photo-error');
                }
            }
        });

        // Mostrar mensajes al usuario
        function showMessage(message, type, elementId = 'profile-message') {
            const element = document.getElementById(elementId);
            element.textContent = message;
            element.classList.remove('hidden', 'text-red-500', 'text-green-500', 'text-purple-500', 'bg-red-50', 'bg-green-50', 'bg-purple-50');
            
            if (type === 'error') {
                element.classList.add('text-red-500', 'bg-red-50');
            } else if (type === 'success') {
                element.classList.add('text-green-500', 'bg-green-50');
            } else if (type === 'info') {
                element.classList.add('text-purple-500', 'bg-purple-50');
            }
            
            // Animación de entrada
            element.classList.add('animate__animated', 'animate__fadeIn');
            
            // Ocultar mensaje después de 5 segundos
            if (elementId === 'profile-message') {
                setTimeout(() => {
                    element.classList.add('hidden');
                }, 5000);
            }
        }
    </script>
</body>
</html>