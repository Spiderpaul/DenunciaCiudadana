<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>
<?php include 'servidor/smodseguimientodc.php'; ?>

<div class="contenido-ms">
    
    <div class="datos-denuncia">
        <?php
        $sesionAsesor = $_SESSION['id_usuario'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            modificarSeguimiento($dbh, $id, $sesionAsesor);
        }else{
            header("location: ../modseguimientodc.php");
        }
        
        
        ?>
        </form>
    </div>
</div>

<script src="js/modificarestatus.js"></script>
<?php require('./vistas/pie.php')?>