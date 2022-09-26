<?php
    include 'conexion.php';
    session_start();
    session_destroy();
    
    try{
        
        $dbh=null;

    }catch(PDOException $e){
        echo '<script language="javascript">
                alert("Se ha detectado un error al conectar a la base de datos");
                window.history.back();
                </script>';
    }
    

    header("location: ../index.php");
