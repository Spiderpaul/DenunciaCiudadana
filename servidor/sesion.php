<?php 
    include 'conexion.php';
    
    session_start();

    if(isset($_SESSION['id_usuario'])){ //Destruir sesión después de tiempo de inactividad.
        $horaInicio = $_SESSION["date"];
        $horaActual = date("Y-n-j H:i:s");
        $tiempoActivo = (strtotime($horaActual)-strtotime($horaInicio));

        if($tiempoActivo >= 900){
            session_destroy();
            $dbh=null;
            
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
