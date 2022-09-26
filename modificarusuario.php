<?php require('./vistas/cabecera.php') ?>
<?php include 'servidor/conexion.php'; ?>
<?php include 'servidor/smodificarusuario.php'; ?>


<div class="div-formulario">
    <div class="mensaje" id="mensaje">
        <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
        <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
    </div>

    <div class="div-titulo">
        <p>Datos personales</p>
    </div>

    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/actualizar.php" method="POST">

        <?php

        if (isset($_GET['id'])) {
            $idUsuario = $_GET['id'];
        } else {
            $idUsuario = "";
        }

        if ($dbh != null) {

            modificar($dbh, $idUsuario);
        }

        ?>
    </form>

</div>
<script src="js/modificarusuario.js"></script>
<?php require('./vistas/pie.php') ?>