const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    apellidoPaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    apellidoMaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    contraseña: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{10}$/ // 10 numeros.
}

const campos = {
    usuario: false,
    nombre: false,
    apellidoPaterno: false,
    apellidoMaterno: false,
    contraseña: false,
    correo: false,
    telefono: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "usuario":
            validarCampo(expresiones.usuario, e.target, 'usuario');
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "apellidoPaterno":
            validarCampo(expresiones.apellidoPaterno, e.target, 'apellidoPaterno');
            break;
        case "apellidoMaterno":
            validarCampo(expresiones.apellidoMaterno, e.target, 'apellidoMaterno');
            break;
        case "contraseña":
            validarCampo(expresiones.contraseña, e.target, 'contraseña');
            validarContraseña2();
            break;
        case "contraseña2":
            validarContraseña2();
            break;
        case "correo":
            validarCampo(expresiones.correo, e.target, 'correo');
            break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        // Iconos
        document.querySelector(`#grupo-${campo} i`).classList.add('fa-check');
        document.querySelector(`#grupo-${campo} i`).classList.add('formulario-estado-validacion-correcto');
        document.querySelector(`#grupo-${campo} i`).classList.remove('formulario-estado-validacion-incorrecto');
        document.querySelector(`#grupo-${campo} i`).classList.remove('fa-xmark');
        // Fin Iconos
        document.querySelector(`#grupo-${campo} .formulario-input-error`).classList.remove('formulario-input-error-activo');
        campos[campo] = true;
    } else {
        // Iconos
        document.querySelector(`#grupo-${campo} i`).classList.remove('fa-check');
        document.querySelector(`#grupo-${campo} i`).classList.remove('formulario-estado-validacion-correcto');
        document.querySelector(`#grupo-${campo} i`).classList.add('formulario-estado-validacion-incorrecto');
        document.querySelector(`#grupo-${campo} i`).classList.add('fa-xmark');
        // Fin iconos 
        document.querySelector(`#grupo-${campo} .formulario-input-error`).classList.add('formulario-input-error-activo');
        campos[campo] = false;
    }
}

const validarContraseña2 = () => {
    const inputContraseña1 = document.getElementById('contraseña');
    const inputContraseña2 = document.getElementById('contraseña2');

    if (inputContraseña1.value !== inputContraseña2.value) {
        // Iconos
        document.querySelector(`#grupo-contraseña2 i`).classList.remove('fa-check');
        document.querySelector(`#grupo-contraseña2 i`).classList.remove('formulario-estado-validacion-correcto');
        document.querySelector(`#grupo-contraseña2 i`).classList.add('formulario-estado-validacion-incorrecto');
        document.querySelector(`#grupo-contraseña2 i`).classList.add('fa-xmark');
        // Fin Iconos
        document.querySelector(`#grupo-contraseña2 .formulario-input-error`).classList.add('formulario-input-error-activo');
        campos['contraseña'] = false;
    } else {
        // Iconos
        document.querySelector(`#grupo-contraseña2 i`).classList.add('fa-check');
        document.querySelector(`#grupo-contraseña2 i`).classList.add('formulario-estado-validacion-correcto');
        document.querySelector(`#grupo-contraseña2 i`).classList.remove('formulario-estado-validacion-incorrecto');
        document.querySelector(`#grupo-contraseña2 i`).classList.remove('fa-xmark');
        // Fin Iconos
        document.querySelector(`#grupo-contraseña2 .formulario-input-error`).classList.remove('formulario-input-error-activo');
        campos['contraseña'] = true;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    const terminos = document.getElementById('terminos');

    if (campos.usuario && campos.nombre && campos.apellidoPaterno && campos.apellidoMaterno && campos.contraseña && campos.correo && campos.telefono && terminos.checked) {
    }else{
        e.preventDefault();
    }
});