<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>

<div class="contenido-ms">
    
    <div class="datos-denuncia">
        <?php
            
        $sesionAsesor = $_SESSION['id_usuario'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            header("location: ../modseguimientosp.php");
        }
        
        try{
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` 
        JOIN `estatus de denuncia`
        WHERE id_denuncia = ? and id_denuncia_sp = ?;");
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$id);
        $stmt->execute();
        $cont = $stmt->rowCount();
        $row = $stmt->fetch();
                

        if($cont != 0 ){
            
        ?>
        <form action="servidor/registrarseguimientosp.php" class="seguimiento" id="seguimiento" method="post">
            <div class="seccion1-ms">
                <div class="linea1">
                    <div class="id-denuncia">
                        <h4>Sessión activa: <?php echo $sesionAsesor; ?></h4>
                    </div>
                </div>
                <div class="linea2-ms">
                    <div class="div-idms">
                        <input type="text" class="id_ms" name="id" value="<?php echo $row->id_denuncia; ?>"></input>
                    </div>
                
        <?php
            if($row->id_asesor == ""){
        ?>
                
                    <div class="linea2-1">
                        <h4>Asesor asignado: </h4>
                        <div class="div-idms">
                            <h4><?php echo ""; ?> </h4>
                        </div>
                    </div> 
        <?php
            }else{
        ?>
                    <div class="linea2-1">
                        <h4>Asesor asignado: </h4>
                        <div class="div-idms">
                            <h4><?php echo $row->id_asesor; ?> </h4>
                        </div>
                    </div>
        <?php
            }
        ?>
                    <div class="linea2-2">
                        <h4>Estatus: </h4>
                            <div class="div-estatusms">
                                <select class="estatus-ms" id="estatus-ms" name="estatus" >
                                <?php
                                    if($row->estatus == ""){
                                ?>
                                    <option value="En espera" disabled="" selected="">En espera</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="No aplica">No aplica</option>
                                <?php
                                    }else if($row->estatus == "En proceso"){
                                ?>
                                    <option value="En espera" disabled="">En espera</option>
                                    <option value="En proceso" selected="">En proceso</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="No aplica">No aplica</option>
                                <?php
                                    }else if($row->estatus == "Finalizado"){
                                ?>
                                    <option value="En espera" disabled="">En espera</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Finalizado" selected="">Finalizado</option>
                                        <option value="No aplica">No aplica</option>
                                <?php
                                    }else if($row->estatus == "No aplica"){
                                ?>
                                    <option value="En espera" disabled="">En espera</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="No aplica" selected="">No aplica</option>
                                <?php
                                    }
                                ?>
                                </select>
                                <p class="alerta-estatus" id="alerta-estatus">
                                    Debe seleccionar una opción.
                                </p>
                            </div>
                        </div>
                    </div>  
                <div class="linea3-ms">
                    <div class="linea3-1">
                        <div class="div-observacion">
                            <h4>Observacion: </h4>
                        </div>
                        <div class="div-observacion" id="div-observacion">
                            <textarea rows="3" cols="40" class="nota-ms" id="nota-ms" name="nota" value="<?php echo $row->nota; ?>"></textarea>
                            <p class="alerta-nota" id="alerta-nota">
                                El texto debe contener máximo 200 caracteres.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="botones-ms">
                    <button class="btn-cancelarms" id="btn-cancelarms" type="submit">Cancelar</button>
                    <button class="btn-guardarms" id="btn-guardarms" type="submit">Guardar</button>
                </div>
            </div>
        </div>   
        
            
            
            <div class="seccion2-ms">
                <div class="seccion-denuncia">
                    <h4>Datos de denuncia</h4>
                </div>
                <div class="linea5-ms">
                    <div class="div-id1-ms">
                        <h4>Id de denuncia: </h4>
                    </div>
                    <div class="div-id2-ms">
                        <input class="input-ms" type="text" value="<?php echo $row->id_denuncia; ?>" disabled>  </p>
                    </div>
                </div>
                <div class="linea5-ms">
                    <div class="div-asunto1-ms">
                        <h4>Asunto: </h4>
                    </div>
                    <div class="div-asunto2-ms">
                        <input class="input-ms" type="text" value="<?php echo $row->asunto; ?>" disabled>  </p>
                    </div>
                </div>
                <div class="linea5-ms">
                        <div class="div-asunto1-ms">
                            <h4>Archivo adjunto: </h4>
                        </div>
                        <div class="div-asunto2-ms">
                            <a target="_blank" href="vista.php?id=<?php echo $row->id_denuncia; ?>">
                                <p class="adjunto"><?php echo $row->nombre_evidencia;?></p>
                            </a>
                        </div>
                    </div>
                <div class="linea6-ms">
                    <div class="div-descripcion-status">
                        <h4>Descripción:</h4>
                        <textarea class="textarea-ms" rows="5" cols="40" disabled><?php echo $row->descripcion; ?></textarea>
                    </div>
                </div>
            </div>    
        <?php
            }
        
        } catch(PDOException $e){
            echo '<script language="javascript">
                    alert("Se ha detectado un error al conectar a la base de datos");
                    window.history.back();
                    </script>';
        }
        ?>
        </form>
    </div>
</div>

<script src="js/modificarestatus.js"></script>
<?php require('./vistas/pie.php')?>