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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        }else if($_SESSION['rol_usuario'] == "Servidor"){ 
                    ?>
                        
                        <li><a href="../perfil.php">Perfil</a></li>
                        <li><a href="servidor/cerrar.php">Cerrar sesión</a></li>

                    <?php 
                        }else if($_SESSION['rol_usuario'] != "Servidor"){
                    ?>
                        <li><a href="servidor/cerrar.php">Cerrar sesión</a></li>
                    <?php 
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    
    <div class="contenedor-cuerpo">

<div class="div-formulario">
    <div class="div-titulo">
        <p>Datos personales</p>
    </div>
    
    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/registraru.php" method="POST">

        <div class="div-form-p">
            <div class="control-form">
                <div class="control1-p">
                    <div class="div-nombre">
                        <p>Nombre</p>
                        <input type="text" class="form-control" name="nombre" id="form_nombre" 
                        placehorder="Ingrese su nombre completo" required>
                    </div>
                    <div class="div-edad">
                        <p>Edad</p>
                        <input type="text" class="form-control" name="edad" id="form_edad" required>
                    </div>
                    <div class="div-sexo">
                        <p>Sexo</p>
                        <select class="form-select" name="sexo" id="form_select">
                            <option value="I">Indefinido</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="control2-p">
                    <div class="control2-p-hijo">
                        <p>Teléfono</p>
                        <input type="text" class="form-control" name="telefono" id="form_telefono" required>
                    </div>
                    <div class="control2-p-hijo">
                        <p>Correo electrónico</p>
                        <input type="text" class="form-control" name="correo" id="form_correo" required>
                    </div>
                </div>
                <div class="control3-p">
                    <div class="control3-p-hijo">
                        <p>Dirección</p>
                        <input type="text" class="form-control" name="direccion" id="form_direccion" required>
                    </div>
                </div>
            </div>
        </div>

    <div class="div-titulo-d">
        <p>Datos laborales</p>
    </div>

    <div class="div-form-d">
        <div class="control-form">
            <div class="control1">
                <p>Identificativo</p>
                <input type="text" class="form-control" name="identificativo" id="form_identificativo" required>
            </div>
            <div class="control2">
                <p>Área de trabajo</p>
                <input type="text" class="form-control" name="area" id="form_area" required>    
            </div>
            <div class="control2">
                <p>Contraseña</p>
                <input type="password" class="form-control" name="clave" id="form_clave" required>    
            </div>
            <div class="control2">
                <p>Confirmar contraseña</p>
                <input type="password" class="form-control" name="confirmar" id="form_confirmar" required>    
            </div>
        </div>
    </div>

    <div class="boton-form">
            <button class="boton-registrar" type="submit">Enviar</button>
    </div>
    
    </form>
    
</div>

<?php require('./vistas/pie.php')?>