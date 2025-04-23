document.getElementById('reportForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let formData = new FormData(this);
    let jsonData = Object.fromEntries(formData);

    fetch('https://back1-production-67bf.up.railway.app/v1/reports', {
        method: 'POST',
        body: JSON.stringify(jsonData),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => alert('Informe enviado con éxito'))
    .catch(error => console.error('Error:', error));
});

document.getElementById("reportForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita el envío del formulario

    // Mostrar el modal
    document.getElementById("successModal").style.display = "flex";
});

function cerrarModal() {
    document.getElementById("successModal").style.display = "none";
    window.location.href = "/profesional/informes2"; // Redirige a la vista de informes
}