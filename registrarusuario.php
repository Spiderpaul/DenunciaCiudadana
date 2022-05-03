<?php require('./vistas/cabecera.php')?>

<div class="div-formulario">
    <div class="div-titulo">
        <p>Datos personales</p>
    </div>
    
    <form id="form-dciudadana-p" class="form-dciudadana-p" action="#" method="post">

        <div class="div-form-p">
            <div class="control-form">
                <div class="control1-p">
                    <div class="div-nombre">
                        <p>Nombre</p>
                        <input type="text" class="form-control" name="nombre" id="form-nombre" required>
                    </div>
                    <div class="div-edad">
                        <p>Edad</p>
                        <input type="text" class="form-control" name="edad" id="form-edad" required>
                    </div>
                    <div class="div-sexo">
                        <p>Sexo</p>
                        <input type="text" class="form-control" name="sexo" id="form-asunto" required>
                    </div>
                </div>
                <div class="control2-p">
                    <div class="control2-p-hijo">
                        <p>Teléfono</p>
                        <input type="text" class="form-control" name="telefono" id="form-telefono" required>
                    </div>
                    <div class="control2-p-hijo">
                        <p>Correo electrónico</p>
                        <input type="text" class="form-control" name="correo" id="form-correo" required>
                    </div>
                </div>
                <div class="control3-p">
                    <div class="control3-p-hijo">
                        <p>Dirección</p>
                        <input type="text" class="form-control" name="direccion" id="form-direccion" required>
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
                <input type="text" class="form-control" name="identificativo" id="form-identificativo" required>
            </div>
            <div class="control2">
                <p>Área de trabajo</p>
                <input type="text" class="form-control" name="area" id="form-area" required>    
            </div>
            <div class="control2">
                <p>Contraseña</p>
                <input type="text" class="form-control" name="clave" id="form-clave" required>    
            </div>
            <div class="control2">
                <p>Reafirmar contraseña</p>
                <input type="text" class="form-control" name="reafirmar" id="form-reafirmar" required>    
            </div>
        </div>
    </div>
    
    <div class="boton-form">
            <button class="boton-registrar" type="submit">Enviar</button>
    </div>
    
    </form>
    
</div>

<?php require('./vistas/pie.php')?>