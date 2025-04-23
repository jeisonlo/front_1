document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("citaForm");
    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            // Obtener valores del formulario
            let nombre = document.getElementById("nombre").value;
            let correo = document.getElementById("correo").value;
            let telefono = document.getElementById("telefono").value;
            let paquete = document.getElementById("paquete").value;
            let especialidad = document.getElementById("especialidad").value;
            let profesional = document.getElementById("profesional").value; // Corregí el ID aquí
            let fecha = document.getElementById("fecha").value;
            let hora = document.getElementById("hora").value;
            let comentarios = document.getElementById("comentarios").value;

            // Crear el objeto con los datos del formulario
            let nuevaCita = {
                nombre,
                correo,
                telefono,
                paquete,
                especialidad,
                profesional,
                fecha,
                hora,
                comentarios,
            };

            // Enviar los datos a la API
            fetch("http://backendtranquilidad.test/v1/appointments", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(nuevaCita),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Error al agendar la cita");
                    }
                    return response.json();
                })
                .then((data) => {
                    // Mostrar mensaje emergente de éxito
                    document.getElementById("mensajeEmergente").style.display = "flex";
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Hubo un error al agendar la cita. Por favor, inténtalo de nuevo.");
                });
        });
    }

    const btnAceptar = document.getElementById("btnAceptar");
    if (btnAceptar) {
        btnAceptar.addEventListener("click", function () {
            // Redirigir a la página de citas
            window.location.href = "http://127.0.0.1:8000/usuario/citas-programadas";
        });
    }
});





document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.menu-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const navbar = document.querySelector('.navbar');

    menuIcon.addEventListener('click', function(event) {
        event.stopPropagation(); // Previene que el click se propague al documento
        dropdownMenu.classList.toggle('show');
    });

    // Cerrar el menú cuando se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (!navbar.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});



  
  


 

