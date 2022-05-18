<?php require('./vistas/cabecera.php')?>
    <div class="div-formulario">

        <div class="mensaje" id="mensaje">
            <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
            <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
        </div>

        <div class="div-titulo">
            <p>Datos personales</p>
        </div>
    
        <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/registrardc.php" method="post">

            <div class="div-form-p">
                <div class="control-form">
                    <div class="control1-p">
                        <div class="div-nombre" id="div-nombre">
                            <p>Nombre</p>
                            <input type="text" class="form-control" name="nombre" id="form_nombre" 
                            placeholder="   Ingrese su nombre completo">
                            <p class="alerta-nombre" id="alerta-nombre">Escriba un nombre válido</p>
                        </div>
                        <div class="div-edad" id="div-edad">
                            <p>Edad</p>
                            <input type="text" class="form-control" name="edad" id="form_edad" 
                            placeholder="   Ingrese su edad">
                            <p class="alerta-edad" id="alerta-edad">El rango válido de edad es entre 18 y 100 años</p>
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
                                <p class="alerta-direccion" id="alerta-direccion">Ingrese su dirección de casa</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-titulo-d">
                <p>Datos de denuncia</p>
            </div>

            <div class="div-form-d">
                <div class="control-form">
                    <div class="control1" id="div-asunto">
                        <p>Asunto</p>
                        <input type="text" class="form-control" name="asunto" id="form-asunto" 
                        placeholder="   Escriba el asunto que desea denunciar" required>
                    </div>
                    <div class="control2" id="div-descripcion">
                        <p>Descripción</p>
                        <textarea rows="10" cols="40" class="form-control" name="descripcion" id="form-descripcion-dc" required>
                        </textarea>  
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

