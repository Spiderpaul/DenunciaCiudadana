<?php require('./vistas/cabecera.php')?>
    <div class="div-formulario">

        <div class="mensaje" id="mensaje">
            <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
            <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
        </div>

        <div class="div-titulo">
            <p>Datos personales</p>
        </div>
    
        <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/registrardc.php" method="post"
        enctype="multipart/form-data">

            <div class="div-form-p">
                <div class="control-form">
                    <div class="control1-p">
                        <div class="div-nombre" id="div-nombre">
                            <p>Nombre</p>
                            <input type="text" class="form-control" name="nombre" id="form_nombre" 
                            placeholder="   Ingrese su nombre completo">
                            <p class="alerta-nombre" id="alerta-nombre">Ejemplo: Luis Herrera López</p>
                        </div>
                        <div class="div-edad" id="div-edad">
                            <p>Edad</p>
                            <input type="text" class="form-control" name="edad" id="form_edad" 
                            placeholder="   Ingrese su edad">
                            <p class="alerta-edad" id="alerta-edad">Debe ser mayor de 18 años y menor que 100 años</p>
                        </div>
                        <div class="div-sexo" id="div-sexo">
                            <p>Sexo</p>
                            <select class="form-select" name="sexo" id="form-select">
                                <option value="I">Indefinido</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="control2-p">
                        <div class="div-telefono" id="div-telefono">
                            <p>Teléfono</p>
                            <input type="text" class="form-control" name="telefono" id="form_telefono" 
                            placeholder="   000-000-00-00">
                            <p class="alerta-telefono" id="alerta-telefono">Formatos válidos: 0000000000 / 000 000 00 00 / 000-000-00-00</p>
                        </div>
                        <div class="div-correo" id="div-correo">
                            <p>Correo electrónico</p>
                            <input type="text" class="form-control" name="correo" id="form_correo" 
                            placeholder="   ejemplo@mail.com">
                            <p class="alerta-correo" id="alerta-correo">Formato de correo: ejemplo@correo.com</p>
                        </div>
                    </div>
                    <div class="control3-p-dc">
                        <div class="div-direccion" id="div-direccion">
                                <p>Dirección</p>
                                <input type="text" class="form-control" name="direccion" id="form_direccion" 
                                placeholder="   Escriba su dirección de domicilio">
                                <p class="alerta-direccion" id="alerta-direccion">
                                    Escriba su calle, número de casa y colonia, con un máximo de 200 caracteres
                                </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-titulo-d">
                <p>Datos de denuncia</p>
            </div>

            <div class="div-form-d">
                <div class="control-form">
                    <div class="asunto-tipo">
                        <div class="div-asunto" id="div-asunto">
                            <p>Asunto</p>
                            <input type="text" class="form-control" name="asunto" id="form-asunto" 
                            placeholder="   Escriba el asunto que desea denunciar">
                            <p class="alerta-asunto" id="alerta-asunto">
                                Escriba el título de la denuncia, máximo 60 caracteres.
                            </p>
                        </div>
                        <div class="control1" id="div-denuncia">
                            <p>Tipo de denuncia</p>
                            <select class="form-select" name="tipo" id="form_select">
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
                    
                    <div class="div-descripcion" id="div-descripcion">
                        <p>Descripción</p>
                        <textarea rows="10" cols="40" class="form-control" name="descripcion" id="form-descripcion-dc">
                        </textarea> 
                        <p class="alerta-descripcion" id="alerta-descripcion">
                            Describa el problema a denunciar, máximo 500 caracteres.
                        </p> 
                    </div>
                    <div class="control-archivo">
                        <p>Adjuntar documento (opcional)</p>
                        <input type="file" class="evidencia" name="evidencia" id="evidencia">
                    </div>
                </div>
            </div>
            
            <div class="boton-form">
                    <button class="boton-registrar" id="boton-registrar" type="submit">Enviar</button>
            </div>
        
        </form>
    </div>
    <script src="js/dciudadana.js"></script>
<?php require('./vistas/pie.php')?>

