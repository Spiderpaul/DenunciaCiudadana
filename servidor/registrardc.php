<?php
    include 'conexion.php';
    
    //Para definir zona horaria. 
    date_default_timezone_set('America/Mazatlan');

    //Para generar contraseña aleatoria.
    $caracteres = "abcdefghijklmnopkrstuvwxyz0123456789";
    $id = substr(str_shuffle($caracteres), 0, 6);

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

    if($_FILES['evidencia']['name']!=""){
        $nombreArchivo = $_FILES['evidencia']['name'];
        $archivo = file_get_contents($_FILES['evidencia']['tmp_name']);
    } else {
        $nombreArchivo = "";
        $archivo = null;
    }

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia ciudadana` 
            (id_denuncia, nombre, edad, sexo, telefono, correo, direccion, asunto, descripcion, fecha, tipo_denuncia, evidencia, nombre_evidencia) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$nombre);
            $stmt->bindParam(3,$edad);
            $stmt->bindParam(4,$sexo);
            $stmt->bindParam(5,$telefono);
            $stmt->bindParam(6,$correo);
            $stmt->bindParam(7,$direccion);
            $stmt->bindParam(8,$asunto);
            $stmt->bindParam(9,$descripcion);
            $stmt->bindParam(10,$fecha);
            $stmt->bindParam(11,$tipo);
            $stmt->bindParam(12,$archivo);
            $stmt->bindParam(13,$nombreArchivo);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            echo '<script language="javascript">
            var respuesta = confirm("Clave para dar ver estatus de la denuncia: '.$id.'");
            if(respuesta){
                location.href="../dciudadana.php";
            }else{
                location.href="../dciudadana.php";
            }
            </script>';

            //header("location: ../dciudadana.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>