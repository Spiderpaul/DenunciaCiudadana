// /^[A-Z]{1,2}\s\d{4}\s([B-D]|[F-H]|[J-N]|[P-T]|[V-Z]){3}$/
const formulario = document.getElementById('form-dciudadana-p'); //Acceder a formulario
const inputs = document.querySelectorAll('#form-dciudadana-p input'); //Acceder a inputs

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{0,60}$/, // Letras y espacios, pueden llevar acentos.
    edad: /^([0-9])\d{1,2}$/, // Limitar la edad.
    telefono: /^\d{7,14}$/,
    //telefono: /^\d{3}[\s-]\d{3}[\s-]\d{2}[\s-]\d{2}{10,15}$/, // 10 a 15 numeros.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Formato de correo
    identificativo: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	clave: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/ //Letras mayúsculas y minúsculas, caracteres especiales y mínimo 8 dígitos.
	
	
}
          
const validarFormulario = (e) => { //Identificar y validar inputs.
    switch (e.target.name){
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'div-nombre', 'form_nombre', 'alerta-nombre');
        break;
        case "edad":
            validarCampo(expresiones.edad, e.target, 'div-edad', 'form_edad', 'alerta-edad');
        break;
        case "telefono":
            
        break;
        case "correo":
            
        break;
        case "direccion":
            
        break;
        case "identificativo":
            
        break;
        case "area":
            
        break;
        case "contraseña":
            
        break;
        case "confirmar":
            
        break;
    }
}

const validarCampo = (expresion, input, campoUno, campoDos, campoTres) => {
    if(expresion.test(input.value)){
        document.getElementById(campoUno).classList.remove('incorrecto');
        document.getElementById(campoDos).classList.remove('input-incorrecto'); 
        document.getElementById(campoTres).classList.remove('alerta-incorrecto');
    } else {
        document.getElementById(campoUno).classList.add('incorrecto');
        document.getElementById(campoDos).classList.add('input-incorrecto');
        document.getElementById(campoTres).classList.add('alerta-incorrecto');
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario); //Evento soltar tecla.
    input.addEventListener('blur', validarFormulario);  //Evento click fuera de input.
});

formulario.addEventListener('submit', (e) => {   //Evento de botón.
    e.preventDefault();
})