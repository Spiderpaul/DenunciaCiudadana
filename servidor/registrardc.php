<?php
    include 'conexion.php';
    
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia ciudadana` (nombre, edad, sexo, telefono, correo, direccion, asunto, descripcion) 
            VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$edad);
            $stmt->bindParam(3,$sexo);
            $stmt->bindParam(4,$telefono);
            $stmt->bindParam(5,$correo);
            $stmt->bindParam(6,$direccion);
            $stmt->bindParam(7,$asunto);
            $stmt->bindParam(8,$descripcion);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            header("location: ../dciudadana.php");
                
    }else{
        echo "Error al conectar con la base de datos";
        header("location: ../registrarusuario.php");
    }
?>