const formulario = document.getElementById('form-dciudadana-p'); //Acceder a formulario
const inputs = document.querySelectorAll('#form-dciudadana-p input'); //Acceder a inputs

const expresiones = {
    identificativo: /^[a-zA-Z0-9]{2}[\_\-][a-zA-Z0-9]{2,5}$/, // Letras, numeros, guion y guion_bajo
	clave: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,45}$/ //Letras mayúsculas y minúsculas, caracteres especiales y mínimo 8 dígitos.
}
          
const campos = {
    identificativo: false,
    clave: false,
}

const validarFormulario = (e) => { //Identificar y validar inputs.
    switch (e.target.name){
        case "identificativo":
            validarCampo(expresiones.identificativo, e.target, 'identificativo', 'div-identificativo-i', 'form_identificativo', 'alerta-identificativo');
        break;
        case "clave":
            validarCampo(expresiones.clave, e.target, 'clave', 'div-clave-i', 'form_clave', 'alerta-clave');
        break;
    }
}

const validarCampo = (expresion, input, campo, ideUno, ideDos, ideTres) => {
    console.log(ideUno);
    console.log(ideDos);
    console.log(ideTres);
    if(expresion.test(input.value)){
        document.getElementById(ideUno).classList.remove('incorrecto');
        document.getElementById(ideDos).classList.remove('input-incorrecto'); 
        document.getElementById(ideTres).classList.remove('alerta-incorrecto');
        campos[campo] = true;
    } else {
        document.getElementById(ideUno).classList.add('incorrecto');
        document.getElementById(ideDos).classList.add('input-incorrecto');
        document.getElementById(ideTres).classList.add('alerta-incorrecto');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario); //Evento soltar tecla.
    input.addEventListener('blur', validarFormulario);  //Evento click fuera de input.
});

const analizarCampos = () => {
    /*console.log("identificativo " +campos.identificativo);
    console.log("clave " +campos.clave);*/
    if(campos.identificativo && campos.clave){
        document.getElementById('boton-registrar').disabled = false;
        document.getElementById('boton-registrar').classList.remove('deshabilitado');
    }
}

formulario.addEventListener('mouseout', (e) =>{
    analizarCampos();
})

formulario.addEventListener('submit', (e) => {   //Evento de botón.
    /*console.log("identificativo " +campos.identificativo);
    console.log("clave " +campos.clave);*/
        
    if(campos.identificativo && campos.clave){
        document.getElementById('mensaje').classList.add('mensaje-exito');
        document.getElementById('mensaje-texto2').classList.add('mensaje-texto-exito');
        setTimeout(() => {
            e.preventDefault();
            document.getElementById('mensaje').classList.remove('mensaje-exito');
            document.getElementById('mensaje-texto2').classList.remove('mensaje-texto-exito');
        }, 5000);
    } else {
        document.getElementById('boton-registrar').classList.add('deshabilitado');
        document.getElementById('boton-registrar').disabled = true;
        document.getElementById('mensaje').classList.add('mensaje-error');
        document.getElementById('mensaje-texto1').classList.add('mensaje-texto-error');
        setTimeout(() => {
            document.getElementById('mensaje').classList.remove('mensaje-error');
            document.getElementById('mensaje-texto1').classList.remove('mensaje-texto-error');
        }, 5000);
        e.preventDefault();
    }

})