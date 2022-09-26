<?php require('./vistas/cabecera.php') ?>

<div class="div-formulario-da">

    <div class="div-titulo-a">
        <p>Buzón de quejas</p>
    </div>

    <form id="form-buzon" class="form-buzon" action="servidor/registrarqueja.php" method="post" enctype="multipart/form-data">
        <div class="div-form-q">
            <div class="control-form">
                <div class="asunto-tipo">
                    <div class="control1" id="div-asunto">
                        <p>Asunto</p>
                        <input type="text" class="form-control" name="asunto" id="form_asunto" placeholder="   Escriba el asunto que desea denunciar">
                        <p class="alerta-asunto" id="alerta-asunto">
                            Título de denuncia, máximo 60 caracteres.
                        </p>
                    </div>
                    <div class="control1">

                    </div>
                </div>
                <div class="control2-q" id="div-descripcion">
                    <p>Descripción</p>
                    <textarea rows="10" cols="40" class="form-control" name="descripcion" id="form_descripcion" required></textarea>
                    <p class="alerta-descripcion" id="alerta-descripcion">
                        Describa el problema a denunciar, máximo 1000 caracteres.
                    </p>
                </div>
            </div>
        </div>

        <div class="boton-form">
            <button class="boton-registrar" type="submit">Enviar</button>
        </div>
    </form>

</div>

<script src="js/buzonquejas.js"></script>
<?php require('./vistas/pie.php') ?>