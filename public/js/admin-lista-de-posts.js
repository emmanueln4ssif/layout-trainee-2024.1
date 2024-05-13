function abrirModal(idmodal){
  document.getElementById(idmodal).style.display = "flex";
}

function fecharModal(idmodal){
  document.getElementById(idmodal).style.display = "none";
}

function verifica(){
  document.getElementById("img").value = null;
  document.getElementById("img").onchange = function(){
      document.getElementById("imgname").innerHTML=document.getElementById("img").value;
  }
}

document.getElementById('img').addEventListener('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (event) {
      document.getElementById('preview').src = event.target.result;
      document.getElementById('preview').style.display = 'block';
  }
  reader.readAsDataURL(e.target.files[0]);
});