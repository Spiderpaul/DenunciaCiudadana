<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>

<div class="contenido-estatus">
    <div class="cabecera-estatus">
        <div class="buscador-estatus">
            <h4>Ingrese el identificativo de la denuncia</h4>
            <form action="estatusd.php" method="post">
                <div class="buscador-hijo">
                    <div class="buscador-hijo-1">
                        <input type="text" name="buscar" class="buscador-input-estatus">
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

            if($buscador == ""){    //Si no hay texto
                $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima`;");
                $stmt->execute();
            }else{                 //Si existe texto
                    //Se buscan los datos en las tablas de denuncia anónima, estatus de denuncia y asesor
                $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima` 
                JOIN `estatus de denuncia` JOIN asesor 
                WHERE id_denuncia = ?;");

                $stmt->bindParam(1,$buscador);
                $stmt->execute();
                $cont1 = $stmt->rowCount();
                $row = $stmt->fetch();
                    //Si no existe el id en denuncia anonima, entonces se busca en denuncia ciudadana
                if($cont1 == 0){  
                    $stmt = $dbh->prepare("SELECT * FROM `denuncia ciudadana` 
                    JOIN `estatus de denuncia` JOIN asesor 
                    WHERE id_denuncia = ?;");

                    $stmt->bindParam(1,$buscador);
                    $stmt->execute();
                    $cont2 = $stmt->rowCount();
                    $row = $stmt->fetch();
                    //Si no existe el id en denuncia ciudadana, entonces se busca en denuncia servidor público
                } else if ($cont2 == 0){
                    $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` 
                    JOIN `estatus de denuncia` JOIN asesor 
                    WHERE id_denuncia = ?;");

                    $stmt->bindParam(1,$buscador);
                    $stmt->execute();
                    $row = $stmt->fetch();
                }
        ?>
            <div class="seccion1">
                <div class="linea1">
                    <div class="id-denuncia">
                        <h4>Identificativo de denuncia: <?php echo $row->id_denuncia; ?></h4>
                    </div>
                </div>
                <div class="linea2">
                    <div class="div-asesor">
                        <h4>Asesor de denuncia: </h4>
                    </div>
                    <div class="div-nombre-estatus">
                        <p> <?php echo $row->nombre; ?> </p>
                    </div>
                    <div class="div-estatus">
                        <h4>Estatus: </h4>
                    </div>
                    <?php 
                        //Para cambiar el color de texto de estatus
                    if($row->estatus=="En espera"){
                    ?>
                        <div class="div-estatus-on">
                    <?php
                    } else {
                    ?>
                        <div class="div-estatus-off">
                    <?php
                    }
                        //Aquí termina cambiar color al texto
                    ?>
                        <h4> <?php echo $row->estatus; ?> </h4>
                    </div>
                </div>
            </div>
            
            <div class="seccion2">
                <div class="linea3">
                    <div class="div-asunto">
                        <h4>Asunto: </h4>
                    </div>
                    <div class="div-asunto">
                        <p><?php echo $row->asunto; ?></p>
                    </div>
                </div>
                <div class="linea4">
                    <div class="div-descripcion">
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