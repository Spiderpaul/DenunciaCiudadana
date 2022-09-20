<?php require('./vistas/cabecera.php')?>
<div class="contenedor-principal">
    <div class="contenedor-canvas-1">
        <canvas id="grafica1">
        
        </canvas>
    </div>

    <div class="contenedor-canvas-2">
        <canvas id="grafica2">
        
        </canvas>
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

<script src="js/graficas.js"></script>

<?php require('./vistas/pie.php')?>