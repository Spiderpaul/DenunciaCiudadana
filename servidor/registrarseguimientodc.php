<?php
    include 'conexion.php';
    session_start();
    
    $sesionAsesor = $_SESSION['id_usuario'];
    $idDenuncia = $_POST['id'];
    $estatus = $_POST['estatus'];
    $nota = $_POST['nota'];
  
    if($dbh!=null){  //Si hay una conexión esté establecida.
         

        try{

            $stmt = $dbh->prepare("SELECT id_usuario FROM administrador WHERE id_usuario = ?");
            $stmt->bindParam(1,$sesionAsesor);
            $stmt->execute();
            $cont = $stmt->rowCount(); //Cuenta el número de filas con datos.   

            if($cont == 0) {

                //Se realiza el registro con sentencias preparadas.
                $stmt = $dbh-> prepare("UPDATE `estatus de denuncia` 
                SET id_asesor = ?, estatus = ?, nota = ? 
                WHERE id_denuncia_c = ?");
                $stmt->bindParam(1,$sesionAsesor);
                $stmt->bindParam(2,$estatus);
                $stmt->bindParam(3,$nota);
                $stmt->bindParam(4,$idDenuncia);
                $stmt->execute();

                $dbh=null; //Para cerrar la conexión a base de datos. 

                echo '<script language="javascript">
                    alert("Se ha realizado la modificación con éxito");
                    location.href="../seguimientodc.php";
                    </script>';
            }

            //Se realiza el registro con sentencias preparadas.
            $stmt = $dbh-> prepare("UPDATE `estatus de denuncia` 
            SET id_administrador = ?, estatus = ?, nota = ? 
            WHERE id_denuncia_c = ?");
            $stmt->bindParam(1,$sesionAsesor);
            $stmt->bindParam(2,$estatus);
            $stmt->bindParam(3,$nota);
            $stmt->bindParam(4,$idDenuncia);
            $stmt->execute();
                
            $dbh=null; //Para cerrar la conexión a base de datos. 

            echo '<script language="javascript">
                alert("Se ha realizado la modificación con éxito");
                location.href="../seguimientodc.php";
                </script>';
        } catch (PDOException $e){
            echo '<script language="javascript">
                    alert("Se ha detectado un error al conectar a la base de datos");
                    window.history.back();
                    </script>';
        }

        
    } else{
        echo '<script language="javascript">
            alert("Error al conectar la base de datos");
            window.history.back();
            </script>';
    }
