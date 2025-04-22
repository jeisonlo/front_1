<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="script.js"></script>
<style>
  

/* Elimina márgenes y padding de todos los elementos */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
  overflow-x: hidden; /* Evita desplazamiento horizontal si algún elemento desborda */
}

.footer {
  position: relative;
  z-index: 9;
  background-color: #6d0eb1e4;
  color: #a7a7a7;
  padding: 50px 20px; /* Añadido padding lateral para dispositivos pequeños */
  width: 100%;
  font-family: Arial, sans-serif;
}

.footer-container {
  display: flex;
  justify-content: space-around;
  padding-bottom: 40px;
  border-bottom: 1px solid #333;
  width: 100%;
}

.footer-column h4 {
  color: #ffffff;
  font-size: 16px;
  margin-bottom: 15px;
}

.footer-column ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.footer-column ul li {
  margin-bottom: 10px;
}

.footer-column ul li a {
  color: #a7a7a7;
  text-decoration: none;
  font-size: 14px;
}

.footer-column ul li a:hover {
  color: #ffffff;
}

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 20px;
  flex-wrap: wrap;
  gap: 10px;
  width: 100%;
}

.footer-bottom p {
  color: #a7a7a7;
  font-size: 12px;
}

.social-icons {
  display: flex;
  gap: 15px;
}

.social-icons a {
  color: #a7a7a7;
  font-size: 18px;
  text-decoration: none;
}

.social-icons a:hover {
  color: #ffffff;
}

/* Estilos Responsivos */
@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    align-items: flex-start;
  }

  .footer-column {
    margin-bottom: 20px;
    width: 100%; /* Cada columna ocupa el 100% en dispositivos pequeños */
  }

  .footer-bottom {
    flex-direction: column;
    align-items: flex-start;
    width: 100%; /* Asegura que ocupe todo el ancho */
  }

  .social-icons {
    margin-left: 0;
  }
}

@media (max-width: 480px) {
  .footer {
    padding: 20px; /* Reducir padding en dispositivos pequeños */
  }

  .footer-column h4 {
    font-size: 14px;
  }

  .footer-column ul li a {
    font-size: 12px;
  }

  .footer-bottom {
    align-items: flex-start;
    width: 100%; /* Asegura que ocupe todo el ancho */
  }

  .social-icons {
    margin-left: 0;
  }
}

</style>

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