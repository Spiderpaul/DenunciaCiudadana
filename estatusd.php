<?php require('./vistas/cabecera.php')?>

<div class="contenido-estatus">
    <div class="cabecera-estatus">
        <div class="buscador-estatus">
            <p>Ingrese el identificativo de la denuncia</p>
            <form action="usuarios.php" method="post">
                <div class="buscador-hijo">
                    <div class="buscador-hijo-1">
                        <input type="text" name="buscar" class="buscador-input-estatus">
                    </div>
                    
                    <div class="buscador-hijo-2">
                        <button>
                            <i class="material-icons" >search</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="datos-estatus">

    </div>
</div>

<?php require('./vistas/pie.php')?>