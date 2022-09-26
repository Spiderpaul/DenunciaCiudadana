<?php require('./vistas/cabecera.php') ?>


<div class="div-formulario-i">
    <div class="mensaje" id="mensaje">
        <p class="mensaje-texto1" id="mensaje-texto1">Debe llenar correctamente los datos.</p>
        <p class="mensaje-texto2" id="mensaje-texto2">Procesando registro.</p>
    </div>

    <div class="div-titulo-i">
        <p>Inicio de sesión</p>
    </div>

    <form id="form-dciudadana-p" class="form-dciudadana-p" action="servidor/iniciar.php" method="POST">

        <div class="div-form-i">
            <div class="control-form-i">
                <div class="control1-i">
                    <div class="div-identificativo-i" id="div-identificativo-i">
                        <p>Identificativo</p>
                        <input type="text" class="form-control" name="identificativo" id="form_identificativo">
                        <p class="alerta-identificativo" id="alerta-identificativo">Ejemplo de formato: SP-00X / SP-0000X</p>
                    </div>
                </div>
                <div class="control2-i">
                    <div class="div-clave-i" id="div-clave-i">
                        <p>Contraseña</p>
                        <input type="password" class="form-control" name="clave" id="form_clave">
                        <p class="alerta-clave" id="alerta-clave">Debe contener letras, números, símbolos, mínimo 8 caracteres</p>
                    </div>
                </div>
                <div class="div-captcha">
                    <div class="uno"></div>
                    <div class="g-recaptcha" data-sitekey="6LdyP_ofAAAAAC6eC90cO5tBcYKO1nE1ENpPGgLJ"></div>
                    <div class="dos"></div>
                </div>
            </div>
        </div>

        <div class="boton-form-i">
            <button class="boton-registrar" id="boton-registrar" type="submit" disabled>Enviar</button>
        </div>
    </form>

</div>
<script src="js/iniciarsesion.js"></script>
<?php require('./vistas/pie.php') ?>