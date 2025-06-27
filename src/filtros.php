<?php
  require '../config/validarSesion.php';

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro'; // Valor por defecto
  }

  $colorNavUp = $_SESSION['navUp'] ?? '#FFFFFF';
  $colorNavLeft = $_SESSION['navLeft'] ?? '#FFFFFF';
  $colorFuente = $_SESSION['fuenteColor'] ?? '#000000';
  $fuenteActual = $_SESSION['fuenteNombre'] ?? 'Arial, Helvetica, sans-serif';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio - Filtros</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/filtros_Estilos.css">
  <style>
  :root {
    --nav-color-up: <?= $colorNavUp ?>;
    --nav-color-left: <?= $colorNavLeft ?>;
    --font-color: <?= $colorFuente ?>;
    --hover-btn: #<?= ltrim($colorNavUp, '#') ?>cc;
  }

  body, .nav-link, .navbar-brand, .form-check-label, .bi {
    color: var(--font-color) !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  nav.navbar {
    background-color: var(--nav-color-up) !important;
  }

  nav.sidebar {
    background-color: var(--nav-color-left) !important;
  }

  .search-bar input[type="text"] {
    border-radius: 30px;
    padding-left: 1rem;
    flex-grow: 1;
    max-width: 400px;
    background-color: transparent;
  }

  .search-bar input[type="text"]::placeholder {
    opacity: 0.6;
  }

  .search-bar button {
    border-radius: 30px;
    padding: 0.5rem 1.5rem;
    background-color: var(--nav-color-up);
    color: var(--font-color);
    border: none;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .search-bar button:hover {
    background-color: var(--hover-btn);
    font-family: <?php echo $fuenteActual; ?>;
  }

  .btn-outline-primary {
    color: var(--font-color);
    border-color: #0d6efd;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .btn-outline-primary:hover {
    background-color: #0d6efd;
    color: #fff;
    font-family: <?php echo $fuenteActual; ?>;
  }

  body.tema-oscuro {
    background-color: #121212;
    color: #ffffff;
  }
  
  body.tema-oscuro .navbar{
    background-color: var(--nav-color-up);
  }

  body.tema-oscuro .sidebar{
    background-color: var(--nav-color-left);
  }

  body.tema-oscuro .filtros-box,
  body.tema-oscuro .content-area {
    background-color: #1e1e1e !important;
    border-color: #444;
  }

  body.tema-oscuro input[type="text"] {
    background-color: #2a2a2a;
    border-color: #444;
  }

  body.tema-claro .form-check-input:checked,
  body.tema-oscuro .form-check-input:checked {
    background-color: var(--nav-color-up);
    border-color: #0d6efd;
  }

  #logo-img {
    height: 100%;
    max-height: 40px;
    width: auto;
    object-fit: contain;
  }

  /* Texto de content-area */
  body.tema-oscuro .content-area {
    color: white !important;
  }

  /* Placeholder del input en modo oscuro */
  body.tema-oscuro .search-bar input::placeholder {
    color: white !important;
    opacity: 0.8; /* opcional: hace que el blanco no sea tan fuerte */
  }

  /* También asegúrate que el input no sobrescriba el color del texto */
  body.tema-oscuro .search-bar input {
    color: white !important;
  }

  body.tema-oscuro .form-check-label {
    color: white !important;
  }

  .btn-primary {
      background-color: <?php echo $colorNavUp; ?> !important;
      border-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
      font-family: <?php echo $fuenteActual; ?>;
    }

    .btn-primary:hover {
      background-color: <?php echo $colorNavUp; ?> !important;
      opacity: 0.8;
    }
</style>
</head>
<body class="tema-<?php echo $_SESSION['tema']; ?>">
  <!-- NAVBAR SUPERIOR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../img/<?php echo ($_SESSION['tema'] == 'claro') ? 'logo.png' : 'logoOscuro.png'; ?>" id="logo-img" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
          <li class="nav-item"><a class="nav-link" href="categorias.php">Categorías</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Filtros</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3">
          <div class="position-relative">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              9
            </span>
          </div>
          <a href="configUsuario.php"><i class="bi bi-gear fs-5"></i></a>
          <a href="../config/logout.php"><i class="bi bi-person-circle fs-4" title="Cerrar Sesión"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- LAYOUT PRINCIPAL -->
  <div class="container-fluid">
    <div class="row">
      <!-- MENÚ LATERAL IZQUIERDO -->
      <nav class="col-md-2 sidebar bg-white">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link" href="#">Populares</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Recientes</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Último Momento</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Favoritos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">El Mundo</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- FORMULARIO DE FILTROS -->
        <form method="GET" action="noticias.php">
          <!-- Fila 1: Barra de búsqueda + botón -->
          <div class="d-flex justify-content-center my-3">
            <div class="search-bar d-flex justify-content-center align-items-center gap-3 flex-wrap">
              <input type="text" name="busqueda" class="form-control" placeholder="Buscabas un filtro en especial?" style="max-width: 400px;">
              <button class="btn btn-outline-primary" type="submit">Aplicar Filtros</button>
            </div>
          </div>

          <!-- Fila 2: Filtros adicionales -->
          <div class="d-flex justify-content-center mb-3 flex-wrap gap-3">
            <select name="language" class="form-select" style="max-width: 180px;">
              <option value="">Idioma</option>
              <option value="es">Español</option>
              <option value="en">Inglés</option>
              <option value="fr">Francés</option>
            </select>

            <select name="sortBy" class="form-select" style="max-width: 180px;">
              <option value="">Ordenar por</option>
              <option value="publishedAt">Fecha</option>
              <option value="popularity">Popularidad</option>
              <option value="relevancy">Relevancia</option>
            </select>

            <input type="date" name="from" class="form-control" style="max-width: 180px;">
            <input type="date" name="to" class="form-control" style="max-width: 180px;">
          </div>

          <!-- Filtros adicionales con checkboxes -->
          <div class="d-flex justify-content-center">
            <div class="filtros-box d-flex flex-row flex-wrap gap-4 justify-content-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filtro1" name="favoritos" value="1">
                <label class="form-check-label" for="filtro1">Favoritos</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filtro2" name="recientes" value="1">
                <label class="form-check-label" for="filtro2">Recientes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filtro3" name="ultimomomento" value="1">
                <label class="form-check-label" for="filtro3">Último Momento</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filtro4" name="populares" value="1">
                <label class="form-check-label" for="filtro4">Populares</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filtro5" name="elmundo" value="1">
                <label class="form-check-label" for="filtro5">El Mundo</label>
              </div>
            </div>
          </div>
        </form>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  document.querySelector('.btn-outline-primary').addEventListener('click', function (e) {
    e.preventDefault(); // Evita el envío automático del formulario

    const url = new URL(window.location.origin + '/NewsHub/src/noticias.php');
    const form = document.querySelector('form');

    // Agregar texto de búsqueda
    const busqueda = form.querySelector('input[name="busqueda"]').value;
    if (busqueda) url.searchParams.set('busqueda', busqueda);

    // Agregar select de idioma
    const language = form.querySelector('select[name="language"]').value;
    if (language) url.searchParams.set('language', language);

    // Agregar orden
    const sortBy = form.querySelector('select[name="sortBy"]').value;
    if (sortBy) url.searchParams.set('sortBy', sortBy);

    // Agregar fechas
    const from = form.querySelector('input[name="from"]').value;
    const to = form.querySelector('input[name="to"]').value;
    if (from) url.searchParams.set('from', from);
    if (to) url.searchParams.set('to', to);

    // Agregar checkboxes como banderas
    const filtros = ['favoritos', 'recientes', 'ultimomomento', 'populares', 'elmundo'];
    filtros.forEach(nombre => {
      const check = document.querySelector(`input[name="${nombre}"]`);
      if (check.checked) {
        url.searchParams.set(nombre, '1');
      }
    });

    // Redirige a noticias.php con filtros
    window.location.href = url.toString();
  });
</script>
</body>
</html>