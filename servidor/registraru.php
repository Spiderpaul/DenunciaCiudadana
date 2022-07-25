<?php
    include 'conexion.php';
    
    
    $nombreCapturado = $_POST['nombre'];
    $nombreMinusculas = strtolower($nombreCapturado); //Para dar formato a nombre. 
    $nombre = ucwords($nombreMinusculas);

    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];

    $correoCapturado = $_POST['correo'];
    $correoMinusculas = strtolower($correoCapturado); //Para dar formato a correo.
    $correo = ucwords($correoMinusculas);

    $direccion = $_POST['direccion'];
    $idUsuario = $_POST['identificativo'];
    $area = $_POST['area'];
    $clave = $_POST['clave'];
    $confirmar = $_POST['confirmar'];
    $rol = "3";

    echo $idUsuario;

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
        //Para verificar que la contraseña se confirme.
        if($clave == $confirmar){

            //Si la contraseña contiene mayusculas, minusculas, numeros, caracteres especiales y minimo 8 digitos. 
            if((preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $clave))){

                if($dbh!=null){  //Si hay una conexión esté establecida.
                    
                    $stmt = $dbh->prepare("SELECT id_usuario FROM administrador WHERE id_usuario = ?");
                    $stmt->bindParam(1,$idUsuario);
                    $stmt->execute();
                    $cont = $stmt->rowCount(); //Cuenta el número de filas con datos. 

                    if($cont == 0){

                        $stmt = $dbh->prepare("SELECT id_asesor FROM asesor WHERE id_asesor = ?");
                        $stmt->bindParam(1,$idUsuario);
                        $stmt->execute();
                        $cont = $stmt->rowCount(); //Cuenta el número de filas con datos. 

                        if($cont == 0){

                            //Para evitar que se repita el identificativo de usuario usando sentencias preparadas.
                            $stmt = $dbh->prepare("SELECT id_usuario FROM `servidor publico` WHERE id_usuario = ?");
                            $stmt->bindParam(1,$idUsuario);
                            $stmt->execute();
                            $cont = $stmt->rowCount(); //Cuenta el número de filas con datos. 

                            if($cont == 0){ //Si no hay filas con el identificativo de usuario. 
                                //Se realiza el registro con sentencias preparadas.
                                $stmt = $dbh-> prepare("INSERT INTO `servidor publico` (id_usuario, nombre, edad, sexo, telefono, correo, direccion, area, clave, rol_usuario) VALUES (?,?,?,?,?,?,?,?,?,?)");
                                $stmt->bindParam(1,$idUsuario);
                                $stmt->bindParam(2,$nombre);
                                $stmt->bindParam(3,$edad);
                                $stmt->bindParam(4,$sexo);
                                $stmt->bindParam(5,$telefono);
                                $stmt->bindParam(6,$correo);
                                $stmt->bindParam(7,$direccion);
                                $stmt->bindParam(8,$area);
                                $stmt->bindParam(9,$clave);
                                $stmt->bindParam(10,$rol);
                                $stmt->execute();
                                
                                $dbh=null; //Para cerrar la conexión a base de datos. 

                                echo '<script language="javascript">
                                    alert("Registro realizado con éxito");
                                    location.href="../registrarusuario.php";
                                    </script>';

                            }else{
                                $dbh=null; //Para cerrar la conexión a base de datos. 
                                echo '<script language="javascript">
                                    alert("El identificativo de usuario ya existe");
                                    window.history.back();
                                    </script>';
                            }
                        } else{
                            $dbh=null; //Para cerrar la conexión a base de datos. 
                            echo '<script language="javascript">
                                alert("El identificativo de usuario ya existe");
                                window.history.back();
                                </script>';
                        }
                    } else{
                        $dbh=null; //Para cerrar la conexión a base de datos. 
                        echo '<script language="javascript">
                            alert("El identificativo de usuario ya existe");
                            window.history.back();
                            </script>';
                    }
                }else{
                    echo '<script language="javascript">
                        alert("Error al conectar a la base de datos");
                        window.history.back();
                        </script>';
                }
            }else{
                echo '<script language="javascript">
                    alert("La contraseña no contiene los caracteres correctos");
                    window.history.back();
                    </script>';
            }
        }else{
            echo '<script language="javascript">
                alert("La contraseña no coincide");
                window.history.back();
                </script>';
        }
    } else {
        echo '<script language="javascript">
                alert("No ha verificado el captcha");
                window.history.back();
                </script>';
    }   
    
?>