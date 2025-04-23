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
            <a href="/mapadesuenos/libro1?id=5" class="book-link">
                <img src="https://www.elejandria.com/covers/Desde_el_corazon-James_Allen-md.png" alt="The Psychology of Money">
            </a>
            <h2>Desde el corazón</h2>
          <h2 class="heart" id="heart1">🤍</h2>
        </section>



    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro2.html">
                <img src="https://www.elejandria.com/covers/La_Ciencia_de_estar_bien-Wallace_Wattles-md.png" alt="La ciencia de estar bien">
            </a>
            <div class="card-footer">
                <h2>La ciencia de estar bien</h2>
                <span class="heart" id="heart2">🤍</span>
            </div>
        </section>
    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro3.html">
                <img src="https://www.elejandria.com/covers/Como_un_hombre_piensa_asi_es_su_vida-James_Allen-md.png" alt="Como un hombre piensa...">
            </a>
            <div class="card-footer">
                <h2>Como un hombre piensa...</h2>
                <span class="heart" id="heart3">🤍</span>
            </div>
        </section>
    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro4.html">
                <img src="https://www.elejandria.com/covers/Como_vivir_con_veinticuatro_horas_al_dia-Arnold_Bennett-md.png" alt="Como vivir con 24 horas...">
            </a>
            <div class="card-footer">
                <h2>Como vivir con 24 horas...</h2>
                <span class="heart" id="heart4">🤍</span>
            </div>
        </section>
    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro5.html">
                <img src="https://www.elejandria.com/covers/El_Camino_de_la_Prosperidad-James_Allen-md.png" alt="El camino de la prosperidad">
            </a>
            <div class="card-footer">
                <h2>El camino de la prosperidad</h2>
                <span class="heart" id="heart5">🤍</span>
            </div>
        </section>
    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro6.html">
                <img src="https://www.elejandria.com/covers/El_hombre_de_arena-E._T._A._Hoffmann-md.png" alt="El hombre de arena">
            </a>
            <div class="card-footer">
                <h2>El hombre de arena</h2>
                <span class="heart" id="heart6">🤍</span>
            </div>
        </section>
    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro7.html">
                <img src="https://www.elejandria.com/covers/El_juego_de_la_vida_y_como_jugarlo-Florence_Scovel_Shinn-md.png" alt="El juego de la vida...">
            </a>
            <div class="card-footer">
                <h2>El juego de la vida...</h2>
                <span class="heart" id="heart7">🤍</span>
            </div>
        </section>
    
        <section class="card">
            <a href="/mapa-de-suenos/Libros/superacion/Libro8.html">
                <img src="https://www.elejandria.com/covers/La_puerta_secreta_del_exito-Florence_Scovel_Shinn-md.png" alt="Puerta secreta del éxito">
            </a>
            <div class="card-footer">
                <h2>Puerta secreta del éxito</h2>
                <span class="heart" id="heart8">🤍</span>
            </div>
        </section>
    </main>

@include('mapadesuenos.plantillas.footer')
<script src="{{ asset('js/mapadesuenos/librosarte.js') }}" defer></script>
</body>
</html>