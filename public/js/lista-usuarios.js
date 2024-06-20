function abrebotao(id) {
    document.getElementById(id).style.display = "flex";

}
function fechabotao(id) {
    document.getElementById(id).style.display = "none";
}




function mostrarSenha(id_senha, id_olho) {
    var senha = document.getElementById(id_senha)
    var botao = document.getElementById(id_olho)
    if (senha.type == 'password') {
        senha.setAttribute('type', 'text')
        botao.setAttribute('src', '../../../public/assets/olho-fechado.svg')
    }
    else {
        senha.setAttribute('type', 'password')
        botao.setAttribute('src', '../../../public/assets/olho-aberto.svg')
    }
}
function mostrarSenhaAdc() {
    var senha1 = document.getElementById('senha1')
    var botao1 = document.getElementById('icone-olho1')
    if (senha1.type == 'password') {
        senha1.setAttribute('type', 'text')
        botao1.setAttribute('src', '/public/assets/olho-fechado.svg')
    }
    else {
        senha1.setAttribute('type', 'password')
        botao1.setAttribute('src', '/public/assets/olho-aberto.svg')
    }
}
let texto = document.getElementById("valida").innerHTML
function validaEmail() {
    var aux = 0;
    let email = document.getElementById("email-test").value;
    emailsMD5.forEach((emailMD5) => {
        if (md5(email) === emailMD5) {
            aux = 1;
        }
    });
    if (aux == 1) {
        document.getElementById("valida").innerHTML = 'Email já cadastrado!';

    } else {
        document.getElementById("valida").innerHTML = '';
    }
    aux = 0;

}
function validaForm() {
    var aux1 = 0;
    let email = document.getElementById("email-test").value;
    emailsMD5.forEach((emailMD5) => {
        if (md5(email) === emailMD5) {
            aux1 = 1;
        }
    });
    if (aux1 == 1) {
        return false;
    } else {
        return true;
    }
}

function abrePag(num) {
    window.location.href = "#" + num;
    document.getElementById('pag-mob').style.display = 'none';
    document.getElementById('dropdown').style.display = 'flex';
}