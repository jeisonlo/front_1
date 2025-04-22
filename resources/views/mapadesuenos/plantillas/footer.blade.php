<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/mapadesuenos/footer.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="{{ asset('js/mapadesuenos/header.js') }}"></script>


  <title>Document</title>
</head>
<body>


  <footer class="footer">
    <div class="footer-container">
      
      
      

      <div class="footer-column">
        <h4>Acerca de Tranquilidad</h4>
        <ul>
          <li><a href="{{ url('/quienessomos') }}">Acerca de</a></li>
          <li><a href="{{ url('/beneficiosdetranquilidad') }}">Beneficios de la Tranquilidad</a></li>
            <li><a href="{{ url('/consejodebienestar') }}">Consejos de Bienestar</a></li>
        </ul>
    </div>
    



      <div class="footer-column">
        <h4>Ayuda y Soporte</h4>
        <ul>
          <li><a href="{{ url('/contacto') }}">Contacto</a></li>
          <li><a href="{{ url('/sugerencias') }}">Sugerencias</a></li>
          <li><a href="{{ url('/guiadeuso') }}">Guía de uso</a></li>
        </ul>
      </div>
      
      <div class="footer-column">
        <h4>Información Legal</h4>
        <ul>
          <li><a href="{{ url('/terminosycondiciones') }}">Términos y condiciones</a></li>
          <li><a href="{{ url('/politicadeprivacidad') }}">Política de privacidad</a></li>
          <li><a href="{{ url('/avisolegal') }}">Aviso legal</a></li>
        </ul>
      </div>
      
    </div>
    
    <div class="footer-bottom">
      <p>Copyright © 2024 Tranquilidad. Todos los derechos reservados.</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
  </footer>
  
  
</body>
</html>