var senha = document.getElementById("senha"), senha_confirma = document.getElementById("senha_confirma");

function validateSenha(){
    if(senha.value != senha_confirma.value){
        senha_confirma.setCustomValidity("Senhas diferentes");
    }else{
        senha_confirma.setCustomValidity("");
        
    }
}

senha.onchange = validateSenha;
senha_confirma.onkeyup = validateSenha;

var usuario = document.getElementById("usuario");