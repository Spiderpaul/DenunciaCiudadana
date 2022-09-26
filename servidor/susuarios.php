<?php
include 'conexion.php';

function tablaUsuarios($dbh)
{
    try {
        if (isset($_POST['buscar'])) {
            $buscador = "%" . $_POST['buscar'] . "%";
        } else {
            $buscador = "";
        }

        if ($buscador == "") {
            $stmt = $dbh->prepare("SELECT * FROM `servidor publico`;");
            $stmt->execute();
        } else {
            $stmt = $dbh->prepare("SELECT * FROM `servidor publico` 
            WHERE id_usuario LIKE ? 
            OR nombre LIKE ? 
            OR edad LIKE ?
            OR area LIKE ?
            OR correo LIKE ?;");

            $stmt->bindParam(1, $buscador);
            $stmt->bindParam(2, $buscador);
            $stmt->bindParam(3, $buscador);
            $stmt->bindParam(4, $buscador);
            $stmt->bindParam(5, $buscador);
            $stmt->execute();
        }
        while ($row = $stmt->fetch()) {
?>
            <tr>
                <!---
        <td class="tabla-checkbox"><input type="radio" name="seleccionar" value=""></td>
        --->
                <td><?php echo $row->id_usuario; ?></td>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->edad; ?></td>
                <td><?php echo $row->sexo; ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->correo; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->area; ?></td>
                <td><?php echo $row->rol_usuario; ?></td>
                <td>
                    <div class="acciones-btn">
                        <div class="editar-btn">
                            <a href="modificarusuario.php?id=<?php echo $row->id_usuario; ?>">
                                <button>
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                        </div>
                        <div class="eliminar-btn">
                            <a onclick="return confirmar()" href="servidor/eliminar.php?id=<?php echo $row->id_usuario; ?>">
                                <button>
                                    <i class="material-icons">delete</i>
                                </button>
                            </a>
                        </div>
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