<?php
include 'conexion.php';

function modificar($dbh, $idUsuario)
{
    try {
        $stmt = $dbh->prepare("SELECT * FROM `servidor publico` WHERE id_usuario = ?;");
        $stmt->bindParam(1, $idUsuario);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
?>

            <div class="div-form-p">
                <div class="control-form">
                    <div class="control1-p">
                        <div class="div-nombre" id="div-nombre">
                            <p>Nombre</p>
                            <input type="text" class="form-control" name="nombre" id="form_nombre" value="<?php echo $row->nombre; ?>">
                            <p class="alerta-nombre" id="alerta-nombre">Escriba un nombre válido</p>
                        </div>
                        <div class="div-edad" id="div-edad">
                            <p>Edad</p>
                            <input type="text" class="form-control" name="edad" id="form_edad" value="<?php echo $row->edad; ?>">
                            <p class="alerta-edad" id="alerta-edad">El rango válido de edad es entre 18 y 100 años</p>
                        </div>
                        <div class="div-sexo" id="div-sexo">
                            <p>Sexo</p>
                            <select class="form-select" name="sexo" id="form_select">
                                <?php if ($row->sexo == "I") { ?>
                                    <option value="I" selected>Indefinido</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                <?php } else if ($row->sexo == "F") { ?>
                                    <option value="I">Indefinido</option>
                                    <option value="F" selected>Femenino</option>
                                    <option value="M">Masculino</option>
                                <?php } else { ?>
                                    <option value="F">Femenino</option>
                                    <option value="I">Indefinido</option>
                                    <option value="M" selected>Masculino</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control2-p">
                        <div class="div-telefono" id="div-telefono">
                            <p>Teléfono</p>
                            <input type="text" class="form-control" name="telefono" id="form_telefono" value="<?php echo $row->telefono; ?>">
                            <p class="alerta-telefono" id="alerta-telefono">Formatos válidos: 0000000000 / 000 000 00 00 / 000-000-00-00</p>
                        </div>
                        <div class="div-correo" id="div-correo">
                            <p>Correo electrónico</p>
                            <input type="text" class="form-control" name="correo" id="form_correo" value="<?php echo $row->correo; ?>">
                            <p class="alerta-correo" id="alerta-correo">Formato de correo: ejemplo@correo.com</p>
                        </div>
                    </div>
                    <div class="control3-p">
                        <div class="div-direccion" id="div-direccion">
                            <p>Dirección</p>
                            <input type="text" class="form-control" name="direccion" id="form_direccion" value="<?php echo $row->direccion; ?>">
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
                            <input type="text" class="form-control" name="identificativo" id="form_identificativo" value="<?php echo $row->id_usuario; ?>" readonly>
                            <p class="alerta-identificativo" id="alerta-identificativo">Ejemplo de formato: SP-00X / SP-0000X</p>
                        </div>
                        <div class="div-area" id="div-area">
                            <p>Área de trabajo</p>
                            <input type="text" class="form-control" name="area" id="form_area" value="<?php echo $row->area; ?>">
                            <p class="alerta-area" id="alerta-area">Solo texto con un máximo de 45 caracteres</p>
                        </div>
                    </div>
                    <div class="control5-t">
                        <div class="div-clave" id="div-clave">
                            <p>Contraseña</p>
                            <input type="password" class="form-control" name="clave" id="form_clave" value="">
                            <p class="alerta-clave" id="alerta-clave">Debe contener letras, números, símbolos, mínimo 8 caracteres</p>
                        </div>
                        <div class="div-confirmar" id="div-confirmar">
                            <p>Confirmar contraseña</p>
                            <input type="password" class="form-control" name="confirmar" id="form_confirmar">
                            <p class="alerta-confirmar" id="alerta-confirmar">La contraseña no coincide</p>
                        </div>
                    </div>
                    <div class="div-captcha">
                        <div class="uno"></div>
                        <div class="g-recaptcha" data-sitekey="6LdyP_ofAAAAAC6eC90cO5tBcYKO1nE1ENpPGgLJ"></div>
                        <div class="dos"></div>
                    </div>
                </div>
            </div>

            <div class="boton-form-modificar">
                <div class="btn-cancelar">
                    <button class="boton-cancelar-m" id="boton-cancelar" type="submit">Cancelar</button>
                </div>
                <div class="btn-registrar">
                    <button class="boton-registrar-m" id="boton-registrar" type="submit">Enviar</button>
                </div>
            </div>
<?php
        }
    } catch (PDOException $e) {
        echo '<script language="javascript">
            alert("Se ha detectado un error al conectar a la base de datos");
            window.history.back();
            </script>';
    }
}
?>