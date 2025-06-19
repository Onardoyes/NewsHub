<?php
  require '../config/validarSesion.php';

  if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'claro'; // Valor por defecto si no se ha configurado
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio - Categorías</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../styles/categorias_Estilos.css">
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
          <li class="nav-item"><a class="nav-link active" href="#">Categorías</a></li>
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
          <li class="nav-item"><a class="nav-link" href="#">Ciencia</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Deportes</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Entretenimiento</a></li>
          <li class="nav-item"><a class="nav-link" href="#">General</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Negocios</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Salud</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tecnología</a></li>
        </ul>
      </nav>

      <!-- CONTENIDO PRINCIPAL -->
      <main class="col-md-10 content-area">
        <!-- BARRA DE BÚSQUEDA -->
        <div class="search-bar">
          <input type="text" class="form-control" placeholder="Buscabas una categoria en especial?">
          <button class="btn btn-primary">Buscar</button>
        </div>

        <!-- GRID DE CATEGORÍAS -->
        <div class="categories-grid">
          <div class="card-category">
            <img src="../img/ciencia.png" alt="Ciencia">
            <p class="fw-bold">Ciencia</p>
            <small>Noticias sobre descubrimientos científicos, investigaciones, tecnología espacial, medio ambiente, y estudios innovadores en diversas ramas de la ciencia.</small>
          </div>
          <div class="card-category">
            <img src="../img/deportes.png" alt="Deportes">
            <p class="fw-bold">Deportes</p>
            <small>Actualizaciones sobre eventos deportivos, resultados, análisis, atletas, ligas, campeonatos y todo lo relacionado con el mundo del deporte.</small>
          </div>
          <div class="card-category">
            <img src="../img/entretenimiento.png" alt="Entretenimiento">
            <p class="fw-bold">Entretenimiento</p>
            <small>Cobertura de temas del mundo del espectáculo como cine, música, televisión, celebridades, eventos culturales y lanzamientos artísticos.</small>
          </div>
          <div class="card-category">
            <img src="../img/general.png" alt="General">
            <p class="fw-bold">General</p>
            <small>Incluye una variedad de noticias que no pertenecen a una categoría específica; puede abarcar política, sociedad, clima, sucesos y temas de interés público.</small>
          </div>
          <div class="card-category">
            <img src="../img/negocios.png" alt="Negocios">
            <p class="fw-bold">Negocios</p>
            <small>Noticias relacionadas con la economía, finanzas, mercados, empresas, emprendimiento y tendencias comerciales a nivel nacional e internacional.</small>
          </div>
          <div class="card-category">
            <img src="../img/popular.png" alt="Populares">
            <p class="fw-bold">Populares</p>
            <small>Noticias destacadas por su alta relevancia, viralidad o interés entre el público. Suelen ser las más vistas, compartidas o comentadas en un periodo reciente.</small>
          </div>
          <div class="card-category">
            <img src="../img/salud.png" alt="Salud">
            <p class="fw-bold">Salud</p>
            <small>Información sobre medicina, bienestar, enfermedades, avances en tratamientos, nutrición, salud pública y temas médicos de actualidad.</small>
          </div>
          <div class="card-category">
            <img src="../img/tecnologia.png" alt="Negocios">
            <p class="fw-bold">Tecnología</p>
            <small>Noticias sobre avances tecnológicos, dispositivos, software, inteligencia artificial, redes sociales, ciberseguridad e innovación digital.</small>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>