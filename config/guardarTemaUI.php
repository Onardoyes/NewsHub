<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'error' => 'No autenticado']);
    exit;
}

if (!isset($_POST['tema'])) {
    echo json_encode(['success' => false, 'error' => 'Tema no recibido']);
    exit;
}

$tema = $_POST['tema'];
$idUsuario = $_SESSION['id_usuario'];

$conexion = new mysqli("localhost","root","","newshub","3308");
if ($conexion->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Error DB']);
    exit;
}

$stmt = $conexion->prepare("UPDATE usuario SET tema = ? WHERE id = ?");
$stmt->bind_param("si", $tema, $idUsuario);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
    $_SESSION['tema']=$tema;
} else {
    echo json_encode(['success' => false, 'error' => 'Error al guardar']);
}

$stmt->close();
$conexion->close();
