/* ========================SHOW MENU================ */
/* ==================MENU SHOW======== */
/* VALIDATE IF CONSTANT EXISTS */

/* ===============HIDE SHOW================== */
/* ====================VALIDATE ID CONSTANTS EXISTS============== */
/* ====================== IMAGE GALLERY===================*/
function imgGallery() {
  const mainImg=document.querySelector('.details__img'),
  smallImg=document.querySelectorAll('.details__small-img');

  smallImg.forEach((img) => {
    img.addEventListener('click', function(){
      mainImg.src = this.src;
      
    });
  });
}
imgGallery();
/* ===================SWIPER CATEGORIES==================== */

var swiper = new Swiper(".mySwiper", {
    spacebetween: 15,
    loop: true,
    navigation: {
        
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
     
        breakpoints: {
          640: {
            slidesPerView: 4,
            spaceBetween: 15,
          },
          768: {
            slidesPerView: 5,
            spaceBetween: 15,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 15,
          },
        },
});
/* ==============================SWIPER PRODUCTS================= */
var swiperProducts = new Swiper(".new__container", {
  spacebetween: 15,
  loop: true,
  navigation: {
      
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
   
      breakpoints: {
        640: {
          slidesPerView: 4,
          spaceBetween: 15,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 15,
        },
      },
});
/* =================PRODUCTS TABS=========================== */
const tabs=document.querySelectorAll('[data-target]'),
tabContents =document.querySelectorAll('[content]');
tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.target);
    tabContents.forEach((tabContent) => {
      tabContent.classList.remove('active-tab');
    });
    target.classList.add('active-tab');
    tabs.forEach((tab) => {
      tab.classList.remove('active-tab');
    });
    tab.classList.add('active-tab');
  });
});