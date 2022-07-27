<?php
    include 'conexion.php';

    session_start();
    session_destroy();
    $dbh=null;

    header("location: ../index.php");
?>