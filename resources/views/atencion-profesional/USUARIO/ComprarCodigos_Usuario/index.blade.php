<!DOCTYPE html> 
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/ComprarCodigos_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head> 
    <body>
        <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')
        
        <main>
            <section class="compra-codigos">
                <h2>Comprar Paquetes</h2>
                <div class="codigos-grid">
                    <div class="codigo-card">
                        <img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353166/Compras1_fjwvsg.jpg" alt="Código 1">
                        <div class="codigo-card-content">
                            <h3>Paquete "Basico"</h3>
                            <p>Numero de codigos: 5</p>
                            <p>Ideal para quienes buscan una introducción perfecta a nuestro servicio. El Paquete "Esencia" incluye 5 códigos, cada uno de ellos diseñado para ofrecerte una experiencia única y versátil. Perfecto para probar nuestro servicio o para un pequeño regalo.</p>
                            <div class="precio">$50.000</div>
                            <a href="{{ route('pagos.web.usuario') }}"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="codigo-card">
                        <img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353189/Compras2_cfprac.jpg" alt="Código 2">
                        <div class="codigo-card-content">
                            <h3>Paquete "Intermedio"</h3>
                            <p>Numero de codigos: 10</p>
                            <p>El Paquete "Oasis" para quienes desean una oferta más completa y variada. Con 10 códigos, te proporciona una gama extensa de beneficios y características, permitiéndote explorar todo lo que tenemos para ofrecerte y disfrutar de ventajas continuas.</p>
                            <div class="precio">$70.000</div>
                            <a href="{{ route('pagos.web.usuario') }}"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="codigo-card">
                        <img src="https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353218/Compras3_gzbtmm.jpg" alt="Código 3">
                        <div class="codigo-card-content">
                            <h3>Paquete "Premium"</h3>
                            <p>Numero de codigos: 15</p>
                            <p>El Paquete "Eclipse" Con 20 códigos, obtienes acceso total y sin restricciones, asegurando que tengas a tu disposición una amplia gama de opciones para aprovechar al máximo nuestros servicios. Ideal para grandes proyectos o para compartir con amigos y familiares.</p>
                            <div class="precio">$120.000</div>
                            <a href="{{ route('pagos.web.usuario') }}"><button>Comprar</button></a>
                        </div>
                    </div>
                    <!-- Agrega más tarjetas de códigos según sea necesario -->
                </div>
            </section>
        </main>
        <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')         
  <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
  <script src="{{ asset('js/atencion-profesional/USUARIO/ComprarCodigos_Usuario/script.js') }}"></script>
    </body>
</html> 