function onload(i,k){ //cria um vetor com uma ordem aleatoria para as imagens e popula o slideshow
    id1="blo"+i.toString();
    id2="blo"+k.toString();
    var ar = gerarArrayAleatorio(12);

    for(k=0;k<12;k++){
      document.getElementById(id1).innerHTML += '<div class="swiper-slide"><img src="../../../public/assets/capas/capa'+ar[k]+'.jpg"></div>';
      if(k+1<12){
        document.getElementById(id2).innerHTML += '<div class="swiper-slide"><img src="../../../public/assets/capas/capa'+ar[k+1]+'.jpg"></div>';
      }
    }   
    document.getElementById(id2).innerHTML += '<div class="swiper-slide"><img src="../../../public/assets/capas/capa'+ar[0]+'.jpg"></div>'; 
}

onload(1,2);
onload(3,4);


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
  speed: 1500,
  draggable: false,
  allowTouchMove: false,
  autoplay: {
  delay: 4000,
  reverseDirection: true,
  disableOnInteraction: false,
},
});
const swiper2 = new Swiper(".bloco2", {
  direction: "vertical",
  loop: true,
  speed: 1500,
  draggable: false,
  allowTouchMove: false,
  autoplay: {
  delay: 4000,
  reverseDirection: true,
  disableOnInteraction: false,
}
});
const swiper3 = new Swiper(".bloco3", {
  direction: "vertical",
  loop: true,
  speed: 1500,
  draggable: false,
  allowTouchMove: false,
  autoplay: {
  delay: 4000,
  reverseDirection: true,
  disableOnInteraction: false,
},
});
const swiper4 = new Swiper(".bloco4", {
  direction: "vertical",
  loop: true,
  speed: 1500,
  draggable: false,
  allowTouchMove: false,
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
  sleep(250).then(() => { imagem.src = "../../../public/assets/arte1.svg"; });
}



setInterval(function() {; mudafoto() }, 3500);



