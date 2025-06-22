<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'error' => 'No autenticado']);
    exit;
}

if (!isset($_POST['fuente'])) {
    echo json_encode(['success' => false, 'error' => 'Fuente no recibida']);
    exit;
}

$fuente = $_POST['fuente'];
$idUsuario = $_SESSION['id_usuario'];

$conexion = new mysqli("localhost", "root", "", "newshub", "3308");

if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error de conexión DB']);
    exit;
}

$stmt = $conexion->prepare("UPDATE usuario SET Fuente = ? WHERE id = ?");
$stmt->bind_param("si", $fuente, $idUsuario);

if ($stmt->execute()) {
    $_SESSION['fuenteNombre'] = $fuente;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al guardar']);
}

$stmt->close();
$conexion->close();