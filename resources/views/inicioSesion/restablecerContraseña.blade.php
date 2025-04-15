<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar Contraseña - Tranquilidad y Bienestar</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-primary: #674dbc;
            --color-secondary: #8a66fd;
            --color-accent: #4CAF50;
            --color-error: #e74c3c;
            --color-text: #333;
            --color-light: #f8f9fa;
            --color-white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        /* Estructura principal */
        .contenedor-recuperacion {
            display: flex;
            min-height: 100vh;
            background-color: var(--color-primary);
        }

        /* Panel izquierdo */
        .panel-izquierdo {
            width: 40%;
            padding: 2rem;
            background: #f9e0f5f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .contenedor-logo {
            width: 180px;
            margin-bottom: 2rem;
        }

        .contenedor-logo img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .titulo-bienvenida h2 {
            color: var(--color-primary);
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .texto-bienvenida p {
            color: var(--color-primary);
            line-height: 1.6;
            max-width: 80%;
            margin: 0 auto;
        }

        /* Panel derecho */
        .panel-derecho {
            width: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
            position: relative;
        }

        .panel-derecho::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(103, 77, 188, 0.85);
        }

        .contenedor-formulario {
            width: 100%;
            max-width: 500px;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            position: relative;
            z-index: 2;
        }

        /* Pasos del proceso */
        .pasos-recuperacion {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            gap: 15px;
        }

        .paso {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: relative;
        }

        .paso.activo {
            background: var(--color-primary);
            color: white;
        }

        .paso.completado {
            background: var(--color-accent);
            color: white;
        }

        .paso::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 100%;
            width: 15px;
            height: 2px;
            background: #e0e0e0;
        }

        .paso:last-child::after {
            display: none;
        }

        .paso.completado::after {
            background: var(--color-accent);
        }

        /* Formularios */
        .formulario-recuperacion {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .grupo-input {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .grupo-input label {
            font-weight: 500;
            color: var(--color-text);
        }

        .grupo-input input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .grupo-input input:focus {
            border-color: var(--color-secondary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(138, 102, 253, 0.2);
        }

        /* Botones */
        .boton-recuperacion {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, var(--color-secondary), var(--color-primary));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
        }

        .boton-recuperacion:hover {
            background: linear-gradient(to right, var(--color-primary), var(--color-secondary));
            transform: translateY(-2px);
        }

        /* Mensajes */
        .mensaje-error {
            color: var(--color-error);
            font-size: 0.9rem;
        }

        .mensaje-exito {
            color: var(--color-accent);
            font-size: 0.9rem;
        }

        #mensaje-sistema {
            margin: 1rem 0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contenedor-recuperacion {
                flex-direction: column;
            }
            
            .panel-izquierdo, .panel-derecho {
                width: 100%;
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor-recuperacion">
        <!-- Panel izquierdo -->
        <div class="panel-izquierdo">
            <div class="contenedor-logo">
                <img src="{{ asset('css/inicioSesion/img/logo.png') }}" alt="Logo" />
            </div>
            <div class="titulo-bienvenida">
                <h2>Recupera tu acceso</h2>
            </div>
            <div class="texto-bienvenida">
                <p>
                    Sigue estos simples pasos para restablecer tu contraseña y volver a tu
                    camino hacia el bienestar emocional.
                </p>
            </div>
        </div>

        <!-- Panel derecho -->
        <div class="panel-derecho">
            <div class="contenedor-formulario">
                <!-- Indicador de pasos -->
                <div class="pasos-recuperacion">
                    <div class="paso activo" id="paso1-indicator">1</div>
                    <div class="paso" id="paso2-indicator">2</div>
                    <div class="paso" id="paso3-indicator">3</div>
                </div>
                
                <h1 id="titulo-formulario">Recuperar Contraseña</h1>
                <p id="subtitulo-formulario">Ingresa tu correo electrónico registrado</p>
                
                <!-- Paso 1: Solicitud de recuperación -->
                <form id="form-solicitud" class="formulario-recuperacion">
                    <div class="grupo-input">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com">
                        <div id="email-error" class="mensaje-error"></div>
                    </div>
                    <button type="submit" class="boton-recuperacion" id="btn-solicitud">
                        Enviar código de verificación
                    </button>
                </form>
                
                <!-- Paso 2: Validación de código -->
                <form id="form-validacion" class="formulario-recuperacion" style="display: none;">
                    <div class="grupo-input">
                        <label for="codigo">Código de verificación</label>
                        <input type="text" id="codigo" name="codigo" required placeholder="Ingresa el código de 6 dígitos">
                        <div id="codigo-error" class="mensaje-error"></div>
                    </div>
                    <button type="submit" class="boton-recuperacion" id="btn-validar">
                        Validar código
                    </button>
                </form>
                
                <!-- Paso 3: Nueva contraseña -->
                <form id="form-contrasena" class="formulario-recuperacion" style="display: none;">
                    <div class="grupo-input">
                        <label for="nueva-contrasena">Nueva contraseña (mínimo 8 caracteres)</label>
                        <input type="password" id="nueva-contrasena" name="nueva-contrasena" minlength="8" required>
                        <div id="contrasena-error" class="mensaje-error"></div>
                    </div>
                    <div class="grupo-input">
                        <label for="confirmar-contrasena">Confirmar nueva contraseña</label>
                        <input type="password" id="confirmar-contrasena" name="confirmar-contrasena" minlength="8" required>
                        <div id="confirmar-error" class="mensaje-error"></div>
                    </div>
                    <button type="submit" class="boton-recuperacion" id="btn-cambiar">
                        Cambiar contraseña
                    </button>
                </form>
                
                <!-- Mensajes del sistema -->
                <div id="mensaje-sistema"></div>
                
                <!-- Enlace para volver al login -->
                <div style="text-align: center; margin-top: 1.5rem;">
                    <a href="{{ url('/login') }}" style="color: var(--color-primary); text-decoration: none;">
                        <i class="fas fa-arrow-left"></i> Volver al inicio de sesión
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables de estado
        let emailUsuario = '';
        let codigoValido = false;
        let tokenVerificacion = '';
        
        // Elementos del DOM
        const forms = {
            solicitud: document.getElementById('form-solicitud'),
            validacion: document.getElementById('form-validacion'),
            contrasena: document.getElementById('form-contrasena')
        };
        
        const indicators = {
            paso1: document.getElementById('paso1-indicator'),
            paso2: document.getElementById('paso2-indicator'),
            paso3: document.getElementById('paso3-indicator')
        };
        
        const tituloForm = document.getElementById('titulo-formulario');
        const subtituloForm = document.getElementById('subtitulo-formulario');
        const mensajeSistema = document.getElementById('mensaje-sistema');
        
        // Configurar API base (ajusta según tu entorno)
        const API_BASE_URL = 'https://back1-production-67bf.up.railway.app/v1';
        
        // Manejar solicitud de recuperación
        forms.solicitud.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value.trim();
            const btn = document.getElementById('btn-solicitud');
            const originalText = btn.innerHTML;
            
            // Validación básica
            if (!email) {
                document.getElementById('email-error').textContent = 'Por favor ingresa tu correo electrónico';
                return;
            }
            
            // Mostrar loading
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando código...';
            
            try {
                // Llamar a la API para solicitar recuperación
                const response = await axios.post(`${API_BASE_URL}/solicitar-recuperacion`, {
                    email: email
                });
                
                // Si es exitoso
                if (response.data.success) {
                    emailUsuario = email;
                    tokenVerificacion = response.data.token; // Asumiendo que la API devuelve un token
                    
                    // Mostrar mensaje de éxito
                    mostrarMensaje('Se ha enviado un código de verificación a tu correo electrónico', 'exito');
                    
                    // Pasar al siguiente paso
                    cambiarPaso(2);
                } else {
                    throw new Error(response.data.message || 'Error al solicitar recuperación');
                }
            } catch (error) {
                console.error('Error:', error);
                manejarError(error, 'email-error');
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        });
        
        // Manejar validación de código
        forms.validacion.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const codigo = document.getElementById('codigo').value.trim();
            const btn = document.getElementById('btn-validar');
            const originalText = btn.innerHTML;
            
            // Validación básica
            if (!codigo) {
                document.getElementById('codigo-error').textContent = 'Por favor ingresa el código de verificación';
                return;
            }
            
            // Mostrar loading
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Validando código...';
            
            try {
                // Llamar a la API para validar el código
                const response = await axios.post(`${API_BASE_URL}/validar-codigo`, {
                    email: emailUsuario,
                    codigo: codigo,
                    token: tokenVerificacion
                });
                
                // Si es exitoso
                if (response.data.success) {
                    codigoValido = true;
                    tokenVerificacion = response.data.token; // Actualizar token si es necesario
                    
                    // Mostrar mensaje de éxito
                    mostrarMensaje('Código validado correctamente', 'exito');
                    
                    // Pasar al siguiente paso
                    cambiarPaso(3);
                } else {
                    throw new Error(response.data.message || 'Código inválido');
                }
            } catch (error) {
                console.error('Error:', error);
                manejarError(error, 'codigo-error');
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        });
        
        // Manejar cambio de contraseña
        forms.contrasena.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const nuevaContrasena = document.getElementById('nueva-contrasena').value;
            const confirmarContrasena = document.getElementById('confirmar-contrasena').value;
            const btn = document.getElementById('btn-cambiar');
            const originalText = btn.innerHTML;
            
            // Validaciones
            if (nuevaContrasena.length < 8) {
                document.getElementById('contrasena-error').textContent = 'La contraseña debe tener al menos 8 caracteres';
                return;
            }
            
            if (nuevaContrasena !== confirmarContrasena) {
                document.getElementById('confirmar-error').textContent = 'Las contraseñas no coinciden';
                return;
            }
            
            // Mostrar loading
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Actualizando contraseña...';
            
            try {
                // Llamar a la API para cambiar la contraseña
                const response = await axios.post(`${API_BASE_URL}/restablecer-contrasena`, {
                    email: emailUsuario,
                    nueva_contrasena: nuevaContrasena,
                    token: tokenVerificacion
                });
                
                // Si es exitoso
                if (response.data.success) {
                    mostrarMensaje('¡Contraseña actualizada correctamente! Redirigiendo al login...', 'exito');
                    
                    // Redirigir al login después de 3 segundos
                    setTimeout(() => {
                        window.location.href = "{{ url('/login') }}";
                    }, 3000);
                } else {
                    throw new Error(response.data.message || 'Error al cambiar la contraseña');
                }
            } catch (error) {
                console.error('Error:', error);
                manejarError(error, 'contrasena-error');
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        });
        
        // Funciones auxiliares
        function cambiarPaso(paso) {
            // Ocultar todos los formularios
            Object.values(forms).forEach(form => form.style.display = 'none');
            
            // Actualizar indicadores
            Object.values(indicators).forEach(ind => ind.classList.remove('activo', 'completado'));
            
            // Mostrar formulario correspondiente y actualizar UI
            switch(paso) {
                case 1:
                    forms.solicitud.style.display = 'flex';
                    indicators.paso1.classList.add('activo');
                    tituloForm.textContent = 'Recuperar Contraseña';
                    subtituloForm.textContent = 'Ingresa tu correo electrónico registrado';
                    break;
                case 2:
                    forms.validacion.style.display = 'flex';
                    indicators.paso1.classList.add('completado');
                    indicators.paso2.classList.add('activo');
                    tituloForm.textContent = 'Verificar Identidad';
                    subtituloForm.textContent = 'Ingresa el código que enviamos a tu correo';
                    break;
                case 3:
                    forms.contrasena.style.display = 'flex';
                    indicators.paso1.classList.add('completado');
                    indicators.paso2.classList.add('completado');
                    indicators.paso3.classList.add('activo');
                    tituloForm.textContent = 'Nueva Contraseña';
                    subtituloForm.textContent = 'Crea una nueva contraseña segura';
                    break;
            }
        }
        
        function mostrarMensaje(mensaje, tipo = 'error') {
            mensajeSistema.innerHTML = `<p style="color: ${tipo === 'error' ? 'var(--color-error)' : 'var(--color-accent)'}">${mensaje}</p>`;
            mensajeSistema.style.display = 'block';
            
            if (tipo === 'exito') {
                setTimeout(() => {
                    mensajeSistema.style.display = 'none';
                }, 5000);
            }
        }
        
        function manejarError(error, elementoError = null) {
            let mensaje = 'Ocurrió un error. Por favor intenta nuevamente.';
            
            if (error.response) {
                // Error de la API
                if (error.response.data && error.response.data.message) {
                    mensaje = error.response.data.message;
                } else if (error.response.status === 404) {
                    mensaje = 'El servicio no está disponible en este momento';
                } else if (error.response.status === 422) {
                    // Errores de validación
                    if (error.response.data.errors) {
                        const errors = error.response.data.errors;
                        for (const key in errors) {
                            if (errors[key][0]) {
                                const errorElement = document.getElementById(`${key}-error`);
                                if (errorElement) {
                                    errorElement.textContent = errors[key][0];
                                }
                            }
                        }
                        return;
                    }
                }
            } else if (error.message) {
                mensaje = error.message;
            }
            
            if (elementoError) {
                document.getElementById(elementoError).textContent = mensaje;
            } else {
                mostrarMensaje(mensaje);
            }
        }
        
        // Inicializar en el paso 1
        cambiarPaso(1);
    </script>
</body>
</html>