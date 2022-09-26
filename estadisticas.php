<?php require('./vistas/cabecera.php') ?>
<div class="contenedor-principal">
    <div class="contenedor-canvas-1">
        <h3>Tipo de usuario</h3>
        <canvas id="grafica1">

        </canvas>
    </div>

    <div class="contenedor-canvas-2">
        <h3>Estatus de denuncia</h3>
        <canvas id="grafica2">

        </canvas>
    </div>
</div>
<div class="contenedor-canvas-3">
    <h3>Tipo de denuncia</h3>
    <canvas id="grafica3">

    </canvas>
</div>

<script src="js/graficas.js"></script>

<?php require('./vistas/pie.php') ?>