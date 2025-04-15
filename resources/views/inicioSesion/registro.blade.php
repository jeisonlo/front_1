<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro | Bienvenido</title>
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
        .contenedorCrearcuenta1 {
            display: flex;
            min-height: 100vh;
            background-color: var(--color-primary);
        }

        /* Panel izquierdo */
        .ingresar {
            width: 40%;
            padding: 2rem;
            background: #f9e0f5f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .contenedorLogo {
            width: 180px;
            margin-bottom: 2rem;
        }

        .contenedorLogo img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .contenedorLogo img:hover {
            transform: scale(1.05);
        }

        .contenedorH2 h2 {
            color: var(--color-primary);
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .contenedorP p {
            color: var(--color-primary);
            line-height: 1.6;
            max-width: 80%;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Panel derecho */
        .crearCuenta {
            width: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
            position: relative;
        }

        .crearCuenta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(103, 77, 188, 0.85);
        }

        .contenedorIngresar {
            width: 100%;
            max-width: 500px;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            position: relative;
            z-index: 2;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contenedorIngresar h1 {
            color: var(--color-primary);
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-align: center;
            font-weight: 700;
        }

        .contenedorIngresar > p {
            color: var(--color-text);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        /* Formulario mejorado */
        .registrarse {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .inputGrupo {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .inputGrupo[style*="inline-flex"] {
            flex-direction: row;
            gap: 15px;
        }

        .inputGrupo input,
        .inputGrupo select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--color-light);
        }

        .inputGrupo input:focus,
        .inputGrupo select:focus {
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 3px rgba(138, 102, 253, 0.2);
            outline: none;
            background-color: var(--color-white);
        }

        h4 {
            color: var(--color-text);
            margin: 1rem 0 0.5rem;
            font-size: 1rem;
            font-weight: 600;
        }

        /* Radio buttons mejorados */
        .genero {
            display: flex;
            gap: 10px;
            margin: 0.5rem 0 1.5rem;
        }

        .genero label {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            background: var(--color-light);
            border: 2px solid #e0e0e0;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .radio {
            display: none;
        }

        .radio:checked + label {
            background-color: var(--color-secondary);
            color: white;
            border-color: var(--color-secondary);
        }

        /* Botón mejorado */
        .button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, var(--color-secondary), var(--color-primary));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(138, 102, 253, 0.3);
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(138, 102, 253, 0.4);
            background: linear-gradient(to right, var(--color-primary), var(--color-secondary));
        }

        /* Enlaces y redes sociales */
        .crearCuenta > a {
            color: white;
            margin-top: 1.5rem;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .crearCuenta > a:hover {
            color: #e0e0e0;
            text-decoration: underline;
        }

        .redes {
            display: flex;
            gap: 1.5rem;
            margin-top: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .redes a {
            color: white;
            font-size: 1.5rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .redes a:hover {
            color: #e0e0e0;
            transform: translateY(-3px);
        }

        /* Mensajes de error */
        .error-mensaje {
            color: var(--color-error);
            font-size: 0.9rem;
            margin-top: 0.3rem;
            display: block;
        }

        #mensaje {
            margin: 1rem 0;
            font-size: 1rem;
            min-height: 20px;
            text-align: center;
        }

        #mensaje p {
            padding: 10px 15px;
            border-radius: 5px;
            margin: 0;
        }

        #mensaje p[style*="color: green"] {
            background-color: rgba(46, 204, 113, 0.1);
            border-left: 4px solid var(--color-accent);
        }

        #mensaje p[style*="color: red"] {
            background-color: rgba(231, 76, 60, 0.1);
            border-left: 4px solid var(--color-error);
        }

        /* Modal de éxito */
        .modal-exito {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .modal-exito.mostrar {
            display: flex;
            opacity: 1;
        }

        .modal-contenido-exito {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            text-align: center;
            max-width: 450px;
            width: 90%;
            transform: scale(0.9);
            transition: transform 0.5s ease;
            box-shadow: var(--shadow-lg);
        }

        .modal-exito.mostrar .modal-contenido-exito {
            transform: scale(1);
        }

        .checkmark-container {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }

        .checkmark-circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: var(--color-accent);
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark-check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke: var(--color-accent);
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        .modal-titulo {
            color: var(--color-primary);
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .modal-mensaje {
            color: var(--color-text);
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .boton-modal-exito {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: var(--transition);
            width: 100%;
            max-width: 200px;
        }

        .boton-modal-exito:hover {
            background-color: var(--color-primary);
            transform: translateY(-2px);
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contenedorCrearcuenta1 {
                flex-direction: column;
            }
            
            .ingresar, .crearCuenta {
                width: 100%;
                padding: 2rem 1rem;
            }
            
            .inputGrupo[style*="inline-flex"] {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="contenedorCrearcuenta1">
        <!-- Panel izquierdo -->
        <div class="ingresar">
            <div class="contenedorLogo">
                <img src="{{ asset('css/inicioSesion/img/logo.png') }}" alt="Logo" />
            </div>
            <div class="contenedorH2">
                <h2>¡Bienvenido De Nuevo!</h2>
            </div>
            <div class="contenedorP">
                <p>
                    Un camino hacia la sanación y el bienestar emocional comienza con el
                    apoyo y la guía de un psicólogo comprometido.
                </p>
            </div>
        </div>

        <!-- Panel derecho -->
        <div class="crearCuenta">
            <div class="contenedorIngresar">
                <h1>Crear Cuenta</h1>
                <p>Ingresa tus datos para comenzar</p>
                
                <form id="registroForm" class="registrarse">
                    @csrf
                    
                    <!-- Nombre y Apellidos -->
                    <div class="inputGrupo" style="display: inline-flex">
                        <input type="text" name="nombre" placeholder="Nombre" required />
                        <input type="text" name="apellidos" placeholder="Apellidos" required />
                    </div>
                    
                    <!-- Email con validación -->
                    <div class="inputGrupo">
                        <input type="email" name="email" placeholder="Correo electrónico" required />
                        <div id="email-error" class="error-mensaje"></div>
                    </div>
                    
                    <!-- Contraseña -->
                    <div class="inputGrupo">
                        <input type="password" name="password" placeholder="Contraseña" required minlength="8" />
                    </div>
                    
                    <!-- Fecha de nacimiento -->
                    <h4>Fecha de nacimiento</h4>
                    <div class="inputGrupo" style="justify-content: center; display: flex; gap: 10px;">
                        <select name="dia_nacimiento" required>
                            <option value="" disabled selected>Día</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <select name="mes_nacimiento" required>
                            <option value="" disabled selected>Mes</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                        <select name="anio_nacimiento" required>
                            <option value="" disabled selected>Año</option>
                            @for ($i = date('Y') - 18; $i >= date('Y') - 100; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <!-- Género -->
                    <h4>Selecciona tu género</h4>
                    <div class="inputGrupo genero">
                        <input type="radio" id="genero-mujer" name="genero" value="Mujer" required class="radio" />
                        <label for="genero-mujer"><i class="fas fa-venus"></i> Mujer</label>
                        
                        <input type="radio" id="genero-hombre" name="genero" value="Hombre" class="radio" />
                        <label for="genero-hombre"><i class="fas fa-mars"></i> Hombre</label>
                        
                        <input type="radio" id="genero-personalizado" name="genero" value="Personalizado" class="radio" />
                        <label for="genero-personalizado"><i class="fas fa-transgender-alt"></i> Personalizado</label>
                    </div>
                    
                    <!-- Botón de registro -->
                    <div class="btnRegistro">
                        <button type="submit" class="button">
                            <span id="btn-text">Crear cuenta</span>
                            <span id="btn-loading" style="display:none;">
                                <i class="fas fa-spinner fa-spin"></i> Procesando...
                            </span>
                        </button>
                    </div>
                </form>
                
                <!-- Mensajes del sistema -->
                <div id="mensaje"></div>
            </div>
            
            <!-- Enlace a login -->
            <a href="{{ url('/login') }}">¿Ya tienes cuenta? Inicia sesión aquí</a>
            
            <!-- Redes sociales -->
            <div class="redes">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>

    <!-- Modal de Éxito -->
    <div id="modalExito" class="modal-exito">
        <div class="modal-contenido-exito">
            <div class="checkmark-container">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            <h2 class="modal-titulo">¡Registro Exitoso!</h2>
            <p class="modal-mensaje" id="mensajeBienvenida"></p>
            <button id="btnContinuar" class="boton-modal-exito">Inicia sesion</button>
        </div>
    </div>

    <script>
        document.getElementById('registroForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Limpiar mensajes de error anteriores
            document.getElementById('email-error').textContent = '';
            document.getElementById('mensaje').innerHTML = '';
            
            // Mostrar estado de carga
            const btnText = document.getElementById('btn-text');
            const btnLoading = document.getElementById('btn-loading');
            const boton = this.querySelector('button[type="submit"]');
            
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline';
            boton.disabled = true;
            
            // Obtener datos del formulario
            const formData = {
                nombre: this.nombre.value.trim(),
                apellidos: this.apellidos.value.trim(),
                email: this.email.value.trim(),
                password: this.password.value,
                fecha_nacimiento: `${this.anio_nacimiento.value}-${this.mes_nacimiento.value.padStart(2, '0')}-${this.dia_nacimiento.value.padStart(2, '0')}`,
                genero: this.querySelector('input[name="genero"]:checked').value
            };
            
            // Enviar datos al backend
            axios.post('https://back1-production-67bf.up.railway.app/api/registrar-usuario', formData)
                .then(response => {
                    // Mostrar modal de éxito
                    const modal = document.getElementById('modalExito');
                    const mensajeBienvenida = document.getElementById('mensajeBienvenida');
                    
                    mensajeBienvenida.textContent = `Bienvenido ${response.data.usuario.nombre}, tu cuenta ha sido creada exitosamente.`;
                    modal.classList.add('mostrar');
                    
                    // Reiniciar formulario
                    this.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    if (error.response && error.response.data) {
                        // Manejar error de email duplicado
                        if (error.response.data.errors && error.response.data.errors.email) {
                            document.getElementById('email-error').textContent = error.response.data.errors.email[0];
                        } else {
                            document.getElementById('mensaje').innerHTML = 
                                `<p style="color: var(--color-error);">${error.response.data.message || 'Error al registrar usuario'}</p>`;
                        }
                    } else {
                        document.getElementById('mensaje').innerHTML = 
                            `<p style="color: var(--color-error);">Error de conexión con el servidor</p>`;
                    }
                })
                .finally(() => {
                    btnText.style.display = 'inline';
                    btnLoading.style.display = 'none';
                    boton.disabled = false;
                });
        });
        
        // Configurar botón del modal
        document.getElementById('btnContinuar').addEventListener('click', function() {
            window.location.href = "{{ url('/login') }}";
        });
        
        // Cerrar modal haciendo clic fuera
        document.getElementById('modalExito').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('mostrar');
            }
        });
    </script>
</body>
</html>