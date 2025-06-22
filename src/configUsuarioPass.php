<?php
  require '../config/validarSesion.php';

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro'; // Valor por defecto
  }

  $colorNavUp = $_SESSION['navUp'] ?? '#FFFFFF';
  $colorNavLeft = $_SESSION['navLeft'] ?? '#FFFFFF';
  $colorFuente = $_SESSION['fuenteColor'] ?? '#000000';
  $colorBoton = $_SESSION['botonColor'] ?? '#0d6efd';
  $colorHover = $_SESSION['hoverColor'] ?? '#0b5ed7';
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
  <link rel="stylesheet" href="../styles/configUsuarioPass_Estilos.css">
  <style>
  /* Colores personalizados */
  nav.navbar {
    background-color: <?php echo $colorNavUp; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  nav.sidebar {
    background-color: <?php echo $colorNavLeft; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  body, .nav-link, .navbar-brand, .sidebar .nav-link,
  .form-label, .form-control, .profile-card{
    color: <?php echo $colorFuente; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .btn-primary {
    background-color: <?php echo $colorNavUp; ?> !important;
    color: <?php echo $colorFuente; ?> !important;
    border-color: <?php echo $colorNavUp; ?> !important;
    font-family: <?php echo $fuenteActual; ?>;
  }

  .btn-primary:hover {
    opacity: 0.7;
    color: #FFFFFF;
  }

  input::placeholder {
    opacity: 0.8;
  }

  .form-control {
    border-radius: 30px;
    padding-left: 1rem;
  }

  .btn {
    border-radius: 30px;
    padding: 0.5rem 1.5rem;
  }

  /* Tema Claro */
  body.tema-claro {
    background-color: #ffffff;
    color: #000000;
  }

  body.tema-claro input.form-control,
  body.tema-claro .form-label {
    background-color: #ffffff;
    color: #000000;
    border-color: #ccc;
  }

  /* Tema Oscuro */
  body.tema-oscuro {
    background-color: #121212;
    color: #ffffff;
  }

  body.tema-oscuro .navbar{
    background-color: var(--nav-color-up);
  }

  body.tema-oscuro .sidebar{
    background-color: var(--nav-color-left);
  }

  body.tema-oscuro .content-area,
  body.tema-oscuro .profile-card,
  body.tema-oscuro input.form-control,
  body.tema-oscuro label,
  body.tema-oscuro .form-label {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
    border-color: #444 !important;
  }

  body.tema-oscuro input.form-control::placeholder {
    color: #ccc;
  }

  body.tema-oscuro .btn-primary:hover {
    filter: brightness(1.1);
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
            <h5 class="fw-bold mb-4">Modificar Contraseña</h5>
            <form class="form-container">
            <div class="mb-3">
                <label for="pass1" class="form-label">Contraseña Actual</label>
                <input type="password" class="form-control" id="pass1" placeholder="Contraseña Actual">
            </div>
            <div class="mb-3">
                <label for="pass2" class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="pass2" placeholder="Nueva Contraseña">
            </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.querySelector(".form-container").addEventListener("submit", async function (e) {
      e.preventDefault();

      const actual = document.getElementById("pass1").value.trim();
      const nueva = document.getElementById("pass2").value.trim();

      if (!actual || !nueva) {
        alert("Por favor, completa ambos campos.");
        return;
      }

      try {
        const res = await fetch("../config/modifPassUsuario.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: `actual=${encodeURIComponent(actual)}&nueva=${encodeURIComponent(nueva)}`
        });

        const data = await res.json();

        if (data.success) {
          alert("Contraseña actualizada correctamente.");
          window.location.href = "configUsuario.php";
        } else {
          alert("Error: " + data.error);
        }
      } catch (err) {
        console.error(err);
        alert("Error al procesar la solicitud.");
      }
    });
</script>
</body>
</html>