<?php
    include 'conexion.php';
    
    session_start();

    /*if(isset($_GET['id'])){
        $idUsuario = $_GET['id'];
    }else{
        $idUsuario = "";
    }*/

    //Definiendo zona horaria.
    date_default_timezone_set('America/Mazatlan');
    
    //Para generar contraseña aleatoria.
    $caracteres = "abcdefghijklmnopkrstuvwxyz0123456789";
    $id = substr(str_shuffle($caracteres), 0, 6);

    $idUsuario = $_SESSION['id_usuario'];
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
                
        do{ 
            //Generar identificativo de denuncia automático.
            $caracteres = "abcdefghijklmnopkrstuvwxyz0123456789";
            $id = substr(str_shuffle($caracteres), 0, 6);

            //Consulta si existe el identificativo en la base de datos.
            $stmt = $dbh-> prepare("SELECT id_denuncia FROM `denuncia ciudadana` WHERE id_denuncia = ?");
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $cont1 = $stmt->rowCount(); //Cuenta el número de filas con datos. 
            
            $stmt = $dbh-> prepare("SELECT id_denuncia FROM `denuncia anonima` WHERE id_denuncia = ?");
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $cont2 = $stmt->rowCount(); //Cuenta el número de filas con datos. 
            
            $stmt = $dbh-> prepare("SELECT id_denuncia FROM `denuncia servidor publico` WHERE id_denuncia = ?");
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $cont3 = $stmt->rowCount(); //Cuenta el número de filas con datos. 
            
        }while($cont1!=0 && $cont2!=0 && $cont3!=0); //Mientras $cont sea diferente a cero, se repite.
        
            $stmt = $dbh-> prepare("INSERT INTO `denuncia servidor publico` 
            (id_denuncia, id_usuario, asunto, descripcion, fecha, tipo_denuncia, evidencia, nombre_evidencia) 
            VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$idUsuario);
            $stmt->bindParam(3,$asunto);
            $stmt->bindParam(4,$descripcion);
            $stmt->bindParam(5,$fecha);
            $stmt->bindParam(6,$tipo);
            $stmt->bindParam(7,$archivo);
            $stmt->bindParam(8,$nombreArchivo);
            $stmt->execute();
                    
            $dbh=null; //Para cerrar la conexión a base de datos. 

            echo '<script language="javascript">
                alert("Su denuncia se ha registrado con éxito");
                </script>';

            header("location: ../dciudadanas.php");
                
    }else{
        echo '<script language="javascript">
                alert("Error al conectar con la base de datos");
                window.history.back();
                </script>';
    }
?>