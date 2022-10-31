<?php
include 'conexion.php';

function cargarEstatus($dbh, $buscador)
{
    try {

        if ($buscador == "") {    //Si no hay texto

        } else {                 //Si existe texto
            //Se buscan los datos en las tablas de denuncia anónima, estatus de denuncia y asesor
            $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima` 
            JOIN `estatus de denuncia`
            WHERE id_denuncia = ? and id_denuncia_a = ?;");

            $stmt->bindParam(1, $buscador);
            $stmt->bindParam(2, $buscador);
            $stmt->execute();
            $cont = $stmt->rowCount();
            $row = $stmt->fetch();
            //Si no existe el id en denuncia anonima, entonces se busca en denuncia ciudadana
            if ($cont == 0) {
                $stmt = $dbh->prepare("SELECT * FROM `denuncia ciudadana` 
                JOIN `estatus de denuncia`
                WHERE id_denuncia = ? and id_denuncia_c = ?;");

                $stmt->bindParam(1, $buscador);
                $stmt->bindParam(2, $buscador);
                $stmt->execute();
                $cont = $stmt->rowCount();
                $row = $stmt->fetch();
                //Si no existe el id en denuncia ciudadana, entonces se busca en denuncia servidor público
            } else if ($cont == 0) {
                $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` 
                JOIN `estatus de denuncia`
                WHERE id_denuncia = ? and id_denuncia_sp = ?;");

                $stmt->bindParam(1, $buscador);
                $stmt->bindParam(2, $buscador);
                $stmt->execute();
                $cont = $stmt->rowCount();
                $row = $stmt->fetch();
            }

            if ($cont != 0) {

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
                            <?php
                            if ($row->estatus == "En espera") {
                            ?>
                                <p> <?php echo ""; ?> </p>
                                <?php
                            } else {
                                if ($row->id_asesor != null) {
                                    $idAsesor = $row->id_asesor;
                                    $stmt2 = $dbh->prepare("SELECT * FROM `asesor` 
                                    WHERE id_asesor = ?;");
                                    $stmt2->bindParam(1, $idAsesor);

                                    $stmt2->execute();
                                    $row2 = $stmt2->fetch();
                                ?>
                                    <p> <?php echo $row2->nombre; ?> </p>
                                <?php
                                } else {
                                    $idAdminitrador = $row->id_administrador;
                                    $stmt2 = $dbh->prepare("SELECT * FROM `administrador`
                                    WHERE id_usuario = ?;");
                                    $stmt2->bindParam(1, $idAdminitrador);

                                    $stmt2->execute();
                                    $row2 = $stmt2->fetch();
                                ?>
                                    <p> <?php echo $row2->nombre; ?> </p>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="div-estatus">
                            <h4>Estatus: </h4>
                        </div>
                        <?php
                        //Para cambiar el color de texto de estatus
                        if ($row->estatus == "En espera" || $row->estatus == "") {
                        ?>
                            <div class="div-estatus-off">
                            <?php
                        } else if ($row->estatus == "En proceso") {
                            ?>
                                <div class="div-estatus-on">
                                <?php
                            } else {
                                ?>
                                    <div class="div-estatus-end">
                                    <?php
                                }
                                //Aquí termina cambiar color al texto
                                if ($row->estatus == "") {
                                    $estatus = "En espera";
                                    ?>
                                        <h4> <?php echo $estatus; ?> </h4>
                                    <?php
                                } else {
                                    ?>
                                        <h4> <?php echo $row->estatus; ?> </h4>
                                    <?php
                                }
                                    ?>
                                    </div>
                                </div>
                                <div class="linea3">
                                    <div class="div-observacion">
                                        <h4>Observacion: </h4>
                                    </div>
                                    <div class="div-observacion">
                                        <p> <?php echo $row->nota; ?> </p>
                                    </div>
                                </div>
                            </div>

                            <div class="seccion2">
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
                    } else {
                        //Si el id no existe
                        ?>

                            <div class="seccion1">
                                <div class="linea1">
                                    <div class="id-denuncia">
                                        <h4>Por favor, ingrese un identificativo de denuncia válido </h4>
                                    </div>
                                </div>
                                <div class="linea2">
                                    <div class="div-asesor">
                                    </div>
                                    <div class="div-nombre-estatus">
                                    </div>
                                    <div class="div-estatus">
                                    </div>
                                    <div class="div-estatus-off">
                                    </div>
                                </div>
                            </div>

                            <div class="seccion2">
                                <div class="linea3">
                                    <div class="div-asunto">
                                    </div>
                                    <div class="div-asunto">
                                    </div>
                                </div>
                                <div class="linea4">
                                    <div class="div-descripcion">
                                    </div>
                                </div>
                            </div>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo '<script language="javascript">
                alert("Se ha detectado un error al conectar a la base de datos");
                window.history.back();
                </script>';
            }
        }
            ?>