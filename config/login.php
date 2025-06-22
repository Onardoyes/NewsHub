<?php
    require_once('../BD/conexion.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, Nombre, Correo, Tema, nav_Color_Up, nav_Color_Left, Fuente, fuente_color FROM usuario WHERE Nombre = ? AND Password = ?");
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        session_start();
        $_SESSION['id_usuario']=$fila['id'];
        $_SESSION['Nombre']=$fila['Nombre'];
        $_SESSION['correo']=$fila['Correo'];
        $_SESSION['tema']=$fila['Tema'];
        $_SESSION['navUp']=$fila['nav_Color_Up'];
        $_SESSION['navLeft']=$fila['nav_Color_Left'];
        $_SESSION['fuenteNombre']=$fila['Fuente'];
        $_SESSION['fuenteColor']=$fila['fuente_color'];

        header("Location: ../src/noticias.php");
    } else {
        header("Location: ../src/iniSesion.php");
    }

    $stmt->close();
?>