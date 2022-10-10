<?php
include 'conexion.php';

function tabla($dbh)
{

    if (isset($_POST['buscar'])) {
        $buscador = "%" . $_POST['buscar'] . "%";
        if ($buscador == "%%") {
            $buscador = "";
        }
    } else {
        $buscador = "";
    }

    if (isset($_POST['asesor'])) {
        $asesor = "%" . $_POST['asesor'] . "%";
        if ($asesor == "%%") {
            $asesor = "";
        }
    } else {
        $asesor = "";
    }

    if (isset($_POST['estatus'])) {
        $estatus = "%" . $_POST['estatus'] . "%";
        if ($estatus == "%%") {
            $estatus = "";
        }
    } else {
        $estatus = "";
    }

    if (isset($_POST['fecha'])) {
        $fecha = "%" . $_POST['fecha'] . "%";
        if ($fecha == "%%") {
            $fecha = "";
        }
    } else {
        $fecha = "";
    }

    try {

        if ($buscador == "" && $asesor == "" && $estatus == "" && $fecha == "") {
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia` 
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp;");
            $stmt->execute();
        } else if ($buscador != "") {
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia`
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp
            AND `denuncia servidor publico`.id_denuncia LIKE ?;");
            $stmt->bindParam(1, $buscador);
            $stmt->execute();
        } else if ($asesor != "") {
            if (str_contains($asesor, 'Ad') == false) {
                $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia`
                WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp
                AND `estatus de denuncia`.id_asesor LIKE ?;");
                $stmt->bindParam(1, $asesor);
                $stmt->execute();
            }else{
                $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia`
                WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp
                AND `estatus de denuncia`.id_administrador LIKE ?;");
                $stmt->bindParam(1, $asesor);
                $stmt->execute();
            }
        } else if ($estatus != "") {
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia`
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp
            AND `estatus de denuncia`.estatus LIKE ?;");
            $stmt->bindParam(1, $estatus);
            $stmt->execute();
        } else if ($fecha != "") {
            echo "fecha";
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia`
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp
            AND `denuncia servidor publico`.fecha LIKE ?;");
            $stmt->bindParam(1, $fecha);
            $stmt->execute();
        }
        while ($row = $stmt->fetch()) {
?>
            <tr>
                <td data-label="Identificativo:"><?php echo $row->id_denuncia; ?></td>
                <td data-label="Asunto:"><?php echo $row->asunto; ?></td>
                <td data-label="Tipo denuncia:"><?php echo $row->tipo_denuncia; ?></td>
                <td data-label="Descripción:"><?php echo $row->descripcion; ?></td>
                <td data-label="Adjunto:">
                    <a class="evidencia" target="_blank" href="servidor/vista.php?id=<?php echo $row->id_denuncia; ?>">
                        <?php echo $row->nombre_evidencia; ?>
                    </a>
                </td>
                <?php
                if ($row->id_asesor != "") {
                ?>
                    <td data-label="Asesor:"><?php echo $row->id_asesor; ?></td>
                <?php
                } else if ($row->id_administrador != "") {
                ?>
                    <td data-label="Asesor:"><?php echo $row->id_administrador; ?></td>
                <?php
                } else {
                ?>
                    <td data-label="Asesor:"> </td>
                <?php
                }
                ?>
                <td data-label="Estatus:"><?php echo $row->estatus; ?></td>
                <td data-label="Nota:"><?php echo $row->nota; ?></td>
                <td data-label="Fecha:"><?php echo $row->fecha; ?></td>
                <td data-label="Seguimiento:">
                    <div class="acciones-btn">
                        <div class="editar-btn">
                            <a href="modseguimientosp.php?id=<?php echo $row->id_denuncia; ?>">
                                <button>
                                    <i class="material-icons">visibility</i>
                                </button>
                            </a>
                        </div>
                        <!----
                        <div class="eliminar-btn">
                            <a onclick="return confirmar()" href="#">
                                <button>
                                    <i class="material-icons">disabled_by_default</i>
                                </button>
                            </a>
                        </div>
                        ---->
                    </div>
                </td>
            </tr>
<?php
        }
    } catch (PDOException $e) {
        echo '<script language="javascript">
                alert("Se ha detectado un error al conectar a la base de datos");
                window.history.back();
                </script>';
    }
}

?>