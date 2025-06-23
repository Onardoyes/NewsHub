<?php
  $error = isset($_GET['error']) ? (int)$_GET['error'] : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Sesión</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/iniSesion_Estilos.css">
  <style>
    .full-height {
      min-height: 100vh;
    }
    .left-column {
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }
    .left-column img {
      max-width: 100%;
      height: auto;
    }
    .right-column {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }
    .login-box {
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>
  <div class="container-fluid full-height">
    <div class="row full-height">
      <!-- Columna izquierda con imagen -->
      <div class="col-md-6 left-column">
        <img src="../img/logo.png" alt="NewsHub">
      </div>

      <!-- Columna derecha con formulario -->
      <div class="col-md-6 right-column">
        <div class="login-box">
          <h4 class="mb-4 text-center">Inicio Sesión</h4>

          <?php if ($error === 1): ?>
            <div class="alert alert-danger text-center" role="alert">
              Usuario o contraseña incorrectos.
            </div>
          <?php endif; ?>

          <form action="../config/login.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Usuario</label>
              <input type="text" class="form-control" id="username" name="usuario" placeholder="Nombre de Usuario" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="mb-3 form-check d-flex justify-content-between align-items-center">
              <div>
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Recordar Información</label>
              </div>
              <a href="registrarUsuario.php" class="text-decoration-none create-user">Crear cuenta</a>
              <a href="#" class="text-decoration-none forgot-password">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 login-btn">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
