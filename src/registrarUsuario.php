<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Sesión</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/iniSesion_Estilos.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h4 class="mb-4 text-center">Crear Cuenta</h4>
      <form method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="username" name="usuario" placeholder="Nombre de Usuario">
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo</label>
          <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo Electronico">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
        </div>
        <button type="submit" class="btn btn-primary w-100 login-btn">Crear Cuenta</button>
      </form>
    </div>
  </div>
</body>
</html>