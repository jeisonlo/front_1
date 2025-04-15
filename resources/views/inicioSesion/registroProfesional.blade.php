<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro Profesional</title>

    <!-- Agregamos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Agregamos Axios para peticiones HTTP -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>
  <style>

         /* Estilos mejorados */
         :root {
        --color-primario: #674dbc;
        --color-secundario: #8a66fd;
        --color-texto: #4a4a4a;
        --color-fondo: #f9f9f9;
        --color-borde: #e0e0e0;
        --color-exito: #2ecc71;
        --color-error: #e74c3c;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--color-texto);
        line-height: 1.6;
    }
    
    .contenedorCrearcuenta1 {
        display: flex;
        min-height: 100vh;
        background-color: var(--color-primario);
    }
    
    /* Panel izquierdo */
    .ingresar {
        width: 40%;
        padding: 3rem;
        background: #f9e0f5f7;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 5px 0 15px rgba(0,0,0,0.1);
    }
    
    .contenedorLogo {
        width: 200px;
        margin-bottom: 2.5rem;
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
        color: var(--color-primario);
        font-size: 1.8rem;
        margin-bottom: 1rem;
        text-align: center;
        font-weight: 600;
    }
    
    .contenedorP p {
        color: var(--color-primario);
        text-align: center;
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
        padding: 3rem;
        background: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
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
        max-width: 550px;
        padding: 2.5rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        position: relative;
        z-index: 2;
        animation: fadeIn 0.6s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .contenedorIngresar h1 {
        color: var(--color-primario);
        font-size: 2.2rem;
        margin-bottom: 0.5rem;
        text-align: center;
        font-weight: 700;
    }
    
    .contenedorIngresar p {
        color: var(--color-texto);
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
        gap: 1.2rem;
    }
    
    .inputGrupo[style*="inline-flex"] {
        flex-direction: row;
        gap: 15px;
    }
    
    .inputGrupo input,
    .inputGrupo select {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid var(--color-borde);
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
    }
    
    .inputGrupo input:focus,
    .inputGrupo select:focus {
        border-color: var(--color-secundario);
        box-shadow: 0 0 0 3px rgba(138, 102, 253, 0.2);
        outline: none;
        background-color: white;
    }
    
    /* Select de nivel educativo */
    .registrarse > select {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid var(--color-borde);
        border-radius: 8px;
        font-size: 1rem;
        margin-bottom: 0.5rem;
        background-color: #f8f9fa;
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
        background: #f8f9fa;
        border: 2px solid var(--color-borde);
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .genero input[type="radio"] {
        display: none;
    }
    
    .genero input[type="radio"]:checked + label {
        background-color: var(--color-secundario);
        color: white;
        border-color: var(--color-secundario);
    }
    
    /* Botón mejorado */
    .btnRegistro {
        margin-top: 1.5rem;
    }
    
    .button {
        display: inline-block;
        width: 100%;
        padding: 15px;
        background: linear-gradient(to right, var(--color-secundario), var(--color-primario));
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(138, 102, 253, 0.3);
        text-decoration: none;
    }
    
    .button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(138, 102, 253, 0.4);
        background: linear-gradient(to right, var(--color-primario), var(--color-secundario));
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
        stroke: var(--color-exito);
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }
    
    .checkmark-check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke: var(--color-exito);
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }
    
    .modal-titulo {
        color: var(--color-primario);
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }
    
    .modal-mensaje {
        color: var(--color-texto);
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }
    
    .boton-modal-exito {
        background-color: var(--color-secundario);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        transition: background-color 0.3s;
    }
    
    .boton-modal-exito:hover {
        background-color: var(--color-primario);
    }
    
    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
    }

  </style>
    <div class="contenedorCrearcuenta1">
        <!-- contenedor de ingresar -->
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
        <!-- contenedor de crear cuenta -->
        <div class="crearCuenta">
            <div class="contenedorIngresar">
                <h1>Crear Cuenta</h1>
                <p>Ingresa tus datos profesionales</p>
                <form id="registroForm" class="registrarse">
                    @csrf
                    <div class="inputGrupo" style="display: inline-flex">
                        <input type="text" name="nombre" placeholder="Nombre" required />
                        <input type="text" name="apellidos" placeholder="Apellidos" required />
                    </div>
                    <div class="inputGrupo">
                        <input type="email" name="email" placeholder="Correo" required />
                        <div id="email-error" class="error-mensaje"></div>
                    </div>
                    <div class="inputGrupo">
                        <input type="password" name="password" placeholder="Contraseña" required minlength="8" />
                    </div>
                    <div class="inputGrupo">
                        <input type="text" name="licencia" placeholder="Número de licencia profesional" required />
                    </div>
                    <select name="nivel_educativo" required>
                        <option value="" disabled selected>Nivel educativo</option>
                        <option value="Psicólogo">Psicólogo</option>
                        <option value="Psiquiatra">Psiquiatra</option>
                        <option value="Terapeuta">Terapeuta</option>
                        <option value="Counselor">Counselor</option>
                    </select>
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
                    <h4>Selecciona tu género</h4>
                    <div class="inputGrupo genero">
                        <input type="radio" id="genero-mujer" name="genero" value="Mujer" required />
                        <label for="genero-mujer"><i class="fas fa-venus"></i> Mujer</label>
                        
                        <input type="radio" id="genero-hombre" name="genero" value="Hombre" />
                        <label for="genero-hombre"><i class="fas fa-mars"></i> Hombre</label>
                        
                        <input type="radio" id="genero-personalizado" name="genero" value="Personalizado" />
                        <label for="genero-personalizado"><i class="fas fa-transgender-alt"></i> Personalizado</label>
                    </div>
                    <div class="btnRegistro">
                        <button type="submit" class="button">
                            <h3>Crear Cuenta</h3>
                        </button>
                    </div>
                </form>
                <div id="mensaje" style="margin-top: 20px; text-align: center;"></div>
            </div>
            <a href="{{ url('/login') }}">¿Ya tienes cuenta? Inicia sesión aquí</a>
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
    
    // Mostrar loader
    const boton = this.querySelector('button[type="submit"]');
    const textoOriginal = boton.innerHTML;
    boton.innerHTML = '<h3><i class="fas fa-spinner fa-spin"></i> Registrando...</h3>';
    boton.disabled = true;
    
    // Formatear fecha correctamente (YYYY-MM-DD)
    const dia = String(this.dia_nacimiento.value).padStart(2, '0');
    const mes = String(this.mes_nacimiento.value).padStart(2, '0');
    const anio = this.anio_nacimiento.value;
    
    // Obtener los valores del formulario
    const formData = {
        nombre: this.nombre.value,
        apellidos: this.apellidos.value,
        email: this.email.value,
        password: this.password.value,
        licencia: this.licencia.value,
        nivel_educativo: this.nivel_educativo.value,
        fecha_nacimiento: `${anio}-${mes}-${dia}`,
        genero: this.querySelector('input[name="genero"]:checked').value
    };
    
    // Enviar datos al endpoint correcto de tu API
    axios.post('https://back1-production-67bf.up.railway.app/v1/registrar-profesional', formData)
        .then(response => {
            console.log('Respuesta completa:', response); // Para depuración
            
            // Verificar si el modal existe
            const modal = document.getElementById('modalExito');
            if (!modal) {
                console.error('Modal no encontrado en el DOM');
                return;
            }
            
            // Verificar si el elemento de mensaje existe
            const mensajeBienvenida = document.getElementById('mensajeBienvenida');
            if (!mensajeBienvenida) {
                console.error('Elemento mensajeBienvenida no encontrado');
                return;
            }
            
            // Asegurarnos de que la respuesta tiene la estructura esperada
            const profesional = response.data.profesional || response.data; // Versión flexible
            
            if (profesional && profesional.nombre && profesional.nivel_educativo) {
                mensajeBienvenida.textContent = `Bienvenido/a ${profesional.nombre}, tu registro como ${profesional.nivel_educativo} ha sido exitoso.`;
                modal.classList.add('mostrar');
                
                // Opcional: Guardar datos en localStorage para uso posterior
                localStorage.setItem('profesional_registrado', JSON.stringify(profesional));
            } else {
                console.error('Estructura de respuesta inesperada:', response.data);
                document.getElementById('mensaje').innerHTML = 
                    `<p style="color: var(--color-error);">Registro exitoso, pero hubo un problema al mostrar los detalles.</p>`;
            }
        })
        .catch(error => {
            console.error('Error completo:', error); // Para depuración
            
            if (error.response && error.response.data) {
                // Manejar error de validación (ajustado a tu estructura)
                if (error.response.data.errors) {
                    if (error.response.data.errors.email) {
                        document.getElementById('email-error').textContent = error.response.data.errors.email[0];
                    }
                    // Puedes agregar más manejo de errores específicos aquí
                } else if (error.response.data.message) {
                    document.getElementById('mensaje').innerHTML = 
                        `<p style="color: var(--color-error);">${error.response.data.message}</p>`;
                }
            } else {
                document.getElementById('mensaje').innerHTML = 
                    `<p style="color: var(--color-error);">Error de conexión con el servidor</p>`;
            }
        })
        .finally(() => {
            boton.innerHTML = textoOriginal;
            boton.disabled = false;
        });
});

// Configurar botón del modal
document.getElementById('btnContinuar')?.addEventListener('click', function() {
    window.location.href = "{{ url('/login') }}";
});
  </script>
</body>
</html>