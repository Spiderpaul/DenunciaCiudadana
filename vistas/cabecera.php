<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncia Ciudadana</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!------------------Menú de inicio---------------------------->
    <div class="contenedor-menu">
        <div class="menu1">
            <nav class="barra-menu1">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <span class="material-symbols-outlined">menu</span>
                </label>
                <ul class="izquierdo">
                    <li><a href="index.php">Inicio</a></li>
                    
                    <?php 
                        if(!isset($_SESSION['rol_usuario'])){
                    ?>

                        <li><a href="dciudadana.php">Denuncia ciudadana</a></li>
                        <li><a href="danonima.php">Denuncia anónima</a></li>
                        <li><a href="estatusd.php">Estatus de denuncia</a></li>
                        
                    <?php 
                        } else if($_SESSION['rol_usuario']=="Servidor"){  //Si no...
                    ?>
                        
                        <li><a href="dciudadanas.php">Denuncia ciudadana</a></li>
                        <li><a href="estatusd.php">Estatus de denuncia</a></li>                        

                    <?php 
                        }
                    ?>

                </ul>
            </nav>
        </div>
        <div class="menu2">
            <nav class="barra-menu2">
                <ul class="derecho">
                    <?php 
                        if(!isset($_SESSION['rol_usuario'])){ 
                    ?>
                        <li><a href="registrarusuario.php">Crear cuenta</a></li>
                        <li><a href="iniciarsesion.php">Iniciar sesión</a></li>                

                    <?php 
                        }else if($_SESSION['rol_usuario']=="Servidor"){ 
                    ?>
                        
                        <li><a href="../perfil.php">Perfil</a></li>
                        <li><a href="servidor/cerrar.php">Cerrar sesión</a></li>

                    <?php 
                        }
                    ?>

                </ul>
            </nav>
        </div>
    </div>

    <div class="contenedor-cuerpo">
