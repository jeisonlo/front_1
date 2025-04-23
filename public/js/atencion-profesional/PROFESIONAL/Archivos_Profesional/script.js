document.addEventListener('DOMContentLoaded', function () {
    fetch('http://backendtranquilidad.test/v1/documents')
    .then(response => response.json())
    .then(data => {
        let html = '';
        data.data.forEach(doc => {
            let filePreview = '';
            if (doc.ruta_archivo.endsWith('.pdf')) {
                filePreview = `<iframe class="preview" src="http://backendtranquilidad.test/storage/${doc.ruta_archivo}"></iframe>`;
            } else if (doc.ruta_archivo.endsWith('.doc') || doc.ruta_archivo.endsWith('.docx')) {
                filePreview = `<img class="preview" src="word-icon.png" alt="Vista previa de documento">`;
            }
            html += `
                <div class="card" id="document-${doc.id}">
                    <h3>${doc.titulo}</h3>
                    ${filePreview}
                    <p class="card-description">${doc.descripcion}</p>
                    <div class="card-button-container">
                        <a class="card-button" href="http://backendtranquilidad.test/storage/${doc.ruta_archivo}" target="_blank">Ver Documento</a>
                        <button class="delete-button" onclick="deleteDocument(${doc.id})">Eliminar</button>
                    </div>
                </div>
            `;
        });
        document.getElementById('documentList').innerHTML = html;
    })
    .catch(error => alert('Error al cargar los documentos'));
});

function deleteDocument(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este documento?')) {
        fetch(`http://backendtranquilidad.test/v1/documents/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                document.getElementById(`document-${id}`).remove();
                alert('Documento eliminado con éxito');
            } else {
                alert('Error al eliminar el documento');
            }
        })
        .catch(error => alert('Error en la petición'));
    }
}