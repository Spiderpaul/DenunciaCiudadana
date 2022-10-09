<?php
include 'conexion.php';

function tabla($dbh)
{
    if (isset($_POST['buscar'])) {
        $buscador = "%" . $_POST['buscar'] . "%";
    } else {
        $buscador = "";
    }

    try {

        if ($buscador == "") {
            $stmt = $dbh->prepare("SELECT * FROM `buzon quejas`;");
            $stmt->execute();
        } else {
            $stmt = $dbh->prepare("SELECT * FROM `buzon quejas`
            WHERE id_queja LIKE ?;");
            /*Está pendiente arreglar la sentencia para que el usuario haga búsquedas por id de asesor
            y algunas otras columnas*/
            $stmt->bindParam(1, $buscador);
            //$stmt->bindParam(2,$buscador);
            $stmt->execute();
        }
        while ($row = $stmt->fetch()) {
?>
            <tr>
                <td data-label="Identificativo:"><?php echo $row->id_queja; ?></td>
                <td data-label="Asunto:"><?php echo $row->asunto; ?></td>
                <td data-label="Descripción:"><?php echo $row->descripcion; ?></td>
                <td data-label="Fecha:"><?php echo $row->fecha; ?></td>
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