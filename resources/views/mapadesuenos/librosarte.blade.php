<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('css/mapadesuenos/librosarte.css') }}">
  <title>Mapa de sueños</title>

</head>
<body>
    @include('mapadesuenos.plantillas.header')
<main>
    <section class="dream-map">
        <a href="/mapadesuenos/libro1?id=1" class="book-link">
            <img src="https://res.cloudinary.com/detivdncz/image/upload/v1740438702/40fa6a6657f79a3752fbf7a8501ccebd_et0ecw.webp" alt="The Psychology of Money">
        </a>
        <h2>El arte de la guerra</h2>
        <h2 class="heart" style="cursor: pointer;">🤍</h2>
    </section>
    <section class="dream-map">
        <a href="/mapadesuenos/libro1?id=2">
            <img src="https://res.cloudinary.com/detivdncz/image/upload/v1740456902/El_arte_de_vivir_Manual_de_vida-Epicteto-md_gvniw2.jpg" alt="The Psychology of Money">
        </a>
        <h2>El arte de vivir</h2>
        <h2 class="heart" style="cursor: pointer;">🤍</h2>
    </section>
    <section class="Poemas">
       
         <a href="/mapa-de-suenos/Libros/arte/Libro3.html"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx2hMJwUaJzBPXomwH9yOQcdr0EoGZeRRGuA&s" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
         <h2>El tratado de la pintura</h2>
         <h2 class="heart" id="heart3">🤍</h2>
    </section>
    
    



    <section class="dream-map">
     
        <a href="/mapa-de-suenos/Libros/arte/Libro4.html"><img src="https://imagessl1.casadellibro.com/a/l/s7/81/9788476002681.webp" alt="The Psychology of Money"></a>
        <h2>Historia del arte</h2>
        <h2 class="heart" id="heart4">🤍</h2>
        
    </section>

    <section class="Creaciones">
      
        <a href="/mapa-de-suenos/Libros/arte/Libro6.html"><img src="https://res.cloudinary.com/detivdncz/image/upload/v1741007361/iii_z39vdr.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
        <h2>Las artes de la india</h2>
        <h2 class="heart" id="heart5">🤍</h2>
    </section>
    <section class="Sentimiento">
      
         <a href="/mapa-de-suenos/Libros/arte/Libro6.html"><img src="https://images.cdn1.buscalibre.com/fit-in/360x360/fe/ea/feeae55d28a6b0a0750df8e115da1200.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
         <h2>Los principios del arte</h2>
         <h2 class="heart" id="heart6">🤍</h2>
    </section>
    <section class="Creaciones">
        <a href="/mapa-de-suenos/Libros/arte/Libro8.html"><img src="https://res.cloudinary.com/detivdncz/image/upload/v1741007530/download_zofwbu.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
        <h2>El arte de amar</h2>
        <h2 class="heart" id="heart7">🤍</h2>
    </section>
    <section class="Sentimiento">
      
         <a href="/mapa-de-suenos/Libros/arte/Libro8.html"><img src="https://m.media-amazon.com/images/I/410yVPIXgZL._AC_UF894,1000_QL80_.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
         <h2>Historia del arte</h2>
         <h2 class="heart" id="heart8">🤍</h2>
    </section>
    
    
</main>

@include('mapadesuenos.plantillas.footer')
<script src="{{ asset('js/mapadesuenos/librosarte.js') }}" defer></script>
</body>
</html>