<?php
    session_start();
    session_destroy();
    header("Location: ../src/iniSesion.php");
?>