<?php
  require '../config/validarSesion.php';

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro';
  }

  $colorNavUp    = $_SESSION['navUp'] ?? '#FFFFFF';
  $colorNavLeft  = $_SESSION['navLeft'] ?? '#FFFFFF';
  $colorFuente   = $_SESSION['fuenteColor'] ?? '#000000';
  $fuenteActual  = $_SESSION['fuenteNombre'] ?? 'Arial, Helvetica, sans-serif';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Configuración - Color UI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <style>
    :root {
      --nav-color-up: <?= $colorNavUp ?>;
      --nav-color-left: <?= $colorNavLeft ?>;
      --font-color: <?= $colorFuente ?>;
    }

    body, .navbar, .sidebar {
      font-family: <?= $fuenteActual ?>;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    body.tema-claro {
      background-color: #ffffff;
      color: #000000;
    }

    body.tema-oscuro {
      background-color: #121212;
      color: #ffffff;
    }

    .navbar {
      background-color: var(--nav-color-up) !important;
      color: var(--font-color) !important;
    }

    nav.sidebar {
      background-color: var(--nav-color-left) !important;
    }

    .nav-link, .navbar-brand, .form-label, .bi {
      color: var(--font-color) !important;
    }

    .btn-primary {
      background-color: var(--nav-color-up) !important;
      border-color: var(--nav-color-up) !important;
      color: var(--font-color) !important;
    }

    .btn-primary:hover {
      opacity: 0.9;
    }

    #logo-img {
      max-height: 40px;
      object-fit: contain;
    }

    .content-area {
  min-height: 100vh;
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  gap: 3rem;
  padding: 2rem;
  flex-wrap: wrap;
  background-color: inherit;
}


    #formColores {
      flex: 1 1 350px;
      max-width: 400px;
    }

    .img-large {
      flex: 1 1 auto;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .preview-ui {
      width: 100%;
      max-width: 400px;
      height: 220px;
      border: 1px solid var(--font-color);
      border-radius: 16px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      background-color: white;
    }

    .preview-topbar {
      height: 20%;
      background-color: var(--nav-color-up);
    }

    .preview-body {
      flex: 1;
      display: flex;
      flex-direction: row;
    }

    .preview-sidebar {
      width: 20%;
      background-color: var(--nav-color-left);
    }

    .preview-content {
      flex: 1;
      background-color: #f4f4f4;
      color: var(--font-color);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.5rem;
      font-family: <?= $fuenteActual ?>;
    }

    @media (max-width: 768px) {
      .content-area {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body class="tema-<?= $_SESSION['tema'] ?>">
  <!-- NAVBAR SUPERIOR -->
  <nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../img/<?= ($_SESSION['tema'] == 'claro') ? 'logo.png' : 'logoOscuro.png'; ?>" id="logo-img" alt="Logo">
      </a>
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
          <a href="configUsuario.php"><i class="bi bi-gear fs-5"></i></a>
          <a href="../config/logout.php"><i class="bi bi-person-circle fs-4" title="Cerrar Sesión"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <!-- LAYOUT -->
  <div class="container-fluid">
    <div class="row">
      <!-- MENÚ LATERAL -->
      <nav class="col-md-2 sidebar">
        <ul class="nav flex-column pt-3">
          <li class="nav-item"><a class="nav-link" href="configUsuario.php">Datos Usuario</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Color UI</a></li>
          <li class="nav-item"><a class="nav-link" href="configTemaUI.php">Temas</a></li>
          <li class="nav-item"><a class="nav-link" href="configFuenteUI.php">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- Formulario -->
        <form id="formColores" method="POST" action="../config/guardarColores.php">
          <div class="mb-3">
            <label for="colorNavUp" class="form-label">Color Barra de Navegación Superior</label>
            <input type="color" id="colorNavUp" name="colorNavUp" value="<?= htmlspecialchars($colorNavUp) ?>" class="form-control form-control-color" />
          </div>
          <div class="mb-3">
            <label for="colorNavLeft" class="form-label">Color Barra Lateral Izquierda</label>
            <input type="color" id="colorNavLeft" name="colorNavLeft" value="<?= htmlspecialchars($colorNavLeft) ?>" class="form-control form-control-color" />
          </div>
          <div class="mb-3">
            <label for="colorFuente" class="form-label">Color Fuente</label>
            <input type="color" id="colorFuente" name="colorFuente" value="<?= htmlspecialchars($colorFuente) ?>" class="form-control form-control-color" />
          </div>
          <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
        </form>

        <!-- Vista Previa -->
        <div class="img-large">
          <div class="preview-ui" id="previewUI">
            <div class="preview-topbar" id="previewTopbar"></div>
            <div class="preview-body">
              <div class="preview-sidebar" id="previewSidebar"></div>
              <div class="preview-content" id="previewContent">Aa</div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const colorNavUpInput = document.getElementById('colorNavUp');
    const colorNavLeftInput = document.getElementById('colorNavLeft');
    const colorFuenteInput = document.getElementById('colorFuente');

    const previewTopbar = document.getElementById('previewTopbar');
    const previewSidebar = document.getElementById('previewSidebar');
    const previewContent = document.getElementById('previewContent');

    function actualizarVistaPrevia() {
      previewTopbar.style.backgroundColor = colorNavUpInput.value;
      previewSidebar.style.backgroundColor = colorNavLeftInput.value;
      previewContent.style.color = colorFuenteInput.value;
    }

    colorNavUpInput.addEventListener('input', actualizarVistaPrevia);
    colorNavLeftInput.addEventListener('input', actualizarVistaPrevia);
    colorFuenteInput.addEventListener('input', actualizarVistaPrevia);

    actualizarVistaPrevia();
  </script>
</body>
</html>
