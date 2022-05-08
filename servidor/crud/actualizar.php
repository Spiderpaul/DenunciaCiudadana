<?php
    include ("../conexion.php");
    session_start();

    if(isset($_GET['id'])){
        $idUsuario = $_GET['id'];
    }else{
        $idUsuario = "";
    }

    echo $idUsuario;

    
?>