<?php require('./vistas/cabecera.php') ?>
<?php include 'servidor/susuarios.php'; ?>

<div class="contenedor-tabla">
    <div class="cabecera-tabla">
        <div class="herramientas">
            <ul>
                <li>
                    <a href="aregistrarusuario.php">
                        <button>
                            <i class="material-icons">add_circle</i>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <div class="buscador">
            <form action="usuarios.php" method="post">
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
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Área</th>
                <th>Rol</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($dbh != null) {
                tablaUsuarios($dbh);
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