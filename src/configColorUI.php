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
  <title>Configuración - Color UI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/configColorUI_Estilos.css">
  <style>
  :root {
    --nav-color-up: <?php echo $colorNavUp; ?>;
    --nav-color-left: <?php echo $colorNavLeft; ?>;
    --font-color: <?php echo $colorFuente; ?>;
  }

  body,
  .navbar,
  .sidebar{
    font-family: <?php echo $fuenteActual; ?>;
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

  body.tema-oscuro .navbar{
    background-color: var(--nav-color-up) !important;
    color: var(--font-color) !important;
    border-color: #444 !important;
  }

  body.tema-oscuro .content-area,
  body.tema-oscuro .img-small,
  body.tema-oscuro .img-large{
    background-color: #1e1e1e;
   }

  body.tema-oscuro .sidebar,
  body.tema-oscuro .color-box,
  body.tema-oscuro .placeholder-icon {
    background-color: var(--nav-color-left) !important;
    color: var(--font-color) !important;
    border-color: #444 !important;
  }

  body.tema-oscuro .navbar .nav-link,
  body.tema-oscuro .navbar .navbar-brand {
    color: var(--font-color) !important;
  }

  body.tema-oscuro .placeholder-icon::before,
  body.tema-oscuro .placeholder-icon::after {
    border-color: var(--font-color);
  }

  /* Colores dinámicos aplicados en ambos temas */
  nav.navbar, #formColores button[type="submit"]{
    background-color: var(--nav-color-up) !important;
  }

  nav.sidebar {
    background-color: var(--nav-color-left) !important;
  }

  body, .nav-link, .navbar-brand, .sidebar .nav-link, .form-label, .bi {
    color: var(--font-color) !important;
  }

  .img-small, .img-large, .placeholder-icon {
    border-color: var(--font-color) !important;
  }

  .color-box {
    color: var(--font-color) !important;
  }

  #formColores button[type="submit"]:hover {
    opacity: 0.9;
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
          <li class="nav-item"><a class="nav-link" href="configUsuario.php">Datos Usuario</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Color UI</a></li>
          <li class="nav-item"><a class="nav-link" href="configTemaUI.php">Temas</a></li>
          <li class="nav-item"><a class="nav-link" href="configFuenteUI.php">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <form id="formColores" method="POST" action="../config/guardarColores.php">
          <div class="mb-3">
            <label for="colorNavUp" class="form-label">Color Barra de Navegación Superior</label>
            <input type="color" id="colorNavUp" name="colorNavUp" value="<?php echo htmlspecialchars($_SESSION['navUp'] ?? '#FFFFFF'); ?>" class="form-control form-control-color" />
          </div>

          <div class="mb-3">
            <label for="colorNavLeft" class="form-label">Color Barra Lateral Izquierda</label>
            <input type="color" id="colorNavLeft" name="colorNavLeft" value="<?php echo htmlspecialchars($_SESSION['navLeft'] ?? '#FFFFFF'); ?>" class="form-control form-control-color" />
          </div>

          <div class="mb-3">
            <label for="colorFuente" class="form-label">Color Fuente</label>
            <input type="color" id="colorFuente" name="colorFuente" value="<?php echo htmlspecialchars($_SESSION['fuenteColor'] ?? '#000000'); ?>" class="form-control form-control-color" />
          </div>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        <!-- Imagen grande -->
        <div class="img-large">
          <div class="placeholder-icon"></div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>