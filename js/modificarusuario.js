const formulario = document.getElementById('form-dciudadana-p'); //Acceder a formulario
const inputs = document.querySelectorAll('#form-dciudadana-p input'); //Acceder a inputs

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{0,60}$/, // Letras y espacios, pueden llevar acentos.
    edad: /^([0-9\s?\-?][\s]?){2}$/, // Limitar la edad.
    telefono: /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{2}[-\s\.]?[0-9]{2}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Formato de correo
    direccion: /^([A-Za-z0-9À-ÿ\_\-\.\,\#\s]){0,200}$/,
    identificativo: /^[a-zA-Z0-9]{2}[\_\-][a-zA-Z0-9]{2,5}$/, // Letras, numeros, guion y guion_bajo
    area: /^([A-Za-zÀ-ÿ\_\-\.\,\#\s]){0,45}$/,
	clave: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,45}$/ //Letras mayúsculas y minúsculas, caracteres especiales y mínimo 8 dígitos.
}
          
const campos = {
    nombre: true,
    edad: true,
    telefono: true,  
    correo: true,
    direccion: true,
    area: true,
    clave: true,
    confirmar: false
}

const btnCancelar = document.getElementById('boton-cancelar');
const btnRegistrar = document.getElementById('boton-registrar');

btnCancelar.addEventListener('click', () => {
    location.href="usuarios.php";
});

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
        case "area":
            validarCampo(expresiones.area, e.target, 'area', 'div-area', 'form_area', 'alerta-area');
        break;
        case "clave":
            validarCampo(expresiones.clave, e.target, 'clave', 'div-clave', 'form_clave', 'alerta-clave');
            ConfirmarClave();
        break;
        case "confirmar":
            RepetirClave();
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

const ConfirmarClave = () => {
    const inputClave1 = document.getElementById('form_clave');
    const inputClave2 = document.getElementById('form_confirmar');

    if(inputClave1.value !== inputClave2.value){
        document.getElementById('div-confirmar').classList.add('incorrecto');
        document.getElementById('form_confirmar').classList.add('input-incorrecto'); 
        document.getElementById('alerta-confirmar').classList.add('alerta-incorrecto');
        campos.clave = false;
    } else {
        document.getElementById('div-confirmar').classList.remove('incorrecto');
        document.getElementById('form_confirmar').classList.remove('input-incorrecto'); 
        document.getElementById('alerta-confirmar').classList.remove('alerta-incorrecto');
        campos.clave = true;
    }
}

const RepetirClave = () => {
    const inputClave3 = document.getElementById('form_clave');
    const inputClave4 = document.getElementById('form_confirmar');

    if(inputClave3.value !== inputClave4.value){
        document.getElementById('div-confirmar').classList.add('incorrecto');
        document.getElementById('form_confirmar').classList.add('input-incorrecto'); 
        document.getElementById('alerta-confirmar').classList.add('alerta-incorrecto');
        campos.confirmar = false;
    } else {
        document.getElementById('div-confirmar').classList.remove('incorrecto');
        document.getElementById('form_confirmar').classList.remove('input-incorrecto'); 
        document.getElementById('alerta-confirmar').classList.remove('alerta-incorrecto');
        campos.confirmar = true;
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
    console.log("direccion " +campos.direccion);
    console.log("area " +campos.area);
    console.log("clave " +campos.clave);
    console.log("confirmar " +campos.confirmar);*/
    if(campos.nombre && campos.edad && campos.telefono && campos.correo && campos.direccion && campos.area && campos.confirmar){
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
    console.log("direccion " +campos.direccion);
    console.log("identificativo " +campos.identificativo);
    console.log("area " +campos.area);
    console.log("clave " +campos.clave);
    console.log("confirmar " +campos.confirmar);*/
    if(campos.nombre && campos.edad && campos.telefono && campos.correo && campos.direccion && campos.area && campos.confirmar ){
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
