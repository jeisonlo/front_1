function realizarPago() {
  const numero_tarjeta = document.getElementById('numero_tarjeta').value;
  const fecha_vencimiento = document.getElementById('fecha_vencimiento').value;
  const cvc = document.getElementById('cvc').value;
  const nombre_tarjeta = document.getElementById('nombre_tarjeta').value;
  const cc = document.getElementById('cc').value;

  // Validar que todos los campos estén llenos
  if (!numero_tarjeta || !fecha_vencimiento || !cvc || !nombre_tarjeta || !cc) {
      alert('Por favor, complete todos los campos.');
      return;
  }

  const data = {
      numero_tarjeta,
      fecha_vencimiento,
      cvc,
      nombre_tarjeta,
      cc,
      monto: 100.00, // Aquí puedes agregar el monto fijo o lo que desees
      metodo_pago: 'Nequi' // Ajusta el método de pago según tu necesidad
  };

  fetch('https://back1-production-67bf.up.railway.app/v1/payments', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
  })
  .then(response => response.json())
  .then(data => {
      if (data.message === 'Pago realizado con éxito') {
          document.getElementById('modal').style.display = 'block';
      } else {
          alert('Hubo un error con el pago.');
      }
  })
  .catch(error => {
      alert('Error en el pago');
  });
}

// Mostrar el modal de pago exitoso
function mostrarMensaje() {
  document.getElementById('modal').style.display = 'block';
}

// Cerrar el modal cuando el usuario hace clic en el botón de cerrar
function cerrarModal() {
  document.getElementById('modal').style.display = 'none';
}

function redirigir() {
  window.location.href = '/usuario/agendar-cita'; // Redirige a la página de inicio o la página que prefieras
}