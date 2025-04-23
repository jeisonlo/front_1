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
            <a href="/mapadesuenos/libro1?id=2" class="book-link">
                <img src="https://images.cdn2.buscalibre.com/fit-in/360x360/30/00/3000925df986be179b9b0968be77bcfd.jpg" alt="The Psychology of Money">
            </a>
            <h2>Libro de la meditacion</h2>
            <h2 class="heart" style="cursor: pointer;">🤍</h2>
        </section>


    
        <section class="Creaciones">
        
             <a href="/mapa-de-suenos/Libros/meditacion/Libro2.html"><img src="https://cdn.pixabay.com/photo/2017/08/12/15/24/buddha-2634565_1280.jpg
                " alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
                <h2>El gran libro de la yoga</h2>
                <h2 class="heart" id="heart10">🤍</h2>
        </section>
    
        <section class="Sentimiento">
           
             <a href="/mapa-de-suenos/Libros/meditacion/Libro3.html"><img src="https://www.elejandria.com/covers/Introduccion_al_Yoga-Annie_Besant-md.png
                " alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
                <h2>Introduccion al yoga</h2>
                <h2 class="heart" id="heart11">🤍</h2>
        </section>
        
        
    
    
    
        <section class="dream-map">
           
            <a href="/mapa-de-suenos/Libros/meditacion/Libro4.html"><img src="https://cdn.pixabay.com/photo/2022/03/22/23/16/meditation-7086114_1280.jpg
                " alt="The Psychology of Money"></a>
                <h2>La ciencia de la meditacion</h2>
                <h2 class="heart" id="heart12">🤍</h2>
        </section>
    
        <section class="Creaciones">
        
            <a href="/mapa-de-suenos/Libros/meditacion/Libro5.html"><img src="https://www.elejandria.com/covers/Las_meditaciones_de_Marco_Aurelio-Marco_Aurelio-md.png
                " alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
                <h2>Las meditaciones</h2>
                <h2 class="heart" id="heart13">🤍</h2>
        </section>
        <section class="Sentimiento">
          
             <a href="/mapa-de-suenos/Libros/meditacion/Libro6.html"><img src="https://cdn.pixabay.com/photo/2017/02/26/21/39/rose-2101475_1280.jpg
                " alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
                <h2>Meditaciones instantaneas</h2>
                <h2 class="heart" id="heart14">🤍</h2>
        </section>
        <section class="Creaciones">
            
            <a href="/mapa-de-suenos/Libros/meditacion/Libro7.html"><img src="https://cdn.pixabay.com/photo/2018/06/22/06/34/season-3490084_1280.jpg
                " alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
                <h2>Relajacion muscular </h2>
                <h2 class="heart" id="heart15">🤍</h2>
        </section>
        <section class="Sentimiento">
         
            
            <a href="/mapa-de-suenos/Libros/meditacion/Libro8.html"><img src="https://cdn.pixabay.com/photo/2022/01/04/18/53/fantastic-6915743_1280.jpg" alt="The Psychology of Money" alt="Mapa de sueños 2023"></a>
            <h2>Respiracion y relajacion</h2>
            <h2 class="heart" id="heart16">🤍</h2>
        </section>
        
        
    </main>

@include('mapadesuenos.plantillas.footer')
<script src="{{ asset('js/mapadesuenos/librosarte.js') }}" defer></script>
</body>
</html>