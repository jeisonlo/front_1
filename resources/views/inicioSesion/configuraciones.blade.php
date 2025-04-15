<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <script src="/FootNav/footNav.js"></script>
    <link rel="stylesheet" href="/FootNav/footNav.css">
    <link rel="stylesheet" href="configuracion.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/inicioSesion/configuraciones.css') }}">
</head>

<body>
   
    @include('inicioSesion.layouts.header')
    <div class="marca-agua">
    <main class="contenido">
        <aside class="configuracion-menu">
            <ul>
                <li>
                    <a href="#notificaciones" class="menu-item">
                        <span class="icono-config" class="menu-item"><img src="imagenes/notificacion.png"
                                alt="Icono Configuración"></span>
                        Notificaciones
                        <span class="arrow">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="#privacidad" class="menu-item">
                        <span class="icono-config"><img src="imagenes/privacidad.png" alt="Icono Ayuda"></span>
                        Privacidad
                        <span class="arrow">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="#idioma" class="menu-item">
                        <span class="icono-config"><img src="imagenes/idioma.png" alt="Icono Pantalla"></span>
                        Idioma
                        <span class="arrow">&gt;</span>
                    </a>
                </li>
                <li>
                    <a href="#contraseña" class="menu-item">
                        <span class="icono-config"><img src="imagenes/contraseña.png" alt="Icono Pantalla"></span>
                        Contraseña
                        <span class="arrow">&gt;</span>
                    </a>
                </li>
            </ul>
        </aside>

      
        <section class="configuracion-contenido">
            <div id="notificaciones" class="config-item">
                <h2>Notificaciones</h2>
                <form action="/actualizarNotificaciones" method="POST">
                    <label for="notificaciones">Notificaciones:</label>
                    <select id="notificaciones" name="notificaciones">
                        <option value="todos">Todos</option>
                        <option value="mencion">Solo menciones</option>
                        <option value="ninguno">Ninguno</option>
                    </select>
                    <button type="submit">Guardar Cambios</button>
                </form>
            </div>

            <div id="privacidad" class="config-item">
                <h2>Privacidad</h2>
                <form action="/actualizarPrivacidad" method="POST">
                    <label for="privacidad">Privacidad:</label>
                    <select id="privacidad" name="privacidad">
                        <option value="publico">Público</option>
                        <option value="privado">Privado</option>
                        <div class="inputGrupo genero" style="display: inline-flex; justify-content: center;">
                            <label>
                                <input1 class="radio" type="radio" name="genero" value="Mujer"> Mujer
                            </label>
                            <label>
                                <input1 class="radio" type="radio" name="genero" value="Hombre"> Hombre
                            </label>
                        </div>
                    </select>
                    <button type="submit">Guardar Cambios</button>
                </form>
            </div>

            <div id="idioma" class="config-item">
                <h2>Idioma</h2>
                <form action="/actualizarIdioma" method="POST">
                    <label for="idioma">Idioma:</label>
                    <select id="idioma" name="idioma">
                        <option value="es">Español</option>
                        <option value="en">Inglés</option>
                       
                    </select>
                    <button type="submit">Guardar Cambios</button>
                </form>
            </div>
            <div id="contraseña" class="config-item">
                <h2>Contraseña</h2>
                <form action="/actualizarContraseña" method="POST" class="formulario-contraseña">
                    <div class="campo-contraseña">
                        <label for="actual">Contraseña actual</label>
                        <input type="password" id="actual" name="actual" placeholder="*****">
                    </div>
                    <div class="campo-contraseña">
                        <label for="nueva">Contraseña nueva</label>
                        <input type="password" id="nueva" name="nueva" placeholder="*****">
                    </div>
                    <div class="campo-contraseña">
                        <label for="confirmar">Confirmar contraseña</label>
                        <input type="password" id="confirmar" name="confirmar" placeholder="*****">
                    </div>
                    <button type="submit" class="boton-actualizar">Actualizar contraseña</button>
                </form>
            </div>

        </section>
    </main>
