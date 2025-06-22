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
  <title>Inicio - Noticias</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/noticias_Estilos.css">
  <style>
  :root {
    --nav-color-up: <?php echo $colorNavUp; ?>;
    --nav-color-left: <?php echo $colorNavLeft; ?>;
    --font-color: <?php echo $colorFuente; ?>;
  }

  body, small {
    font-family: <?php echo $fuenteActual; ?>;
  }

  body.tema-claro {
    background-color: #ffffff;
    color: var(--font-color) !important;
  }

  body.tema-oscuro {
    background-color: #121212;
    color: #ffffff;
  }

  body.tema-oscuro .navbar{
    background-color: var(--nav-color-up) !important;
    color: var(--font-color) !important;
    border-color: #444 !important;
  }

  body.tema-oscuro .sidebar,
  body.tema-oscuro .form-check-label,
  body.tema-oscuro input.form-check-input{
    background-color: var(--nav-color-left) !important;
    color: var(--font-color) !important;
    border-color: #444 !important;
  }

  body.tema-oscuro .navbar .nav-link,
  body.tema-oscuro .navbar .navbar-brand {
    color: var(--font-color) !important;
  }

  body.tema-oscuro .news-card *:hover {
    color: #ccc !important;
  }

  body.tema-oscuro input[type="text"],
  body.tema-oscuro button {
    background-color: #2a2a2a;
    color: var(--font-color) !important;
    border-color: #444;
  }

  nav.navbar, .search-bar button {
    background-color: var(--nav-color-up) !important;
  }

  nav.sidebar {
    background-color: var(--nav-color-left) !important;
  }

  body, .nav-link, .navbar-brand, .sidebar .nav-link, .form-label, .bi {
    color: var(--font-color) !important;
  }

  .news-card {
    border-color: var(--font-color) !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  body.tema-claro .news-card,
  body.tema-claro .news-card a {
    color: var(--font-color) !important;
    border-color: var(--font-color) !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  body.tema-oscuro .news-card,
  body.tema-oscuro .news-card a {
    color: #ffffff;
    border-color: #ffffff !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .search-bar button:hover {
    opacity: 0.9;
  }

  body.tema-oscuro .search-bar input::placeholder {
    color: #ffffff;
    opacity: 0.8;
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
  <script src="https://cdn.jsdelivr.net/npm/axios@1.9.0/dist/axios.min.js"></script>
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
          <li class="nav-item"><a class="nav-link active" href="#">Noticias</a></li>
          <li class="nav-item"><a class="nav-link" href="categorias.php">Categorías</a></li>
          <li class="nav-item"><a class="nav-link" href="filtros.php">Filtros</a></li>
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
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=science">Ciencia</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=sports">Deportes</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=entertainment">Entretenimiento</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=general">General</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=business">Negocios</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php">Populares</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=health">Salud</a></li>
          <li class="nav-item"><a class="nav-link" href="noticias.php?categoria=technology">Tecnología</a></li>
        </ul>
      </nav>
      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- BARRA DE BÚSQUEDA -->
        <form method="GET" action="noticias.php" class="search-bar">
          <input type="text" name="busqueda" class="form-control" placeholder="Buscabas una noticia en especial?">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <!-- Tarjetas de Noticias -->
        <div id="news"></div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/noticias.js"></script>
</body>
</html>