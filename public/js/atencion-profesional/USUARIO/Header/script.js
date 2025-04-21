// Función para mostrar/ocultar el menú de perfil
function toggleProfileMenu() {
  const menu = document.getElementById("profile-menu");
  if (menu) {
      menu.style.display = menu.style.display === "block" ? "none" : "block";
  } else {
      console.error("Elemento 'profile-menu' no encontrado.");
  }
}

// Función para mostrar/ocultar los módulos
function toggleModules() {
  const overlay = document.getElementById("modules-overlay");
  if (overlay) {
      overlay.style.display = overlay.style.display === "block" ? "none" : "block";
  } else {
      console.error("Elemento 'modules-overlay' no encontrado.");
  }
}

// Función para mostrar/ocultar el menú hamburguesa
function toggleHamburgerMenu() {
  const hamburgerMenu = document.getElementById('hamburger-menu');
  if (hamburgerMenu) {
      hamburgerMenu.classList.toggle('active'); // Alterna la clase 'active' para mostrar/ocultar
  } else {
      console.error("Elemento 'hamburger-menu' no encontrado.");
  }
}

// Función para mostrar/ocultar el contenido de los módulos
function toggleModulues() {
  const modulesContent = document.getElementById("modules-content");
  if (modulesContent) {
      modulesContent.style.display = modulesContent.style.display === "block" ? "none" : "block";
  } else {
      console.error("Elemento 'modules-content' no encontrado.");
  }
}

// Evento para cerrar el menú de perfil si se hace clic fuera de él
document.addEventListener("click", function (e) {
  const profileMenu = document.getElementById("profile-menu");
  const modulesOverlay = document.getElementById("modules-overlay");

  if (profileMenu && !e.target.closest(".profile-container")) {
      profileMenu.style.display = "none";
  }

  if (modulesOverlay && !e.target.closest(".modules-item")) {
      modulesOverlay.style.display = "none";
  }
});

// Evento para cargar el DOM antes de ejecutar el script
document.addEventListener("DOMContentLoaded", function () {
  // Verifica si los elementos existen antes de manipularlos
  const profileMenu = document.getElementById("profile-menu");
  const modulesOverlay = document.getElementById("modules-overlay");
  const hamburgerMenu = document.getElementById('hamburger-menu');
  const modulesContent = document.getElementById("modules-content");

  if (!profileMenu) {
      console.error("Elemento 'profile-menu' no encontrado.");
  }
  if (!modulesOverlay) {
      console.error("Elemento 'modules-overlay' no encontrado.");
  }
  if (!hamburgerMenu) {
      console.error("Elemento 'hamburger-menu' no encontrado.");
  }
  if (!modulesContent) {
      console.error("Elemento 'modules-content' no encontrado.");
  }
});