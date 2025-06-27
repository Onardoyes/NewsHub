<?php
require_once('../BD/conexion.php');
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../src/iniSesion.php");
    exit;
}

if (!isset($_FILES['fotoPerfil'])) {  // debe coincidir con el name del input en el formulario
    $_SESSION['errorFoto'] = "No se seleccionó ninguna imagen.";
    header("Location: ../src/configUsuario.php");
    exit;
}

$usuarioId = $_SESSION['id_usuario'];
$foto = $_FILES['fotoPerfil'];

// Validar tamaño, tipo, etc (puedes agregar validaciones más estrictas)
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
if (!in_array($foto['type'], $allowedTypes)) {
    $_SESSION['errorFoto'] = "Solo se permiten imágenes JPG, PNG o GIF.";
    header("Location: ../src/configUsuario.php");
    exit;
}

// Crear nombre único para evitar sobreescritura
$ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
$nombreArchivo = "perfil_".$usuarioId."_".time().".".$ext;

// Ruta para guardar imagen
$rutaDestino = "../img/" . $nombreArchivo;

// Mover archivo subido
if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) {
    // Actualizar en base de datos
    $stmt = $conexion->prepare("UPDATE usuario SET FotoPerfil = ? WHERE id = ?");
    $stmt->bind_param("si", $nombreArchivo, $usuarioId);
    if ($stmt->execute()) {
        $_SESSION['fotoPerfil'] = $nombreArchivo; // Actualizar sesión para mostrar cambio (minúsculas)
        unset($_SESSION['errorFoto']);
    } else {
        $_SESSION['errorFoto'] = "Error al actualizar la base de datos.";
        // Eliminar archivo si no se guardó en BD
        unlink($rutaDestino);
    }
    $stmt->close();
} else {
    $_SESSION['errorFoto'] = "Error al subir la imagen.";
}

header("Location: ../src/configUsuario.php");
exit;
?>
