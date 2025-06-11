<?php
    require_once('../BD/conexion.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];

    $fotoPerfil = NULL;
    $recordarInicio = false;
    $navColorUp = '#FFFFFF';
    $navColorLeft = '#FFFFFF';
    $tema = 'Claro';
    $fuente = 1;
    $fuenteColor = '#000000';

    $stmt = $conexion->prepare("
        INSERT INTO usuario (
            Nombre, Password, Correo, FotoPerfil, RecordarInicio, 
            nav_Color_Up, nav_Color_Left, Tema, Fuente, fuente_color
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssssisssis",  // Tipos: s=string, i=int
        $usuario,
        $password,
        $correo,
        $fotoPerfil,
        $recordarInicio,
        $navColorUp,
        $navColorLeft,
        $tema,
        $fuente,
        $fuenteColor
    );

    if ($stmt->execute()) {
        echo "Usuario registrado correctamente.";
        header("Location: ../src/iniSesion.php");
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
        header("Location: ../src/registrarUsuario.php");
    }

    $stmt->close();
?>
