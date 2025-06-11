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
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Configuración - Tema UI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/configTemaUI_Estilos.css">
</head>
<body class="<?php echo $temaUI === 'oscuro' ? 'tema-oscuro' : 'tema-claro'; ?>">
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
          <li class="nav-item"><a class="nav-link active" href="#">Temas</a></li>
          <li class="nav-item"><a class="nav-link active" href="configFuenteUI.php">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- Opción Claro -->
        <div class="theme-option">
          <div class="theme-image">
            <div class="placeholder-icon"></div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="temaUI" id="temaClaro" checked>
            <label class="form-check-label" for="temaClaro">Claro</label>
          </div>
        </div>

        <!-- Opción Oscuro -->
        <div class="theme-option">
          <div class="theme-image">
            <div class="placeholder-icon"></div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="temaUI" id="temaOscuro">
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