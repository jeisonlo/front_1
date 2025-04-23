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
            <a href="/mapadesuenos/libro1?id=3" class="book-link">
                <img src="https://www.elejandria.com/covers/Dialectica_de_la_naturaleza-Friedrich_Engels-md.png" alt="The Psychology of Money">
            </a>
            <h2>Dialéctica de la naturaleza</h2>
          <h2 class="heart" id="heart1">🤍</h2>
        </section>




        <section class="Creaciones">
          
             
            <a href="/mapa-de-suenos/Libros/naturaleza/Libro2.html"><img src="https://images.cdn2.buscalibre.com/fit-in/360x360/00/c4/00c470391a159486f74edfedd7b4decc.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
            
            <h2>El alimento de los dioses</h2>
            <h2 class="heart" id="heart2">🤍</h2>
        </section>
    
        <section class="Sentimiento">
          
             <a href="/mapa-de-suenos/Libros/naturaleza/Libro3.html"><img src="https://www.elejandria.com/covers/La_madre_Naturaleza-Pardo_Bazan_Emilia-md.png" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
             
             <h2>La madre naturaleza </h2>
             <h2 class="heart" id="heart3">🤍</h2>
        </section>
        
        
    
    
    
        <section class="dream-map">
           
           
            <a href="/mapa-de-suenos/Libros/naturaleza/Libro4.html"><img src="https://cdn.pixabay.com/photo/2018/11/08/00/03/human-evolution-3801547_1280.jpg" alt="The Psychology of Money"></a>
            <h2>Naturaleza humana</h2>
           
            <h2 class="heart" id="heart4">🤍</h2>
        </section>
   
        
        <section class="Creaciones">
           
            
        <a href="/mapa-de-suenos/Libros/naturaleza/Libro5.html"><img src="https://www.gutenberg.org/cache/epub/62711/pg62711.cover.medium.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
        <h2>Naturaleza de las cosas</h2>
        <h2 class="heart" id="heart5">🤍</h2>
        </section>
        <section class="Sentimiento">
          
             <a href="/mapa-de-suenos/Libros/naturaleza/Libro6.html"><img src="https://cdn.pixabay.com/photo/2018/06/13/20/07/child-3473596_960_720.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
             <h2>Filosofia de la naturaleza...</h2>
             <h2 class="heart" id="heart6">🤍</h2>
        </section>
        <section class="Creaciones">
         
            <a href="/mapa-de-suenos/Libros/naturaleza/Libro7.html"><img src="https://cdn.pixabay.com/photo/2011/12/15/11/37/galaxy-11188_1280.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
            <h2>Sobre la naturaleza</h2>
            <h2 class="heart" id="heart7">🤍</h2>
        </section>
        <section class="Sentimiento">
       
             <a href="/mapa-de-suenos/Libros/naturaleza/Libro8.html"><img src="https://www.elejandria.com/covers/Teoria_de_la_naturaleza-Goethe_Wolfgang__Johann-md.png" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
             <h2>Teoria de la naturaleza</h2>
             <h2 class="heart" id="heart8">🤍</h2>
        </section>
        
        
    </main>


@include('mapadesuenos.plantillas.footer')
<script src="{{ asset('js/mapadesuenos/librosarte.js') }}" defer></script>
</body>
</html>