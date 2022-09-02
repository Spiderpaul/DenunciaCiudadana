<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>
<?php include 'servidor/sestatus.php'; ?>

<div class="contenido-estatus">
    <div class="cabecera-estatus">
        <div class="buscador-estatus">
            <h4>Ingrese el identificativo de la denuncia</h4>
            <form class="form-estatus" action="estatusd.php" method="post">
                <div class="buscador-hijo">
                    <div class="buscador-hijo-1">
                        <input type="text" name="buscar" class="buscador-input-estatus" 
                        placeholder="Identificativo de denuncia">
                    </div>
                    
                    <div class="buscador-hijo-2">
                        <button>
                            <i class="material-icons" >search</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="datos-estatus">
        <?php
            if(isset($_POST['buscar'])){  //Para verificar el texto del buscador
                $buscador = $_POST['buscar'];
            } else {
                $buscador = "";
            }

            cargarEstatus($dbh, $buscador); 
                       
        ?>
    </div>
</div>

<?php require('./vistas/pie.php')?>