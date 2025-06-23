const params = new URLSearchParams(window.location.search);
const key = '2b42f4fe50ca4b08a57d834414fe1ebe';
let url = '';
const busqueda = params.get('busqueda');
const categoria = params.get('categoria');
const mostrar_noticias = document.getElementById('news');

// Obtener filtros desde localStorage (establecidos en filtros.php)
const favoritos = localStorage.getItem('filtroFavoritos') === 'true';
const recientes = localStorage.getItem('filtroRecientes') === 'true';
const ultimoMomento = localStorage.getItem('filtroUltimoMomento') === 'true';
const populares = localStorage.getItem('filtroPopulares') === 'true';
const elMundo = localStorage.getItem('filtroElMundo') === 'true';

// Construcción de URL dinámica base
if (busqueda) {
  url = `https://newsapi.org/v2/everything?q=${encodeURIComponent(busqueda)}&language=en&sortBy=publishedAt&apiKey=${key}`;
} else if (categoria) {
  url = `https://newsapi.org/v2/top-headlines?category=${categoria}&language=en&apiKey=${key}`;
} else {
  url = `https://newsapi.org/v2/top-headlines?language=en&apiKey=${key}`;
}

// Aplicar filtros al modificar la URL (solo los compatibles con la API gratuita)
if (recientes) {
  url = url.replace(/sortBy=[^&]+/, 'sortBy=publishedAt');
} else if (populares) {
  url = url.replace(/sortBy=[^&]+/, 'sortBy=popularity');
} else if (favoritos || ultimoMomento || elMundo) {
  if (favoritos) url += '&q=favorite';
  if (ultimoMomento) url += '&q=breaking';
  if (elMundo) url += '&q=world';
}

// Mostrar noticias
fetch(url)
  .then((resp) => resp.json())
  .then((dato) => {
    const noticias = dato.articles;

    if (!noticias || noticias.length === 0) {
      mostrar_noticias.innerHTML = "<p>No se encontraron noticias.</p>";
      return;
    }

    noticias.forEach(noticia => {
      const div = document.createElement('div');
      div.className = 'news-card d-flex align-items-center gap-3 mb-3';

      const imagen = noticia.urlToImage || 'https://via.placeholder.com/90';

      div.innerHTML = `
        <a href="${noticia.url}" target="_blank" class="d-flex align-items-center gap-3 text-decoration-none">
          <img src="${imagen}" class="img-thumbnail" width="90" height="90" alt="img">
          <div>
            <h6 class="mb-0">${noticia.title}</h6>
            <p>${noticia.description || 'Sin descripción disponible.'}</p>
          </div>
        </a>
      `;

      mostrar_noticias.appendChild(div);
    });
  })
  .catch(error => {
    mostrar_noticias.innerHTML = "<p>Error al cargar las noticias.</p>";
    console.error("Error al obtener datos:", error);
  });