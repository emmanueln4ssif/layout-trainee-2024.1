

document.getElementById('img-adc').addEventListener('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (event) {
    document.getElementById('preview').src = event.target.result;
    document.getElementById('preview').style.display = 'block';
  }
  reader.readAsDataURL(e.target.files[0]);
});

function abrirModal(idmodal) {
  document.getElementById(idmodal).style.display = "flex";
}

function fecharModal(idmodal) {
  document.getElementById(idmodal).style.display = "none";
}

document.getElementById('data-adc').valueAsDate = new Date();
document.getElementById('dataat').valueAsDate = new Date();

function controlaCampoNota(input){
  let valor = input.value;
  console.log(valor);

  valor = valor.replace(/[^0-9.]/g, '');

  if (valor.charAt(0) === '.') {
    valor = valor.slice(1);
  }

  if (valor.length > 3) {
    valor = valor.slice(0, 3);
  }

  if (valor.length === 1) {
    valor += '.';
  }

  const partes = valor.split('.');
  if (partes.length === 2 && partes[1].length > 1) {
      partes[1] = partes[1].slice(0, 1);
      valor = partes.join('.');
  }

  input.value = valor;
}