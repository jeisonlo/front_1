<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/PagosWeb_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head>
  <body>
    
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')

      
      <body>
      <main class="body">
        <div class="formulario">
            <h1>PAGOS WEB</h1> <br><br>

            <div class="input-group1">
                <input type="text" class="casilla1" placeholder="Numero de Tarjeta" id="numero_tarjeta">
            </div>
            <div class="input-group">
                <input type="text" class="casilla" placeholder="Fecha de Vencimiento" id="fecha_vencimiento">
                <input type="text" class="casilla" placeholder="CVC/CVV" id="cvc">
            </div>
            <div class="input-group">
                <input type="text" class="casilla" placeholder="Nombre en la Tarjeta" id="nombre_tarjeta">
                <input type="text" class="casilla" placeholder="CC" id="cc">
            </div>

            <div class="recordar-tarjeta">
                <input type="checkbox" id="remember-card">
                <label for="remember-card"> Recordar tarjeta</label>

                <div class="payment-icons">
                    <img src="/atencion-profesional/USUARIO/PagosWeb_Usuario/Imagenes/visa.png" alt="Visa">
                    <img src="/atencion-profesional/USUARIO/PagosWeb_Usuario/Imagenes/master.png" alt="Master Card">
                    <img src="/atencion-profesional/USUARIO/PagosWeb_Usuario/Imagenes/american.png" alt="American Express">
                </div>
            </div>

            <button type="button" class="pagar-button" onclick="realizarPago()">Pagar</button>
        </div>
    </main>

    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>¡Felicidades!</h2>
            <p>Su pago ha sido realizado con éxito.</p>
            <button onclick="redirigir()">Aceptar</button>
        </div>
    </div>
   <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/PagosWeb_Usuario/script.js') }}"></script>

  </body>


</html>