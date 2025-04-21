<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención Profesional</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/CertificadosProfesionales_Usuario/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Header/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atencion-profesional/USUARIO/Footer/inicio/styles.css') }}">
</head>
<body>
  
    <!-- Lugar donde se cargará el header -->
    <div id="header-container"></div>
    @include('atencion-profesional.USUARIO.Header.header')

    
        <main>
            <div class="certificate-section">
                <h2>Certificados del Profesional</h2>
                <ul class="certificate-list" id="certificates">
                    
                </ul>
            </div>
        </main>
        
        
 <!-- Lugar donde se cargará el footer -->
  <div id="footer-container"></div>
  @include('atencion-profesional.USUARIO.Footer.inicio.inicio')

        <script src="script.js"></script>
    </div>
    <script>

        function loadCertificates() {
            const certificates = [
                'Certificado de Psicología Clínica',
                'Certificado de Terapia Cognitivo-Conductual',
                'Certificado de Mindfulness y Meditación'
            ];

            const certificatesList = document.getElementById('certificates');

            certificates.forEach(certificate => {
                const li = document.createElement('li');
                li.textContent = certificate;
                certificatesList.appendChild(li);
            });
        }

        
        window.onload = loadCertificates;
    </script>
<script src="{{ asset('js/atencion-profesional/USUARIO/Header/script.js') }}"></script>
<script src="{{ asset('js/atencion-profesional/USUARIO/CertificadosProfesionales_Usuario/script.js') }}"></script>
    
</body>
</html>

