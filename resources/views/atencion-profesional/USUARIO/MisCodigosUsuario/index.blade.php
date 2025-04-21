<!DOCTYPE html> 
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/MisCodigosUsuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
    <title>Atención Profesional</title>
    </head>
    <body>
      
       <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')
        
        <main>
            <section class="historial-codigos">
              <h2>Historial de Códigos</h2>
              <table>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Fecha de Expiración</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ABC123</td>
                    <td>Descuento</td>
                    <td>Utilizado</td>
                    <td>2024-06-30</td>
                  </tr>
                  <tr>
                    <td>XYZ789</td>
                    <td>Promoción</td>
                    <td>Vencido</td>
                    <td>2024-07-10</td>
                  </tr>
                  <tr>
                    <td>LMN456</td>
                    <td>Regalo</td>
                    <td>Disponible</td>
                    <td>2024-12-31</td>
                  </tr>
                  <!-- Agrega más filas según sea necesario -->
                </tbody>
              </table>
            </section>
          </main>
          <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>       
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')   
  <script src="{{ asset('js/atencion-profesional/USUARIO/MisCodigosUsuario/script.js') }}"></script>
          <script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
    </body>
</html> 