<?php
  require '../config/validarSesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Configuración - Fuente UI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/configFuenteUI_Estilos.css">
</head>
<body>
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
          <li class="nav-item"><a class="nav-link" href="categorias.php">Categorías</a></li>
          <li class="nav-item"><a class="nav-link" href="filtros.php">Filtros</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3">
          <div class="position-relative">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">9</span>
          </div>
          <a href="#"><i class="bi bi-gear fs-5"></i></a>
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
          <li class="nav-item"><a class="nav-link" href="configUsuario.php">Datos Usuario</a></li>
          <li class="nav-item"><a class="nav-link" href="configColorUI.php">Color UI</a></li>
          <li class="nav-item"><a class="nav-link" href="configTemaUI.php">Temas</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- BARRA DE BÚSQUEDA -->
        <div class="d-flex justify-content-center my-3">
          <div class="d-flex align-items-center" style="width: 100%; max-width: 600px;">
            <input type="text" class="form-control me-2" placeholder="Buscabas una noticia en especial?">
            <button class="btn btn-primary me-2">Buscar</button>
            <button class="btn btn-outline-primary">Aplicar Fuente</button>
          </div>
        </div>

        <!-- Opciones de fuente -->
        <div class="font-options">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="fuenteUI" id="fuente1" checked>
            <label class="form-check-label" for="fuente1">Fuente</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="fuenteUI" id="fuente2">
            <label class="form-check-label" for="fuente2">Fuente</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="fuenteUI" id="fuente3">
            <label class="form-check-label" for="fuente3">Fuente</label>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>