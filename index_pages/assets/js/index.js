/* ========================SHOW MENU================ */
/* ==================MENU SHOW======== */
/* VALIDATE IF CONSTANT EXISTS */

/* ===============HIDE SHOW================== */
/* ====================VALIDATE ID CONSTANTS EXISTS============== */
/* ====================== IMAGE GALLERY===================*/



/* =========================home swiper======================= */

var swiper = new Swiper(".home_swiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  
});
/* ===================SWIPER CATEGORIES==================== */
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".swiper-slide");
  const enableLoop = slides.length > 5; // Only enable loop if there are enough slides

  var swiper = new Swiper(".swiper.categories__container", {
    spaceBetween: 15,
    loop: enableLoop,  // ✅ Loop only if slides are enough
    autoplay: {
      delay: 2500,  // ✅ Auto-slide every 2.5 seconds
      disableOnInteraction: false,  // ✅ Keeps autoplay running after manual swipe
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    touchEventsTarget: 'container', // ✅ Enables touch support on entire container
    grabCursor: true, // ✅ Shows grab cursor on hover
    keyboard: {
      enabled: true,  // ✅ Enables keyboard arrow navigation
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

  // ✅ Ensure buttons are clickable manually
  document.querySelector(".swiper-button-next").addEventListener("click", () => {
    swiper.slideNext();
  });

  document.querySelector(".swiper-button-prev").addEventListener("click", () => {
    swiper.slidePrev();
  });
});



/* document.addEventListener("DOMContentLoaded", function () {
  const container_cat = document.querySelector(".categories__container");

  if (container_cat) { // Ensure container exists before adding event listeners
    var swiper = new Swiper(".category_Swiper", {
      spaceBetween: 15,
      loop: true,
      speed: 6000,
      freeMode: true,
      allowTouchMove: true, // ✅ Allow manual swiping
      autoplay: {
        delay: 0, 
        disableOnInteraction: false, // ✅ Continue autoplay after interaction
      },
      navigation: { // ✅ Add Prev/Next buttons
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        640: {
          slidesPerView: 3,
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

    // Remove Autoplay when hovering
    container_cat.addEventListener("mouseenter", () => swiper.autoplay.stop());
    container_cat.addEventListener("mouseleave", () => swiper.autoplay.start());
  }
}); */


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
          slidesPerView: 3,
          spaceBetween: 15,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 2,
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


/* =============================cart================= */

let iconCart = document.querySelector('.iconCart');
let cart = document.querySelector('.cart_slide');
let header = document.querySelector('.header');
let close = document.querySelector('.close');
let container = document.querySelector('.container'); // Make sure to define the container

iconCart.addEventListener('click', () => {
  // Use getComputedStyle to reliably get the current 'right' value
  if (cart.style.right === '-100%') {
    cart.style.right = '0';
    container.style.transform = 'translateX(-400px)';
    console.log('hello');
  } else {
    cart.style.right = '-100%';
    container.style.transform = 'translateX(0)';
  }
});

close.addEventListener( 'click', () => {
  cart.style.right= '-100%';
  container.style.transform='translateX(0)';
})

function changeQuantity($idproduct,$type){
  switch($type){
    case '+':
    listCart[$idproduct].quantity++;
    break;
    case '-':
      listCart[$idproduct].quantity--;
      if(listCart[$idproduct] <=0){
        delete listcart[$idproduct];
      }
      break; 

      default:
        break;
  }
}

const list_cart=document.querySelector('cart_list');

function scrollbottom(){
  list_cart.scrollTop = list_cart.scrollHeight;
}
scrollbottom();


    // JavaScript to toggle dropdown visibility
    function toggleDropdown() {
      const dropdown = document.getElementById("dropdown");
      dropdown.classList.add("active"); // Show the menu when mouse is over the link
  }
  
  function closeDropdown() {
      const dropdown = document.getElementById("dropdown");
      dropdown.classList.remove("active"); // Hide the menu when mouse leaves the dropdown area
  }
  

    //theme=============================
// script.js
document.addEventListener("DOMContentLoaded", () => {
  const themeToggle = document.getElementById("theme-toggle");
  const body = document.getElementById("body");

  // Function to set the theme
  function setTheme(theme) {
      body.className = theme; // Set the theme class on the body
      localStorage.setItem("theme", theme); // Store the selected theme in local storage
  }

  // Check local storage for the saved theme
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme) {
      setTheme(savedTheme); // Apply the saved theme
  } else {
      setTheme("light-theme"); // Default theme
  }

  // Toggle theme on button click
  themeToggle.addEventListener("click", () => {
      const currentTheme = body.className;
      const newTheme = currentTheme === "light-theme" ? "dark-theme" : "light-theme";
      setTheme(newTheme);
  });
});





//CATEGORIES SECTION FOR SCROLLING ===============================ACCORDIAN
function scrollToView(element) {
// Scrolls the parent container to show the hovered element at the top
element.scrollIntoView({ behavior: "smooth", block: "nearest" });
}

// Add event listeners for hover on each accordion item
document.querySelectorAll('.accordion-item').forEach(item => {
item.addEventListener('mouseover', function() {
    scrollToView(this);
});
});

//The result box on the search input================================================
document.querySelector('.checkbox').addEventListener('change', function() {
const resultBox = document.querySelector('.result_box');
if (this.checked) {
    resultBox.style.display = 'none';  // Hide results otherwise
} else {
   
    resultBox.style.display = 'block'; // Show results when checked
}
});

//Drop down on the header==================================================
// JavaScript to toggle dropdown visibility
function toggleDropdown() {
  const dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("active"); // Toggle the 'active' class to show/hide the menu
}

// Close the dropdown if clicked outside
window.onclick = function(event) {
  const dropdown = document.getElementById("dropdown");
  if (!dropdown.contains(event.target)) {
    dropdown.classList.remove("active");
  }
};
//The country dropdown on the header and the language================================================
// Toggle dropdown visibility
document.getElementById('countryToggle').addEventListener('click', function(event) {
event.preventDefault(); // Prevent link default behavior
document.getElementById('countryMenu').classList.toggle('show');
});

// Update selected language
document.querySelectorAll('.dropdown-item_country').forEach(item => {
item.addEventListener('click', function() {
const selectedLang = this.getAttribute('data-lang'); // Get language code
const languageText = this.textContent; // Get display text

// Update the displayed language
document.getElementById('selectedLanguage').textContent = languageText;

// Close the dropdown
document.getElementById('countryMenu').classList.remove('show');

// Optional: Add real-time language switching logic here
// You could trigger a translation function, reload the page with ?lang=selectedLang, etc.
});
});

document.// Close dropdown if clicked outside
addEventListener('click', function(event) {
if (!document.getElementById('countryToggle').contains(event.target)) {
document.getElementById('countryMenu').classList.remove('show');
}
});

//=======================searchinng================================
