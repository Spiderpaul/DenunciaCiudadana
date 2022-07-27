<?php 
    include 'conexion.php';

    session_start();


    if(isset($_SESSION['id_usuario'])){ //Destruir sesión después de tiempo de inactividad.
        $horaInicio = $_SESSION["date"];
        $horaActual = date("Y-n-j H:i:s");
        $tiempoActivo = (strtotime($horaActual)-strtotime($horaInicio));

        if($tiempoActivo >= 900){
            session_destroy();
            echo '<script language="javascript">
                    alert("Su sesión ha caducado, debe iniciar sesión de nuevo.");
                    </script>';
            $dbh=null;
            header("Location:iniciarsesion.php");
            
            
        }else {
            $_SESSION["date"] = $horaActual;
        }
    }
?>