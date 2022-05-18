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
    
    echo $idUsuario;
    echo $nombre;
    echo $edad;
    echo $sexo;
    echo $telefono;
    echo $correo;
    echo $direccion;
    echo $area;
    echo $clave;
    echo $rol;

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
            //echo "Contraseña con formato correcto<br><br>";

            if($dbh!=null){  //Si hay una conexión esté establecida.
        
                
                //Se realiza el registro con sentencias preparadas.
                $stmt = $dbh-> prepare("UPDATE `servidor publico` 
                SET nombre = ?, edad = ?, sexo = ?, telefono = ?, 
                correo = ?, direccion = ?, area = ?, clave = ?, rol_usuario = ? 
                WHERE id_usuario = ?");
                $stmt->bindParam(1,$nombre);
                $stmt->bindParam(2,$edad);
                $stmt->bindParam(3,$sexo);
                $stmt->bindParam(4,$telefono);
                $stmt->bindParam(5,$correo);
                $stmt->bindParam(6,$direccion);
                $stmt->bindParam(7,$area);
                $stmt->bindParam(8,$clave);
                $stmt->bindParam(9,$rol);
                $stmt->bindParam(10,$idUsuario);
                $stmt->execute();
                    
                $dbh=null; //Para cerrar la conexión a base de datos. 

                    header("location: ../usuarios.php");
                } else{
                echo "Error al conectar con la base de datos";
                header("location: ../usuarios.php");
            }
        }else{
            echo "La contraseña no tiene el formato adecuado<br>";
            echo "Debe contener:<br>";
            echo "    Mínimo 8 caracteres <br>    Números <br>Letras <br>    Un caracter especial";
            header("location: ../usuarios.php");
        }
    }else{
        echo "La confirmación de contraseña no coincide con la contraseña.";
        header("location: ../usuarios.php");
    }
    }
?>