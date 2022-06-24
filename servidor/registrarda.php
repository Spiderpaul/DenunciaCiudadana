<?php
    include 'conexion.php';
    
    //Para obtener zona horaria. 
    date_default_timezone_set('America/Mazatlan');

    $caracteres = "abcdefghijklmnopkrstuvwxyz0123456789";

    //substr para limitar el número de caracteres.
    //str_shuffle para cambiar la posición de los caracteres. 
    $id = substr(str_shuffle($caracteres), 0, 6);
    

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

    if($_FILES['evidencia']['name']!=""){
        $nombreArchivo = $_FILES['evidencia']['name'];
        $archivo = file_get_contents($_FILES['evidencia']['tmp_name']);
    } else {
        $nombreArchivo = "";
        $archivo = null;
    }

    if($dbh!=null){  //Si hay una conexión esté establecida.
                
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia anonima` 
            (id_denuncia, asunto, descripcion, fecha, tipo_denuncia, evidencia, nombre_evidencia) 
            VALUES (?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$asunto);
            $stmt->bindParam(3,$descripcion);
            $stmt->bindParam(4,$fecha);
            $stmt->bindParam(5,$tipo);
            $stmt->bindParam(6,$archivo);
            $stmt->bindParam(7,$nombreArchivo);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            echo '<script language="javascript">
                var respuesta = confirm("Clave para dar ver estatus de la denuncia: '.$id.'");
                if(respuesta){
                    location.href="../danonima.php";
                }else{
                    location.href="../danonima.php";
                }
                </script>';

            //header("location: ../danonima.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>