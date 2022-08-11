const formulario = document.getElementById('form-dciudadana-p'); //Acceder a formulario
const inputs = document.querySelectorAll('#form-dciudadana-p input'); //Acceder a inputs
const textareas = document.querySelectorAll('#form-dciudadana-p textarea'); //Acceder a textarea

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{0,60}$/, // Letras y espacios, pueden llevar acentos.
    edad: /^([0-9\s?\-?][\s]?){2}$/, // Limitar la edad.
    telefono: /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{2}[-\s\.]?[0-9]{2}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Formato de correo
    direccion: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\s]){0,200}$/,  //Formato de dirección
    asunto: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\s]){0,60}$/,
    //descripcion: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\s]){0,1000}$/
    descripcion: /^([\s\S]){0,1000}$/
}
          
const campos = {
    nombre: false,
    edad: false,
    telefono: false,  
    correo: false,
    direccion: false,
    asunto: false,
    descripcion: false,
    evidencia: false
}

const validarFormulario = (e) => { //Identificar y validar inputs.
    switch (e.target.name){
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre', 'div-nombre', 'form_nombre', 'alerta-nombre');
        break;
        case "edad":  
            verificarEdad(expresiones.edad, e.target, 'edad', 'div-edad', 'form_edad', 'alerta-edad');            
        break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono', 'div-telefono', 'form_telefono', 'alerta-telefono');
        break;
        case "correo":
            validarCampo(expresiones.correo, e.target, 'correo', 'div-correo', 'form_correo', 'alerta-correo');
        break;
        case "direccion":
            validarCampo(expresiones.direccion, e.target, 'direccion', 'div-direccion', 'form_direccion', 'alerta-direccion');
        break;
        case "asunto":
            validarCampo(expresiones.asunto, e.target, 'asunto', 'div-asunto', 'form_asunto', 'alerta-asunto');
        break;
        case "descripcion":
            validarTextarea(expresiones.descripcion, e.target, 'descripcion', 'div-descripcion', 'form_descripcion_dc', 'alerta-descripcion');
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

function validarSexo(ideUno, ideDos, ideTres){
    let divSexo = document.getElementById("form_sexo");
    let sexo = divSexo.value;

    if(sexo==""){  //Si no se ha seleccionado opción de sexo. 
        document.getElementById(ideUno).classList.add('incorrecto');
        document.getElementById(ideDos).classList.add('input-incorrecto');
        document.getElementById(ideTres).classList.add('alerta-incorrecto'); 
                         //Se impide enviar datos por 2 segundos.
        setTimeout(() => {
            document.getElementById(ideUno).classList.remove('incorrecto');
            document.getElementById(ideDos).classList.remove('input-incorrecto'); 
            document.getElementById(ideTres).classList.remove('alerta-incorrecto');

            document.getElementById('boton-registrar').disabled = false;
            document.getElementById('boton-registrar').classList.remove('deshabilitado');
        },2000);
        return false;
    }else if(sexo == "F" || sexo == "M" || sexo == "I"){ //Si se ha seleccionado una opción. 
        document.getElementById(ideUno).classList.remove('incorrecto');
        document.getElementById(ideDos).classList.remove('input-incorrecto'); 
        document.getElementById(ideTres).classList.remove('alerta-incorrecto');
        return true;
    }
}

function validarTipo(ideUno, ideDos, ideTres){
    let divTipo = document.getElementById("form_tipo");
    let tipo = divTipo.value;
    if(tipo==""){  //Si no se ha seleccionado opción de sexo. 
        document.getElementById(ideUno).classList.add('incorrecto');
        document.getElementById(ideDos).classList.add('input-incorrecto');
        document.getElementById(ideTres).classList.add('alerta-incorrecto'); 
                         //Se impide enviar datos por 2 segundos.
        setTimeout(() => {
            document.getElementById(ideUno).classList.remove('incorrecto');
            document.getElementById(ideDos).classList.remove('input-incorrecto'); 
            document.getElementById(ideTres).classList.remove('alerta-incorrecto');

            document.getElementById('boton-registrar').disabled = false;
            document.getElementById('boton-registrar').classList.remove('deshabilitado');
        },2000);
        return false;
    }else if(tipo!=""){ //Si se ha seleccionado una opción. 
        document.getElementById(ideUno).classList.remove('incorrecto');
        document.getElementById(ideDos).classList.remove('input-incorrecto'); 
        document.getElementById(ideTres).classList.remove('alerta-incorrecto');
        return true;
    }
}

const validarTextarea = (expresion, textarea, campo, ideUno, ideDos, ideTres) => {
    if(expresion.test(textarea.value)){
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

const verificarEdad = (expresion, input, campo, ideUno, ideDos, ideTres) => {
    
    if(expresion.test(input.value)){
     if(input.value >= 18 && input.value <= 100) {
        document.getElementById(ideUno).classList.remove('incorrecto');
        document.getElementById(ideDos).classList.remove('input-incorrecto'); 
        document.getElementById(ideTres).classList.remove('alerta-incorrecto');
        campos[campo] = true;
    } else {
        document.getElementById(ideUno).classList.add('incorrecto');
        document.getElementById(ideDos).classList.add('input-incorrecto');
        document.getElementById(ideTres).classList.add('alerta-incorrecto');
        campos[campo] = false;
    }} else {
        document.getElementById(ideUno).classList.add('incorrecto');
        document.getElementById(ideDos).classList.add('input-incorrecto');
        document.getElementById(ideTres).classList.add('alerta-incorrecto');
        campos[campo] = false;
    }
}

const validarEvidencia = () => {
    var evidencia = document.getElementById('evidencia');
    var archivo = evidencia.value;
    var extensiones = /(.pdf|.docx|.jpg|.png|.PDF|.DOCX|.JPG|.PNG)$/i;


    if(archivo == ""){
        campos["evidencia"] = true;
        return true

    }else{
        var peso = evidencia.files[0].size;

                //Si se cumplen las condiciones
        if(extensiones.exec(archivo)){  
            if(peso < 16777216){
                document.getElementById('alerta-evidencia-peso').classList.remove('alerta-incorrecto');
                document.getElementById('div-archivo').classList.remove('control-archivo-incorrecto');
                campos["evidencia"] = true;
                return true;

                //Si no se cumplen las condiciones
            }else{
                evidencia.value = "";
                document.getElementById('alerta-evidencia-peso').classList.add('alerta-incorrecto'); 
                document.getElementById('div-archivo').classList.add('control-archivo-incorrecto');
                            //Se impide enviar datos por 8 segundos.
                setTimeout(() => { 
                    document.getElementById('alerta-evidencia-peso').classList.remove('alerta-incorrecto'); 
                    document.getElementById('div-archivo').classList.remove('control-archivo-incorrecto');

                    document.getElementById('boton-registrar').disabled = false;
                    document.getElementById('boton-registrar').classList.remove('deshabilitado');
                },8000);

                campos["evidencia"] = false;
                return false;
            }
        }else if(!extensiones.exec(archivo)){ 
            evidencia.value = "";

            document.getElementById('alerta-evidencia').classList.add('alerta-incorrecto'); 
            document.getElementById('div-archivo').classList.add('control-archivo-incorrecto');
                            //Se impide enviar datos por 8 segundos.
            setTimeout(() => { 
                document.getElementById('alerta-evidencia').classList.remove('alerta-incorrecto'); 
                document.getElementById('div-archivo').classList.remove('control-archivo-incorrecto');

                document.getElementById('boton-registrar').disabled = false;
                document.getElementById('boton-registrar').classList.remove('deshabilitado');
            },8000);
            campos["evidencia"] = false;
            return false;
        }
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario); //Evento soltar tecla.
    input.addEventListener('blur', validarFormulario);  //Evento click fuera de input.
});

textareas.forEach((textarea) => {
    textarea.addEventListener('keyup', validarFormulario); //Evento soltar tecla.
    textarea.addEventListener('blur', validarFormulario);  //Evento click fuera de input.
});

const analizarCampos = () => {
    /*console.log("nombre " + campos.nombre);
    console.log("edad " +campos.edad);
    console.log("telefono " +campos.telefono);
    console.log("correo " +campos.correo);
    console.log("direccion " +campos.direccion);*/
    if(campos.nombre && campos.edad && campos.telefono && campos.correo && campos.direccion && campos.asunto && campos.descripcion){
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

    
    if(!validarSexo('div-sexo', 'form_sexo', 'alerta-sexo') || !validarTipo('div-tipo', 'form_tipo', 'alerta-tipo')){
        e.preventDefault();
    }

    if(!validarEvidencia()){
        e.preventDefault();
    }

    if(campos.nombre && campos.edad && campos.telefono && campos.correo && campos.direccion && campos.asunto && campos.descripcion && campos.evidencia){
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