<?php
  require '../config/validarSesion.php';
  
  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro'; // Valor por defecto
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
  <title>Configuración - Modifcar Datos de Usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  
  <style>
  body, .nav-link, .navbar-brand, .sidebar .nav-link, .form-label, .form-control, .btn {
    color: <?php echo $colorFuente; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  nav.navbar {
    background-color: <?php echo $colorNavUp; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  nav.sidebar {
    background-color: <?php echo $colorNavLeft; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .sidebar {
    min-height: 100vh;
    border-right: 1px solid #dee2e6;
    padding-top: 1rem;
  }

  .content-area {
    padding: 2rem;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .profile-card {
    border: 1px solid #dee2e6;
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    background-color: inherit;
  }

  input.form-control {
    border-radius: 30px;
    padding-left: 1rem;
    background-color: transparent;
    border: 1px solid #ccc;
  }

  input.form-control::placeholder {
    opacity: 0.7;
  }

  .btn {
    border-radius: 30px;
    padding: 0.5rem 1.5rem;
  }

  .btn-primary {
    background-color: <?php echo $colorNavUp; ?> !important;
    border-color: <?php echo $colorNavUp; ?> !important;
    color: <?php echo $colorFuente; ?> !important;
  }

  .btn-primary:hover {
    background-color: <?php echo $colorNavUp; ?> !important;
    border-color: <?php echo $colorNavUp; ?> !important;
    color: <?php echo $colorFuente; ?> !important;
    opacity: 0.9;
  }

  .navbar .nav-link:hover,
  .sidebar .nav-link:hover {
    color: <?php echo $colorHover; ?> !important;
  }

  /* Tema Claro */
  body.tema-claro {
    background-color: #ffffff;
    color: #000000;
  }

  body.tema-claro input.form-control {
    background-color: #ffffff;
    color: #000000;
    border-color: #ccc;
  }

  /* Tema Oscuro */
  body.tema-oscuro {
    background-color: #121212;
    color: #ffffff;
  }

  body.tema-oscuro .content-area,
  body.tema-oscuro .profile-card,
  body.tema-oscuro input.form-control,
  body.tema-oscuro .form-label {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
    border-color: #444 !important;
  }

  body.tema-oscuro input.form-control::placeholder {
    color: #cccccc;
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
          <li class="nav-item"><a class="nav-link active" href="configUsuario.php">Datos Usuario</a></li>
          <li class="nav-item"><a class="nav-link" href="configColorUI.php">Color UI</a></li>
          <li class="nav-item"><a class="nav-link" href="configTemaUI.php">Temas</a></li>
          <li class="nav-item"><a class="nav-link" href="configFuenteUI.php">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <div class="profile-card mx-auto col-lg-8">
            <h5 class="fw-bold mb-4">Modificar Datos del Usuario</h5>
            <form class="form-container">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre de usuario">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" placeholder="nombre@ejemplo.com">
            </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>