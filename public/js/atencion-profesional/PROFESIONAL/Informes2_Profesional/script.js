document.addEventListener("DOMContentLoaded", function () {
    fetch('https://back1-production-67bf.up.railway.app/v1/reports')
        .then(response => response.json())
        .then(data => {
            const informesContainer = document.getElementById("informesContainer");
            informesContainer.innerHTML = "";

            if (data.data.length === 0) {
                informesContainer.innerHTML = "<p>No hay informes disponibles.</p>";
                return;
            }

            data.data.forEach(report => {
                const informeHTML = `
                    <div class="archivo" id="report-${report.id}">
                        <div class="archivo-info">
                            <p><strong>Nombre Paciente:</strong> ${report.paciente_nombre}</p>
                            <p><strong>Edad:</strong> ${report.paciente_edad} años</p>
                            <p><strong>Género:</strong> ${report.paciente_genero}</p>
                        </div>
                        <div class="archivo-details">
                            <p><strong>Diagnóstico:</strong> ${report.paciente_diagnostico}</p>
                            <p><strong>Técnicas Aplicadas:</strong> ${report.tecnicas_pruebas_aplicadas}</p>
                            <p><strong>Observación:</strong> ${report.observacion}</p>
                        </div>
                        <div class="archivo-meta">
                            <p><strong>Fecha:</strong> ${report.fecha}</p>
                            <p><strong>Evaluador:</strong> ${report.evaluador}</p>
                        </div>
                        <button class="delete-button" onclick="deleteReport(${report.id})">❌</button>
                    </div>
                `;
                informesContainer.innerHTML += informeHTML;
            });
        })
        .catch(error => console.error("Error al cargar informes:", error));
});

function deleteReport(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este informe?")) {
        fetch(`https://back1-production-67bf.up.railway.app/v1/reports/${id}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                document.getElementById(`report-${id}`).remove();
                alert("Informe eliminado con éxito");
            } else {
                alert("Error al eliminar el informe");
            }
        })
        .catch(error => alert("Error en la petición"));
    }
}