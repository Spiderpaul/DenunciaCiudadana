<?php require('./vistas/cabecera.php') ?>
<?php include 'servidor/conexion.php'; ?>
<?php include 'servidor/sseguimientosp.php'; ?>

<div class="contenedor-tabla">
    <div class="cabecera-tabla">
        <div class="herramientas">

            <ul>
                <li>
                    <a href="seguimientoda.php">
                        <button class="btn-denuncia" name="btnda">
                            <i>Denuncia anónima</i>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="seguimientodc.php">
                        <button class="btn-denuncia" name="btndc">
                            <i>Denuncia ciudadana</i>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="seguimientosp.php">
                        <button class="btn-denuncia" name="btnsp">
                            <i>Denuncia servidor público</i>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <div class="buscador">
            <form action="seguimientosp.php" method="post">
                <div class="buscador-hijo">
                    <div class="buscador-hijo-1">
                        <input type="text" name="buscar" class="buscador-input">
                    </div>

                    <div class="buscador-hijo-2">
                        <button>
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="tabla-usuarios">

        <thead>
            <tr>
                <th>Identificativo</th>
                <th>Asunto</th>
                <th>Tipo de denuncia</th>
                <th>Descripción</th>
                <th>Adjunto</th>
                <th>Asesor</th>
                <th>Estatus</th>
                <th>Nota</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($dbh != null) {
                tabla($dbh);
            } else {
                echo "no se ha ejecutado la sentencia";
            }

            ?>


        </tbody>
    </table>


    <div class="pie-tabla">
        <div class="lista">
            Mostrar
            <select name="n-entradas" id="n-entradas" class="n-entradas">
                <option value="15">5</option>
                <option value="10" selected>10</option>
                <option value="15">15</option>
            </select>
            entradas
        </div>

        <div class="paginas">
            <ul>
                <li><span class="active">1</span></li>
                <li><button>2</button></li>
                <li><button>3</button></li>
                <li><button>...</button></li>
                <li><button>10</button></li>
            </ul>
        </div>
    </div>
</div>
<script>
    function confirmar() {
        var confirma = confirm("¿Seguro que desea eliminar el registro?");
        return confirma;
    }
</script>
<?php require('./vistas/pie.php') ?>