<?php
include 'conexion.php';

function tabla($dbh){
    echo "Ha entrado a modificar usuario";
    if(isset($_POST['buscar'])){
        $buscador = "%".$_POST['buscar']."%";
    }else{
        $buscador = "";
    }

    try{

        if($buscador == ""){
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia` 
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp;");
            $stmt->execute();
        }else{
            $stmt = $dbh->prepare("SELECT * FROM `denuncia ciudadana` JOIN `estatus de denuncia`
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp
            AND `denuncia servidor publico`.id_denuncia LIKE ?;");
            /*Está pendiente arreglar la sentencia para que el usuario haga búsquedas por id de asesor
            y algunas otras columnas*/
            $stmt->bindParam(1,$buscador);
            //$stmt->bindParam(2,$buscador);
            $stmt->execute();
        }
        while($row = $stmt->fetch()){
        ?>
            <tr>
                <td><?php echo $row->id_denuncia; ?></td>
                <td><?php echo $row->asunto; ?></td> 
                <td><?php echo $row->tipo_denuncia; ?></td>
                <td><?php echo $row->descripcion; ?></td>
                <td>
                    <a class="evidencia" target="_blank" href="servidor/vista.php?id=<?php echo $row->id_denuncia; ?>">
                        <?php echo $row->nombre_evidencia; ?>
                    </a>
                </td>
                <td><?php echo $row->id_asesor; ?></td>
                <td><?php echo $row->estatus; ?></td>
                <td><?php echo $row->nota; ?></td>
                <td>
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

    }catch(PDOException $e){
        echo '<script language="javascript">
                alert("Se ha detectado un error al conectar a la base de datos");
                window.history.back();
                </script>';
    }
}

?>