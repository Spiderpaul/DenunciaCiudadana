<?php require('./vistas/cabecera.php')?>
<?php include 'servidor/sreportessp.php'; ?>


<div class="contenedor-tabla">
        <div class="cabecera-tabla-reportes">
            <div class="div-modulos"> 
                <ul>
                    <li>
                        <a href="reportesda.php">
                            <button class="btn-denuncia" name="btnda">
                                <i >Denuncia anónima</i>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="reportesdc.php">
                            <button class="btn-denuncia" name="btndc">
                                <i >Denuncia ciudadana</i>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="reportessp.php">
                            <button class="btn-denuncia" name="btnsp">
                                <i >Denuncia servidor público</i>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nombre-modulo">
                <h3>Denuncia Anónima</h3>
            </div>
       </div>
        <div class="contenedor-form">
            <form action="reportessp.php" method="post">
                <div class="filtros-reportes">
                    <div class="filtros-reportes-1">
                        <div class="reporte-id">
                            <h4>Id de denuncia:</h4>
                            <input type="text" name="id" class="filtro-input">
                        </div>
                        <div class="reporte-asesor">
                            <h4>Id de asesor:</h4>
                            <input type="text" name="asesor" class="filtro-input">
                        </div>
                        <div class="reporte-tipo">
                            <h4>Tipo de denuncia:</h4>
                            <select name="tipo" class="filtro-input">
                                <option value="" selected="">Ninguno</option>
                                <option value="Abuso de autoridad">Abuso de autoridad</option>
                                <option value="Acoso y Hostigamiento">Acoso y Hostigamiento</option>
                                <option value="Soborno para algún trámite o servicio">Soborno para algún trámite o servicio</option>
                                <option value="Incumplimiento o mal uso de un programa o acción social">Incumplimiento o mal uso de un programa o acción social</option>
                                <option value="Trato irrespetuoso y mala conducta">Trato irrespetuoso y mala conducta</option>
                                <option value="Servidor público autorisa, solicita o realiza actos para su beneficio">Servidor público autorisa, solicita o realiza actos para su beneficio</option>
                                <option value="Solicitud de documentos o dinero adicional para la expedición de documentos">Solicitud de documentos o dinero adicional para la expedición de documentos</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="filtros-reportes-2">
                        <div class="reporte-estatus">
                            <h4>Estatus:</h4>
                            <select name="estatus" class="filtro-input">
                                <option value="" selected="">Ninguno</option>
                                <option value="En espera">En espera</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="No aplica">No aplica</option>
                            </select>                        
                        </div>
                        <div class="reporte-fecha-desde">
                            <h4>Desde la fecha:</h4>
                                  <input type="date" name="desde" class="filtro-input">
                        </div>
                        <div class="reporte-fecha-hasta">
                            <h4>Hasta la fecha:</h4>
                            <input type="date" name="hasta" class="filtro-input">
                        </div>
                    </div>  
                    <div class="filtros-reportes-3">
                        <div class="reportes-boton">
                            <button>
                                <i class="material-icons">search</i>
                            </button>
                        </div>
                    </div>
                </div> 
            </form>
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
                    <th>Fecha</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    if($dbh != null){
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
        function confirmar(){
        var confirma = confirm("¿Seguro que desea eliminar el registro?");
        return confirma;
    }
</script>

<?php require('./vistas/pie.php')?>