document.addEventListener("DOMContentLoaded", function () {
    if (window.location.pathname.includes("informes.html")) {
        fetch("http://backendtranquilidad.test/v1/reports", {
            method: "GET",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(responseData => {
            if (!responseData.data || responseData.data.length === 0) {
                document.querySelector(".archivos").innerHTML = "<p>No hay informes disponibles</p>";
                return;
            }

            const container = document.querySelector(".archivos");
            container.innerHTML = ""; // Limpiar antes de agregar nuevos informes

            responseData.data.forEach(report => {
                const reportCard = `
                    <div class="archivo">
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
                        <div class="archivo-icon">
                            <a href="informe.html?id=${report.id}">
                                <button>Ver Informe</button>
                            </a>
                        </div>
                    </div>
                `;
                container.innerHTML += reportCard;
            });
        })
        .catch(error => console.error("Error al cargar los informes:", error));
    }
});
