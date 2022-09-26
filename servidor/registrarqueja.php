<?php
    include 'conexion.php';
    
    //Para obtener zona horaria. 
    date_default_timezone_set('America/Mazatlan');  

    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");  


    if($dbh!=null){  //Si hay una conexión esté establecida.
          
        try{
            $stmt = $dbh-> prepare("INSERT INTO `buzon quejas` (asunto, descripcion, fecha) 
            VALUES (?,?,?)");
            $stmt->bindParam(1,$asunto);
            $stmt->bindParam(2,$descripcion);
            $stmt->bindParam(3,$fecha);
            $stmt->execute();

            $dbh=null; //Para cerrar la conexión a base de datos. 

                echo '<script language="javascript">
                    alert("Su queja ha sido registrada, le agradecemos su tiempo.");
                    window.history.back();
                    </script>';

            //header("location: ../identificativo.php");

        }catch(PDOException $e){
            echo '<script language="javascript">
                    alert("Se ha detectado un error al conectar a la base de datos");
                    window.history.back();
                    </script>';
        }
        
        
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
