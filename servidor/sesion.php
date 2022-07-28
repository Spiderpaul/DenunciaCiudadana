<?php 
    include 'conexion.php';

    session_start();


    if(isset($_SESSION['id_usuario'])){ //Destruir sesión después de tiempo de inactividad.
        $horaInicio = $_SESSION["date"];
        $horaActual = date("Y-n-j H:i:s");
        $tiempoActivo = (strtotime($horaActual)-strtotime($horaInicio));

        if($tiempoActivo >= 60){
            session_destroy();
            $dbh=null;
            /*echo '<script language="javascript">
                    alert("Su sesión ha caducado, debe iniciar sesión de nuevo.");
                    location.href="../iniciarsesion.php";
                    </script>';*/
            
            header("Location:iniciarsesion.php");
            
            
        }else {
            $_SESSION["date"] = $horaActual;
        }
    }

    /*
        
        <html>
            <script>
                    //Para cerrar sesión si se cierra el navegador.
                //win.odownbeforeunload = function(){
                window.addEventListener('beforeunload', function (e) {
                    e.preventDefault();
                    e.returnValue = '
                        <?php if(isset($_SESSION["id_usuario"])){
                        session_destroy(); 
                        $dbh=null;
                        }?>';      
                });
            </script>
        </html>

    */
?>

