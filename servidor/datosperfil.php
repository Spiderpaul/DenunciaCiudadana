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
        <div class="control1-p">
            <div class="div-nombre">
                <p>Nombre: <?php echo $row->nombre; ?></p>
            </div>
            <div class="div-edad">
                <p>Edad: <?php echo $row->edad; ?></p>
            </div>
            <div class="div-sexo">
                <p>Sexo: <?php
                            if ($row->sexo == "M") {
                                echo "Masculino";
                            } else if ($row->sexo == "F") {
                                echo "Femenino";
                            } else {
                                echo "Indefinido";
                            }
                            ?></p>
            </div>
        </div>
        <div class="control2-p">
            <div class="control2-p-hijo">
                <p>Teléfono: <?php echo $row->telefono; ?></p>
            </div>
            <div class="control2-p-hijo">
                <p>Correo electrónico: <?php echo $row->correo; ?> </p>
            </div>
        </div>
        <div class="control3-p">
            <div class="control3-p-hijo">
                <p>Dirección: <?php echo $row->direccion; ?> </p>
            </div>
        </div>
        <div class="div-titulo-d">
            <p>Datos laborales</p>
        </div>
        <div class="control2">
            <p>Área de trabajo: <?php echo $row->area; ?> </p>
        </div>

<?php
    }
}
?>