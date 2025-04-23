<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/musicoterapia.css/Registro/registro.css') }}">
    <style>
        .crearCuenta{
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         width: 70%;
         height:100vh;
         overflow:hidden;
         /* background-color: #fafafb; */
         filter: brightness(90%); /* Reduce el brillo al 50% */
         background-image:  url('image/login/Imagen de WhatsApp 2024-12-09 a las 20.39.27_862bd1f7.jpg');
     }
       </style>
</head>

<body>
    <div class="contenedorCrearcuenta1">
        <!-- contenedor de ingresar -->
        <div class="ingresar">
            <div class="contenedorLogo">
                <img src="{{ asset('image/images/6aa3987c-48ce-4355-b6bf-26c76c37e93d-removebg.png') }}" alt="" />
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
                <p>Ingresa tus datos</p>
                <form class="registrarse" id="registerForm">
                    <div class="inputGrupo" style="display: inline-flex">
                        <input type="text" id="name" placeholder="Nombre:" required />
                        <input type="text" id="surname" placeholder="Apellidos:" required />
                    </div>
                    <div class="inputGrupo">
                        <input type="email" id="email" placeholder="Correo:" required />
                    </div>
                    <div class="inputGrupo">
                        <input type="password" id="password" placeholder="Contraseña:" required />
                    </div>
                    <div class="inputGrupo">
                        <input type="password" id="password_confirmation" placeholder="Confirmar Contraseña:"
                            required />
                    </div>
                    <h4>Fecha de nacimiento</h4>
                    <div class="inputGrupo" style="justify-content: center; display: flex">
                        <select id="day" required>
                            <option value="">Día</option>
                        </select>
                        <select id="month" required>
                            <option value="">Mes</option>
                        </select>
                        <select id="year" required>
                            <option value="">Año</option>
                        </select>
                    </div>
                    <h4>Selecciona tu género</h4>
                    <div class="inputGrupo genero" style="display: inline-flex; justify-content: center">
                        <label><input class="radio" type="radio" name="genero" value="Mujer" required /> Mujer</label>
                        <label><input class="radio" type="radio" name="genero" value="Hombre" /> Hombre</label>
                        <label><input class="radio" type="radio" name="genero" value="Personalizado" />
                            Personalizado</label>
                    </div>
                    <div class="btnRegistro">
                        <button type="submit" class="button">
                            <h3>Crear</h3>
                        </button>
                    </div>
                </form>
                <a href="{{ route('login') }}">¿Ya tienes cuenta?</a>
                <div class="redes">
                    <div class="contenedorRedes">
                        <a href="#"><img src="{{ asset('image/login/facebookLogo.png') }}" alt="Facebook" /></a>
                    </div>
                    <div class="contenedorRedes">
                        <a href="#"><img src="{{ asset('image/login/gmail.png') }}" alt="Google" /></a>
                    </div>
                    <div class="contenedorRedes">
                        <a href="#"><img src="{{ asset('image/login/Apple.png') }}" alt="Apple" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/musicoterapia.js/Registro/script.js') }}"></script>
    <script type="module" src="{{ asset('js/musicoterapia.js/Registro/fetch.js') }}"></script>
</body>

</html>