<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/mapadesuenos/iniciomapa.css') }}">


  <title>Mapa de sueños</title>
  <style>

  </style>
</head>
<body>

    @include('mapadesuenos.plantillas.header')
<main>
    <div class="main-container">
        <div class="card">
            <img src="https://th.bing.com/th?id=OIP.EMW7czRLUsco3um3E9Jz8QHaFj&w=288&h=216&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="Imagen de la tarjeta">
            <div class="card-content">
                <h3 class="card-title">Mapa de sueños</h3>
                <p class="card-description">Visualiza y organiza tus metas en un mapa de sueños personalizable.</p>
                <a href="{{ route('maps') }}" class="card-button">Explorar</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://www.bing.com/th?id=OIP.PgCk-ny7bnK9VjvXSv1R4QHaHa&w=206&h=206&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="Imagen de la tarjeta">
            <div class="card-content">
                <h3 class="card-title">Libros</h3>
                <p class="card-description">Encuentra libros inspiradores que te acompañen en tu crecimiento personal.</p>
                <a href="{{ route('categorias') }}" class="card-button">Explorar</a>
            </div>
        </div>
    </div>
</main>
@include('mapadesuenos.plantillas.footer')


</body>
</html>