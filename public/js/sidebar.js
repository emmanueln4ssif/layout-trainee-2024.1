// Seleciona o elemento
var elemento = document.getElementById("meuElemento");

// Função para mostrar o elemento
function mostrarElemento() {
    elemento.style.display = "block";
    setTimeout(function() {
        elemento.style.opacity = "1";
    }, 50); // Pequeno atraso para garantir que o display: block seja aplicado primeiro
}

// Função para esconder o elemento
function esconderElemento() {
    elemento.style.opacity = "0";
    setTimeout(function() {
        if (elemento.style.opacity === "0") {
            elemento.style.display = "none";
        }
    }, 500); // Atraso deve ser igual à duração da transição de opacidade
}

// Adiciona transição de opacidade ao elemento
elemento.style.transition = "opacity 0.5s";
