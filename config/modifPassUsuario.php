<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'error' => 'No autenticado']);
    exit;
}

if (!isset($_POST['actual']) || !isset($_POST['nueva'])) {
    echo json_encode(['success' => false, 'error' => 'Faltan datos']);
    exit;
}

$passActual = $_POST['actual'];
$passNueva  = $_POST['nueva'];
$idUsuario = $_SESSION['id_usuario'];

// Conexión
$conexion = new mysqli("localhost", "root", "", "newshub", "3308");
if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión DB']);
    exit;
}

// Obtener contraseña actual
$stmt = $conexion->prepare("SELECT Password FROM usuario WHERE id = ?");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo json_encode(['success' => false, 'error' => 'Usuario no encontrado']);
    exit;
}

$row = $result->fetch_assoc();
$passHash = $row['Password'];

// Verificar contraseña actual
if (!password_verify($passActual, $passHash)) {
    echo json_encode(['success' => false, 'error' => 'Contraseña actual incorrecta']);
    exit;
}

// Encriptar nueva contraseña
$passNuevaHash = password_hash($passNueva, PASSWORD_DEFAULT);

// Actualizar contraseña
$stmtUpdate = $conexion->prepare("UPDATE usuario SET Password = ? WHERE id = ?");
$stmtUpdate->bind_param("si", $passNuevaHash, $idUsuario);

if ($stmtUpdate->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al actualizar']);
}

$stmt->close();
$stmtUpdate->close();
$conexion->close();
