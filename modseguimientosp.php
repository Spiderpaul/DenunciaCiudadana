<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>
<?php include 'servidor/smodseguimientosp.php'; ?>

<div class="contenido-ms">
    
    <div class="datos-denuncia">
        <?php
            
        $sesionAsesor = $_SESSION['id_usuario'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            modificarSeguimiento($dbh, $id, $sesionAsesor);
        }else{
            header("location: ../modseguimientosp.php");
        }
        
        
        ?>
        </form>
    </div>
</div>

<script src="js/modificarestatus.js"></script>
<?php require('./vistas/pie.php')?>