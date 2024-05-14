function abrebotao (id){
    document.getElementById(id).style.display = "flex";

}
function fechabotao (id){
    document.getElementById(id).style.display = "none";
}




function mostrarSenha(){
    var senha = document.getElementById('senha')
    var botao = document.getElementById('icone-olho')
    if(senha.type == 'password'){
        senha.setAttribute('type', 'text')
        botao.setAttribute('src', '/public/assets/olho-fechado.svg')
    }
    else{
        senha.setAttribute('type', 'password')
        botao.setAttribute('src', '/public/assets/olho-aberto.svg')
    }
}
function mostrarSenhaAdc(){
    var senha1 = document.getElementById('senha1')
    var botao1 = document.getElementById('icone-olho1')
    if(senha1.type == 'password'){
        senha1.setAttribute('type', 'text')
        botao1.setAttribute('src', '/public/assets/olho-fechado.svg')
    }
    else{
        senha1.setAttribute('type', 'password')
        botao1.setAttribute('src', '/public/assets/olho-aberto.svg')
    }
}