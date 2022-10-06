<?php
    include 'conexion.php';
    session_start();
    
    $sesionAsesor = $_SESSION['id_usuario'];
    $cambioAsesor = null;
    $idDenuncia = $_POST['id'];
    $estatus = $_POST['estatus'];
    $nota = $_POST['nota'];
    $rol = $_SESSION['rol_usuario'];

  
    if($dbh!=null){  //Si hay una conexión esté establecida.
         

        try{

            if($rol == "Asesor") {

                //Se realiza el registro con sentencias preparadas.
                $stmt = $dbh-> prepare("UPDATE `estatus de denuncia` 
                SET id_asesor = ?, id_administrador = ?, estatus = ?, nota = ? 
                WHERE id_denuncia_c = ?;");
                $stmt->bindParam(1,$sesionAsesor);
                $stmt->bindParam(2,$cambioAsesor);
                $stmt->bindParam(3,$estatus);
                $stmt->bindParam(4,$nota);
                $stmt->bindParam(5,$idDenuncia);
                $stmt->execute();

                $dbh=null; //Para cerrar la conexión a base de datos. 

                echo '<script language="javascript">
                    alert("Se ha realizado la modificación con éxito");
                    location.href="../seguimientodc.php";
                    </script>';

            } else if ($rol == "Administrador"){
                
                //Se realiza el registro con sentencias preparadas.
                $stmt = $dbh-> prepare("UPDATE `estatus de denuncia` 
                SET id_asesor = ?, id_administrador = ?, estatus = ?, nota = ? 
                WHERE id_denuncia_c = ?;");
                $stmt->bindParam(1,$cambioAsesor);
                $stmt->bindParam(2,$sesionAsesor);
                $stmt->bindParam(3,$estatus);
                $stmt->bindParam(4,$nota);
                $stmt->bindParam(5,$idDenuncia);
                $stmt->execute();
                    
                $dbh=null; //Para cerrar la conexión a base de datos. 
    
                echo '<script language="javascript">
                    alert("Se ha realizado la modificación con éxito");
                    location.href="../seguimientodc.php";
                    </script>';
            }
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
