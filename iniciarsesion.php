<?php require('./vistas/cabecera.php')?>


<div class="div-formulario-i">
    <div class="div-titulo-i">
        <p>Inicio de sesión</p>
    </div>
    
    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/iniciar.php" method="POST">

        <div class="div-form-i">
            <div class="control-form-i">
                <div class="control1-i">
                    <div class="div-nombre">
                        <p>Identificativo</p>
                        <input type="text" class="form-control" name="identificativo" id="form-identificativo" required>
                    </div>
                </div>
                <div class="control2-i">
                    <div class="div-clave">
                        <p>Contraseña</p>
                        <input type="password" class="form-control" name="clave" id="form-clave" required>
                    </div>
                </div>

                <div class="boton-form">
                    <button class="boton-registrar" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    
</div>

<?php require('./vistas/pie.php')?>