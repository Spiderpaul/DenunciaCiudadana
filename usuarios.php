<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/conexion.php'; ?>

<div class="contenedor-tabla">
    <div class="cabecera-tabla">
        <div class="herramientas">
            <ul>
                
                <li>
                    <a href="aregistrarusuario.php">
                        <button >
                            <i class="material-icons" >add_circle</i>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <div class="buscador">
            <input type="text" class="buscador-input">
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
                if($dbh != null){
                    $stmt = $dbh->prepare("SELECT * FROM `servidor publico`;");
                    $stmt->execute();

                    while($row = $stmt->fetch()){
            ?>
            <tr>
                <!---
                <td class="tabla-checkbox"><input type="radio" name="seleccionar" value=""></td>
                --->
                <td><?php echo $row->id_usuario; ?></td>
                <td><?php echo $row->nombre; ?></td> 
                <td><?php echo $row->edad; ?></td>
                <td><?php echo $row->sexo; ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->correo; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->area; ?></td>
                <td><?php echo $row->rol_usuario; ?></td>
                <td>
                    <div class="acciones-btn">
                        <div class="editar-btn">
                            <a href="servidor/crud/actualizar.php?id=<?php echo $row->id_usuario; ?>">
                                <button>
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                        </div>
                        <div class="eliminar-btn">
                            <a href="servidor/crud/eliminar.php?id=<?php echo $row->id_usuario; ?>">
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

<?php require('./vistas/pie.php')?>