<?php
    include 'conexion.php';
    
    
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
        

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia anonima` (asunto, descripcion) VALUES (?,?)");
            $stmt->bindParam(1,$asunto);
            $stmt->bindParam(2,$descripcion);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            header("location: ../danonima.php");
                
    }else{
        echo "Error al conectar con la base de datos";
        header("location: ../danonima.php");
    }
?>