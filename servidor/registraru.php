<?php
    include 'conexion.php';
    
    
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    
    $idUsuario = $_POST['identificativo'];
    $area = $_POST['area'];
    $clave = $_POST['clave'];
    $confirmar = $_POST['confirmar'];
    $rol = "3";
    

    //Código para validar captcha. 
    $ip = $_SERVER['REMOTE_ADOR'];
    $captcha = $_POST['g-recaptcha-response'];
    //Guardamos la clave secreta en una variable
    $secretKey = "6LdyP_ofAAAAAA2f6GpUqQRRgbeiRl0mDTwgEvCx";

    $peticion = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip";
    $respuesta = file_get_contents($peticion);

    $atributos = json_decode($respuesta, TRUE);

    if($atributos['success']){  //Si el captcha es correcto.

    //Para verificar que la contraseña se confirme.
    if($clave == $confirmar){

        //Si la contraseña contiene mayusculas, minusculas, numeros, caracteres especiales y minimo 8 digitos. 
        if((preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $clave))){
            echo "Contraseña con formato correcto<br><br>";

            if($dbh!=null){  //Si hay una conexión esté establecida.
                
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

                    header("location: ../index.php");
                }else{
                    echo "El id del usuario ya existe";
                    $dbh=null; //Para cerrar la conexión a base de datos. 
                    header("location: ../registrarusuario.php");
                }
                
            }else{
                echo "Error al conectar con la base de datos";
                header("location: ../registrarusuario.php");
            }
        }else{
            echo "La contraseña no tiene el formato adecuado<br>";
            echo "Debe contener:<br>";
            echo "    Mínimo 8 caracteres <br>    Números <br>Letras <br>    Un caracter especial";
            header("location: ../registrarusuario.php");
        }
    }else{
        echo "La confirmación de contraseña no coincide con la contraseña.";
        header("location: ../registrarusuario.php");
    }
    }
?>