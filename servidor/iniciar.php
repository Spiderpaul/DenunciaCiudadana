<?php
    include "conexion.php";
    session_start();
    $idUsuario = $_POST['identificativo'];
    $clave = $_POST['clave'];
  
    try{
    //Código para validar captcha. 
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    //Guardamos la clave secreta en una variable
    $secretKey = "6LdyP_ofAAAAAA2f6GpUqQRRgbeiRl0mDTwgEvCx";

    $peticion = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip";
    $respuesta = file_get_contents($peticion);

    $atributos = json_decode($respuesta, TRUE);
    } catch (Exception $e){
        echo '<script language="javascript">
                alert("Hubo un problema con la validación del Captcha");
                window.history.back();
                </script>';
    }

    if($atributos['success']){
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
                        if($cont == 0){
                            echo '<script language="javascript">
                                alert("Identificativo o Contraseña incorrectos");
                                window.history.back();
                                </script>';
                        }
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
                header("location: ../index.php");

            } 
        }
    } else {
        echo '<script language="javascript">
        alert("No ha verificado el captcha");
        window.history.back();
        </script>';

       /* echo '<script language="javascript">
        var respuesta = confirm("No ha verificado el captcha");
        if(respuesta){
            location.href="../iniciarsesion.php";
        }else{
            location.href="../iniciarsesion.php";
        }
        </script>';*/
    }   

?>