function toggleProfileMenu() {
  const menu = document.getElementById("profile-menu");
  menu.style.display = menu.style.display === "block" ? "none" : "block";
}

function toggleModules() {
  const overlay = document.getElementById("modules-overlay");
  overlay.style.display = overlay.style.display === "block" ? "none" : "block";
}

function toggleHamburgerMenu() {
  const hamburgerMenu = document.getElementById('hamburger-menu');
  hamburgerMenu.classList.toggle('active');
}

function toggleModulues() {
  const modulesContent = document.getElementById("modules-content");
  modulesContent.style.display = modulesContent.style.display === "block" ? "none" : "block";
}

// Ocultar menús al hacer clic fuera
document.addEventListener("click", function (e) {
  if (!e.target.closest(".profile-container")) {
    document.getElementById("profile-menu").style.display = "none";
  }
  if (!e.target.closest(".modules-item")) {
    document.getElementById("modules-overlay").style.display = "none";
  }
});

// Cuando carga el DOM
document.addEventListener('DOMContentLoaded', () => {
  const userData = localStorage.getItem('userData');
  const profileName = document.getElementById('profile-name');
  const botonSesion = document.getElementById('boton-sesion'); // Usa este ID en el HTML

  if (userData && profileName && botonSesion) {
    try {
      const usuario = JSON.parse(userData);
      profileName.textContent = usuario.nombre || 'Invitado';

      // Mostrar "Cerrar sesión" si hay datos de usuario
      botonSesion.textContent = 'Cerrar sesión';
      botonSesion.onclick = function (e) {
        e.preventDefault();
        localStorage.removeItem('authToken');
        localStorage.removeItem('userData');
        window.location.href = "{{ url('/inicioSesion/home') }}";
      };
    } catch (error) {
      console.error('Error al parsear userData:', error);
      mostrarIniciarSesion();
    }
  } else {
    mostrarIniciarSesion();
  }

  function mostrarIniciarSesion() {
    const profileName = document.getElementById('profile-name');
    const botonSesion = document.getElementById('boton-sesion');
    // <- este es el ID correcto
    
    if (profileName) profileName.textContent = 'Invitado';
    if (botonSesion) {
      botonSesion.textContent = 'Iniciar sesión';
      botonSesion.onclick = function (e) {
        e.preventDefault();
        window.location.href = "{{ url('/login') }}";
      };
    }
  }
});