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
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");

    if(isset($_FILES['evidencia']['name'])){
        $nombreArchivo = $_FILES['evidencia']['name'];
        $archivo = file_get_contents($_FILES['evidencia']['tmp_name']);
    } else {
        $archivo = null;
    }

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia ciudadana` 
            (nombre, edad, sexo, telefono, correo, direccion, asunto, descripcion, fecha, tipo_denuncia, evidencia, nombre_evidencia) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$edad);
            $stmt->bindParam(3,$sexo);
            $stmt->bindParam(4,$telefono);
            $stmt->bindParam(5,$correo);
            $stmt->bindParam(6,$direccion);
            $stmt->bindParam(7,$asunto);
            $stmt->bindParam(8,$descripcion);
            $stmt->bindParam(9,$fecha);
            $stmt->bindParam(10,$tipo);
            $stmt->bindParam(11,$archivo);
            $stmt->bindParam(12,$nombreArchivo);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            //header("location: ../dciudadana.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>