<?php
    require_once('../BD/conexion.php');

    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    $query="SELECT * FROM usuario WHERE Nombre='$usuario' AND Password='$password'";
    $resultado=$conexion->query($query);

    if($resultado->num_rows > 0){
        session_start();
        $_SESSION['Nombre']=$usuario;
        header("Location: ../src/noticias.php");
    }else{
        header("Location: ../src/iniSesion.php");
    }
?>