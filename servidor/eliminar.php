<?php
    include ("conexion.php");
    session_start();

    if(isset($_GET['id'])){
        $idUsuario = $_GET['id'];
    }else{
        $idUsuario = "";
    }


    if($dbh!=null){  //Si la conexión existe.
        //Para inicio de sesion como servidor público.
        $stmt = $dbh->prepare("DELETE FROM `servidor publico` WHERE id_usuario = ?");
        $stmt->bindParam(1, $idUsuario);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
    }

    if($_SESSION['rol_usuario'] =="Administrador"){
        header("location: ../usuarios.php");
        
    }else{
        header("location: ../index.php");
    }
?>