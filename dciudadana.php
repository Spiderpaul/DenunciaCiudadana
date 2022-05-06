<?php require('./vistas/cabecera.php')?>
    <div class="div-formulario">
        <div class="div-titulo">
            <p>Datos personales</p>
        </div>
    
        <form id="form-dciudadana-p" class="form-dciudadana-p" action="#" method="post">

            <div class="div-form-p">
                <div class="control-form">
                    <div class="control1-p">
                        <div class="div-nombre">
                            <p>Nombre</p>
                            <input type="text" class="form-control" name="nombre" id="form-nombre" 
                            placeholder="   Ingrese su nombre completo" required>
                        </div>
                        <div class="div-edad">
                            <p>Edad</p>
                            <input type="text" class="form-control" name="edad" id="form-edad" 
                            placeholder="   Ingrese su edad" required>
                        </div>
                        <div class="div-sexo">
                            <p>Sexo</p>
                            <select class="form-select" name="sexo" id="form-select">
                                <option value="I">Indefinido</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="control2-p">
                        <div class="control2-p-hijo">
                            <p>Teléfono</p>
                            <input type="text" class="form-control" name="telefono" id="form-telefono" 
                            placeholder="   000-000-00-00" required>
                        </div>
                        <div class="control2-p-hijo">
                            <p>Correo electrónico</p>
                            <input type="text" class="form-control" name="correo" id="form-correo" 
                            placeholder="   ejemplo@mail.com" required>
                        </div>
                    </div>
                    <div class="control3-p">
                        <div class="control3-p-hijo">
                                <p>Dirección</p>
                                <input type="text" class="form-control" name="direccion" id="form-direccion" 
                                placeholder="   Escriba su dirección de domicilio" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-titulo-d">
                <p>Datos de denuncia</p>
            </div>

            <div class="div-form-d">
                <div class="control-form">
                    <div class="control1">
                        <p>Asunto</p>
                        <input type="text" class="form-control" name="asunto" id="form-asunto" 
                        placeholder="   Escriba el asunto que desea denunciar" required>
                    </div>
                    <div class="control2">
                        <p>Descripción</p>
                        <textarea rows="10" cols="40" class="form-control" name="descripcion" id="form-descripcion" required>
                        </textarea>  
                    </div>
                </div>
            </div>
            
            <div class="boton-form">
                    <button class="boton-registrar" type="submit">Enviar</button>
            </div>
        
        </form>
    </div>
<?php require('./vistas/pie.php')?>

