<?php
session_start();
require_once('../BD/conexion.php');

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../src/iniSesion.php");
    exit();
}

$idUsuario = $_SESSION['id_usuario'];

// Recoger los datos enviados desde el formulario
$colorNavUp = $_POST['colorNavUp'] ?? '#FFFFFF';
$colorNavLeft = $_POST['colorNavLeft'] ?? '#FFFFFF';
$colorFuente = $_POST['colorFuente'] ?? '#000000';

// Preparar y ejecutar la consulta para actualizar los colores en la BD
$stmt = $conexion->prepare("UPDATE Usuario SET nav_Color_Up = ?, nav_Color_Left = ?, fuente_color = ? WHERE id = ?");
$stmt->bind_param("sssi", $colorNavUp, $colorNavLeft, $colorFuente, $idUsuario);

if ($stmt->execute()) {
    // Guardar los colores en sesión para reflejarlos inmediatamente
    $_SESSION['navUp'] = $colorNavUp;
    $_SESSION['navLeft'] = $colorNavLeft;
    $_SESSION['fuenteColor'] = $colorFuente;

    $_SESSION['mensaje_exito'] = "Colores guardados correctamente.";
    header("Location: ../src/configColorUI.php");
    exit();
} else {
    $_SESSION['mensaje_error'] = "Error al guardar los colores.";
    header("Location: ../src/configColorUI.php");
    exit();
}
?>
