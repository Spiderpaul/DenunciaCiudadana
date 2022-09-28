<?php
include "conexion.php";
session_start();
$idUsuario = $_POST['identificativo'];
$clave = $_POST['clave'];

try {
    //Código para validar captcha. 
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    //Guardamos la clave secreta en una variable
    $secretKey = "6LdyP_ofAAAAAA2f6GpUqQRRgbeiRl0mDTwgEvCx";

    $peticion = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip";
    $respuesta = file_get_contents($peticion);

    $atributos = json_decode($respuesta, TRUE);
} catch (Exception $e) {
    echo '<script language="javascript">
                alert("Hubo un problema con la validación del Captcha");
                window.history.back();
                </script>';
}

if ($atributos['success']) {

    if ($dbh != null) {  //Si la conexión existe.

        try {
            $stmt = $dbh->prepare("SELECT id_usuario, nombre, clave, rol_usuario FROM `servidor publico` WHERE id_usuario = ?");
            $stmt->bindParam(1, $idUsuario);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->execute();

            $datos = $stmt->fetch();

            $cont = $stmt->rowCount();


            //Verifica si la contraseña coincide (desencripta la contreña).
            if ($cont != 0 && !password_verify($clave, $datos['clave'])) {
                $dbh = null;             //Cierra la conexión a base de datos.
                session_destroy();     //Cierra la sesión del usuario. 
                echo '<script language="javascript">
                            alert("Usuario o contraseña incorrecta.");
                            window.history.back();
                            </script>';
            } else {
                if ($cont == 0) {  //Para inicio de sesión como asesor.
                    $stmt = $dbh->prepare("SELECT id_asesor, nombre, rol_usuario FROM asesor WHERE id_asesor = ? AND clave = ?");
                    $stmt->bindParam(1, $idUsuario);
                    $stmt->bindParam(2, $clave);

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    $stmt->execute();

                    $datos = $stmt->fetch();

                    $cont = $stmt->rowCount();

                    if ($cont == 0) {  //Para inicio de sesión como administrador.
                        $stmt = $dbh->prepare("SELECT id_usuario, nombre, rol_usuario FROM administrador WHERE id_usuario = ? AND clave = ?");
                        $stmt->bindParam(1, $idUsuario);
                        $stmt->bindParam(2, $clave);

                        $stmt->setFetchMode(PDO::FETCH_ASSOC);

                        $stmt->execute();

                        $datos = $stmt->fetch();

                        $cont = $stmt->rowCount();

                        if ($cont == 0) {
                            echo '<script language="javascript">
                                        alert("Identificativo o Contraseña incorrectos");
                                        window.history.back();
                                        </script>';
                        }
                    } 
                }
                if (isset($datos['id_usuario']) || isset($datos['id_asesor'])) { //Si existe el usuario. 
                    session_regenerate_id(true);
                    if (isset($datos['id_usuario'])) {
                        $_SESSION['id_usuario'] = $datos['id_usuario']; //Se agregan los datos a las variables de sesion. 
                    } else if (isset($datos['id_asesor'])) {
                        $_SESSION['id_usuario'] = $datos['id_asesor'];
                    }

                    $_SESSION['nombre_usuario'] = $datos['nombre'];

                    if ($datos['rol_usuario'] == "3") {
                        $_SESSION['rol_usuario'] = "Servidor";
                        $_SESSION['date'] = date("Y-n-j H:i:s");
                    } else if ($datos['rol_usuario'] == "2") {
                        $_SESSION['rol_usuario'] = "Asesor";
                        $_SESSION['date'] = date("Y-n-j H:i:s");
                    } else {
                        $_SESSION['rol_usuario'] = "Administrador";
                        $_SESSION['date'] = date("Y-n-j H:i:s");
                    }
                    header("location: ../index.php");
                }
            }
        } catch (PDOException $e) {
            echo '<script language="javascript">
                        alert("Se ha detectado un error al conectar a la base de datos");
                        window.history.back();
                        </script>';
        }
    }
} else {
    echo '<script language="javascript">
        alert("No ha verificado el captcha");
        window.history.back();
        </script>';
}
