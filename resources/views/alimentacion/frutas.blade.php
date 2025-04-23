<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alimentacion/Header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alimentacion/Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alimentacion/frutas.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Información de Frutas</title>
</head>



<header class="main-header">
    <div class="logo-container">
        <a href="{{ url('/home') }}"><img href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" src="alimentacion/Inclued/lOGO.jpg" alt="Logo" class="logo"></a>
       
    </div>
    <button2 class="hamburger" onclick="toggleHamburgerMenu()">☰</button2>
    <nav class="nav-links">
        <a href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" class="nav-item">Inicio</a>
        <div class="nav-item modules-item" onclick="toggleModules()">Módulos</div>
        <a href="/mapa-de-suenos/todohh/inicio/link/quienessomos.html" class="nav-item  ">Acerca de </a>
        <a href="/mapa-de-suenos/todohh/inicio/link/contacto.html" class="nav-item ">Contacto</a>
        <div id="modules-indicator" class="modules-indicator"></div>
        
    </nav>
    <div class="nav-right">
       
        
    </div>
    <div class="profile-container">
        <div class="profile-box">
            <!-- aqui debe estar el nombre del usuario -->
            <a id="profile-name" href="#nombre" class="nav-item special-item profile-name">Invitado</a>
            <div class="container-picture">
            <img src="https://res.cloudinary.com/dlmbupndo/image/upload/v1745249136/kq9tw0o9pyc58l9ngaiv.jpg" alt="Foto de perfil" class="profile-pic" onclick="toggleProfileMenu()">
           </div>
            <div id="profile-menu" class="profile-menu">
                <a href="{{ url('/usuario') }}">Perfil</a>
                <a href="{{ url('/confi') }}">Configuracion</a> 
                 <!-- dale funcionalidad a cerrar sesion  -->
                 <a href="#" id="boton-sesion">Cerrar sesión</a>
            </div>
        </div>
    </div>
    <!-- Menú hamburguesa -->
<div id="hamburger-menu" class="hamburger-menu">
<a href="/inicio-de-sesion/Modulo-iniciar-sesion/home/home.html" class="hamburger-item">Inicio</a>
<a href="#"><div class="hamburger-item" onclick="toggleModulues()">Módulos</div></a>
<!-- Contenedor de módulos (oculto por defecto) -->
<div id="modules-content" class="modules-content" style="display: none;">
    <a href="{{ url('/mapadesuenos/iniciomapa') }}"><div class="modulo">Mapa de sueños</div></a>
    <a href="/alimentacion/Inicio/index.html"><div class="modulo">Alimentación</div></a>
    <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="modulo">Musicoterapia</div></a>
    <a href="{{ url('/einicio') }}"><div class="modulo">Ejercicios</div></a>
    <a href="/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html"><div class="modulo">Atención Profesional</div></a>
</div>
<a href="#perfil" class="hamburger-item">Perfil</a>
</div>
    <!-- Pestaña de módulos -->
    <div id="modules-overlay" class="modules-overlay">
        <div class="module-grid">
           <a href="{{ url('/mapadesuenos/iniciomapa') }}"> <div class="module">Mapa de sueños</div></a>
           <a href="/alimentacion/Inicio/index.html"><div class="module">Alimentación</div></a>
            <a href="/musicoterapia/Vistas1.1/PRINCIPAL_GENEROS/principal_generos.html"><div class="module">Musicoterapia</div></a>
            <a href="{{ url('/einicio') }}"><div class="module">Ejercicios</div></a>
            <a href="/atencion-profesional/USUARIO/Home_Usuario/HomeUsuario.html"><div class="module">Atención Profesional</div></a>
        </div>
    </div>
