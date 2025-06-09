<?php

    $conexion = new mysqli("localhost","root","","newshub","3308"); //Host, usuario, contraseña, base de datos, puerto
    $conexion -> set_charset("utf8");

    if(!$conexion){
        die("No se pudo realizar la conexion: " .mysqli_connect_error());
    }
?>