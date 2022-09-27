<?php require('./vistas/cabecera.php') ?>
<?php include 'servidor/datosperfil.php'; ?>

<div class="div-formulario">


            <div class="datos-contenedor">
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

            <div class="div-modificar">
                <a href="modificarperfil.php">
                    <button class="boton-modificar">Modificar</button>
                </a>
            </div>



</div>

<?php require('./vistas/pie.php') ?>