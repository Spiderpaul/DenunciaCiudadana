<?php require('./vistas/cabecera.php')?>

<div class="div-formulario">

    <div class="div-titulo">
        <p>Datos de denuncia</p>
    </div>

    <form id="form-danonima" class="form-danonima" action="/servidor/registrardsp.php" method="post">
        <div class="div-form">
            <div class="control-form">
                <div class="control1">
                    <p>Asunto</p>
                    <input type="text" class="form-control" name="asunto" id="form-asunto" 
                    placeholder="   Escriba el asunto que desea denunciar" required>
                </div>
                <div class="control2">
                    <p>Descripción</p>
                    <textarea rows="10" cols="40" class="form-control" name="descripcion" id="form-descripcion" required>
                    </textarea>  
                </div>
            </div>
        </div>

        <div class="boton-form">
                <button class="boton-registrar" type="submit">Enviar</button>
        </div> 
    </form>

</div>

<?php require('./vistas/pie.php')?>