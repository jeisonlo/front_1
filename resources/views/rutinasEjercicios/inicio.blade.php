<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">

<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/rutinasEjercicios/inicio.css') }}">

    
    <title>rutinas Ejercicios </title>
   

  <style>  .marca-agua::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("{{ asset('css/rutinasEjercicios/img/woman-digital-disconnecting-home-by-doing-yoga.jpg') }}");
    background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
    background-repeat: no-repeat;
    background-position: center;
    opacity: 0.5; /* Ajusta la transparencia de la marca de agua */
    z-index: 1;
}
.part1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-left: 70px;
  }
   
</style>
</head>
<body>
    
 
  @include('rutinasEjercicios.layouts.header')

  <div class="marca-agua">
  <div class="container">
    <aside class="sidebar">
      <div class="menu-item active">
        <a href="{{ url('/inicio') }}">
            <img src="{{ asset('css/rutinasEjercicios/img/home.svg') }}"alt="Icon" />
            <span>Inicio</span>
        </a>
    </div>
      <div class="menu-item">
        <a href="{{ url('/calendario') }}">
          <img src="{{ asset('css/rutinasEjercicios/img/calendario.svg') }}"alt="Icon" />
          <span>Calendario</span>
        </a>
      </div>
      <div class="menu-item">
        <a href="{{ route('favoritos') }}" class="btn-favoritos">
          <img src="{{ asset('css/rutinasEjercicios/img/favorito.svg') }}"alt="Icon" />
          <span href="#">Favoritos</span>
        </a>
      </div>
      <div class="menu-item">
        <a href="{{ url('/notificaciones') }}">
          <img src="{{ asset('css/rutinasEjercicios/img/notificacion.svg') }}" alt="Icon" />
          <span href="#">Notificaciones</span>
        </a>
      </div>
     
    </aside>
    <div class="imagen">
        <div class="part1">
     <div class="card" >
       
        
        <a href="{{ url('/ejercicios?categoria_id=1') }}">
            <img src="{{ asset('css/rutinasEjercicios/img/imag1.jpg') }}"alt="" class="imag">
          </a>
            <p>Tecnicas de respiracion</p>
        </div>
        <div class="card">
          <a href="{{ url('/ejercicios?categoria_id=3') }}">
            <img src="{{ asset('css/rutinasEjercicios/img/imag2.jpg') }}" alt="" class="imag">
          </a>
            <p>Estiramientos</p>
          
        </div>
    </div>
        <div class="part2">
        <div  class="card"><a href="{{ url('/ejercicios?categoria_id=2') }}">
            <img src="{{ asset('css/rutinasEjercicios/img/imag3.jpg') }}" alt="" class="imag">
          </a>
            <p>Meditacion</p>
    
        </div>
    </div>
    </div>
</div>
<br>

</div>
@include('rutinasEjercicios.layouts.footer')


</script>
</body>
</html>