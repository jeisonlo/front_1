document.getElementById("startCall").addEventListener("click", function () {
    alert("Iniciando videollamada...");
    document.getElementById("videoLocal").style.border = "2px solid green";
});

document.getElementById("endCall").addEventListener("click", function () {
    document.getElementById("reviewModal").style.display = "flex";
});

document.getElementById("submitReview").addEventListener("click", function () {
    let reviewText = document.getElementById("reviewText").value;
    if (reviewText.trim() === "") {
        alert("Por favor, escribe una reseña.");
        return;
    }
    alert("Gracias por tu reseña!");
    document.getElementById("reviewModal").style.display = "none";
});