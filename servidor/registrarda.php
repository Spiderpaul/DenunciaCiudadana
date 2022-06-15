<?php
    include 'conexion.php';
    
    //Para obtener zona horaria. 
    date_default_timezone_set('America/Mazatlan');

    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");  


    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia anonima` (asunto, descripcion, fecha) VALUES (?,?,?)");
            $stmt->bindParam(1,$asunto);
            $stmt->bindParam(2,$descripcion);
            $stmt->bindParam(3,$fecha);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            header("location: ../danonima.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>