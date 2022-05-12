// /^[A-Z]{1,2}\s\d{4}\s([B-D]|[F-H]|[J-N]|[P-T]|[V-Z]){3}$/
const formulario = document.getElementById('form-dciudadana-p'); //Acceder a formulario
const inputs = document.querySelectorAll('#form-dciudadana-p input'); //Acceder a inputs

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,60}$/, // Letras y espacios, pueden llevar acentos.
    edad: /^[0-9]{2,2}$/, // Limitar la edad.
    telefono: /^\d{10,15}$/, // 10 a 15 numeros.
    identificativo: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	clave: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/, //Letras mayúsculas y minúsculas, caracteres especiales y mínimo 8 dígitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/ //Formato de correo
	
}
          
const validarFormulario = (e) => { //Identificar y validar inputs.
    switch (e.target.name){
        case "nombre":
            if(expresiones.nombre.test(e.target.value)){
                document.getElementById('div-nombre').classList.remove('incorrecto');
                document.getElementById('form_nombre').classList.remove('incorrecto');
            } else {
                document.getElementById('div-nombre').classList.add('incorrecto');
                document.getElementById('form_nombre').classList.add('incorrecto');
            }
        break;
        case "edad":
            
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

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario); //Evento soltar tecla.
    input.addEventListener('blur', validarFormulario);  //Evento click fuera de input.
});

formulario.addEventListener('submit', (e) => {   //Evento de botón.
    e.preventDefault();
})