function onload(i){ //cria um vetor com uma ordem aleatoria para as imagens e popula o slideshow
    id="blo"+i.toString();
    var ar = gerarArrayAleatorio(12);
    for(k=0;k<12;k++){
      document.getElementById(id).innerHTML += '<div class="swiper-slide"><img src="../../../public/assets/capas/capa'+ar[k]+'.jpg"></div>';
    }    
}

onload(1);
onload(2);
onload(3);
onload(4);

function gerarArrayAleatorio(tamanho) {
  var array = [];
  for(var i = 1; i <= tamanho; i++) {
      array.push(i);
  }
  array.sort(function() {
      return .5 - Math.random();
  });
  return array;
}




const swiper1 = new Swiper(".bloco1", {
  direction: "vertical",
  loop: true,
  autoplay: {
  delay: 4000,
  reverseDirection: true,
  disableOnInteraction: false,
},
});
const swiper2 = new Swiper(".bloco2", {
  direction: "vertical",
  loop: true,
  autoplay: {
  delay: 4000,
  
  disableOnInteraction: false,
}
});
const swiper3 = new Swiper(".bloco3", {
  direction: "vertical",
  loop: true,
  autoplay: {
  delay: 4000,
  disableOnInteraction: false,
},
});
const swiper4 = new Swiper(".bloco4", {
  direction: "vertical",
  loop: true,
  autoplay: {
  delay: 4000,
  reverseDirection: true,
  disableOnInteraction: false,
},
});
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}



function mudafoto(){
  var imagem = document.getElementById("mainimg-id");
  imagem.src = "../../../public/assets/arte2.svg";
  sleep(300).then(() => { imagem.src = "../../../public/assets/arte1.svg"; });
}



setInterval(function() {; mudafoto() }, 3500);



