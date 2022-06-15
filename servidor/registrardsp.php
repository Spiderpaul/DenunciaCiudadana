<?php
    include 'conexion.php';
    
    session_start();

    /*if(isset($_GET['id'])){
        $idUsuario = $_GET['id'];
    }else{
        $idUsuario = "";
    }*/

    date_default_timezone_set('America/Mazatlan');

    $idUsuario = $_SESSION['id_usuario'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");
    

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia servidor publico` (id_usuario, asunto, descripcion, fecha) 
            VALUES (?,?,?,?)");
            $stmt->bindParam(1,$idUsuario);
            $stmt->bindParam(2,$asunto);
            $stmt->bindParam(3,$descripcion);
            $stmt->bindParam(4,$fecha);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            header("location: ../dciudadanas.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>