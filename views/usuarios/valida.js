const formulario = document.getElementById('usuarios');
const inputs = document.querySelectorAll('#usuarios input');
const passwordValid = {
	mayusculas: /[A-Z]+/, // Al menos una mayúscula
	minusculas: /[a-z]+/, // Letras y espacios, pueden llevar acentos.
	numeros: /[0-9]+/, // 4 a 12 digitos.
	simbolos:  /[!@#\$%\^\&*\)\(+=._-]+/,
	longitud: /^.{8,20}$/ // 7 a 14 numeros.
}
const emailvalid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
const campos = {
	password: false,
	correo: false,
    documento: false
}
let passw=''
let passwr=''
const validarFormulario = (e) => {
    if (e.target.name==='pass'){
        if (!passwordValid.longitud.test(e.target.value) || !passwordValid.mayusculas.test(e.target.value) ||!passwordValid.minusculas.test(e.target.value)||!passwordValid.numeros.test(e.target.value)||!passwordValid.simbolos.test(e.target.value)){
            document.querySelector(`#grupo_pass .formulario__input-error`).classList.add('formulario__input-error-activo'); 
            campos[e.target.name] = false;
        }else{
            document.querySelector(`#grupo_pass .formulario__input-error`).classList.remove('formulario__input-error-activo')
            passw=e.target.value
            if (passwr){
                if(passwr!==e.target.value){
                    document.querySelector(`#grupo_rpass .formulario__input-error`).classList.add('formulario__input-error-activo'); 
                }else{
                    document.querySelector(`#grupo_rpass .formulario__input-error`).classList.remove('formulario__input-error-activo')
                }
            }
            campos[e.target.name] = true
        }
       
    }else if (e.target.name==='correo'){
        if (!emailvalid.test(e.target.value)){
            document.querySelector(`#grupo_correo .formulario__input-error`).classList.add('formulario__input-error-activo'); 
            campos[e.target.name] = false;
        }else{
            document.querySelector(`#grupo_correo .formulario__input-error`).classList.remove('formulario__input-error-activo')
            campos[e.target.name] = true
        }
        
    }else if (e.target.name==='rpass'){
        passwr=e.target.value
        if (!(e.target.value==passw)){
            document.querySelector(`#grupo_rpass .formulario__input-error`).classList.add('formulario__input-error-activo'); 
            campos[e.target.name] = false;
        }else{
            document.querySelector(`#grupo_rpass .formulario__input-error`).classList.remove('formulario__input-error-activo')
            campos[e.target.name] = true
        }
    }
}
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

