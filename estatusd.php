<?php require('./vistas/cabecera.php')?>

<div class="contenido-estatus">
    <div class="cabecera-estatus">
        <div class="buscador-estatus">
            <p>Ingrese el identificativo de la denuncia</p>
            <form action="estatusd.php" method="post">
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
        <?php
            if(isset($_POST['buscar'])){
                $buscador = "%".$_POST['buscar']."%";
            } else {
                $buscador = "";
            }

            if($buscador == ""){
                $stmt = $dbh->prepare("SELECT * FROM `servidor publico`;");
                $stmt->execute();
            }else{
                $stmt = $dbh->prepare("SELECT * FROM `servidor publico` 
                WHERE id_usuario LIKE ? 
                OR nombre LIKE ? 
                OR edad LIKE ?
                OR area LIKE ?
                OR correo LIKE ?;");

                $stmt->bindParam(1,$buscador);
                $stmt->bindParam(2,$buscador);
                $stmt->bindParam(3,$buscador);
                $stmt->bindParam(4,$buscador);
                $stmt->bindParam(5,$buscador);
                $stmt->execute();
            }
        ?>
    </div>
</div>

<?php require('./vistas/pie.php')?>