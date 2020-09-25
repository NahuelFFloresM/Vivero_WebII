"use strict";

this.generarCaptcha();

let btn = document.getElementById("btn-enviar");
btn.addEventListener("click", validarFormulario, false);

function validarFormulario(event) {
    event.preventDefault();

    let form = document.getElementById('formulario');
    form.checkValidity();
    form.reportValidity();
    
    let formValido = true;
    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("e-mail").value;
    //let comentario
    let captcha = document.getElementById("captchaInput").value;
    let captchaValido = document.getElementById("captchaNumero").innerHTML;
    
    if (nombre === "") {
        //Falta el nombre
        formValido = false;    
    }
    if (email === "") {
        //Falta el e-mail
        formValido = false; 
    }
    if (captcha !== captchaValido){
        //Captcha no válido
        formValido = false;
        document.getElementById("captchaError").innerHTML= "Codigo Invalido";
       
    }

    if (formValido) {
        alert("Gracias por tu Mensaje!");
        form.submit();
    }
    
}
function generarCaptcha() {
    let captcha = 0;
    for (let i = 0; i < 8; i++) {
        const digito = Math.floor((Math.random() * 10));
        captcha = captcha * 10 + digito;
    }
    document.getElementById("captchaNumero").innerHTML = captcha;
}