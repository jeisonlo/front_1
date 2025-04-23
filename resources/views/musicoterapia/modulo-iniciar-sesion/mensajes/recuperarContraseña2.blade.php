<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            filter: brightness(90%);
            background-image: url('image/login/Imagen de WhatsApp 2024-12-09 a las 20.39.27_862bd1f7.jpg');
        }

        .contenedorRecuperarcontraseña {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .right {
            background-color: #FFFFFF;
            width: 400px;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
        }

        .right img {
            width: 50px;
            height: 50px;
        }

        .right h2 {
            color: #7B4FBB;
        }

        .input-container {
            width: 80%;
            margin-bottom: 20px;
        }

        .input-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #CCC;
            border-radius: 5px;
        }

        .button {
            padding: 0px 15px;
            border: none;
            border-radius: 15px;
            background-color: #8a66fd;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #C0A3FF;
        }

        .button h3 {
            font-size: 14px;
            color: aliceblue;
        }

        .contenedorLogo {
            width: 210;
            height: 110px;
        }

        .contenedorLogo img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <main class="contenedorRecuperarcontraseña">
        <div class="right">
            <div class="contenedorLogo">
                <img src="{{ asset('image/imagenes-mensajes/logo.png') }}" alt="">
            </div>
            <h2>Digite su correo electronico</h2>
            <form id="forgotPasswordForm">
                <div class="input-container">
                    <input type="email" id="email" placeholder="Correo electronico" required>
                </div>
                <button type="submit" class="button">
                    <h3>Enviar codigo</h3>
                </button>
            </form>
        </div>
    </main>

    <script type="module" src="{{ asset('js/musicoterapia.js/mensajes/fetch.js') }}"></script>
</body>

</html>