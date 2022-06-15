<?php
    include 'conexion.php';
    
    //Para obtener zona horaria. 
    date_default_timezone_set('America/Mazatlan');

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");
    

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia ciudadana` (nombre, edad, sexo, telefono, correo, direccion, asunto, descripcion, fecha) 
            VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$edad);
            $stmt->bindParam(3,$sexo);
            $stmt->bindParam(4,$telefono);
            $stmt->bindParam(5,$correo);
            $stmt->bindParam(6,$direccion);
            $stmt->bindParam(7,$asunto);
            $stmt->bindParam(8,$descripcion);
            $stmt->bindParam(9,$fecha);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            header("location: ../dciudadana.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>