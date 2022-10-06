<?php
    include 'conexion.php';
    
    //Para definir zona horaria. 
    date_default_timezone_set('America/Mazatlan');

    $nombreCapturado = $_POST['nombre'];
    $nombreMinusculas = strtolower($nombreCapturado); //Convertir string en minúsculas.
    $nombre = ucwords($nombreMinusculas);              //Agregar inicial en mayúscula.

    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $asunto = $_POST['asunto'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $fecha = date("Y-m-d H:i:s");
    $etiqueta = "DC";
    $estatus = "En espera";

    if($_FILES['evidencia']['name']!=""){  //Si existe archivo
        $nombreArchivo = $_FILES['evidencia']['name'];
        $archivoTemporal = $_FILES['evidencia']['tmp_name'];

            //Se obtiene la extensión del documento
        $tipoArchivo = explode("/", $_FILES['evidencia']['type']);
        $extension = end($tipoArchivo);

            //Se obtiene el nombre sin extensión del documento
        $inicioNombre = explode(".", $_FILES['evidencia']['name'], 2);

            //Se obtiene un número random
        $random = rand(9999,9999999);

        if(strlen($inicioNombre[0]) > 60){
            $nombreCorto = substr($inicioNombre[0], 0, 60);
            $nombreFinal = $nombreCorto."_".$random.".".$extension;
            $ruta = "../documentos/".$nombreFinal;
        }else{
            $nombreFinal = $inicioNombre[0]."_".$random.".".$extension;
            $ruta = "../documentos/".$nombreFinal;
        }

    } else {
        $nombreFinal = "";
        $archivo = null;
    }

    if($dbh!=null){  //Si hay una conexión esté establecida.
        
        try{
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
    

            //Mover archivo temporal a carpeta
            move_uploaded_file($archivoTemporal, $ruta);

            $stmt = $dbh-> prepare("INSERT INTO `denuncia ciudadana` 
            (id_denuncia, nombre, edad, sexo, telefono, correo, direccion, asunto, descripcion, fecha, tipo_denuncia, nombre_evidencia, etiqueta) 
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
            $stmt->bindParam(12,$nombreFinal);
            $stmt->bindParam(13,$etiqueta);
            $stmt->execute();
                 
            
            $stmt2 = $dbh-> prepare("INSERT INTO `estatus de denuncia` (id_denuncia_c, estatus) VALUES (?,?)");
            $stmt2->bindParam(1,$id);
            $stmt2->bindParam(2,$estatus);
            $stmt2->execute();

            $dbh=null; //Para cerrar la conexión a base de datos. 

            /*echo '<script language="javascript">
            var respuesta = confirm("Clave para dar ver estatus de la denuncia: '.$id.'");
            if(respuesta){
                location.href="../dciudadana.php";
            }else{
                location.href="../dciudadana.php";
            }
            </script>';*/

            //header("location: ../dciudadana.php");

            echo '<script language="javascript">
                alert("Guarde su identificativo de denuncia para darle seguimiento.\n\n     Su identificativo de denuncia es: '.$id.' ");
                location.href="../dciudadana.php";
                </script>';

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
