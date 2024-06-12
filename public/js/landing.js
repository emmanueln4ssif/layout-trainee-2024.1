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



function mudafoto() {
  var imagem = document.getElementById("mainimg-id");
  imagem.src = "../../../public/assets/arte2.svg";
  sleep(250).then(() => { imagem.src = "../../../public/assets/arte1.svg"; });
}



setInterval(function () { ; mudafoto() }, 3500);

function posts() {
  window.open("https://www.youraddress.com", "_self")
}

function scrolla() {
  let bt1 = document.getElementById("pe");
  bt1.scrollIntoView({ behavior: 'smooth' });
} 