</header>
<body>

   

    <main>
        <div class="caja">
                    <!-- Desde aqui copean--> 
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/manzanaInformacion.svg" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Manzana</h2><br>
                    <p>Las manzanas son conocidas por ser una buena fuente de fibra, especialmente pectina, que puede
                        ayudar a mantener niveles saludables de colesterol. También contienen antioxidantes como
                        quercetina, que puede tener propiedades antiinflamatorias.</p><br>
                    <p><b>Clasificación:</b></p>
                        <p>Fruta pomácea, cultivada en todo el mundo y disponible en una variedad de colores y sabores.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>150-250 gramos</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Varía entre rojo, verde y amarillo</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, cocido, en jugos y compotas</p><br>
                    
                </div>
            </div>
            <!-- hasta aqui--> 
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/banano.png" alt="banano" class="recipe-image" id="#frutos rojos">
                </div>
                <div class="recipe-info">
                    <h2>Banano</h2><br>
                    <p>Los bananos son una excelente fuente de potasio, un mineral crucial para la función muscular y
                        nerviosa. También contienen vitamina B6, que es importante para la salud del cerebro y la
                        producción de hemoglobina.</p><br>
                        <b><p>Clasificación:</b></p>
                            <p>Fruta tropical que crece en climas cálidos y se consume ampliamente en todo el mundo.</p><br>
                        <b><p>Peso promedio:</b></p>
                            <p>120-150 gramos.</p><br>
                        <b><p>Color:</b></p>
                            <p>Amarillo cuando maduro.</p><br>
                        <b><p>Usos comunes:</b></p>
                            <p>Consumo crudo, en batidos, postres y horneados.</p><br>
                </div>
            </div>
            <!--aqui pegan-->

            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/mango.png" alt="Mango" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Mango</h2><br>
                    <p>El mango es una excelente fuente de vitamina A, 
                        que es importante para la salud ocular. También contiene antioxidantes y fibra, que promueven la digestión.

                    </p><br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta tropical dulce y jugosa con una semilla grande en el centro.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>200-700 gramos por mango. </p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Varía entre verde, amarillo y rojo.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, batidos, salsas, ensaladas y postres.</p><br>
                    
                </div>
            </div>

            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/maracuya.png" alt="Maracuyá" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Maracuyá</h2><br>
                    <p>La maracuyá es una fruta rica en fibra y antioxidantes como la vitamina C. 
                        Contiene también compuestos que favorecen el sueño y la relajación.  </p><br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta tropical pequeña con una cáscara gruesa y semillas rodeadas de pulpa jugosa. </p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>80-150 gramos. </p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Amarillo o morado, dependiendo de la variedad.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Jugo, postres, salsas y cócteles. </p><br>
                    
                </div>
            </div>

            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/pera.png" alt="Pera" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Pera</h2><br>
                    <p>La pera es una fruta dulce y jugosa rica en fibra dietética, ideal para la salud digestiva.
                         También contiene antioxidantes y vitaminas como la K y C. </p><br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta mediana con piel fina y textura granulada en la pulpa.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>150-250 gramos.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Verde, amarilla, o rojiza dependiendo de la variedad.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, ensaladas, compotas y postres horneados.</p><br>
                    
                </div>
            </div>

            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/naranja.png" alt="Naranja" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Naranja</h2><br>
                    <p>Las naranjas son una excelente fuente de vitamina C y antioxidantes que promueven el sistema inmunológico y la salud de la piel.
                         También contienen fibra y potasio.</p><br>

                    <b><p>Clasificación:</b></p>
                        <p>Cítrico dulce y jugoso, con una cáscara gruesa y fácil de pelar.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>130-200 gramos por naranja.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Naranja brillante.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos, mermeladas y postres.</p><br>
                    
                </div>
            </div>


            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/uvas.png" alt="uvas" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Uvas</h2><br>
                    <p>Las uvas son ricas en antioxidantes como los polifenoles y el resveratrol, que benefician la salud cardiovascular. 
                        También contienen vitamina K y vitamina C.</p><br>
                    <b><p>Clasificación:</b></p>
                        <p>Pequeños frutos en racimos, dulces y jugosos.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>2-5 gramos por uva. </p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Varía entre verde, rojo y morado oscuro.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos, vinos, pasas y ensaladas.</p><br>
                    
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/mora.png" alt="Mora" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Mora</h2><br>
                    <p>La mora es rica en vitamina C, vitamina K y antioxidantes 
                        que ayudan a combatir el daño celular.</p><br>

                    <b><p>Clasificación:</b></p>
                        <p>Pequeñas bayas de color oscuro formadas por múltiples lóbulos jugosos. </p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>4-8 gramos por mora.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Negro o púrpura oscuro.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos, mermeladas, salsas y postres. </p><br>
                    
                </div>
            </div>


            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/kiwi.png" alt="kiwi" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>kiwi</h2><br>
                    <p>El kiwi es rico en vitamina C y vitamina K, esenciales para el sistema inmunológico y la coagulación sanguínea.
                         También es una buena fuente de fibra.</p><br>
                    <b><p>Clasificación:</b></p>
                        <p> Fruta pequeña con una cáscara marrón y peluda y una pulpa verde brillante con semillas negras.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>50-100 gramos por kiwi.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Marrón por fuera, verde o amarillo por dentro.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, en ensaladas, postres y jugos.</p><br>
                    
                </div>
            </div> 
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/sandia.png" alt="Sandia" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Sandia</h2><br>
                    <p>La sandía es rica en agua, lo que la hace excelente para la hidratación. 
                        También contiene licopeno, un antioxidante beneficioso para la salud del corazón.

                    </p><br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta grande y jugosa con semillas comestibles o sin semillas.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>2-10 kg.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p> Verde con rayas por fuera y roja o amarilla por dentro.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos, ensaladas y como refrigerio en días calurosos. </p><br>
                    
                </div>
            </div>
            
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/pina.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Piña</h2><br>
                    <p>La piña es rica en vitamina C, esencial para el sistema inmunológico y la salud de la piel.
                         También contiene bromelina, una enzima que ayuda en la digestión y tiene propiedades antiinflamatorias. </p><br>

                    <b><p>Clasificación:</b></p>
                        <p>Fruta tropical grande con una textura fibrosa y un sabor dulce y ácido.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>1-3 kg por fruta.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Amarillo dorado en el interior y una corteza marrón con hojas verdes.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos, postres y platos salados como pizzas o ensaladas.</p><br>
                    
                </div>
            </div>
            
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Ciruelas.png" alt="Ciruela" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Ciruela</h2><br>
                    <p>Las ciruelas son una buena fuente de fibra, que promueve la salud digestiva y puede ayudar a controlar los niveles de colesterol. También contienen vitamina c
                        y antioxidantes como los polifenoles.</p><br>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p> Fruta de hueso jugosa, disponible en variedades dulces y ácidas.
                        </p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>30-50 gramos por ciruela.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Varía entre morado, rojo y amarillo</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, secar para pasas, hacer mermeladas y pasteles.</p><br>
                    
                </div>
            </div>

            <!--14-->
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Frutos_rojos.png" alt="Manzana" class="recipe-image" id="frutos rojos">
                </div>
                <div class="recipe-info">
                    <h2>Frutos rojos (Arándanos, Moras, Fresa, Frambuesas)</h2><br>
                    <p>Los frutos rojos son conocidos por su alto contenido de antioxidantes como las antocianinas y los flavonoides, 
                        que pueden ayudar a combatir el estrés oxidativo en el cuerpo. 
                        También son una buena fuente de vitamina C y fibra.</p><br>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p> Pequeños frutos del bosque con sabores intensos y colores vibrantes.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>1-5 gramos por fruto.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Varía entre azul, negro y rojo.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, en batidos, ensaladas y como adorno.</p><br>
                    
                </div>
            </div>
            <!--15-->
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Papaya.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Papaya</h2><br>
                    <p> La papaya es rica en vitamina C, que es importante para el sistema inmunológico y la salud de la piel. 
                        También contiene enzimas digestivas como la papaína, que puede ayudar en la digestión de proteínas.</p>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p> Fruta tropical grande y jugosa con semillas comestibles en el centro.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>500 gramos a 2 kg por papaya.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Naranja o amarillo anaranjado con semillas negras.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos y ensaladas de frutas tropicales.</p>
                        <br>
                </div>
            </div>
              <!--16-->
              <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Higo.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Higo</h2><br>
                    <p> Los higos son una buena fuente de fibra, que promueve la salud digestiva y puede ayudar 
                        a controlar los niveles de azúcar en sangre. También contienen potasio, 
                        que es importante para la salud del corazón y la función muscular.</p>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta pequeña y dulce con una textura única.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p> 50-100 gramos por higo.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Varía entre morado, verde y negro.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p> Consumo crudo, en ensaladas, con queso y en postres.</p><br>
                    
                </div>
            </div>
             <!--17-->
             <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Granada.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Granada</h2><br>
                    <p>Las granadas son ricas en antioxidantes como los polifenoles y el ácido elágico, que 
                        pueden ayudar a reducir la inflamación y proteger contra el daño celular. 
                        También son una buena fuente de vitamina C y potasio.</p>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta exótica con arilos jugosos y semillas comestibles.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>200-500 gramos por granada.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Rojo oscuro con arilos jugosos.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p> Consumo crudo, jugos, ensaladas y como adorno</p><br>
                    
                </div>
            </div>
            <!--18-->
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Grosella.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Grosella</h2><br>
                    <p>Las grosellas son ricas en vitamina C y antioxidantes, que pueden ayudar a proteger contra el estrés
                        oxidativo en el cuerpo. También son una buena fuente de fibra,
                        promoviendo la salud digestiva.</p>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p>Pequeños frutos del bosque con un sabor agridulce distintivo.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>1-5 gramos por grosella.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p> Varía entre rojo, negro y verde.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, mermeladas, jugos y postres.</p><br>
                    
                </div>
            </div>
            <!--19-->
            <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Mandarina.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Mandarina</h2><br>
                    <p>Las mandarinas son una buena fuente de vitamina C, que es crucial para el sistema inmunológico y la salud de la piel. 
                        También proporcionan fibra dietética y antioxidantes.</p>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p>Cítrico fácil de pelar con un sabor dulce y jugoso.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>80-150 gramos por mandarina.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p>Naranja brillante con fácil pelado.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p>Consumo crudo, jugos y ensaladas de frutas.</p><br>
                    
                </div>
            </div>
             <!--20-->
             <div class="card">
                <div class="image">
                    <img src="alimentacion/Inclued/Coco.png" alt="Manzana" class="recipe-image">
                </div>
                <div class="recipe-info">
                    <h2>Coco</h2><br>
                    <p>El coco es rico en ácidos grasos saludables, que pueden promover la salud del corazón y 
                        apoyar la función cerebral. También contiene fibra, que puede promover la salud digestiva.</p>
                        <br>
                    <b><p>Clasificación:</b></p>
                        <p>Fruta tropical con agua y carne comestibles, cultivada principalmente en climas tropicales.</p><br>
                    
                    <b><p>Peso promedio:</b></p>
                        <p>1.5-2 kg para un coco entero.</p><br>
                    
                    <b><p>Color:</b></p>
                        <p> Marrón y fibroso por fuera, con carne blanca comestible.</p><br>
                    
                    <b><p>Usos comunes:</b></p>
                        <p> Consumo de la carne fresca, leche de coco, y en postres y curries.     </p><br>
                    
                </div>
            </div>


        </div>
    </main>

</body>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h4>Acerca de Tranquilidad</h4>
            <ul>
                <li><a href="/alimentacion/Inicio/link/quienessomos.html">Acerca de</a></li>
                <li><a href="/alimentacion/Inicio/link/beneficiosdetranquilidad.html">Beneficios de la Tranquilidad</a></li>
                <li><a href="/alimentacion/inicio/link/consejodebienestar.html">Consejos de Bienestar</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Ayuda y Soporte</h4>
            <ul>
                <li><a href="/alimentacion/inicio/link/contacto.html">Contacto</a></li>
                <li><a href="/alimentacion/inicio/link/sugerencias.html">Sugerencias</a></li>
                <li><a href="/alimentacion/inicio/link/guiadeuso.html">Guía de uso</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Información Legal</h4>
            <ul>
                <li><a href="/alimentacion/inicio/link/terminosycondiciones.html">Términos y condiciones</a></li>
                <li><a href="/alimentacion/inicio/link/politica de privacidad .html">Política de privacidad</a></li>
                <li><a href="/alimentacion/inicio/link/avisolegal.html">Aviso legal</a></li>
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

<script src="js/alimentacion/InfoFrutas.js"></script>
<script src="js/alimentacion/Header.js"></script>

</html>