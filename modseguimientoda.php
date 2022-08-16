<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>

<div class="contenido-ms">
    
    <div class="datos-denuncia">
        <?php
                $sesionAsesor = $_SESSION['id_usuario'];
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }else{
                    header("location: ../modseguimientoda.php");
                }
                
                   
                $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima` 
                JOIN `estatus de denuncia`
                WHERE id_denuncia = ? and id_denuncia_a = ?;");

                $stmt->bindParam(1,$id);
                $stmt->bindParam(2,$id);
                $stmt->execute();
                $cont = $stmt->rowCount();
                $row = $stmt->fetch();
                

        if($cont != 0 ){
            
        ?>
        <form action="registrarseguimientoda.php" class="seguimiento">
            <div class="seccion1-ms">
                <div class="linea1">
                    <div class="id-denuncia">
                        <h4>Sessión activa: <?php echo $sesionAsesor; ?></h4>
                    </div>
                </div>
        <?php
            if($row->id_asesor == ""){
        ?>
                <div class="linea2">
                    <h4>Asesor asignado: </h4>
                    <div class="div-idms">
                        <h4><?php echo ""; ?> </h4>
                    </div>
                </div>
        <?php
            }else{
        ?>
                <div class="linea2">
                        <h4>Asesor asignado: </h4>
                        <div class="div-idms">
                            <h4><?php echo $row->id_asesor; ?> </h4>
                        </div>
                </div>
        <?php
            }
        ?>
                <div class="linea3">
                        <h4>Estatus: </h4>
                        <div class="div-estatusms">
                            <input type="text" class="estatus-ms" name="estatus" value="<?php echo $row->estatus; ?>"></input>
                        </div>
                </div>
                <div class="linea4">
                    <div class="div-observacion">
                        <h4>Observacion: </h4>
                    </div>
                    <div class="div-observacion">
                        <input type="text" class="nota-ms" name="nota" value="<?php echo $row->nota; ?>"></input>
                    </div>
                </div>
            </div>
            <div class="botones-ms">
                <button class="btn-cancelarms" type="submit">Cancelar</button>
                <button class="btn-guardarms" type="submit">Guardar</button>
            </div>
        </form>
            
            
            <div class="seccion2-ms">
                <div class="seccion-denuncia">
                    <h4>Datos de denuncia</h4>
                </div>
                <div class="linea3">
                    <div class="div-asunto1">
                        <h4>Asunto: </h4>
                    </div>
                    <div class="div-asunto2">
                        <p> <?php echo $row->asunto; ?> </p>
                    </div>
                </div>
                <div class="linea4">
                    <div class="div-descripcion-status">
                        <h4>Descripción</h4>
                        <p> <?php echo $row->descripcion; ?> </p>
                    </div>
                </div>
            </div>    
        <?php
            }
        ?>
    </div>
</div>

<?php require('./vistas/pie.php')?>