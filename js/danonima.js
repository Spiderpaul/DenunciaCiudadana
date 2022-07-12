const formulario = document.getElementById('form-dciudadana-p'); //Acceder a formulario
const inputs = document.querySelectorAll('#form-dciudadana-p input'); //Acceder a inputs

const expresiones = {
    asunto: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\s]){0,60}$/,
    descripcion: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\s]){0,500}$/
}
          
const campos = {
    asunto: false,
    descripcion: false
}

const validarFormulario = (e) => { //Identificar y validar inputs.
    switch (e.target.name){
        case "asunto":
            validarCampo(expresiones.asunto, e.target, 'asunto', 'div-asunto', 'form_asunto', 'alerta-asunto');
        break;
        case "descripcion":
            validarCampo(expresiones.descripcion, e.target, 'descripcion', 'div-descripcion', 'form_descripcion-dc', 'alerta-descripcion');
        break;
    }
}

const validarCampo = (expresion, input, campo, ideUno, ideDos, ideTres) => {
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
    /*console.log("nombre " + campos.nombre);
    console.log("edad " +campos.edad);
    console.log("telefono " +campos.telefono);
    console.log("correo " +campos.correo);
    console.log("direccion " +campos.direccion);*/
    if(campos.asunto && campos.descripcion){
        document.getElementById('boton-registrar').disabled = false;
        document.getElementById('boton-registrar').classList.remove('deshabilitado');
    }
}

formulario.addEventListener('mouseout', (e) =>{
    analizarCampos();
})

formulario.addEventListener('submit', (e) => {   //Evento de botón.
    /*console.log("nombre " + campos.nombre);
    console.log("edad " +campos.edad);
    console.log("telefono " +campos.telefono);
    console.log("correo " +campos.correo);
    console.log("direccion " +campos.direccion);*/
    if(campos.asunto && campos.descripcion){
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