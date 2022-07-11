<?php require('./vistas/cabecera.php')?>

<div class="div-formulario-da">

    <div class="div-titulo-a">
        <p>Buzón de quejas</p>
    </div>

    <form id="form-danonima" class="form-danonima" action="servidor/registrarqueja.php" method="post" 
    enctype="multipart/form-data">
        <div class="div-form-a">
            <div class="control-form">
                <div class="asunto-tipo">
                    <div class="control1" id="div-asunto">
                        <p>Asunto</p>
                        <input type="text" class="form-control" name="asunto" id="form-asunto" 
                        placeholder="   Escriba el asunto que desea denunciar" required>
                    </div>
                    <div class="control1">
                        
                    </div>
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