<?php
  require '../config/validarSesion.php';

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro';
  }

  $colorNavUp    = $_SESSION['navUp'] ?? '#ffffff';
  $colorNavLeft  = $_SESSION['navLeft'] ?? '#f8f9fa';
  $colorFuente   = $_SESSION['fuenteColor'] ?? '#000000';
  $colorBoton    = $_SESSION['botonColor'] ?? '#0d6efd';
  $colorHover    = $_SESSION['hoverColor'] ?? '#0a58ca';
  $fuenteActual = $_SESSION['fuenteNombre'] ?? 'Arial, Helvetica, sans-serif';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio - Categorías</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <style>
    /* Logo */
    #logo-img {
      height: 100%;
      max-height: 40px;
      width: auto;
      object-fit: contain;
    }

    body, .nav-link, .navbar-brand, p {
      color: <?php echo $colorFuente; ?> !important;
      font-family: <?php echo $fuenteActual; ?>;
    }

    .navbar {
      background-color: <?php echo $colorNavUp; ?> !important;
      font-family: <?php echo $fuenteActual; ?>;
    }

    .sidebar {
      background-color: <?php echo $colorNavLeft; ?> !important;
      min-height: 100vh;
      border-right: 1px solid #dee2e6;
      padding-top: 1rem;
      font-family: <?php echo $fuenteActual; ?>;
    }

    /* Contenido */
    .content-area {
      padding: 2rem;
    }

    /* Barra de búsqueda */
    .search-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .search-bar input {
      border-radius: 30px;
      padding-left: 1rem;
      flex-grow: 1;
      max-width: 400px;
    }

    .search-bar button {
      border-radius: 30px;
      padding: 0.5rem 1.5rem;
    }

    /* Tarjetas de categorías */
    .categories-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
    }

    .card-category {
      text-align: center;
      border: 1px solid #dee2e6;
      border-radius: 12px;
      padding: 1rem;
      width: 180px;
      background-color: #ffffff;
      color: #212529;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-category:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .card-category img {
      width: 100%;
      height: 100px;
      object-fit: contain;
      margin-bottom: 0.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .sidebar {
        border-right: none;
        border-bottom: 1px solid #dee2e6;
      }

      .card-category {
        width: 100%;
        max-width: 250px;
      }

      .content-area {
        padding: 1rem;
      }
    }

    /* Tema Claro */
    body.tema-claro {
      background-color: #ffffff;
      color: #000000;
    }

    /* Tema Oscuro */
    body.tema-oscuro {
      background-color: #121212;
      color: #ffffff;
    }

    body.tema-oscuro .content-area,
    body.tema-oscuro .form-control,
    body.tema-oscuro .card-category {
      background-color: #1e1e1e !important;
      color: #ffffff !important;
      border-color: #444 !important;
    }

    body.tema-oscuro .navbar .nav-link,
    body.tema-oscuro .navbar .navbar-brand,
    body.tema-oscuro .sidebar .nav-link {
      color: <?php echo $colorFuente; ?> !important;
    }

    body.tema-claro .navbar .nav-link:hover,
    body.tema-oscuro .navbar .nav-link:hover{
      background-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
      opacity: 0.8;
    }
    
    body.tema-claro .sidebar .nav-link:hover,
    body.tema-oscuro .sidebar .nav-link:hover {
      background-color: <?php echo $colorNavLeft; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
      opacity: 0.8;
    }

    body.tema-claro .bi,
    body.tema-claro .badge,
    body.tema-oscuro .bi,
    body.tema-oscuro .badge {
      color: <?php echo $colorFuente; ?> !important;
    }

    body.tema-oscuro .search-bar input{
      background-color: #121212;
    }

    body.tema-oscuro .search-bar input::placeholder {
      color: #ffffff;
      opacity: 1;
    }

    body.tema-claro .search-bar button,
    body.tema-oscuro .search-bar button {
      background-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
      border-color: <?php echo $colorNavUp; ?> !important;
    }

    body.tema-claro .search-bar button:hover,
    body.tema-oscuro .search-bar button:hover {
      background-color: <?php echo $colorNavUp; ?> !important;
      border-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
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
  <!-- NAVBAR SUPERIOR -->
  <nav class="navbar navbar-expand-lg navbar-light border-bottom">
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
          <li class="nav-item"><a class="nav-link active" href="#">Categorías</a></li>
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
          <li class="nav-item"><a class="nav-link" href="#">Ciencia</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Deportes</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Entretenimiento</a></li>
          <li class="nav-item"><a class="nav-link" href="#">General</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Negocios</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Salud</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tecnología</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- BARRA DE BÚSQUEDA -->
        <div class="search-bar">
          <input type="text" class="form-control" placeholder="Buscabas una categoria en especial?">
          <button class="btn btn-primary">Buscar</button>
        </div>

        <!-- GRID DE CATEGORÍAS -->
        <div class="categories-grid">
          <div class="card-category">
            <img src="../img/ciencia.png" alt="Ciencia">
            <p class="fw-bold">Ciencia</p>
            <small>Noticias sobre descubrimientos científicos...</small>
          </div>
          <div class="card-category">
            <img src="../img/deportes.png" alt="Deportes">
            <p class="fw-bold">Deportes</p>
            <small>Actualizaciones sobre eventos deportivos...</small>
          </div>
          <div class="card-category">
            <img src="../img/entretenimiento.png" alt="Entretenimiento">
            <p class="fw-bold">Entretenimiento</p>
            <small>Cine, música, televisión y celebridades...</small>
          </div>
          <div class="card-category">
            <img src="../img/general.png" alt="General">
            <p class="fw-bold">General</p>
            <small>Noticias generales de interés público...</small>
          </div>
          <div class="card-category">
            <img src="../img/negocios.png" alt="Negocios">
            <p class="fw-bold">Negocios</p>
            <small>Economía, finanzas y emprendimiento...</small>
          </div>
          <div class="card-category">
            <img src="../img/popular.png" alt="Populares">
            <p class="fw-bold">Populares</p>
            <small>Noticias más vistas y compartidas...</small>
          </div>
          <div class="card-category">
            <img src="../img/salud.png" alt="Salud">
            <p class="fw-bold">Salud</p>
            <small>Medicina, bienestar y nutrición...</small>
          </div>
          <div class="card-category">
            <img src="../img/tecnologia.png" alt="Tecnología">
            <p class="fw-bold">Tecnología</p>
            <small>IA, redes sociales, software y gadgets...</small>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
