<?php require('./vistas/cabecera.php')?>
<div class="contenedor-principal">
    <div class="contenedor-canvas-1">
        <canvas id="grafica1">
        
        </canvas>
        <div class="lista-tipo">
                <p>1 Denuncia anónima</p>
                <p>2 Denuncia ciudadana</p>
                <p>3 Denuncia servidor público</p>
        </div>
    </div>

    <div class="contenedor-canvas-2">
        <canvas id="grafica2">
        
        </canvas>
        <div class="lista-tipo">
                <p>1 Abuso de autoridad</p>
                <p>2 Acoso y Hostigamiento</p>
                <p>3 Soborno para algún trámite o servicio</p>
                <p>4 Incumplimiento o mal uso de un programa o acción social</p>
                <p>5 Trato irrespetuoso y mala conducta</p>
                <p>6 Servidor público autorisa, solicita o realiza actos para su beneficio</p>
                <p>7 Solicitud de documentos o dinero adicional para la expedición de documentos</p>
                <p>8 Otro</p>
        </div>
    </div>

    <div class="contenedor-canvas-3">
        <canvas id="grafica3">
        
        </canvas>
        <div class="lista-tipo">
                <p>1 En espera</p>
                <p>2 En proceso</p>
                <p>3 Cancelado</p>
                <p>4 No aplica</p>
        </div>
    </div>
</div>


<script src="js/graficas.js"></script>

<?php require('./vistas/pie.php')?>