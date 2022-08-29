const formulario = document.getElementById('seguimiento'); //Acceder a formulario
const textareas = document.querySelectorAll('#seguimiento textarea'); //Acceder a textarea

const expresiones = {
    observacion: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\"\!\¡\?\¿\$\/\(\)\=\'\*\+\{\}\[\]\s]){0,200}$/
}
          
const campos = {
    observacion: false
}

const btnCancelar = document.getElementById('btn-cancelarms');
const btnRegistrar = document.getElementById('btn-guardarms');

btnCancelar.addEventListener('click', (e) => {
    window.history.back();
    e.preventDefault();
});

const validarFormulario = (e) => { //Identificar y validar inputs.
    if(e.target.name == "nota"){
            validarTextarea(expresiones.observacion, e.target, 'observacion', 'nota-ms', 'nota-ms', 'alerta-nota');
    }
}

const validarTextarea = (expresion, textarea, campo, ideUno, ideDos, ideTres) => {
    //console.log(textarea.value);
    if(expresion.test(textarea.value)){
        //console.log("Textarea correcto");
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

function validarEstatus(ideUno, ideDos, ideTres){
    let divEstatus = document.getElementById("estatus-ms");
    let estatus = divEstatus.value;

    console.log(estatus);

    if(estatus=="En espera"){  //Si no se ha seleccionado opción de sexo. 
        console.log("No se ha seleccionado una opción");
        document.getElementById(ideUno).classList.add('incorrecto');
        document.getElementById(ideDos).classList.add('input-incorrecto');
        document.getElementById(ideTres).classList.add('alerta-incorrecto'); 
                         //Se impide enviar datos por 2 segundos.
        setTimeout(() => {
            document.getElementById(ideUno).classList.remove('incorrecto');
            document.getElementById(ideDos).classList.remove('input-incorrecto'); 
            document.getElementById(ideTres).classList.remove('alerta-incorrecto');

            document.getElementById('btn-guardarms').disabled = false;
            document.getElementById('btn-guardarms').classList.remove('deshabilitado');
        },2000);
        return false;
    }else { //Si se ha seleccionado una opción.
        console.log("Usted ha seleccionado una opción"); 
        document.getElementById(ideUno).classList.remove('incorrecto');
        document.getElementById(ideDos).classList.remove('input-incorrecto'); 
        document.getElementById(ideTres).classList.remove('alerta-incorrecto');
        return true;
    }
}

textareas.forEach((textarea) => {
    textarea.addEventListener('keyup', validarFormulario); //Evento soltar tecla.
    textarea.addEventListener('blur', validarFormulario);  //Evento click fuera de input.
});

const analizarCampos = () => {
    console.log("Observación " +campos.observacion);

    if(campos.observacion){
        document.getElementById('btn-guardarms').disabled = false;
        document.getElementById('btn-guardarms').classList.remove('deshabilitado');
    }
}

formulario.addEventListener('mouseout', () =>{
    analizarCampos();
})


btnRegistrar.addEventListener('click', (e) => {   //Evento de botón.
    /*console.log("nombre " + campos.nombre);
    console.log("edad " +campos.edad);
    console.log("telefono " +campos.telefono);
    console.log("correo " +campos.correo);
    console.log("direccion " +campos.direccion);*/

    console.log("Observación " +campos.observacion);
    //Verificar los Selects.


    if(!validarEstatus('estatus-ms', 'estatus-ms', 'alerta-estatus')){
        e.preventDefault();
    }

    if(!campos.observacion){
        document.getElementById('btn-guardarms').classList.add('deshabilitado');
        document.getElementById('btn-guardarms').disabled = true;
        document.getElementById('nota-ms').classList.add('incorrecto');
        document.getElementById('nota-ms').classList.add('input-incorrecto');
        document.getElementById('alerta-nota').classList.add('alerta-incorrecto');
        e.preventDefault();
    } 
});