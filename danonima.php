<?php require('./vistas/cabecera.php')?>

<div class="div-formulario-da">

    <div class="mensaje" id="mensaje">
        <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
        <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
    </div>

    <div class="div-titulo-a">
        <p>Datos de denuncia</p>
    </div>

    <form id="form-danonima" class="form-danonima" action="servidor/registrarda.php" method="post" 
    enctype="multipart/form-data">
        <div class="div-form-a">
            <div class="control-form">
                <div class="asunto-tipo">
                    <!---                     Asunto                        --->
                    <div class="div-asunto" id="div-asunto">
                        <p>Asunto</p>
                        <input type="text" class="form-control" name="asunto" id="form_asunto" 
                        placeholder="   Escriba el asunto que desea denunciar">
                        <p class="alerta-asunto" id="alerta-asunto">
                            Título de denuncia, máximo 60 caracteres.
                        </p>
                    </div>
                    <!---                     Tipo de denuncia                        --->
                    <div class="control1" id="div-denuncia">
                        <p>Tipo de denuncia</p>
                        <select class="form-select" name="tipo" id="form_select">
                            <option value="Abuso de autoridad">Abuso de autoridad</option>
                            <option value="Acoso y Hostigamiento">Acoso y Hostigamiento</option>
                            <option value="Soborno para algún trámite o servicio">Soborno para algún trámite o servicio</option>
                            <option value="Incumplimiento o mal uso de un programa o acción social">Incumplimiento o mal uso de un programa o acción social</option>
                            <option value="Trato irrespetuoso y mala conducta">Trato irrespetuoso y mala conducta</option>
                            <option value="Servidor público autorisa, solicita o realiza actos para su beneficio">Servidor público autorisa, solicita o realiza actos para su beneficio</option>
                            <option value="Solicitud de documentos o dinero adicional para la expedición de documentos">Solicitud de documentos o dinero adicional para la expedición de documentos</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <!---                     Descripción                        --->
                <div class="div-descripcion" id="div-descripcion">
                    <p>Descripción</p>
                    <textarea rows="10" cols="40" class="form-control" name="descripcion" id="form_descripcion"></textarea>
                    <p class="alerta-descripcion" id="alerta-descripcion">
                        Describa el problema a denunciar, máximo 500 caracteres.
                    </p> 
                </div>
                <!---                     Adjunto                        --->
                <div class="control-archivo">
                    <p>Adjuntar documento (opcional)</p>
                    <input type="file" class="evidencia" name="evidencia" id="evidencia">
                </div>
            </div>
        </div>

        <div class="boton-form">
                <button class="boton-registrar" type="submit">Enviar</button>
        </div> 
    </form>

</div>
<script src="js/danonima.js"></script>
<?php require('./vistas/pie.php')?>