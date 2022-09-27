<?php
require 'conexion.php';

function cargarDatos($dbh)
{
    $idUsuario = $_SESSION['id_usuario'];

    $stmt = $dbh->prepare("SELECT * FROM `servidor publico` 
    WHERE id_usuario LIKE ?");

    $stmt->bindParam(1, $idUsuario);
    $stmt->execute();

    while ($row = $stmt->fetch()) {

?>
        <div class="datos-usuario">
            <div class="div-id">
                <h3>Identificativo: <?php echo $idUsuario; ?></h3>
            </div>
            <div class="dato-u">
                <h3>Nombre: </h3>
                <h4> <?php echo $row->nombre; ?> </h4>
            </div>
            <div class="dato-u">
                <h3>Edad: </h3>
                <h4> <?php echo $row->edad; ?> </h4>
            </div>
            <div class="dato-u">
                <h3>Sexo: </h3>
                <h4><?php
                            if ($row->sexo == "M") {
                                echo "Masculino";
                            } else if ($row->sexo == "F") {
                                echo "Femenino";
                            } else {
                                echo "Indefinido";
                            }
                            ?></h4>
            </div>
            <div class="dato-u">
                <h3>Teléfono: </h3>
                <h4> <?php echo $row->telefono; ?> </h4>
            </div>
            <div class="dato-u">
                <h3>Correo electrónico: <?php echo $row->correo; ?> </h3>
                <h4> <?php echo $row->correo; ?> </h4>
            </div>
            <div class="dato-u">
                <h3>Dirección: </h3>
                <h4> <?php echo $row->direccion; ?> </h4>
            </div>
            <div class="dato-u">
                <h3>Área de trabajo: </h3>
                <h4> <?php echo $row->area; ?> </h4>
            </div>

    <?php
    }
}
    ?>