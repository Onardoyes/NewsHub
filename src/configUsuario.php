<?php
  require '../config/validarSesion.php';
  require_once('../BD/conexion.php'); // Incluye conexión a la BD

  if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../src/iniSesion.php");
    exit;
  }

  // Cargar foto perfil actual desde la base de datos y actualizar sesión
  $usuarioId = $_SESSION['id_usuario'];
  $stmt = $conexion->prepare("SELECT FotoPerfil FROM usuario WHERE id = ?");
  $stmt->bind_param("i", $usuarioId);
  $stmt->execute();
  $stmt->bind_result($fotoPerfilBD);
  $stmt->fetch();
  $stmt->close();

  // Actualiza sesión con foto perfil de BD o null si no tiene
  $_SESSION['fotoPerfil'] = $fotoPerfilBD ? $fotoPerfilBD : null;

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro'; // Valor por defecto
  }

  $colorNavUp    = $_SESSION['navUp'] ?? '#ffffff';
  $colorNavLeft  = $_SESSION['navLeft'] ?? '#f8f9fa';
  $colorFuente   = $_SESSION['fuenteColor'] ?? '#000000';
  $colorBoton    = $_SESSION['botonColor'] ?? '#0d6efd';
  $colorHover    = $_SESSION['hoverColor'] ?? '#0a58ca';
  $fuenteActual = $_SESSION['fuenteNombre'] ?? 'Arial, Helvetica, sans-serif';

  // Foto perfil desde sesión, si no hay usar imagen por defecto
  $fotoPerfil = $_SESSION['fotoPerfil'] ?? null;
  $fotoPerfilUrl = $fotoPerfil ? "../img/" . htmlspecialchars($fotoPerfil) : "../img/default-profile.png";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Configuración - Información Usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <style>
    body, .nav-link, .navbar-brand, .sidebar .nav-link, .form-label, .btn, p {
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
    }

    .profile-card {
      border: 1px solid #dee2e6;
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
      background-color: inherit;
    }

    .profile-image {
      width: 150px;
      height: 150px;
      border: 2px solid #ccc;
      border-radius: 50%;
      margin-bottom: 1rem;
      object-fit: cover;
    }

    .profile-buttons {
      margin-top: 1.5rem;
    }

    .profile-buttons .btn {
      border-radius: 30px;
      margin: 0.3rem;
    }

    .info-labels {
      text-align: left;
      margin-top: 1rem;
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

    /* Tema Oscuro */
    body.tema-oscuro {
      background-color: #121212;
      color: #ffffff;
    }

    body.tema-oscuro .content-area,
    body.tema-oscuro .profile-card,
    body.tema-oscuro .info-labels,
    body.tema-oscuro .profile-buttons {
      background-color: #1e1e1e !important;
      color: #ffffff !important;
      border-color: #444 !important;
    }

    body.tema-oscuro p,
    body.tema-oscuro label {
      color: #ffffff !important;
    }

    body.tema-oscuro .btn-primary {
      background-color: <?php echo $colorNavUp; ?> !important;
      border-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
    }

    body.tema-oscuro .btn-primary:hover {
      background-color: <?php echo $colorNavUp; ?> !important;
      border-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
      opacity: 0.9;
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

      .info-labels {
        text-align: center;
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
          <li class="nav-item"><a class="nav-link active" href="#">Datos Usuario</a></li>
          <li class="nav-item"><a class="nav-link" href="configColorUI.php">Color UI</a></li>
          <li class="nav-item"><a class="nav-link" href="configTemaUI.php">Temas</a></li>
          <li class="nav-item"><a class="nav-link" href="configFuenteUI.php">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <div class="profile-card mx-auto col-lg-8">
          <h5 class="fw-bold mb-4">Información de Usuario</h5>

          <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
            <!-- Imagen -->
            <div>
              <img src="<?php echo $fotoPerfilUrl; ?>" alt="Foto de Perfil" class="profile-image">
            </div>

            <!-- Info -->
            <div class="info-labels">
              <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['Nombre']); ?></p>
              <p><strong>Correo:</strong> <?php echo htmlspecialchars($_SESSION['correo']); ?></p>
              <button class="btn btn-primary" onclick="location.href='configUsuarioDatos.php'">Cambiar Datos</button>
            </div>
          </div>

          <!-- Formulario para subir foto -->
          <form class="mt-4" action="../config/subirFotoPerfil.php" method="post" enctype="multipart/form-data">
            <label for="fotoPerfilInput" class="form-label">Cambiar Foto de Perfil</label>
            <input type="file" name="fotoPerfil" id="fotoPerfilInput" accept="image/*" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-3">Subir Foto</button>
          </form>

          <!-- Botones -->
          <div class="profile-buttons d-flex flex-column flex-md-row justify-content-center mt-4">
            <button class="btn btn-primary" onclick="location.href='configUsuarioPass.php'">Cambiar Contraseña</button>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>