let key = '2b42f4fe50ca4b08a57d834414fe1ebe';
let mostrar_noticias = document.getElementById('news');

// Leer categoría de la URL
const params = new URLSearchParams(window.location.search);
const categoria = params.get('categoria');

// Construir URL para NewsAPI
let url; 

if (categoria) {
    // Noticias por categoría (globales)
    url = `https://newsapi.org/v2/top-headlines?category=${categoria}&language=en&apiKey=${key}`;
} else {
    // Noticias populares globales (sin categoría)
    url = `https://newsapi.org/v2/top-headlines?language=en&apiKey=${key}`;

}

fetch(url)
    .then((resp) => resp.json())
    .then((dato) => {
        let noticias = dato.articles;

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
                    <img src="${imagen}" class="img-thumbnail" alt="img">
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