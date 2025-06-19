const params = new URLSearchParams(window.location.search);
const key = '2b42f4fe50ca4b08a57d834414fe1ebe';
let url = '';
const busqueda = params.get('busqueda');
const categoria = params.get('categoria');
const mostrar_noticias = document.getElementById('news'); // Asegúrate de declararla primero

// Construcción de URL dinámica
if (busqueda) {
  url = `https://newsapi.org/v2/everything?q=${encodeURIComponent(busqueda)}&language=en&sortBy=publishedAt&apiKey=${key}`;
} else if (categoria) {
  url = `https://newsapi.org/v2/top-headlines?category=${categoria}&language=en&apiKey=${key}`;
} else {
  url = `https://newsapi.org/v2/top-headlines?language=en&apiKey=${key}`;
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

/*Noticias por buscador con palabra clave
let key = '2b42f4fe50ca4b08a57d834414fe1ebe';
let params = new URLSearchParams(window.location.search);
let categoria = params.get('categoria');

// Mapeo de categorías (en inglés) a palabras clave en español
const categoriaMap = {
    'science': 'ciencia',
    'sports': 'deportes',
    'entertainment': 'entretenimiento',
    'general': 'noticias',
    'business': 'negocios',
    'health': 'salud',
    'technology': 'tecnología'
};

let palabraClave = categoriaMap[categoria] || ''; // Si no hay categoría, quedará vacío

// Construcción del URL con 'everything' y palabra clave (si aplica)
let url = '';
if (palabraClave) {
    url = `https://newsapi.org/v2/everything?q=${palabraClave}&language=es&sortBy=publishedAt&apiKey=${key}`;
} else {
    // Noticias populares globales en español si no hay categoría
    url = `https://newsapi.org/v2/everything?q=noticias&language=es&sortBy=popularity&apiKey=${key}`;
}

let mostrar_noticias = document.getElementById('news');

fetch(url)
    .then((resp) => resp.json())
    .then((dato) => {
        let noticias = dato.articles;

        mostrar_noticias.innerHTML = ''; // Limpia contenido anterior

        if (!noticias || noticias.length === 0) {
            mostrar_noticias.innerHTML = "<p>No se encontraron noticias.</p>";
            return;
        }

        noticias.forEach(noticia => {
            let div = document.createElement('div');
            div.className = 'news-card d-flex align-items-center gap-3 mb-3';

            let imagen = noticia.urlToImage 
                ? noticia.urlToImage 
                : 'https://via.placeholder.com/48';

            div.innerHTML = `
                <a href="${noticia.url}" target="_blank" class="d-flex align-items-center gap-3 text-decoration-none">
                    <img src="${imagen}" class="img-thumbnail" alt="img" style="width: 48px; height: 48px; object-fit: cover;">
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

*/