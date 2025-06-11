document.addEventListener('DOMContentLoaded', () => {
  const radios = document.querySelectorAll('input[name="temaUI"]');

  radios.forEach(radio => {
    radio.addEventListener('change', () => {
      const tema = radio.id === 'temaClaro' ? 'claro' : 'oscuro';

      // Cambiar la clase del <body> en tiempo real
      document.body.classList.remove('tema-claro', 'tema-oscuro');
      document.body.classList.add(`tema-${tema}`);

      // Enviar a PHP vía AJAX (usando fetch)
      fetch('../config/guardarTemaUI.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded'
  },
  body: 'tema=' + encodeURIComponent(tema)
})
.then(res => res.text())
.then(texto => {
  console.log('🧾 Respuesta cruda:', texto);
  try {
    const data = JSON.parse(texto);
    console.log('✅ JSON parseado:', data);
  } catch (err) {
    console.error('❌ No se pudo parsear JSON:', err);
  }
})
.catch(err => console.error('❌ Error de red o fetch:', err));

    });
  });
});