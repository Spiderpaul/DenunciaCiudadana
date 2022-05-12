<?php
    include 'conexion.php';
    
    session_start();

    /*if(isset($_GET['id'])){
        $idUsuario = $_GET['id'];
    }else{
        $idUsuario = "";
    }*/

    $idUsuario = $_SESSION['id_usuario'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia servidor publico` (id_usuario, asunto, descripcion) 
            VALUES (?,?,?)");
            $stmt->bindParam(1,$idUsuario);
            $stmt->bindParam(2,$asunto);
            $stmt->bindParam(3,$descripcion);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            header("location: ../dciudadanas.php");
                
    }else{
        echo "Error al conectar con la base de datos";
        header("location: ../dciudadanas.php");
    }
?>