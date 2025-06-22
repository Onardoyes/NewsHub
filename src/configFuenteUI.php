<?php
require '../config/validarSesion.php';

if (!isset($_SESSION['tema'])) {
  $_SESSION['tema'] = 'claro';
}

$tema         = $_SESSION['tema'];
$colorNavUp   = $_SESSION['navUp'] ?? '#ffffff';
$colorNavLeft = $_SESSION['navLeft'] ?? '#f8f9fa';
$colorFuente  = $_SESSION['fuenteColor'] ?? '#000000';
$colorBoton   = $_SESSION['botonColor'] ?? '#0d6efd';
$colorHover   = $_SESSION['hoverColor'] ?? '#0a58ca';
$fuenteActual = $_SESSION['fuenteNombre'] ?? 'Arial, Helvetica, sans-serif';

$fuentes = [
  'Times New Roman, Times, serif'                          => 'Times New Roman',
  'Georgia, serif'                                         => 'Georgia',
  'Garamond, serif'                                        => 'Garamond',
  'Palatino Linotype, Book Antiqua, Palatino, serif'       => 'Palatino Linotype',

  'Arial, Helvetica, sans-serif'                           => 'Arial',
  'Verdana, Geneva, sans-serif'                            => 'Verdana',
  'Trebuchet MS, sans-serif'                               => 'Trebuchet MS',
  'Tahoma, Geneva, sans-serif'                             => 'Tahoma',
  'Gill Sans, sans-serif'                                  => 'Gill Sans',
  'Lucida Sans Unicode, Lucida Grande, sans-serif'         => 'Lucida Sans',
  'Segoe UI, sans-serif'                                   => 'Segoe UI',

  'Courier New, Courier, monospace'                        => 'Courier New',
  'Lucida Console, Monaco, monospace'                      => 'Lucida Console',
  'Consolas, monospace'                                    => 'Consolas',

  'Comic Sans MS, cursive, sans-serif'                     => 'Comic Sans MS',
  'Brush Script MT, cursive'                               => 'Brush Script MT',
  'Impact, fantasy'                                        => 'Impact',
  'Copperplate, Papyrus, fantasy'                          => 'Copperplate'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Configuración - Fuente UI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <style>
    body {
      font-family: <?php echo $fuenteActual; ?>;
    }

    #logo-img {
      height: 100%;
      max-height: 40px;
      object-fit: contain;
    }

    .navbar {
      background-color: <?php echo $colorNavUp; ?> !important;
    }

    .navbar .nav-link:hover{
      background-color: <?php echo $colorNavUp; ?> !important;
      color: <?php echo $colorFuente; ?> !important;
      opacity: 0.8;
    }

    .sidebar {
      background-color: <?php echo $colorNavLeft; ?> !important;
      min-height: 100vh;
      border-right: 1px solid #dee2e6;
      padding-top: 1rem;
      color: <?php echo $colorFuente; ?> !important;
    }

    .content-area {
      padding: 2rem;
    }

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

    .font-options {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    @media (max-width: 768px) {
      .sidebar {
        border-right: none;
        border-bottom: 1px solid #dee2e6;
      }

      .font-options {
        justify-content: center;
      }

      .content-area {
        padding: 1rem;
      }
    }

    body.tema-claro {
      background-color: #ffffff;
      color: #000000;
    }

    body.tema-oscuro {
      background-color: #121212;
      color: #ffffff;
    }

    body.tema-oscuro .content-area,
    body.tema-oscuro .form-control {
      background-color: #1e1e1e !important;
      color: #ffffff !important;
      border-color: #444 !important;
    }

    body.tema-oscuro .form-check-input {
      background-color: #444;
      border-color: #888;
    }

    body.tema-oscuro .navbar .nav-link:hover {
      background-color: <?php echo $colorHover; ?>;
      color: white !important;
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

    body.tema-oscuro .search-bar input::placeholder {
      color: #ffffff;
      opacity: 0.7;
    }
  </style>
</head>
<body class="tema-<?php echo $tema; ?>">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../img/<?php echo $tema === 'claro' ? 'logo.png' : 'logoOscuro.png'; ?>" id="logo-img" alt="Logo">
      </a>
      <div class="collapse navbar-collapse" id="topNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
          <li class="nav-item"><a class="nav-link" href="categorias.php">Categorías</a></li>
          <li class="nav-item"><a class="nav-link" href="filtros.php">Filtros</a></li>
        </ul>
        <div class="d-flex gap-3 align-items-center">
          <i class="bi bi-bell fs-5"></i>
          <a href="configUsuario.php"><i class="bi bi-gear fs-5"></i></a>
          <a href="../config/logout.php"><i class="bi bi-person-circle fs-4"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <!-- LAYOUT -->
  <div class="container-fluid">
    <div class="row">
      <!-- SIDEBAR -->
      <nav class="col-md-2 sidebar">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link" href="configUsuario.php">Datos Usuario</a></li>
          <li class="nav-item"><a class="nav-link" href="configColorUI.php">Color UI</a></li>
          <li class="nav-item"><a class="nav-link" href="configTemaUI.php">Temas</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Fuente</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO -->
      <main class="col-md-10 content-area">
        <form id="formFuente">
          <div class="search-bar">
            <input type="text" class="form-control" placeholder="Buscabas una fuente en especial?">
            <button type="submit" class="btn btn-primary">Aplicar Fuente</button>
          </div>

          <div class="font-options">
            <?php foreach ($fuentes as $value => $label): ?>
              <div class="form-check" style="font-family: <?php echo $value; ?>;">
                <input
                  class="form-check-input"
                  type="radio"
                  name="fuenteUI"
                  id="<?php echo md5($value); ?>"
                  value="<?php echo htmlspecialchars($value); ?>"
                  <?php if ($fuenteActual === $value) echo 'checked'; ?>
                >
                <label class="form-check-label" for="<?php echo md5($value); ?>">
                  <?php echo $label; ?>
                </label>
              </div>
            <?php endforeach; ?>
          </div>
        </form>
      </main>
    </div>
  </div>
  <script>
    document.getElementById('formFuente').addEventListener('submit', async function (e) {
      e.preventDefault();
      const fuente = document.querySelector('input[name="fuenteUI"]:checked')?.value;
      if (!fuente) return;

      const res = await fetch('../config/guardarFuente.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'fuente=' + encodeURIComponent(fuente)
      });

      const data = await res.json();
      if (data.success) {
        location.reload();
      } else {
        alert('Error al guardar fuente: ' + (data.error || 'desconocido'));
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
