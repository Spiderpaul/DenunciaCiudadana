<?php
    include 'conexion.php';
    session_start();
    
    $sesionAsesor = $_SESSION['id_usuario'];
    $idDenuncia = $_POST['id'];
    $estatus = $_POST['estatus'];
    $nota = $_POST['nota'];
    
    echo $idDenuncia;
  
    if($dbh!=null){  //Si hay una conexión esté establecida.
         
        //Se realiza el registro con sentencias preparadas.
        $stmt = $dbh-> prepare("UPDATE `estatus de denuncia` 
        SET id_asesor = ?, estatus = ?, nota = ? 
        WHERE id_denuncia_a = ?");
        $stmt->bindParam(1,$sesionAsesor);
        $stmt->bindParam(2,$estatus);
        $stmt->bindParam(3,$nota);
        $stmt->bindParam(4,$idDenuncia);
        $stmt->execute();
            
        $dbh=null; //Para cerrar la conexión a base de datos. 

        /*echo '<script language="javascript">
            alert("Se ha realizado la modificación con éxito");
            location.href="../usuarios.php";
            </script>';*/
        } else{
            echo '<script language="javascript">
                alert("Error al conectar la base de datos");
                window.history.back();
                </script>';
    }
             
?>