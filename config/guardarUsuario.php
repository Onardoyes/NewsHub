<?php
    require_once('../BD/conexion.php');

    $usuario  = $_POST['usuario'];
    $password = $_POST['password'];
    $correo   = $_POST['correo'];

    // 🔐 Encriptar la contraseña antes de guardarla
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Valores por defecto
    $fotoPerfil       = NULL;
    $recordarInicio   = false;
    $navColorUp       = '#FFFFFF';
    $navColorLeft     = '#FFFFFF';
    $tema             = 'claro'; // debe coincidir con lo que usas en el resto del sistema
    $fuente           = 1;
    $fuenteColor      = '#000000';

    $stmt = $conexion->prepare("
        INSERT INTO usuario (
            Nombre, Password, Correo, FotoPerfil, RecordarInicio, 
            nav_Color_Up, nav_Color_Left, Tema, Fuente, fuente_color
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssssisssis",  // Tipos: s = string, i = integer
        $usuario,
        $passwordHash,
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
        header("Location: ../src/iniSesion.php");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
        // header("Location: ../src/registrarUsuario.php"); // Solo redirige si no hay error de salida
    }

    $stmt->close();
