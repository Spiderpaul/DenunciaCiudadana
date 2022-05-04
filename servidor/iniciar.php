<?php
    include "conexion.php";
    session_start();
    $idUsuario = $_POST['identificativo'];
    $clave = $_POST['clave'];

    /*
    //Código agregado para validación del Captcha.
    //Para obtener la IP.
    $ip = $_SERVER['REMOTE_ADOR'];
    $captcha = $_POST['g-recaptcha-response'];
    //Guardamos la clave secreta en una variable
    $secretKey = "6LdHqwofAAAAAI2o1Pni7guI08Ag_JOUKl3DgQ2n";

    //Guardando los parametros POST para validación en variable para después realizar la validación. 
    $peticion = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip";
    $respuesta = file_get_contents($peticion);

    $atributos = json_decode($respuesta, TRUE);
    

    if($atributos['success']){*/
        if($dbh!=null){  //Si la conexión existe.
            //Para inicio de sesion como servidor público.
            $stmt = $dbh->prepare("SELECT id_usuario, nombre, rol_usuario FROM `servidor publico` WHERE id_usuario = ? AND clave = ?");
            $stmt->bindParam(1, $idUsuario);
            $stmt->bindParam(2, $clave);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->execute();

            $datos = $stmt->fetch(); 
            
            $cont = $stmt->rowCount(); 

                if($cont == 0){  //Para inicio de sesión como asesor.
                    $stmt = $dbh->prepare("SELECT id_usuario, nombre, rol_usuario FROM asesor WHERE id_usuario = ? AND clave = ?");
                    $stmt->bindParam(1, $idUsuario);
                    $stmt->bindParam(2, $clave);

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    $stmt->execute();

                    $datos = $stmt->fetch(); 
                    
                    $cont = $stmt->rowCount(); 

                    if($cont == 0){  //Para inicio de sesión como administrador.
                        $stmt = $dbh->prepare("SELECT id_usuario, nombre, rol_usuario FROM administrador WHERE id_usuario = ? AND clave = ?");
                        $stmt->bindParam(1, $idUsuario);
                        $stmt->bindParam(2, $clave);

                        $stmt->setFetchMode(PDO::FETCH_ASSOC);

                        $stmt->execute();

                        $datos = $stmt->fetch(); 
                    }
                }

            if($datos['id_usuario'] != null){ //Si existe el usuario. 
                $_SESSION['id_usuario']=$datos['id_usuario']; //Se agregan los datos a las variables de sesion. 
                $_SESSION['nombre_usuario']=$datos['nombre'];
                
                if($datos['rol_usuario']=="3"){
                    $_SESSION['rol_usuario']="Servidor";
                }else if($datos['rol_usuario']=="2"){
                    $_SESSION['rol_usuario']="Asesor";
                }else{
                    $_SESSION['rol_usuario']="Administrador";
                }
                
                //echo "<br>Bienvenido ". $_SESSION['rol_usuario'] ." ". $_SESSION['nombre_usuario'] .", ha iniciado sesión correctamente.";
                //echo '<META HTTP-EQUIV=" Refresh " CONTENT="1; ../index.php>';
                header("location: ../index.php");

            } else {
                echo "<br>El usuario o la contraseña son incorrectos.";
                echo '<META HTTP-EQUIV=" Refresh " CONTENT="1; ../iniciarsesion.php>';
            }
        }
    /*}else{
        echo "Debe verificar el Captcha";
        echo "<br><br><a href='../iniciar.html'>atras</a>";
    }*/

?>