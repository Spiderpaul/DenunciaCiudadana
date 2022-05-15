<?php require('./vistas/cabecera.php')?>

<div class="div-formulario">
    <div class="mensaje" id="mensaje">
        <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
        <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
    </div>

    <div class="div-titulo">
        <p>Datos personales</p>
    </div>
    
    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/registraru.php" method="POST">

        <div class="div-form-p">
            <div class="control-form">
                <div class="control1-p">
                    <div class="div-nombre" id="div-nombre">
                        <p>Nombre</p>
                        <input type="text" class="form-control" name="nombre" id="form_nombre" 
                        placehorder="Ingrese su nombre completo">
                        <p class="alerta-nombre" id="alerta-nombre">Escriba un nombre válido</p>
                    </div>
                    <div class="div-edad" id="div-edad">
                        <p>Edad</p>
                        <input type="text" class="form-control" name="edad" id="form_edad">
                        <p class="alerta-edad" id="alerta-edad">El rango válido de edad es entre 18 y 100 años</p>
                    </div>
                    <div class="div-sexo" id="div-sexo">
                        <p>Sexo</p>
                        <select class="form-select" name="sexo" id="form_select">
                            <option value="I">Indefinido</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="control2-p" >
                    <div class="div-telefono" id="div-telefono">
                        <p>Teléfono</p>
                        <input type="text" class="form-control" name="telefono" id="form_telefono">
                        <p class="alerta-telefono" id="alerta-telefono">Formatos válidos: 0000000000 / 000 000 00 00 / 000-000-00-00</p>
                    </div>
                    <div class="div-correo" id="div-correo">
                        <p>Correo electrónico</p>
                        <input type="text" class="form-control" name="correo" id="form_correo">
                        <p class="alerta-correo" id="alerta-correo">Formato de correo: ejemplo@correo.com</p>
                    </div>
                </div>
                <div class="control3-p">
                    <div class="div-direccion" id="div-direccion">
                        <p>Dirección</p>
                        <input type="text" class="form-control" name="direccion" id="form_direccion">
                        <p class="alerta-direccion" id="alerta-direccion">Ingrese su dirección de casa</p>
                    </div>
                </div>
            </div>
        </div>

    <div class="div-titulo-d">
        <p>Datos laborales</p>
    </div>

    <div class="div-form-d">
        <div class="control-form">
            <div class="control4-t">
                <div class="div-identificativo" id="div-identificativo">
                    <p>Identificativo</p>
                    <input type="text" class="form-control" name="identificativo" id="form_identificativo" value="SP-">
                    <p class="alerta-identificativo" id="alerta-identificativo">Ejemplo de formato: SP-00X / SP-0000X</p>
                </div>
                <div class="div-area" id="div-area">
                    <p>Área de trabajo</p>
                    <input type="text" class="form-control" name="area" id="form_area">  
                    <p class="alerta-area" id="alerta-area">Solo texto con un máximo de 45 caracteres</p>  
                </div>
            </div>
            <div class="control5-t">
                <div class="div-clave" id="div-clave">
                    <p>Contraseña</p>
                    <input type="password" class="form-control" name="clave" id="form_clave"> 
                    <p class="alerta-clave" id="alerta-clave">Debe contener letras, números, símbolos, mínimo 8 caracteres</p>   
                </div>
                <div class="div-confirmar" id="div-confirmar">
                    <p>Confirmar contraseña</p>
                    <input type="password" class="form-control" name="confirmar" id="form_confirmar">   
                    <p class="alerta-confirmar" id="alerta-confirmar">La contraseña no coincide</p> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="boton-form">
            <button class="boton-registrar" id="boton-registrar" type="submit">Enviar</button>
    </div>
    
    </form>
    
</div>

<script src="js/registrarusuario.js"></script>
<?php require('./vistas/pie.php')?>