document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('http://backendtranquilidad.test/v1/documents', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => alert(data.message))
    .catch(error => alert('Error al subir el documento'));
});

document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de manera tradicional
  
    // Aquí puedes agregar la lógica para subir el archivo, por ejemplo, usando Fetch API o XMLHttpRequest
  
    // Muestra el modal de éxito
    document.getElementById('successModal').style.display = 'flex';
  });

  function cerrarModal() {
    document.getElementById("successModal").style.display = "none";
    window.location.href = "/profesional/archivos";
}