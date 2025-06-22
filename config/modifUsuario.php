<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
header('Content-Type: application/json');

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'error' => 'No autenticado']);
    exit;
}

// Validar que se hayan enviado los datos necesarios
if (!isset($_POST['nombre']) || !isset($_POST['correo'])) {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
    exit;
}

$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$idUsuario = $_SESSION['id_usuario'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "newshub", "3308");
if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión DB']);
    exit;
}

// Actualizar los datos
$stmt = $conexion->prepare("UPDATE usuario SET Nombre = ?, Correo = ? WHERE id = ?");
$stmt->bind_param("ssi", $nombre, $correo, $idUsuario);

if ($stmt->execute()) {
    // Opcional: actualiza los datos en $_SESSION si se usan en otras partes
    $_SESSION['Nombre'] = $nombre;
    $_SESSION['correo'] = $correo;

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al guardar']);
}

$stmt->close();
$conexion->close();