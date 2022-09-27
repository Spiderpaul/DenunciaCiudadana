<?php require('./vistas/cabecera.php') ?>
<?php include 'servidor/smodificarperfil.php'; ?>


<div class="div-formulario">
    <div class="mensaje" id="mensaje">
        <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
        <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
    </div>

    <div class="div-titulo">
        <p>Datos personales</p>
    </div>

    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/actualizarperfil.php" method="POST">

        <?php

        if ($dbh != null) {

            modificar($dbh);
        }

        ?>
    </form>

</div>
<script src="js/modificarperfil.js"></script>
<?php require('./vistas/pie.php') ?>