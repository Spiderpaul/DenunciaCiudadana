<?php require('./vistas/cabecera.php')?>

<div class="div-formulario">
    <div class="div-titulo">
        <p>Datos de denuncia</p>
    </div>
    <div class="div-form">
        <form id="form-danonima" class="form-danonima" action="#" method="post">
            <div class="control-form">
                <div class="control1">
                    <p>Asunto</p>
                    <input type="text" class="form-control" name="asunto" id="form-asunto" required>
                </div>
                <div class="control2">
                    <p>Descripción</p>
                    <input type="text" class="form-control" name="descripcion" id="form-descripcion" required>
                </div>
            </div>

            <div class="boton-form">
                <button class="boton-registrar" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>

<?php require('./vistas/pie.php')?>