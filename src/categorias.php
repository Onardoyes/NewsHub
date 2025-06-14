<?php
  require '../config/validarSesion.php';

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro'; // Valor por defecto si no se ha configurado
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio - Categorías</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/categorias_Estilos.css">
</head>
<body class="tema-<?php echo $_SESSION['tema']; ?>">
  <!-- NAVBAR SUPERIOR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Categorías</a></li>
          <li class="nav-item"><a class="nav-link" href="filtros.php">Filtros</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3 navbar-right">
          <div class="position-relative">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">9</span>
          </div>
          <a href="configUsuario.php"><i class="bi bi-gear fs-5"></i></a>
          <i class="bi bi-person-circle fs-4"></i>
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
        <!-- BARRA DE BÚSQUEDA -->
        <div class="search-bar">
          <input type="text" class="form-control" placeholder="Buscabas una categoria en especial?">
          <button class="btn btn-primary">Buscar</button>
        </div>

        <!-- GRID DE CATEGORÍAS -->
        <div class="categories-grid">
          <div class="card-category">
            <!--<img src="https://via.placeholder.com/100x100?text=%F0%9F%93%9D" alt="Categoria">-->
            <small class="text-muted">Categoría</small>
            <p class="fw-bold">Categoria</p>
          </div>
          <div class="card-category">
            <!--<img src="https://via.placeholder.com/100x100?text=%F0%9F%93%9D" alt="Categoria">-->
            <small class="text-muted">Categoría</small>
            <p class="fw-bold">Categoria</p>
          </div>
          <div class="card-category">
            <!--<img src="https://via.placeholder.com/100x100?text=%F0%9F%93%9D" alt="Categoria">-->
            <small class="text-muted">Categoría</small>
            <p class="fw-bold">Categoria</p>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>