<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/mapadesuenos/mapainiciodos.css') }}">
 
  <title>Mapa de sueños</title>
  <style>

 

  </style>
</head>
<body>
    @include('mapadesuenos.plantillas.header')

<main>
    <div class="main-container">
       
        <div class="card">
            <img src="https://i.ibb.co/5RtT9YH/6db65a1a-0a87-4da7-8fcd-9b1fc8ad10ec.jpg" alt="The Psychology of Money" alt="Imagen de la tarjeta">
            <div class="card-content">
                <h3 class="card-title">Lienzo</h3>
                <p class="card-description">En esta sección, podrás crear y editar lienzos personalizados para diseñar y planificar ideas, guardando cada cambio en tiempo real.</p>
                <a href="{{ route('lienzo') }}" class="card-button">Explorar</a>
            </div>
        </div>

        <div class="card">
            <img src="https://i.ibb.co/Wvts4S9/fa6ba384-37ab-43aa-9358-87e284f935b3.jpg" alt="Imagen de la tarjeta">
            <div class="card-content">
                <h3 class="card-title">Seguimiento</h3>
                <p class="card-description">En esta sección, podrás asignarte tareas con fechas límite para ayudarte a alcanzar tus sueños y objetivos.</p>
                <a href="{{ route('seguimiento') }}" class="card-button">Explorar</a>
            </div>
        </div>
    

       

    </div>
</main>
    
@include('mapadesuenos.plantillas.footer')

<script src="{{ asset('js/mapadesuenos/mapainiciodos.js') }}"></script>
</body>
</html>