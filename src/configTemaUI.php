<?php
  require '../config/validarSesion.php';
  require '../BD/conexion.php';

  $idUsuario = $_SESSION['id_usuario'];
  $temaUI = 'claro'; // valor por defecto

  $sql = "SELECT Tema FROM usuario WHERE id = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("i", $idUsuario);
  $stmt->execute();
  $stmt->bind_result($temaGuardado);
  if ($stmt->fetch()) {
    $temaUI = $temaGuardado;
  }
  $stmt->close();

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
  <title>Configuración - Tema UI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <style>
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

  .content-area {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    gap: 3rem;
    background-color: inherit;
  }

  .theme-option {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .theme-image {
    width: 100%;
    max-width: 360px;
    height: 180px;
    border: 2px solid <?php echo $colorFuente; ?>;
    border-radius: 24px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .placeholder-icon {
    width: 80%;
    height: 80%;
    border: 1px solid <?php echo $colorFuente; ?>;
    position: relative;
  }

  .placeholder-icon::before,
  .placeholder-icon::after {
    content: '';
    position: absolute;
    border: 1px solid <?php echo $colorFuente; ?>;
  }

  .placeholder-icon::before {
    top: 10%;
    left: 10%;
    width: 15%;
    height: 15%;
    border-radius: 50%;
  }

  .placeholder-icon::after {
    bottom: 10%;
    right: 10%;
    width: 70%;
    height: 1px;
    transform: rotate(-45deg);
    transform-origin: bottom right;
  }

  .btn-primary {
    background-color: <?php echo $colorBoton; ?> !important;
    border-color: <?php echo $colorBoton; ?> !important;
    color: #fff !important;
  }

  .btn-primary:hover {
    background-color: <?php echo $colorHover; ?> !important;
    border-color: <?php echo $colorHover; ?> !important;
  }

  .nav-link:hover {
    color: <?php echo $colorHover; ?> !important;
  }

  #logo-img {
    height: 100%;
    max-height: 40px;
    width: auto;
    object-fit: contain;
  }

  @media (max-width: 768px) {
    .sidebar {
      border-right: none;
      border-bottom: 1px solid #dee2e6;
    }

    .theme-option {
      flex-direction: column;
      align-items: center;
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
  body.tema-oscuro .theme-image,
  body.tema-oscuro .placeholder-icon {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
    border-color: #444 !important;
  }

  body.tema-oscuro .navbar .nav-link,
  body.tema-oscuro .navbar .navbar-brand{
    color:<?php echo $colorFuente; ?> !important;
  }

  body.tema-oscuro .navbar .nav-link:hover {
    color: <?php echo $colorHover; ?> !important;
  }

  body.tema-oscuro .badge.bg-danger {
    background-color: #ff4d4d !important;
  }

  .theme-preview-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 24px;
  }

</style>
</head>
<body class="<?php echo $temaUI === 'oscuro' ? 'tema-oscuro' : 'tema-claro'; ?>">
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
          <li class="nav-item"><a class="nav-link" href="configColorUI.php">Color UI</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Temas</a></li>
          <li class="nav-item"><a class="nav-link active" href="configFuenteUI.php">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- Opción Claro -->
        <div class="theme-option">
          <div class="theme-image">
            <img src="../img/temaClaro.jpg" alt="Tema Claro" class="theme-preview-img">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="temaUI" id="temaClaro" <?php if($_SESSION['tema'] == 'claro'){?>checked<?php }?>>
            <label class="form-check-label" for="temaClaro">Claro</label>
          </div>
        </div>

        <!-- Opción Oscuro -->
        <div class="theme-option">
          <div class="theme-image">
            <img src="../img/temaOscuro.jpg" alt="Tema Claro" class="theme-preview-img">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="temaUI" id="temaOscuro" <?php if($_SESSION['tema'] == 'oscuro'){?>checked<?php }?>>
            <label class="form-check-label" for="temaOscuro">Oscuro</label>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/tema.js"></script>
</body>
</html>