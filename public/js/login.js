var senha = document.getElementById('senha')
var botao = document.getElementById('icone-olho')

function mostrarSenha(){
    if(senha.type == 'password'){
        senha.setAttribute('type', 'text')
        botao.setAttribute('src', '/public/assets/olho-fechado.svg')
    }
    else{
        senha.setAttribute('type', 'password')
        botao.setAttribute('src', '/public/assets/olho-aberto.svg')
    }
}