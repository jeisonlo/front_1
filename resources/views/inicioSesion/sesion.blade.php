<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión - Tranquilidad y Bienestar</title>
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
        .contenedor-login {
            display: flex;
            min-height: 100vh;
            background-color: var(--color-primary);
        }

        /* Panel izquierdo */
        .panel-izquierdo {
            width: 40%;
            padding: 2rem;
            background: #f9e0f5f7;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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

        .contenedor-logo img:hover {
            transform: scale(1.05);
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
            opacity: 0.9;
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
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contenedor-formulario h1 {
            color: var(--color-primary);
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-align: center;
            font-weight: 700;
        }

        .contenedor-formulario > p {
            color: var(--color-text);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        /* Formulario mejorado */
        .formulario-login {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .grupo-input {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .grupo-input input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--color-light);
        }

        .grupo-input input:focus {
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 3px rgba(138, 102, 253, 0.2);
            outline: none;
            background-color: var(--color-white);
        }

        /* Botón mejorado */
        .boton-login {
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

        .boton-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(138, 102, 253, 0.4);
            background: linear-gradient(to right, var(--color-primary), var(--color-secondary));
        }

        /* Enlaces y redes sociales */
        .panel-derecho > a {
            color: white;
            margin-top: 1.5rem;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .panel-derecho > a:hover {
            color: #e0e0e0;
            text-decoration: underline;
        }

        .redes-sociales {
            display: flex;
            gap: 1.5rem;
            margin-top: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .redes-sociales a {
            color: white;
            font-size: 1.5rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .redes-sociales a:hover {
            color: #e0e0e0;
            transform: translateY(-3px);
        }

        /* Mensajes de error */
        .mensaje-error {
            color: var(--color-error);
            font-size: 0.9rem;
            margin-top: 0.3rem;
            display: block;
        }

        #mensaje-sistema {
            margin: 1rem 0;
            font-size: 1rem;
            min-height: 20px;
            text-align: center;
        }

        #mensaje-sistema p {
            padding: 10px 15px;
            border-radius: 5px;
            margin: 0;
        }

        #mensaje-sistema p[style*="color: green"] {
            background-color: rgba(46, 204, 113, 0.1);
            border-left: 4px solid var(--color-accent);
        }

        #mensaje-sistema p[style*="color: red"] {
            background-color: rgba(231, 76, 60, 0.1);
            border-left: 4px solid var(--color-error);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contenedor-login {
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
    <div class="contenedor-login">
        <!-- Panel izquierdo -->
        <div class="panel-izquierdo">
            <div class="contenedor-logo">
                <img src="{{ asset('css/inicioSesion/img/logo.png') }}" alt="Logo" />
            </div>
            <div class="titulo-bienvenida">
                <h2>¡Bienvenido De Nuevo!</h2>
            </div>
            <div class="texto-bienvenida">
                <p>
                    Un camino hacia la sanación y el bienestar emocional comienza con el
                    apoyo y la guía de un psicólogo comprometido.
                </p>
            </div>
        </div>

        <!-- Panel derecho -->
        <div class="panel-derecho">
            <div class="contenedor-formulario">
                <h1>Iniciar Sesión</h1>
                <p>Ingresa tus credenciales para continuar</p>
                
                <form id="loginForm" class="formulario-login">
                    @csrf
                    
                    <!-- Email -->
                    <div class="grupo-input">
                        <input type="email" id="email" name="email" placeholder="Correo electrónico" required />
                        <div id="email-error" class="mensaje-error"></div>
                    </div>
                    
                    <!-- Contraseña -->
                    <div class="grupo-input">
                        <input type="password" id="password" name="password" placeholder="Contraseña" required />
                        <div id="password-error" class="mensaje-error"></div>
                    </div>
                    
                    <!-- Botón de login -->
                    <button type="submit" class="boton-login">
                        <span id="btn-text">Iniciar sesión</span>
                        <span id="btn-loading" style="display:none;">
                            <i class="fas fa-spinner fa-spin"></i> Verificando...
                        </span>
                    </button>
                </form>
                
                <!-- Mensajes del sistema -->
                <div id="mensaje-sistema"></div>
            </div>
            
            <!-- Enlaces adicionales -->
            <a href="{{ url('/recuperar-contrasena') }}">¿Olvidaste tu contraseña?</a>
            <a href="{{ url('/registro') }}">¿No tienes cuenta? Regístrate aquí</a>
            <a href="{{ url('/registroProfesional') }}">Regístrate aquí como profesional</a>
            
            <!-- Redes sociales -->
            <div class="redes-sociales">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>


    <script>
         const homeUrl = "{{ url('/inicioSesion/home') }}";
      document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Limpiar mensajes de error
    document.getElementById('email-error').textContent = '';
    document.getElementById('password-error').textContent = '';
    document.getElementById('mensaje-sistema').innerHTML = '';
    
    // Mostrar estado de carga
    const btnText = document.getElementById('btn-text');
    const btnLoading = document.getElementById('btn-loading');
    const boton = this.querySelector('button[type="submit"]');
    
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline';
    boton.disabled = true;
    
    try {
        const formData = {
            email: this.email.value.trim(),
            password: this.password.value
        };
        
        const response = await axios.post('https://back1-production-67bf.up.railway.app/v1/login', formData);
        
        console.log('Respuesta completa:', response.data);
        
        if (response.data.message === "Usuario autenticado") {
            // Guardar datos en localStorage
            localStorage.setItem('authToken', response.data.token);
            localStorage.setItem('userData', JSON.stringify({
                id: response.data.user.id,
                nombre: response.data.user.nombre,
                tipo: response.data.tipo
            }));
            
            // Redirigir a la vista home
            window.location.href =homeUrl ;
        } else {
            throw new Error(response.data.message || 'Error inesperado');
        }
    } catch (error) {
        console.error('Error en login:', error);
        
        let errorMessage = 'Error al iniciar sesión';
        if (error.response) {
            if (error.response.status === 401) {
                errorMessage = 'Credenciales incorrectas';
            } else if (error.response.data?.errors) {
                if (error.response.data.errors.email) {
                    document.getElementById('email-error').textContent = error.response.data.errors.email[0];
                }
                if (error.response.data.errors.password) {
                    document.getElementById('password-error').textContent = error.response.data.errors.password[0];
                }
                errorMessage = 'Por favor corrige los errores';
            } else if (error.response.data?.message) {
                errorMessage = error.response.data.message;
            }
        }
        
        document.getElementById('mensaje-sistema').innerHTML = 
            `<p style="color: var(--color-error);">${errorMessage}</p>`;
    } finally {
        btnText.style.display = 'inline';
        btnLoading.style.display = 'none';
        boton.disabled = false;
    }
});
    </script>
</body>
</html>