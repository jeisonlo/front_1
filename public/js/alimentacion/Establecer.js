document.addEventListener("DOMContentLoaded", function () {
    const botonGuardar = document.getElementById("guardar");
    if (botonGuardar) {
        botonGuardar.addEventListener("click", generarMeta);
    }
});

async function generarMeta(e) {
    e.preventDefault();
    
    // Obtener valores del formulario
    const datos = {
        peso: document.getElementById("peso").value,
        altura: document.getElementById("altura").value,
        edad: document.getElementById("edad").value,
        sexo: document.getElementById("sexo").value,
        complexion: document.getElementById("complexion").value,
        actividad: document.getElementById("actividad").value,
        suenio: document.getElementById("suenio").value,
        estres: document.getElementById("estres").value,
        objetivo: document.getElementById("objetivo").value
    };

    // Validación mejorada
    if (Object.values(datos).some(val => !val)) {
        alert("¡Todos los campos son obligatorios!");
        return;
    }

    try {
        // Enviar a la API del backend
        const response = await fetch("http://127.0.0.1:8000/api/test-bienestar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(datos)
        });

        const data = await response.json();
        
        if (!response.ok) {
            throw new Error(data.message || "Error en el servidor");
        }

        // Mostrar meta y actualizar enlace
        mostrarMeta(data.data.objetivo);
        document.querySelector(".continue-button").href = "/inicio-alimentacion"; // Ruta fija

    } catch (error) {
        console.error("Error en generarMeta:", error);
        alert(`Error: ${error.message}`);
    }
}

function mostrarMeta(objetivo) {
    const metaTexto = {
        "Perder peso": "🔥 Reducir alimentos procesados y aumentar actividad física",
        "Ganar peso": "💪 Aumentar ingesta calórica saludable + entrenamiento",
        "Mantener peso": "⚖️ Balancear dieta y ejercicio regular",
        "Mejorar habitos alimenticios": "🥗 Planificación de comidas saludables",
        "Mejorar mi salud en general": "🌱 Rutina equilibrada de dieta y ejercicio"
    }[objetivo] || "✨ Personaliza tu meta con un profesional";

    document.getElementById("meta").textContent = `Tu meta: ${metaTexto}`;
    document.getElementById("metaBox").style.display = "block";
}