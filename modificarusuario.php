<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>


<div class="div-formulario">
    <div class="div-titulo">
        <p>Datos personales</p>
    </div>
    
    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/actualizar.php" method="POST">

            <?php

                if(isset($_GET['id'])){
                    $idUsuario = $_GET['id'];
                }else{
                    $idUsuario = "";
                }

                if($dbh != null){
                    $stmt = $dbh->prepare("SELECT * FROM `servidor publico` WHERE id_usuario = ?;");
                    $stmt->bindParam(1, $idUsuario);
                    $stmt->execute();

                    while($row = $stmt->fetch()){
            ?>

        <div class="div-form-p">
            <div class="control-form">
                <div class="control1-p">
                    <div class="div-nombre">
                        <p>Nombre</p>
                        <input type="text" class="form-control" name="nombre" id="form_nombre" 
                        value="<?php echo $row->nombre; ?>" required> 
                    </div>
                    <div class="div-edad">
                        <p>Edad</p>
                        <input type="text" class="form-control" name="edad" id="form_edad" 
                        value="<?php echo $row->edad; ?>" required>
                    </div>
                    <div class="div-sexo">
                        <p>Sexo</p>
                        <select class="form-select" name="sexo" id="form_select">
                            <?php if($row->sexo == "I"){ ?>
                                <option value="I" selected>Indefinido</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            <?php }else if ($row->sexo == "F"){ ?>
                                <option value="I">Indefinido</option>
                                <option value="F" selected>Femenino</option>
                                <option value="M">Masculino</option>
                            <?php }else { ?>
                                <option value="F">Femenino</option>
                                <option value="I">Indefinido</option>
                                <option value="M" selected>Masculino</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="control2-p">
                    <div class="control2-p-hijo">
                        <p>Teléfono</p>
                        <input type="text" class="form-control" name="telefono" id="form_telefono" 
                        value="<?php echo $row->telefono; ?>" required>
                    </div>
                    <div class="control2-p-hijo">
                        <p>Correo electrónico</p>
                        <input type="text" class="form-control" name="correo" id="form_correo" 
                        value="<?php echo $row->correo; ?>" required>
                    </div>
                </div>
                <div class="control3-p">
                    <div class="control3-p-hijo">
                        <p>Dirección</p>
                        <input type="text" class="form-control" name="direccion" id="form_direccion" 
                        value="<?php echo $row->direccion; ?>" required>
                    </div>
                </div>
            </div>
        </div>

    <div class="div-titulo-d">
        <p>Datos laborales</p>
    </div>

    <div class="div-form-d">
        <div class="control-form">
            <div class="control1">
                <p>Identificativo</p>
                <input type="text" class="form-control" name="identificativo" id="form_identificativo" 
                value="<?php echo $row->id_usuario; ?>" readonly>
            </div>
            <div class="control2">
                <p>Área de trabajo</p>
                <input type="text" class="form-control" name="area" id="form_area" 
                value="<?php echo $row->area; ?>" required>    
            </div>
            <div class="control2">
                <p>Contraseña</p>
                <input type="password" class="form-control" name="clave" id="form_clave" 
                value="<?php echo $row->clave; ?>" required>    
            </div>
            <div class="control2">
                <p>Confirmar contraseña</p>
                <input type="password" class="form-control" name="confirmar" id="form_confirmar" required>    
            </div>
        </div>
    </div>
    
    <div class="boton-form">
            <button class="boton-registrar" type="submit">Enviar</button>
    </div>
                    <?php }} ?>
    </form>
    
</div>

<?php require('./vistas/pie.php')?>