<?php require('./vistas/cabecera.php') ?>
<?php include 'servidor/datosperfil.php'; ?>

<div class="div-formulario">
    <div class="div-titulo">
        <p>Datos personales</p>
    </div>

    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/registraru.php" method="POST">

        <div class="div-form-p">
            <div class="control-form">
                <?php
                if (isset($_SESSION['id_usuario'])) {
                    if ($dbh != null) {
                        cargarDatos($dbh);
                    } else {
                        echo "Error al conectar a la base de datos";
                    }
                }
                ?>
            </div>
        </div>


        <div class="boton-form">
            <button class="boton-registrar" type="submit">Enviar</button>
        </div>

    </form>

</div>

<?php require('./vistas/pie.php') ?>