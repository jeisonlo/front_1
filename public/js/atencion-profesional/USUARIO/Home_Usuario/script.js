const stories = [
  [
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353452/Imagen4_m2mnvb.webp", text: "Los atardeceres nos enseñan a dejar ir lo que no podemos cambiar. 🌅" },
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353469/Imagen5_gwfebi.webp", text: "El final del día es la mejor oportunidad para respirar y agradecer. 🌄" },
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353496/Imagen6_gsxnur.webp", text: "La calma del atardecer nos recuerda que cada día tiene su belleza. 🌅" }
  ],
  [
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353531/Imagen7_vrzqtn.jpg", text: "Incluso en la rutina, un atardecer nos da un momento de paz. 🌇" },
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353554/Imagen8_mpt8op.jpg", text: "Los colores del atardecer nos inspiran a soñar sin límites. 🌆" },
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353585/Imagen9_xvtkqq.jpg", text: "Cada puesta de sol es un recordatorio de que siempre hay un nuevo comienzo. 🌄" }
  ],
  [
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353630/Imagen10_a5nir5.jpg", text: "Mira el atardecer y recuerda que la vida es un hermoso viaje. 🌅" },
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745354040/p3_lrfjpx.jpg", text: "El sol se despide, pero mañana nos traerá nuevas oportunidades. 🌞" },
      { img: "https://res.cloudinary.com/dmisxvtp9/image/upload/v1745353452/Imagen4_m2mnvb.webp", text: "Siente la brisa del atardecer y deja ir las preocupaciones del día. 🍃" }
  ]
];

let currentIndexes = [0, 0, 0];

const updateStories = () => {
  for (let i = 0; i < 3; i++) {
      document.getElementById(`story-image-${i + 1}`).src = stories[i][currentIndexes[i]].img;
      document.getElementById(`story-text-${i + 1}`).textContent = stories[i][currentIndexes[i]].text;
  }
};

// Cambio automático cada 5 segundos
setInterval(() => {
  for (let i = 0; i < 3; i++) {
      currentIndexes[i] = (currentIndexes[i] + 1) % stories[i].length;
  }
  updateStories();
}, 5000);

window.onload = () => {
  updateStories();
};





let currentIndex = 0;

function showSlide(index) {
  const slides = document.querySelectorAll(".carousel-item");
  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${(i - index) * 100}%)`;
  });
}

function nextSlide() {
  const slides = document.querySelectorAll(".carousel-item");
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

function prevSlide() {
  const slides = document.querySelectorAll(".carousel-item");
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

// Cambiar automáticamente cada 3 segundos
setInterval(nextSlide, 3000);

// Mostrar la primera diapositiva al cargar la página
document.addEventListener("DOMContentLoaded", () => {
  showSlide(currentIndex);
});

// Initialize the first slide
document.addEventListener("DOMContentLoaded", () => {
  showSlide(currentIndex);
});




  


  
 