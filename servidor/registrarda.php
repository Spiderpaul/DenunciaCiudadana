<?php
    include 'conexion.php';
    
    //Para obtener zona horaria. 
    date_default_timezone_set('America/Mazatlan');

    $asunto = $_POST['asunto'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");  

    //Para guardar la imagen en una variable
    /*
    if(isset($_FILES['evidencia']['name'])){
        $peso = $_FILES['evidencia']['size'];
        $archivoSubido = fopen($_FILES['evidencia']['tmp_name'],'r');
        $archivo = fread($archivoSubido, $peso);
    } else {
        $archivo = null;
    }
    */

    if(isset($_FILES['evidencia']['name'])){
        $nombreArchivo = $_FILES['evidencia']['name'];
        $archivo = file_get_contents($_FILES['evidencia']['tmp_name']);
    } else {
        $archivo = null;
    }

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia anonima` (asunto, descripcion, fecha, tipo_denuncia, evidencia, nombre_evidencia) 
            VALUES (?,?,?,?,?,?)");
            $stmt->bindParam(1,$asunto);
            $stmt->bindParam(2,$descripcion);
            $stmt->bindParam(3,$fecha);
            $stmt->bindParam(4,$tipo);
            $stmt->bindParam(5,$archivo);
            $stmt->bindParam(6,$nombreArchivo);
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