</div>
    <!-- footer -->
    <div include-html="/rutinas-de-ejercicios/includes/inicio/inicio.html"></div>

    <div id="confirmacion" class="mensaje-exito">
        ✅ Los cambios han sido guardados correctamente.
    </div>
    
   
    @include('inicioSesion.layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.configuracion-menu .menu-item');
    const configItems = document.querySelectorAll('.config-item');

    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el desplazamiento al ancla

            // Ocultar todos los elementos de configuración
            configItems.forEach(config => {
                config.classList.remove('active');
            });

            // Mostrar el contenido correspondiente
            const targetId = this.getAttribute('href').substring(1); // Eliminar el #
            const targetContent = document.getElementById(targetId);
            targetContent.classList.add('active');
        });
    });

    // Inicializar con la primera opción activa por defecto (opcional)
    if (menuItems.length > 0) {
        menuItems[0].click();
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const servicios = document.getElementById('serviciosIcon');
    const Submenu = document.getElementById('serviciosSubmenu');
    const Usuario = document.getElementById('userIcon');
    const Usuariosubmenu = document.getElementById('userSubmenu');
    // const perfil = document.getElementById('profilePic');
    // const perfilfoto = document.getElementById('profilePic1');
    // const modal = document.getElementById('modal');
    const closeModal = document.querySelector('.close');
    
    // Mostrar el formulario de edición cuando se haga clic en el botón "Editar"
    // const editar= document.getElementById('editarPerfilBtn');
    // const formulario = document.getElementById('formulario-editar-overlay'); // Overlay del formulario
    // editar.addEventListener('click', function() {
    //     formulario.style.display = 'flex'; // Mostrar el formulario de edición
    // });

    //  formulario.addEventListener('click', function() {
    //     formulario.style.display = 'none'; // Cerrar formulario al hacer clic en la 'X'
    // });

    // // Cerrar el formulario al hacer clic fuera de él
    // window.addEventListener('click', function(event) {
    //     if (event.target === formulario) {
    //         formulario.style.display = 'none';
    //     }
    // });

    // Funcionalidad para los submenús de "Servicios" y "Usuario"
    servicios.addEventListener('click', (event) => {
        event.preventDefault(); // Evitar que el enlace recargue la página
        Submenu.style.display = Submenu.style.display === 'block' ? 'none' : 'block';
    });

    Usuario.addEventListener('click', (event) => {
        event.preventDefault(); // Evitar que el enlace recargue la página
        Usuariosubmenu.style.display = Usuariosubmenu.style.display === 'block' ? 'none' : 'block';
    });

    // Ocultar submenús al hacer clic fuera de ellos
    window.addEventListener('click', (event) => {
        if (!servicios.contains(event.target)) {
            Submenu.style.display = 'none';
        }
        if (!Usuario.contains(event.target)) {
            Usuariosubmenu.style.display = 'none';
        }
      
    });

    // // Mostrar el modal al hacer clic en la imagen de perfil
    // perfil.addEventListener('click', function() {
    //     modal.style.display = 'flex'; // Mostrar modal
    // });

    // perfilfoto.addEventListener('click', function() {
    //     modal.style.display = 'flex'; // Mostrar modal
    // });

    // // Cerrar modal al hacer clic en la "X"
    // closeModal.addEventListener('click', function() {
    //     modal.style.display = 'none'; // Cerrar modal al hacer clic en la 'X'
    // });
});

















function toggleProfileMenu() {
    const menu = document.getElementById("profile-menu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  }
  
  function toggleModules() {
    const overlay = document.getElementById("modules-overlay");
    overlay.style.display = overlay.style.display === "block" ? "none" : "block";
  }
  
  document.addEventListener("click", function (e) {
    if (!e.target.closest(".profile-container")) {
      document.getElementById("profile-menu").style.display = "none";
    }
    if (!e.target.closest(".modules-item")) {
      document.getElementById("modules-overlay").style.display = "none";
    }
  });
  function toggleHamburgerMenu() {
    const hamburgerMenu = document.getElementById('hamburger-menu');
    hamburgerMenu.classList.toggle('active'); // Alterna la clase 'active' para mostrar/ocultar
}
function toggleModulues() {
    const modulesContent = document.getElementById("modules-content");
    modulesContent.style.display = modulesContent.style.display === "block" ? "none" : "block";
}


document.addEventListener("DOMContentLoaded", function () {
    let botones = document.querySelectorAll("button[type='submit']");
    let mensaje = document.getElementById("confirmacion");

    botones.forEach(boton => {
        boton.addEventListener("click", function (event) {
            event.preventDefault(); // Evita el envío del formulario (elimina esto si es necesario)
            mensaje.style.display = "block"; 

            // Ocultar el mensaje después de 3 segundos
            setTimeout(() => {
                mensaje.style.display = "none";
            }, 3000);
        });
    });
});
    </script>
</body>

</html>