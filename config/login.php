<?php
require_once('../BD/conexion.php');

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Buscar usuario por nombre
$stmt = $conexion->prepare("SELECT id, Nombre, Correo, Tema, nav_Color_Up, nav_Color_Left, Fuente, fuente_color, Password FROM usuario WHERE Nombre = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Verificar contraseña encriptada
    if (password_verify($password, $fila['Password'])) {
        session_start();
        $_SESSION['id_usuario']   = $fila['id'];
        $_SESSION['Nombre']       = $fila['Nombre'];
        $_SESSION['correo']       = $fila['Correo'];
        $_SESSION['tema']         = $fila['Tema'];
        $_SESSION['navUp']        = $fila['nav_Color_Up'];
        $_SESSION['navLeft']      = $fila['nav_Color_Left'];
        $_SESSION['fuenteNombre'] = $fila['Fuente'];
        $_SESSION['fuenteColor']  = $fila['fuente_color'];

        header("Location: ../src/noticias.php");
        exit;
    }
}

// Si falla usuario o contraseña
header("Location: ../src/iniSesion.php");
exit;