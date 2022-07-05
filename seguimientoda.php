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

                    if($buscador == ""){
                        $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima`;");
                        $stmt->execute();
                    }else{
                        $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima`
                        WHERE id_denuncia LIKE ? 
                        OR asunto LIKE ?;");

                        $stmt->bindParam(1,$buscador);
                        $stmt->bindParam(2,$buscador);
                        $stmt->execute();
                    }
                    while($row = $stmt->fetch()){
                        $tipo = $row->tipo_denuncia;
                        switch($tipo){
                            case "a":
                                $tipoDenuncia = "Abuso de autoridad";
                                break;
                            case "b":
                                $tipoDenuncia = "Acoso y hostigamiento";
                                break;
                            case "c":
                                $tipoDenuncia = "Soborno en tramite o servicio";
                                break;
                            case "d":
                                $tipoDenuncia = "Mal uso de programa social";
                                break;
                            case "e":
                                $tipoDenuncia = "Trato irrespetuoso o mala conducta";
                                break;
                            case "f":
                                $tipoDenuncia = "Servidor público autorista";
                                break;
                            case "g":
                                $tipoDenuncia = "Solicitud de documentos o dinero adicional";
                                break;
                            case "h":
                                $tipoDenuncia = "Otro";
                                break;
                        } 
                        ?>
                        <tr>
                            <td><?php echo $row->id_denuncia; ?></td>
                            <td><?php echo $row->asunto; ?></td> 
                            <td><?php echo $tipoDenuncia; ?></td>
                            <td><?php echo $row->descripcion; ?></td>
                            <td><?php echo $row->nombre_evidencia; ?></td>
                            <td>
                                <div class="acciones-btn">
                                    <div class="editar-btn">
                                        <a href="modificarusuario.php?id=<?php echo $row->id_usuario; ?>">
                                            <button>
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="eliminar-btn">
                                        <a onclick="return confirmar()" href="servidor/eliminar.php?id=<?php echo $row->id_usuario; ?>">
                                            <button>
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                
                                
                            </td>
                        </tr>
                        <?php
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