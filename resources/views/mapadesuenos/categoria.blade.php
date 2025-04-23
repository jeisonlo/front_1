<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de libros</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Style.css">
  <style>
    body {
      background-image: url('/image/Mapadesueños/libros.jpg'); /* Ruta corregida */
  background-size: cover; /* Para que la imagen cubra todo el fondo */
  background-position: center; /* Para centrar la imagen */
  background-attachment: fixed; /* Para que el fondo se quede fijo al hacer scroll */
  position: relative;
  margin: 0;
}

body::before {
content: '';
position: fixed;
width: 100%;
height: 100%;
background-color: rgba(255, 255, 255, 0.377); /* Capa superpuesta con transparencia (ajusta la opacidad según sea necesario) */  z-index: -1; /* Asegura que esta capa quede detrás del contenido */
z-index: -1; /* Asegura que esta capa quede detrás del contenido */
pointer-events: none; /* Permite que se puedan hacer clics en los elementos del fondo */
}

main {
  margin-top: 0px; /* Ajusta la altura según el header */
  padding: 20px;
}
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 60px;
  
  justify-items: center;
  margin-top: 20px;
  margin-bottom: 70px;
}
.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
  background: linear-gradient(145deg, #e0e0e0, #ffffff);
}
.card {
  display: flex;
  overflow: hidden;
  width: 100%;
  max-width: 500px;
  background: rgba(255, 255, 255, 0.599); /* Fondo ligeramente transparente */
 
  border-radius: 15px;

  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 4%;
}



.card img {
  width: 40%; /* Reduje el tamaño de la imagen para hacerla más pequeña */
  height: 73%;
  object-fit: cover;
  margin: 10px; /* Añadí margen para que no toque los bordes de la tarjeta */
  border-radius: 5px;
  margin-top: 60px;
}

.card-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 15px;
  text-align: left;
  width: 60%;
  
}
h1 {
  font-size: 1.5em;
  font-weight: bold;
  text-transform: uppercase; /* Asegura que el texto esté en mayúsculas */
  color: #59009a;
  margin-bottom: 30px;
  margin-top: 50px;
  background: linear-gradient(45deg, #59009a, #e74c3c);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-fill-color: transparent;
  text-align: center;
  font-size: 32px;
}
.card-title {
  font-size: 1.5em;
  font-weight: bold;
  color: #59009a;
  margin-bottom: 10px;
  background: linear-gradient(45deg, #59009a, #e74c3c);
  -webkit-background-clip: text;
  color: transparent;
}

.card-description {
  font-size: 1em;
  color: #555;
  line-height: 1.6;
  margin-bottom: 15px;
}

.card-button {
  display: inline-block;
  padding: 10px 20px;
  background: linear-gradient(145deg, #59009a, #8a2be2);
  color: #fff;
  text-align: center;
  border-radius: 30px;
  text-decoration: none;
  font-weight: bold;
  transition: background 0.3s ease, transform 0.3s ease;
}

.card-button:hover {
  background: linear-gradient(145deg, #8a2be2, #59009a);
  transform: translateY(-3px);
}

@media (max-width: 968px) {
  .container {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 780px) {
  .container {
    grid-template-columns: 1fr;
  }
 
  
}

  </style>
</head>
<body>
  @include('mapadesuenos.plantillas.header')

<main>
  <h1>Categorias</h1>
  <div class="container">
        <!-- Card 6 -->
        <div class="card">
          <img src="{{ asset('image/Mapadesueños/WhatsApp Image 2024-11-13 at 4.03.57 PM.jpeg') }}" alt="Descripción de la imagen">
        <div class="card-content">
          <h3 class="card-title">Favoritos</h3>
          <p class="card-description">Aquí encontrarás los libros que elegiste y guardaste. Un espacio único para tus lecturas favoritas, esas historias que te inspiran.</p>
          <a href="{{ route('favoritosli') }}" class="card-button">Explorar</a>
        </div>
      </div>
    <!-- Card 1 -->
    <div class="card">
        <img src="{{ asset('image/Mapadesueños/WhatsApp Image 2024-11-13 at 3.49.57 PM.jpeg') }}" alt="Descripción de la imagen">

      <div class="card-content">
        <h3 class="card-title">Arte</h3>
        <p class="card-description">Descubre técnicas, movimientos y biografías de grandes artistas. Una colección inspiradora para amantes del arte y creativos.</p>
        <a href="{{ route('arte') }}" class="card-button">Explorar</a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
        <img src="{{ asset('image/Mapadesueños/WhatsApp Image 2024-11-13 at 3.54.18 PM.jpeg') }}" alt="Descripción de la imagen">
      <div class="card-content">
        <h3 class="card-title">Meditacion</h3>
        <p class="card-description">Encuentra calma y claridad con libros sobre técnicas, prácticas y beneficios de la meditación. Ideal para tu bienestar mental y espiritual.</p>
        <a href="{{ route('meditacion') }}" class="card-button">Explorar</a>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="card">
        <img src="{{ asset('image/Mapadesueños/WhatsApp Image 2024-11-13 at 3.59.12 PM.jpeg') }}" alt="Descripción de la imagen">
      <div class="card-content">
        <h3 class="card-title">Naturaleza</h3>
        <p class="card-description">Explora la belleza y diversidad de nuestro planeta con libros sobre fauna, flora, ecosistemas y conservación ambiental.</p>
        <a href="{{ route('naturaleza') }}" class="card-button">Explorar</a>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="card">
        <img src="{{ asset('image/Mapadesueños/WhatsApp Image 2024-11-13 at 4.00.57 PM.jpeg') }}" alt="Descripción de la imagen">
      <div class="card-content">
        <h3 class="card-title">Poesia</h3>
        <p class="card-description">Sumérgete en la magia de las palabras con colecciones de poesía clásica y contemporánea, ideales para despertar emociones y reflexiones profundas.</p>
        <a href="{{ route('poesia') }}" class="card-button">Explorar</a>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="card">
        <img src="{{ asset('image/Mapadesueños/WhatsApp Image 2024-11-13 at 3.43.13 PM.jpeg') }}" alt="Descripción de la imagen">
      <div class="card-content">
        <h3 class="card-title">Superacion</h3>
        <p class="card-description">Encuentra inspiración y herramientas para crecer personalmente con libros que transforman retos en oportunidades y motivan al cambio positivo.</p>
        <a href="{{ route('superacion') }}" class="card-button">Explorar</a>
      </div>
    </div>



  </div>
</main>

@include('mapadesuenos.plantillas.footer')
<script>
    document.querySelectorAll('section a img').forEach(img => {
    img.addEventListener('click', () => {
      img.style.animation = 'clickedEffect 0.5s ease-out'; // Aplica la animación
  
      // Elimina la animación después de completarla para que se pueda aplicar de nuevo si se hace clic otra vez
      setTimeout(() => {
        img.style.animation = '';
      }, 500); // Duración de la animación en milisegundos
    });
  });
</script>
</body>
</html>
