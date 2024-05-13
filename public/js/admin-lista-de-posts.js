
document.getElementById('img-edita').addEventListener('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (event) {
      document.getElementById('preview').src = event.target.result;
      document.getElementById('preview').style.display = 'block';
  }
  reader.readAsDataURL(e.target.files[0]);
});
document.getElementById('img-adc').addEventListener('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (event) {
      document.getElementById('preview').src = event.target.result;
      document.getElementById('preview').style.display = 'block';
  }
  reader.readAsDataURL(e.target.files[0]);
});
function abrirModal(idmodal){
  document.getElementById(idmodal).style.display = "flex";
}

function fecharModal(idmodal){
  document.getElementById(idmodal).style.display = "none";
}




document.getElementById('data').valueAsDate = new Date();
document.getElementById('data-adc').valueAsDate = new Date();
document.getElementById('dataat').valueAsDate = new Date();