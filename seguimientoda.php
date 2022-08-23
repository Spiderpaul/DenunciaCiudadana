<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>

<div class="contenedor-tabla">
    <div class="cabecera-tabla">
        <div class="herramientas">
            
            <ul>
                <li>
                    <a href="seguimientoda.php">
                        <button class="btn-denuncia" name="btnda">
                            <i >Denuncia anónima</i>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="seguimientodc.php">
                        <button class="btn-denuncia" name="btndc">
                            <i >Denuncia ciudadana</i>
                        </button>
                    </a>
                </li>
                <li>
                    <a href="seguimientosp.php">
                        <button class="btn-denuncia" name="btnsp">
                            <i >Denuncia servidor público</i>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <div class="buscador">
            <form action="seguimientoda.php" method="post">
                <div class="buscador-hijo">
                    <div class="buscador-hijo-1">
                        <input type="text" name="buscar" class="buscador-input">
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
                if($dbh != null){
                    if(isset($_POST['buscar'])){
                        $buscador = "%".$_POST['buscar']."%";
                    }else{
                        $buscador = "";
                    }

                    try{

                        if($buscador == ""){
                            $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima` JOIN `estatus de denuncia` 
                            WHERE `denuncia anonima`.id_denuncia = `estatus de denuncia`.id_denuncia_a;");
                            $stmt->execute();
                        }else{
                            $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima` JOIN `estatus de denuncia` JOIN asesor
                            WHERE `denuncia anonima`.id_denuncia = `estatus de denuncia`.id_denuncia_a
                            AND `denuncia anonima`.id_denuncia LIKE ?;");
                            /*Está pendiente arreglar la sentencia para que el usuario haga búsquedas por id de asesor
                            y algunas otras columnas*/
                            $stmt->bindParam(1,$buscador);
                            //$stmt->bindParam(2,$buscador);
                            $stmt->execute();
                        }
                        while($row = $stmt->fetch()){
                        ?>
                            <tr>
                                <td><?php echo $row->id_denuncia; ?></td>
                                <td><?php echo $row->asunto; ?></td> 
                                <td><?php echo $row->tipo_denuncia; ?></td>
                                <td><?php echo $row->descripcion; ?></td>
                                <td>
                                    <a class="evidencia" target="_blank" href="vista.php?id=<?php echo $row->id_denuncia; ?>">
                                        <?php echo $row->nombre_evidencia; ?>
                                    </a>
                                </td>
                                <td><?php echo $row->id_asesor; ?></td>
                                <td><?php echo $row->estatus; ?></td>
                                <td><?php echo $row->nota; ?></td>
                                <td>
                                    <div class="acciones-btn">
                                        <div class="editar-btn">
                                            <a href="modseguimientoda.php?id=<?php echo $row->id_denuncia; ?>">
                                                <button>
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="eliminar-btn">
                                            <a onclick="return confirmar()" href="#">
                                                <button>
                                                    <i class="material-icons">disabled_by_default</i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    
                                </td>
                            </tr>
                            <?php
                        }

                    }catch(MySQLException $e){
                        echo '<script language="javascript">
                                alert("Se ha detectado un error al conectar a la base de datos");
                                window.history.back();
                                </script>';
                    }
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
    function confirmar(){
    var confirma = confirm("¿Seguro que desea eliminar el registro?");
    return confirma;
}
</script>
<?php require('./vistas/pie.php')?>