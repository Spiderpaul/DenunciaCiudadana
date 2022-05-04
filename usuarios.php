<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>

<div class="contenedor">
    <div class="contenedor-hijo">
        <table class="tabla-usuarios">
                    
            <tr>
                <th>Identificativo</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Área</th>
                <th>Rol de usuario</th>
            </tr>
            <?php
                if($dbh != null){
                    $stmt = $dbh->prepare("SELECT * FROM `servidor publico`;");
                    $stmt->execute();

                    while($row = $stmt->fetch()){
            ?>
                <tr>
                    <td><?php echo $row->id_usuario; ?></td>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->edad; ?></td>
                    <td><?php echo $row->sexo; ?></td>
                    <td><?php echo $row->telefono; ?></td>
                    <td><?php echo $row->correo; ?></td>
                    <td><?php echo $row->direccion; ?></td>
                    <td><?php echo $row->area; ?></td>
                    <td><?php echo $row->rol_usuario; ?></td>
                </tr>
            <?php
                }
            } else {
                echo "no se ha ejecutado la sentencia";
            }
            ?>       
                    
        </table>
    </div>
</div>            

<?php require('./vistas/pie.php')?>