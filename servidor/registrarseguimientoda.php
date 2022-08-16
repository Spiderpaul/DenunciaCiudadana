<?php
    include 'conexion.php';
    
    
    $nombre = $_POST['nombre'];
    $estatus = $_POST['estatus'];
    $nota = $_POST['nota'];
    
  
    if($dbh!=null){  //Si hay una conexión esté establecida.
         
        //Se realiza el registro con sentencias preparadas.
        $stmt = $dbh-> prepare("UPDATE `servidor publico` 
        SET nombre = ?, edad = ?, sexo = ?, telefono = ?, 
        correo = ?, direccion = ?, area = ?, clave = ?, rol_usuario = ? 
        WHERE id_usuario = ?");
        $stmt->bindParam(1,$nombre);
        $stmt->bindParam(2,$edad);
        $stmt->bindParam(3,$sexo);
        $stmt->bindParam(4,$telefono);
        $stmt->bindParam(5,$correo);
        $stmt->bindParam(6,$direccion);
        $stmt->bindParam(7,$area);
        $stmt->bindParam(8,$clave);
        $stmt->bindParam(9,$rol);
        $stmt->bindParam(10,$idUsuario);
        $stmt->execute();
            
        $dbh=null; //Para cerrar la conexión a base de datos. 

        echo '<script language="javascript">
            alert("Se ha realizado la modificación con éxito");
            location.href="../usuarios.php";
            </script>';
        } else{
            echo '<script language="javascript">
                alert("Error al conectar la base de datos");
                window.history.back();
                </script>';
    }
             
?>