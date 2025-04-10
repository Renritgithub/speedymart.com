

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website
    </title>
    <link rel="stylesheet" href="assets/css/style.css?v=5.5">
    <link rel="stylesheet" href="assets/js/index.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>


<!-- react rendering link -->
<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<!-- Swiper CSS -->

<style>
    /* =========================categories============================== */

 /* =====================================home=============================== */
 .header__search {
    overflow: visible !important;
}

.container_search {
    display: flex;
    align-items: center;
    justify-content: center;
    position:relative;
}

.mainbox {
    display: flex;
    align-items: center;
    position: relative;
    width:100%;
    max-width: 400px; /* Increased default width of the container */
    transition: width 0.3s ease; /* Smooth shrinking effect */
}


.iconContainer {
    position:relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    cursor: pointer;
    margin-right: 8px; /* Adjust spacing */
    transition: opacity 0.3s ease, transform 0.3s ease; /* Smooth transition */
}
.search_icon, .camera_icon {
    width: 24px;
    height: 24px;
    fill: white; /* Default icon color */
    transition: fill 0.3s ease;
}

.search_icon:hover, .camera_icon:hover {
    fill:var(--first-color-alt); /* Hover effect color */
}

/* Initially visible */
.cameraContainer {
    opacity: 1;
    transform: scale(1);
}

/* Hide the camera icon when the input shrinks */
.cameraContainer.hide {
    opacity: 0;
    transform: scale(0.5);
    pointer-events: none;
}

.search_input {
    flex-grow: 1;
    padding: 8px 12px; /* Adjust the inner spacing */
    border:none; /* Hide the inner border */
    border-radius: 4px; /* Smooth rounded edges */
    outline: none; /* Remove focus outline */
    font-size: 16px;
    transition: width 0.3s ease, border-color 0.3s ease;
    width:100%;
    max-width: 350px; /* Default input width */
}

/* Shrink effect on focus */
.search_input:focus {
    width:100%;
    max-width: 500px; /* Shrink the input width */
}

/* Shrink the mainbox to match the input */
.search_input:focus ~ .cameraContainer {
    opacity: 0;
    transform: scale(0.5);
}
/* Search Container */
/* General Styling */
/* General Styling */


/* Animation for smooth appearance */
.search-container {
    display:none;
  position: fixed;
/* Wider width for the container */
  margin: 0 0 auto auto;
  top:120px;
  right:200px;
  z-index: 5;
 
}
/* Ensures a smooth transition effect */
.search-suggestions.show {
  opacity:1;
  filter: blur(0); 
}

/* Animation for smooth appearance */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateX(-50%) translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
  }
}

/* Search Suggestions Styling */
.search-suggestions {
  
  background: #f9f9f9;
  border-radius: 5px;
  padding: 10px;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
/* Keeps it from growing too tall */
  overflow-y: auto;
  width:100vh;
  height: 75vh;
  overflow:hidden;
  z-index:10;
  opacity: 0;
  filter: blur(10px); /* Add initial blur effect */
  transition: opacity 2s ease, filter 0.5s ease;
  
}
#search-bar {
  width: 100%;
  padding: 12px 16px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
/* Categories Bar */
.categories-bar {
  display: flex;
  gap: 15px;
  overflow-x: auto; /* Allow scrolling if too many categories */
  padding-bottom: 15px;
  border-bottom: 1px solid #eee;
}

.category {
  padding: 8px 12px;
  font-size: 14px;
  color: #fff;
  background-color: var(--first-color);
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  border:1px solid var(--first-color);
}

.category:hover {
  background-color:transparent;
  color:var(--first-color);
}

/* Content Section */
.suggestion-content {
  display: flex;
  gap: 20px;
  height:400px;
}

/* History Section */
.history-section {
  flex: 1;
  height:500px;
  width:400px;
  max-width: 250px; /* Wider history section */
  overflow-y: auto;
  border-right: 1px solid #eee;
  padding-right: 15px;
  scrollbar-width:none;
}
.history-section::-webkit-scrollbar {
  width: 8px; /* Width of the scrollbar */
}

.history-section::-webkit-scrollbar-thumb {
  background-color: #ccc; /* Color of the scrollbar handle */
  border-radius: 4px;
}

.history-section::-webkit-scrollbar-thumb:hover {
  background-color: #aaa; /* Darker shade when hovered */
}

.history-section h4 {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

.history-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.history-list li .hist_value{
  padding: 8px 0;
  font-size: 14px;
  color: #555;
  cursor: pointer;
  transition: color 0.3s;
}

.history-list li .hist_value:hover {
  color: var(--first-color);
}
.suggestion-content-live .history-list li {
    padding: 8px 0;
    font-size: 14px;
    color: #555;
    cursor: pointer;
    transition: color 0.3s;
  } 
  .suggestion-content-live .history-list li:hover {
    color: var(--first-color);
  }
/* Grid Section */
.grid-section {
  flex: 4;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap:5px; /* Increased spacing for a wide layout */
  overflow-y: visible;
  height:100%;
  overflow-x:hidden;
}
.grid-section::-webkit-scrollbar {
  display:none; /* Width of the scrollbar */
}

.suggestion-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 5px;
  border: 1px solid #eee;
  border-radius: 5px;
  text-align: center;
  transition: box-shadow 0.3s;
  cursor: pointer;
  width:110px;
  height:190px;

  
}

.suggestion-item:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.suggestion-item img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  margin-bottom: 1px;
  border-radius: 5px;
}

.product-name {
  font-size: 15px;
  font-weight: bold;
  color: #333;
  margin: 0;
}

.product-price {
  font-size: 14px;
  color: #888;
}

.suggestion-content-live{
    position:absolute;
    background-color: #fff;
    width:400px;
    border-top-left-radius:40px;
    border-top-right-radius:20px;
    border-bottom-left-radius:20px;
    border-bottom-right-radius:40px;
    padding-left:20px;
    padding-top:10px;
    display:none;
    scrollbar-width: none;
}
.delete_hist{
    font-size:40px;
    color:var(--first-color-alt);
}
.history-list li .delete_hist:hover{
    color:red;
}


.header__user-actions{
    column-gap: 1.25rem;
}
.header__action-btn{
    position: relative;
    color:rgb(24, 23, 23);
    padding-right:10px;
    cursor: pointer;
    font-size:20px;
    transition: 0.3s ease;

}
.header__action-btn:hover{
    color:var(--first-color);
    padding-bottom:3px;
}
.header__action-btn .count_action {
    background-color: var(--first-color-alt);
    width: 18px !important;
    font-size: 15px;
    flex-shrink: 0;
    height:18px;
    border-radius:50%;
    position:absolute;
    color:var(--first-color);
    top:0px;

}


@media screen and (max-width: 576px) {
   /*  .search_input:focus {
        max-width: 370px !important;
    } */

   /*  .history-section {
        max-width: 100%;
        border: none;
    } */

    /* .grid-section {
        grid-template-columns: repeat(2, 1fr);
    } */
    .hidden_object{
        display:none;
    }
    .hamburger{
        display:block;
    }
}

@media screen and (max-width: 768px) {
   /*  .suggestion-content {
        flex-direction: column;
    } */

    /* .history-section {
        order: 2;
    } */

   /*  .grid-section {
        order: 1;
    } */
    #toggleMenu{
        display:block;
    }
}

@media screen and (max-width: 992px) {
    .mainbox {
        max-width: 100%;
    }
}

.hidden-menu {
            position: fixed; /* Floats above everything */
            top: 50px; /* Adjust position */
            left: -300px; /* Initially hidden */
            width: 300px;
            height: auto;
            background: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            transition: left 0.3s ease-in-out;
            padding: 20px;
            overflow-y: auto;
            z-index: 9999; /* Stays above everything */
            border-radius: 10px;
            display:flex;
            flex-direction: column;
            padding-top: 10px;
            height:100vh;
        }

       /* Show the sidebar */
.hidden-menu.show {
    left: 0;
}
       

/* For active menu (you can toggle this class via JS) */
.hidden-menu.active {
    transform: translateX(0);
}

/* Header styles */
.hidden-menu .category_menu p {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.hidden-menu .accordion-item {
    margin-bottom: 15px;
}

.hidden-menu .accordion-header {
    padding: 10px;
    background-color: #444;
    cursor: pointer;
    font-size: 1.2em;
    border-radius: 5px;
}

.hidden-menu .accordion-header:hover {
    background-color: #555;
}

.hidden-menu .accordion-content {
    display: none;
    list-style-type: none;
    padding-left: 20px;
}

.hidden-menu .accordion-content li {
    padding: 5px 0;
}

/* Toggle content visibility on click */
.hidden-menu .accordion-item.active .accordion-content {
    display: block;
}

/* Links and button styles */
.hidden-menu .header__top-action {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    color: #000;
    font-size: 1.1em;
    text-decoration: none;
    padding: 10px 0;
    transition: background-color 0.3s ease;
}

.hidden-menu .header__top-action:hover {
    background-color: #444;
}

.header__top-action i {
    margin-right: 10px;
}

.hidden-menu  .btn-lang{
         width:20px;
         height:15px;
         background-color:var(--first-color);
         text-align:center;
         color:#ddd;
         border-radius:2px;
         padding-bottom:2px;
         align-items:center;
     }

.hidden-menu .btn-lang:hover {
    background-color: #555;
}

.hidden-menu .dropdown-menu_country {

    
    background-color: #444;
}

.hidden-menu .dropdown_app:hover .dropdown-menu_country {
    display: block;
}

.hidden-menu .dropdown-item_country {
    padding: 8px;
    color: #fff;
}

.hidden-menu .dropdown-item_country img {
    width: 20px;
    height: auto;
    margin-right: 10px;
}

.hidden-menu .dropdown-item_country:hover {
    background-color: #555;
}
.hidden-menu  .btn_user{
         background-color:var(--first-color);
         height:35px;
         width:35px;
         border-radius:50%;
         font-size:25px;
         color:white;
         font-weight:900;
   
   
     }
.hidden-menu  .country{
         display:flex;
         align-items:center;
         justify-content: flex-start;
     }
   
/* For the menu toggle button */
#menuToggle {
    display: none;
}

#menuToggle + .hidden-menu {
    display: block;
}

/* Menu Toggle */
#menuToggle:checked + .hidden-menu {
    transform: translateX(0);
}
 .hamburger{
    display:none;
}
.speedymart__img{
    width:30px;
    height:30px;
}
.speedymart{
    display:flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
        

/* =-==============================================================deals=========================================== */


</style>
    <!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XXXXXXXXXX');
</script>

</head>
<body>
    
    <script>
      document.addEventListener("DOMContentLoaded", function () {
    const menu = document.getElementById("hiddenMenu");
    const toggleBtn = document.getElementById("toggleMenu");

    // Toggle Sidebar
    toggleBtn.addEventListener("click", function () {
        menu.classList.toggle("show");
    });
})
    </script>


    <!--======================HEADER=================  -->
<header class="header">
   
    <div class="header__top">
    <div class="container header__container">
         <div class="hamburger" id="toggleMenu">
         <i class="fa-solid fa-bars"></i>
         </div>
            <div href="login-register.html" class="header__top-action" class="speedymart">
                <img class="speedymart__img" src="../images/icons/logo1speed mart.png" alt=""> <span>SpeedyMart</span>
             </div>
            
            <?php

if (!isset($_SESSION['user_id']) && !isset($_COOKIE['userToken'])) {
    // Show Login | Signup button if the user is not logged in
    echo '<a href="../user_area/user_loginnew.php" class="header__top-action hidden_object">
            <i class="fa-solid fa-user-tie"></i> <span id="log">Login | Signup</span>
          </a>';
} else {
    // Show Logout button if the user is logged in
    echo '<a href="../user_area/user_logout.php" class="header__top-action hidden_object">
            <i class="fa-solid fa-user-tie"></i> <span id="log">Logout</span>
          </a>';
}
?>

                
            <div class="dropdown_app hidden_object">
                <a class="header__top-action" href="#" id="countryToggle google_translate_element">
                  <i class="fa-solid fa-globe"></i>
                  <span id="lang"> Language: </span> 
                  <button class="btn-lang" id="selectedLanguage">En</button>
                </a>
                <div class="dropdown-menu_country" id="countryMenu">
                  <div class="dropdown-item_country" data-lang="sw" onclick="changeLanguage('sw')" >Swahili</div>
                  <div class="dropdown-item_country" data-lang="en" onclick="changeLanguage('En')">English</div>
                  <div class="dropdown-item_country" data-lang="fr" onclick="changeLanguage('fr')">French</div>
                  <div class="dropdown-item_country" data-lang="es" onclick="changeLanguage('es')">Spanish</div>
                </div>
              </div> 

            <div class="dropdown_app hidden_object">
                <a class="header__top-action country" href="#" id="countryToggle"><img src="images/icons/Congo (1).jpeg" alt="Congo Flag"><span>Tanzania</span> ▼</a>
                <div class="dropdown-menu_country">
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Kenya (1).jpeg" alt="Kenya Flag">
                    <a href="#">Kenya</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Uganda.jpeg" alt="Uganda Flag">
                    <a href="#">Uganda</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Congo (1).jpeg" alt="Congo Flag">
                    <a href="#">Congo</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Burundi.jpeg" alt="Burundi Flag">
                    <a href="#">Burundi</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Rwanda (1).jpeg" alt="Rwanda Flag">
                    <a href="#">Rwanda</a>
                  </div>
                </div>
              </div>

            
            <p class="header__alert-news">
                Super value Deals -Save more with coupons
            </p>
            <div class="dropdown_app hidden_object">
                <a class="header__top-action app" href="#" id="countryToggle"><i class="fa-solid fa-tablet-screen-button"></i>  Get our app</a>
                <div class="dropdown-menu_country">
                  <div class="dropdown-item_country">
                    <img src="../images/icons/PlayStore.jpeg" alt="Kenya Flag">
                    <a href="#">Playstore</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/appStore.jpeg" alt="Uganda Flag">
                    <a href="#">AppStore</a>
                  
                </div>
              </div>
              </div>
              <a href="../user_area/account.php" class="header__top-action hidden_object">
                <button class="btn_user">R</button>  <span id="account_id">My Account</span>
            </a>

        </div>
    </div>
    <nav class="nav container">
        <a href=" " class="nav__logo-img">
            <img src="" alt="hello">
    </a>
    <div class="nav__menu" id="nav-menu">
        <div class="navbar-bottom">
        <ul class="nav__list">
            <li class="nav__item"><a href="index.html" class="nav__link active-link"><i class="fa-solid fa-house"></i> Home</a></li>
            <li class="nav__item"><a href="shop.php" class="nav__link" id="shop" >Shop</a></li>
            <li class=" nav__item"><!-- Example single danger button -->
                <div class="dropdown" onmouseleave="closeDropdown()" id="dropdown" >
                    <a class="nav__link" href="#" onmouseover="toggleDropdown()"  id="shop_brand" >Shop By Brands</a>
                    <ul class="dropdown-menu"  id="brands_drop">
                      
                    </ul>
                  </div>
                </li>
        </ul>
        </div>
        
<div class="header__search">
   
   <div class="container_search">
       <div class="mainbox">
           <!-- Search Icon -->
           <div class="iconContainer">
               <svg viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="search_icon">
                   <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
               </svg>
           </div>
   
           <!-- Camera Icon -->
           <div class="iconContainer cameraContainer">
               <svg viewBox="0 0 24 24" height="1.5em" xmlns="http://www.w3.org/2000/svg" class="camera_icon">
                   <path d="M12 2a4 4 0 0 1 4 4h4a2 2 0 0 1 2 2v10a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V8a2 2 0 0 1 2-2h4a4 4 0 0 1 4-4zm0 2a2 2 0 0 0-2 2h4a2 2 0 0 0-2-2zM4 8v10a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V8H4zm8 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" fill="currentColor"/>
               </svg>
           </div>
   
           <!-- Search Input -->
           <input class="search_input" id="search_hist" placeholder="Search" type="text">
       </div>
   </div>
   <div class="suggestion-content-live">
       <!-- Search History -->
       <div class="history-section">
         <ul class="history-list">
          <!-- ============display all search here========================= -->
         </ul>
       </div>
   
   </div>
   
  <!--  <form action="post">
       <input type="text" placeholder="Search" name="text" class="form-input" name="search">
       <button class="search__btn" name="search-btn"><svg fill="hsl(10, 58%, 54%)" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
           <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
       </svg></button>
   </form> -->

   <div class="search-container">
       <div class="search-suggestions">
         <div class="categories-bar">
           <!-- <button class="category">Electronics</button>
           <button class="category">Home Appliances</button>
           <button class="category">Fashion</button>
           <button class="category">Toys</button>
           <button class="category">Sports</button>
           <button class="category">Books</button>
           <button class="category">Beauty</button> -->
         </div>
     
         <div class="suggestion-content">
           <!-- Search History -->
           <div class="history-section" >
             <h4>Search History</h4>
             <ul class="history-list" id="history">
               <!-- <li><span class="delete_hist">&times;</span> <span class="hist_value">Smartphone</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Headphones</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Watches</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">TV</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Camera</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Smartphone</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Headphones</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Watches</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">TV</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Camera</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Smartphone</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Headphones</span></li>
               <li><span class="delete_hist">&times;</span> <span class="hist_value">Watches</span></li>
               <li><span class="delete_hist">&times;</span> TV</li>
               <li><span class="delete_hist">&times;</span> Camera</li>
               <li><span class="delete_hist">&times;</span> Smartphone</li>
               <li><span class="delete_hist">&times;</span> Headphones</li>
               <li><span class="delete_hist">&times;</span> Watches</li>
               <li><span class="delete_hist">&times;</span> TV</li>
               <li><span class="delete_hist">&times;</span> Camera</li> -->
             </ul>
           </div>
     
           <!-- Grid of Items -->
           <div class="grid-section">
             <!-- <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 1" />
               <p class="product-name">Smartphone XYZ</p>
               <p class="product-price">$299.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 2" />
               <p class="product-name">Bluetooth Headphones</p>
               <p class="product-price">$49.99</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 3" />
               <p class="product-name">Wrist Watch</p>
               <p class="product-price">$199.99</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 4" />
               <p class="product-name">4K TV</p>
               <p class="product-price">$799.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 1" />
               <p class="product-name">Smartphone XYZ</p>
               <p class="product-price">$299.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 2" />
               <p class="product-name">Bluetooth Headphones</p>
               <p class="product-price">$49.99</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 3" />
               <p class="product-name">Wrist Watch</p>
               <p class="product-price">$199.99</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 4" />
               <p class="product-name">4K TV</p>
               <p class="product-price">$799.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 1" />
               <p class="product-name">Smartphone XYZ</p>
               <p class="product-price">$299.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 1" />
               <p class="product-name">Smartphone XYZ</p>
               <p class="product-price">$299.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 1" />
               <p class="product-name">Smartphone XYZ</p>
               <p class="product-price">$299.00</p>
             </div>
             <div class="suggestion-item">
               <img src="https://via.placeholder.com/100" alt="Product 1" />
               <p class="product-name">Smartphone XYZ</p>
               <p class="product-price">$299.00</p>
             </div> -->
           </div>
         </div>
       </div>
     </div>     
 
   </div>
</div>
<div class="header__user-actions">
    <a href="wishlist.html" class="header__action-btn"><i class="fa-solid fa-heart"></i><span><sup class="count" id="count_wish">5</sup></span></a>
    <button class="header__action-btn iconCart">
        <i class="fa-solid fa-cart-plus"></i>
        <span><sup class="count" id="count_cart">5</sup></span>
      </button>
      </div>
</div>
    </div>
</nav>
</header>

   <div class="cart_slide">
    <h2>CART</h2>
    <div class="cart_list" id="cart-list">
    <!--     <div class="listCart">
            <div class="item">
                <img src="images/kids/kids (1).jpeg" alt="">
                <div class="name">
                    Product Name
                </div>
                <div class="price">$50/1 Product
                </div>
                <div class="quantity">
                    <button>-</button>
                    <span  class="value">3</span>
                    <button>+</button>
                </div>
            </div>
    </div>
    <div class="listCart">
        <div class="item">
            <img src="images/kids/kids (1).jpeg" alt="">
            <div class="name">
                Product Name
            </div>
            <div class="price">$50/1 Product
            </div>
            <div class="quantity">
                <button>-</button>
                <span  class="value">3</span>
                <button>+</button>
            </div>
        </div>
</div>
<div class="listCart">
    <div class="item">
        <img src="images/kids/kids (1).jpeg" alt="">
        <div class="name">
            Product Name
        </div>
        <div class="price">$50/1 Product
        </div>
        <div class="quantity">
            <button>-</button>
            <span  class="value">3</span>
            <button>+</button>
        </div>
    </div>
</div>
<div class="listCart">
    <div class="item">
        <img src="images/kids/kids (1).jpeg" alt="">
        <div class="name">
            Product Name
        </div>
        <div class="price">$50/1 Product
        </div>
        <div class="quantity">
            <button>-</button>
            <span  class="value">3</span>
            <button>+</button>
        </div>
    </div>
</div>
<div class="listCart">
    <div class="item">
        <img src="images/kids/kids (1).jpeg" alt="">
        <div class="name">
            Product Name
        </div>
        <div class="price">$50/1 Product
        </div>
        <div class="quantity">
            <button>-</button>
            <span  class="value">3</span>
            <button>+</button>
        </div>
    </div>
</div>
<div class="listCart">
    <div class="item">
        <img src="images/kids/kids (1).jpeg" alt="">
        <div class="name">
            Product Name
        </div>
        <div class="price">$50/1 Product
        </div>
        <div class="quantity">
            <button>-</button>
            <span  class="value">3</span>
            <button>+</button>
        </div>
    </div>
</div>
<div class="listCart">
    <div class="item">
        <img src="images/kids/kids (1).jpeg" alt="">
        <div class="name">
            Product Name
        </div>
        <div class="price">$50/1 Product
        </div>
        <div class="quantity">
            <button onclick="changeQuantity($idproduct,'-')">-</button>
            <span  class="value">3</span>
            <buttonm onclick="changeQuantity($idproduct,'+')">+</button>
        </div>
    </div>
</div> -->
    
        
        </div>
        <div class="buttons">
            <div class="close">CLOSE</div>
            <div class="checkout">
                <a href="checkout.html">CHECKOUT</a>
            </div>

      
    </div>
    
   
</div>
<div class="hidden-menu" id="hiddenMenu">  
        <!-- Categories Section -->
        <div class="category_menu">
            <p>Categories</p>
            <div class="accordion-item">
                <div class="accordion-header">Clothes</div>
                <ul class="accordion-content">
                    <li>Shirts</li>
                    <li>Pants</li>
                    <li>Jackets</li>
                </ul>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">Fashion</div>
                <ul class="accordion-content">
                    <li>Jewelry</li>
                    <li>Shoes</li>
                    <li>Accessories</li>
                </ul>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">Utensils</div>
                <ul class="accordion-content">
                    <li>Pots</li>
                    <li>Pans</li>
                    <li>Cutlery</li>
                </ul>
            </div>
        </div>
            <a href="login-register.html" class="header__top-action">
                <i class="fa-solid fa-globe"></i> <span>Language</span>
            </a>
            <a href="user_login.html" class="header__top-action hidden_object">
                <i class="fa-solid fa-user-tie"></i> <span id="log">Login | Signup</span>
            </a>
            <div class="dropdown_app">
                <a class="header__top-action" href="#" id="countryToggle google_translate_element">
                  <i class="fa-solid fa-globe"></i>
                  <span id="lang"> Language: </span> 
                  <button class="btn-lang" id="selectedLanguage">En</button>
                </a>
                <div class="dropdown-menu_country" id="countryMenu">
                  <div class="dropdown-item_country" data-lang="sw" onclick="changeLanguage('sw')" >Swahili</div>
                  <div class="dropdown-item_country" data-lang="en" onclick="changeLanguage('En')">English</div>
                  <div class="dropdown-item_country" data-lang="fr" onclick="changeLanguage('fr')">French</div>
                  <div class="dropdown-item_country" data-lang="es" onclick="changeLanguage('es')">Spanish</div>
                </div>
            </div> 

            <div class="dropdown_app">
                <a class="header__top-action country" href="#" id="countryToggle"><img src="images/icons/Congo (1).jpeg" alt="Congo Flag"><span>Tanzania</span> ▼</a>
                <div class="dropdown-menu_country">
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Kenya (1).jpeg" alt="Kenya Flag">
                    <a href="#">Kenya</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Uganda.jpeg" alt="Uganda Flag">
                    <a href="#">Uganda</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Congo (1).jpeg" alt="Congo Flag">
                    <a href="#">Congo</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Burundi.jpeg" alt="Burundi Flag">
                    <a href="#">Burundi</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/Rwanda (1).jpeg" alt="Rwanda Flag">
                    <a href="#">Rwanda</a>
                  </div>
                </div>
            </div>
            <div class="dropdown_app ">
                <a class="header__top-action app" href="#" id="countryToggle"><i class="fa-solid fa-tablet-screen-button"></i>  Get our app</a>
                <div class="dropdown-menu_country">
                  <div class="dropdown-item_country">
                    <img src="../images/icons/PlayStore.jpeg" alt="Kenya Flag">
                    <a href="#">Playstore</a>
                  </div>
                  <div class="dropdown-item_country">
                    <img src="../images/icons/appStore.jpeg" alt="Uganda Flag">
                    <a href="#">AppStore</a>
                  </div>
                </div>
              </div>
              <a href="../user_area/account.php" class="header__top-action">
                <button class="btn_user">R</button>  <span id="account_id">My Account</span>
             </a>
    </div>

   <!-- =========================MAIN================== -->
    <main class="main"></main>
    <!-- ================HOME===================== -->
    
        <!-- Swiper -->
        <section class="home section__lg container">
        <div class="home_container">
            <div class="aside_advertisement">
                <h2>Categories</h2>
                <div class="accordians">
         <!--            <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Clothes</div>
                        <ul class="accordion-content">
                            <li>Shirts howhefow  ijfiejw  ofhw99iehj0wiiifj0w9ejf0wsejhf0wiishfee0wshf0wshiuehfisuhfiwuefhi</li>
                            <li>Pants</li>
                            <li>Jackets</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Fashion</div>
                        <ul class="accordion-content">
                            <li>Jewelry</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Utensils</div>
                        <ul class="accordion-content">
                            <li>Pots</li>
                            <li>Pans</li>
                            <li>Cutlery</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Clothes</div>
                        <ul class="accordion-content">
                            <li>Shirts</li>
                            <li>Pants</li>
                            <li>Jackets</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Fashion</div>
                        <ul class="accordion-content">
                            <li>Jewelry</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Utensils</div>
                        <ul class="accordion-content">
                            <li>Pots</li>
                            <li>Pans</li>
                            <li>Cutlery</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Clothes</div>
                        <ul class="accordion-content">
                            <li>Shirts</li>
                            <li>Pants</li>
                            <li>Jackets</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Fashion</div>
                        <ul class="accordion-content">
                            <li>Jewelry</li>
                            <li>Shoes</li>
                            <li>Accessories</li>
                        </ul>
                    </div>
                    <div class="accordion-item" onmouseover="scrollToView(this)">
                        <div class="accordion-header">Utensils</div>
                        <ul class="accordion-content">
                            <li>Pots</li>
                            <li>Pans</li>
                            <li>Cutlery</li>
                        </ul>
                    </div> -->
                </div>

            </div>
            
             <!-- Swiper -->
      <div class="swiper home_swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide  "> <img src="../images/icons/banner1.png" alt=""></div>
          <div class="swiper-slide "><img src="../images/icons/banner27fake.png" alt=""></div>
          <div class="swiper-slide "><img src="../images/icons/banner26.png" alt=""></div>
          <div class="swiper-slide "><img src="../images/icons/banner27og.png" alt=""></div>
          
        </div>
       
      </div>
            
        </div>
        
        <!-- <div class="home__container container grid">
            <div class="home__content">
                <span class="home__subtitle">
                    Hot promotions
                </span>
                <h1 class="home__title">Fashion Trending <span>Great Collection</span></h1>
                <p class="home__description">
                    Save more with coupons & up to 20% off
                </p>
                <a href="shop.html" class="btn">Shop Now</a>
            </div>
            <img src="images/icons/transparent.png" alt="" class="home__img">
        </div> -->
     </section>
     <main class="main"></main>
    <!-- ======================CATEGORIES====================== -->
    <section class="categories container section">
               <h3 class="section__title">Popular<span id="span" >Categories</span>
               </h3>
            <div class="swiper  categories__container">
                <div class="swiper-wrapper">
                    <!-- Category Item 1 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Hotpots</h3>
                        </a>
                    </div>
                    <!-- Category Item 2 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Bracelets</h3>
                        </a>
                    </div>
                    <!-- Category Item 3 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Kids Fashion</h3>
                        </a>
                    </div>
                    <!-- Category Item 4 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Men's Fashion</h3>
                        </a>
                    </div>
                    <!-- Category Item 5 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Ladies Fashion</h3>
                        </a>
                    </div>
                    <!-- Category Item 6 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/jersey/category (4).jpeg" alt="" class="category__img">
                            <h3 class="category_title">Jerseys</h3>
                        </a>
                    </div>
                    <!-- Category Item 7 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Laptops</h3>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Hotpots</h3>
                        </a>
                    </div>
                    <!-- Category Item 2 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Bracelets</h3>
                        </a>
                    </div>
                    <!-- Category Item 3 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Kids Fashion</h3>
                        </a>
                    </div>
                    <!-- Category Item 4 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Men's Fashion</h3>
                        </a>
                    </div>
                    <!-- Category Item 5 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Ladies Fashion</h3>
                        </a>
                    </div>
                    <!-- Category Item 6 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/jersey/category (4).jpeg" alt="" class="category__img">
                            <h3 class="category_title">Jerseys</h3>
                        </a>
                    </div>
                    <!-- Category Item 7 -->
                    <div class="swiper-slide">
                        <a href="shop.html" class="category__item swiper-slide">
                            <img src="images/women/category3.jpeg" alt="" class="category__img">
                            <h3 class="category_title">Laptops</h3>
                        </a>
                    </div>
                </div>
                <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
            </div>

    </section>
    <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- ========================DEALS================== -->
<section class="deals section">
    <div class="deals__container container grid">
        <div class="deals__item">
            <div class="deals__group">
                <h3 class="deals__brand">Deal of the Day</h3>
                <span class="deals__category">Limited quantities</span>
            </div>
            <h4 class="deals__title">Summer Collection New Morden Design</h4>
            <div class="deals__price flex">
                <span class="new__price">139.00Tsh</span>
                <span class="old__price">180.00Tsh</span>
            </div>
            <div class="deals__group">
                <p class="deals__countdown-text">Hurry up! Offer End In:</p>
                <div class="countdown">
                    <div class="countdown__amount">
                        <p class="countdown__period">02</p>
                        <span class="unit">Days</span>
                    </div>
                    <div class="countdown__amount">
                        <p class="countdown__period">22</p>
                        <span class="unit">Mins</span>
                    </div>
                    <div class="countdown__amount">
                        <p class="countdown__period">57</p>
                        <span class="unit">Sec</span>
                    </div>
                </div>
            </div>
            <div class="deals__btn">
                <a href="details.html" class="btn btn--md">Shop Now</a>
            </div>
        </div>

        <div class="deal__item">
            <div class="deals_grid">
                <div class="deal_i deal1">
                <div class="grid-item">
            <img src="../images/electronics/category (3).jpeg" alt="Image 1">
            <p>Description for Image 1</p>
        </div>
                </div>
                <div class="deal_i deal2">
                <div class="grid-item">
            <img src="../images/men/category (3).jpeg" alt="Image 2">
            <p>Description for Image 2</p>
        </div>
        </div>
            <div class="deal_i deal3">
                <div class="grid-item">
            <img src="../images/men/category.jpeg" alt="Image 3">
            <p>Description for Image 3</p>
               </div>
            </div>
                <div class="deal_i deal4">
                <div class="grid-item">
            <img src="../images/kitchen/category1.jpeg" alt="Image 4">
            <p>Description for Image 4</p>
        </div>
                </div>
                <div class="deal_i deal5">
                <div class="grid-item">
            <img src="../images/kitchen/category1.jpeg" alt="Image 4">
            <p>Description for Image 4</p>
                </div>
            </div>
            
        </div>
    </div>
</section>
 <!-- =========================PRODUCTS==================== -->
<section class="products section container">
    <div class="tab__btns">
        <span id="feature" class="tab__btn active-tab" data-target="#featured">Featured</span>
        <span id="popular" class="tab__btn" data-target="#popular">Popular</span>
        <span id="added" class="tab__btn" data-target="#new-added">New added</span>
    </div>

    <div class="tab__items">
        <div class="tab__item active-tab" content id="featured">
            <div class="products__container grid" >
               
            </div>
        </div>

        <div class="tab__item" content id="popular">
            <div class="products__container grid" id="product_list">
                
            </div>
        </div>
        <div class="tab__item" content id="new-added">
            <div class="products__container grid">
              <!--   <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/men/category (3).jpeg" alt="" class="product__img hover">
                            <img src="images/men/men (10).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-pink">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/women/women (7).jpeg" alt="" class="product__img hover">
                            <img src="images/women/women (7).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-green">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/kids/kids (11).jpeg" alt="" class="product__img hover">
                            <img src="images/kids/kids (10).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-orange">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/men/category (3).jpeg" alt="" class="product__img hover">
                            <img src="images/men/men (10).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-pink">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/women/women (7).jpeg" alt="" class="product__img hover">
                            <img src="images/women/women (7).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-green">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/kids/kids (11).jpeg" alt="" class="product__img hover">
                            <img src="images/kids/kids (10).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-orange">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/women/women (7).jpeg" alt="" class="product__img hover">
                            <img src="images/women/women (7).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        <div class="product__badge light-green">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="images/kids/kids (11).jpeg" alt="" class="product__img hover">
                            <img src="images/kids/kids (10).jpeg" alt="" class="product__img default">
                        </a>
                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View"><i class="fa-regular fa-eye"></i></a>
                            <a href="#" class="action__btn" aria-label="Add To Wishlist"><i class="fa-regular fa-heart"></i></a>
                            <a href="#" class="action__btn" aria-label="Compare"><i class="fa-solid fa-shuffle"></i></a>
                        </div>
                        
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorfull Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">500Tsh</span>
                            <span class="old__price">400Tsh</span>
                        </div>
                        <a href="" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>
                 -->
            </div>
        </div>
    </div>
</section>
 <!--=================== NEW ARRIVALS====================== -->
<section class="new__arrivals container section">
    <h3 class="section__title"><span>News</span>Arrivals
    </h3>
 <div class="swiper mySwiper new__container">
     <div class="swiper-wrapper">
     </div>

     <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
     <div class="swiper-button-prev" ><i class="fa-solid fa-arrow-left"></i></div>
 </div>
</section>
 <!-- ==================================SHOWCASE========================== -->
<section class="showcase section">
    <div class="showcase__container container grid">
        <div class="showcase__wrapper">
            <h3 class="section__title" id="hot" >Hot Releases</h3>
            <div class="hot_release">
           <!--  <div class="showcase__item">
                <a href="details.html" class="showcase__img-box">
                    <img src="images/kids/kids (15).jpeg" alt="" class="showcase__img"/>
                </a>
                <div class="showcase__content">
                    <a href="details.html">
                        <h4 class="showcase__title">Floral Print Casual Cotton Dress</h4>
                    </a>
                    <div class="showcase__price">
                        <span class="new__price">40Tsh</span>
                        <span class="old__price">50Tsh</span>
                    </div>
                </div>
            </div>
            <div class="showcase__item">
                <a href="details.html" class="showcase__img-box">
                    <img src="images/kids/kids (15).jpeg" alt="" class="showcase__img"/>
                </a>
                <div class="showcase__content">
                    <a href="details.html">
                        <h4 class="showcase__title">Ruffled long sleeve </h4>
                    </a>
                    <div class="showcase__price">
                        <span class="new__price">40Tsh</span>
                        <span class="old__price">50Tsh</span>
                    </div>
                </div>
            </div>
            <div class="showcase__item">
                <a href="details.html" class="showcase__img-box">
                    <img src="images/kids/kids (15).jpeg" alt="" class="showcase__img"/>
                </a>
                <div class="showcase__content">
                    <a href="details.html">
                        <h4 class="showcase__title">Multi-color Print V-neck T-shirt</h4>
                    </a>
                    <div class="showcase__price">
                        <span class="new__price">40Tsh</span>
                        <span class="old__price">50Tsh</span>
                    </div>
                </div>
            </div>
 -->
            </div>
            
        </div>

        <div class="showcase__wrapper">
            <h3 class="section__title" id="deals" >Deals & Outlet</h3>
            <div class="deal">

            </div>
          
        </div>

        <div class="showcase__wrapper">
            <h3 class="section__title" id="top_sell" >Top Selling</h3>
            <div class="top">

            </div>
        </div>

        <div class="showcase__wrapper">
            <h3 class="section__title" id="trends" >Trend</h3>
            <div class="trend">

            </div>
        </div>
        
    </div>
</section>
 <!-- ===========================NEWSLETTERS============================ -->
<section class="newsletter section home__newsletter">
    <div class="newsletter__container container grid">
        <h3 class="newsletter__title flex">
            <i class="fa-solid fa-envelope newsletter__icon"></i>
             Sign Up to Newsletter
        </h3>
        <p class="newsletter__description">
            ..and receive 400Tsh coupon for first shopping
        </p>
        <form action="post" class="newsletter__form">
            <input type="text" placeholder="Enter your email" class="newsletter__input">
            <button type="submit" class="newsletter__btn" name="newsletter__btn">Subscribe</button>
        </form>
    </div>
</section>

 <!-- ======================FOOTER====================== -->
<footer class="footer container">
    <div class="footer__container grid">
        <div class="footer__content">
            <a href="index.html" class="footer__logo">
                <img src="" alt="Rena" class="footer__logo-img">
                <h4 class="footer__subtitle">Contact</h4>
                <p class="footer__description">
                    <span>Address:</span>S62 Wellington Road, Street 32, San Fransisco
                </p>
                <p class="footer__description">
                    <span>Phone:</span> +255-073-9389-399
                </p>
                <p class="footer__description">
                    <span>Hours:</span>10:00-18:00
                </p>
                <div class="footer__social">
                    <h4 class="footer__subtitle">Follow Me</h4>
                    <div class="footer__social-links">
                        <a href="">
                            <img src="../images/icons/twitter.jpeg" alt="" class="footer__social-icon">
                        </a>
                        <a href="">
                            <img src="../images/icons/fb.jpeg" alt="" class="footer__social-icon">
                        </a>
                        <a href="https://wa.me/255744037399" target="_blank">
                                <img src="../images/icons/whatsup.jpeg" alt="" class="footer__social-icon">
                            </a>
                        <a href="">
                            <img src="../images/icons/telegram.jpeg" alt="" class="footer__social-icon">
                        </a>
                    </div>
                </div>   
            </a>
        </div>
        <div class="footer__content">
            <h3 class="footer__title">Address</h3>
            <ul class="footer__content_li">
               <li><a href="" class="footer__link">About Us</a></li>
               <li><a href="" class="footer__link">Delivery Information</a></li>
               <li><a href="" class="footer__link">Privacy Policy</a></li>
               <li><a href="" class="footer__link">Terms & Conditions</a></li>
               <li><a href="" class="footer__link">Contact</a></li>
               <li><a href="" class="footer__link">Support Center</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">My Account</h3>
            <ul class="footer__content_li">
               <li><a href="" class="footer__link">Sign In</a></li>
               <li><a href="" class="footer__link">View Cart</a></li>
               <li><a href="" class="footer__link">My Wishlist</a></li>
               <li><a href="" class="footer__link">Track My Order</a></li>
               <li><a href="" class="footer__link">Help</a></li>
               <li><a href="" class="footer__link">Order</a></li>
            </ul>
        </div>
        <div class="footer__content">
            <h3 class="footer__title">Secured Payment Gateway</h3>
            <img src="images/icons/pay1.png" alt="" class="payment__img">
        </div>
    </div>
<div class="footer__bottom">
    <p class="copyright">@copy: 2023 EVara. All rights reserved</p>
    <span class="designer">Design by Crypticalcoder</span>
</div>
</footer>
 <!-- =============================SWIPER============================ -->

 <!-- =============================MAIN JS====================== -->

 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script src="assets/js/index.js"></script>

<!-- ==============================searching============================== -->
<script>
const searchInput = document.querySelector('.mainbox .search_input');
const searchContainer = document.querySelector('.search-container');
const suggestion_values = document.querySelector('.history-section');
const suggestion = document.querySelector('.suggestion-content-live');
const categories = document.querySelector('.categories-bar');
const products_cat = document.querySelector('.grid-section');
const iconSearch=document.querySelector('.iconContainer');
const historySection=document.getElementById('history');
const searchContainer2=document.querySelector('.search-suggestions');
 
function removeHist(event, itemToRemove) {
    event.preventDefault();
    // Retrieve the data from localStorage and parse it into an array
    let items = JSON.parse(localStorage.getItem("searchHistory")) || [];

    // Filter out the item you want to remove
    items = items.filter(item => item !== itemToRemove);

  
    // Save the updated array back to localStorage
    localStorage.setItem('searchHistory', JSON.stringify(items));

}


// Load categories via AJAX
function Categories() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_categories.php", true);
    xhr.onload = function () {
        if (this.status === 200) {
            categories.innerHTML = this.response;
            console.log("Categories loaded.");
        } else {
            console.error("Error loading categories.");
        }
    };
    xhr.send();
}
function get_history(){
    const history = JSON.parse(localStorage.getItem("searchHistory"))
    historySection.innerHTML="";
    history.forEach((item)=>{
       const historyHTML=`
         <li><span class="delete_hist" onclick="removeHist(event, '${item}')" key=${item.key}>&times;</span> <span class="hist_value">${item}</span></li>
        `
        historySection.innerHTML +=historyHTML;
        console.log(item);
    })
    
    console.log('hello');

}
// Fetch and display products by category
function get_products(category_id) {
    fetch(`get_category_products.php?category_id=${category_id}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((response) => {
            if (!response.ok) throw new Error("Network response was not ok");
            return response.json();
        })
        .then((data) => {
            if (data.status === "success") {
                // Clear previous products
                products_cat.innerHTML = "";

                // Loop through and display products
                data.products.forEach((product) => {
                    const productHTML = `
                        <div class='suggestion-item'>
                           <a href='shop.php?keyword=${product.title}'>
                            <img src='${product.image1}' alt='${product.title}'>
                            <p class='product-name'>${product.title}</p>
                            <p class='product-price'>$${product.new_price}</p>
                            </a>
                        </div>
        
                    `;
                    products_cat.innerHTML += productHTML;
                });
            } else {
                console.error(data.message);
            }
        })
        .catch((error) => console.error("Error fetching products:", error));
}

// Show the search container when the input gains focus
searchInput.addEventListener('focus', () => {
    searchContainer.style.display = 'block';
    searchContainer2.classList.add('show');
    Categories(); // Load categories on focus
    get_history();
});

// Show suggestions on keyup and hide the search container
searchInput.addEventListener('keyup', () => {
    suggestion.style.display = 'block'; // Show suggestions
    searchContainer.style.display = 'none'; // Hide container

    let searchTerm = searchInput.value.trim(); // Trim whitespace
    console.log(searchTerm);
    // Check if the searchTerm is not empty
    if (searchTerm !== "") {
        searchInput.classList.add("active"); // Highlight the search input

        // First request: Fetch search suggestions
        let xhr1 = new XMLHttpRequest();
        xhr1.open("POST", "search.php", true);
        xhr1.onload = () => {
            if (xhr1.readyState === XMLHttpRequest.DONE) {
                if (xhr1.status === 200) {
                    let data = xhr1.responseText;
                    suggestion_values.innerHTML = data; // Update suggestions
                    console.log(data);
                    console.log("Response from search.php received");
                } else {
                    console.error("Error in request to search.php:", xhr1.status, xhr1.statusText);
                }
            }
        };

        xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr1.send("searchTerm=" + encodeURIComponent(searchTerm));

        // Store the search term in localStorage
        iconSearch.addEventListener('click', () => {
            let input_value=searchInput.value;
            console.log(input_value);
            let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || []; // Retrieve existing history or initialize
        if (!searchHistory.includes(input_value)) {
            searchHistory.push(input_value); // Add the new term
            localStorage.setItem('searchHistory', JSON.stringify(searchHistory)); // Save back to localStorage
            console.log("Search term stored in localStorage.");
        }

        })
        function history(item) {
    console.log(item);  // Logs the product title or whatever was passed to the function
    let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || []; // Retrieve existing history or initialize
    if (!searchHistory.includes(item)) {
        searchHistory.push(item); // Add the new term
        localStorage.setItem('searchHistory', JSON.stringify(searchHistory)); // Save back to localStorage
        console.log("Search term click stored in localStorage.");
    }
}

        
    } 
});



// Hide suggestion and search containers when clicking outside
document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !suggestion.contains(e.target) && !searchContainer.contains(e.target)) {
        suggestion.style.display = 'none';
        searchContainer.style = "display: none; transition: 0.3s ease;";
        document.querySelector('.search-suggestions').display='none';
        console.log("searchContainer not clicked");
    }

    

});

// Initial call to load categories on page load
document.addEventListener('DOMContentLoaded', Categories);
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search_input');
    const cameraIcon = document.querySelector('.cameraContainer');

    searchInput.addEventListener('focus', () => {
        cameraIcon.classList.add('hide');
    });

    searchInput.addEventListener('blur', () => {
        if (searchInput.value.trim() === '') {
            cameraIcon.classList.remove('hide');
        }
    });
});

</script>

<script>
    //DEALS OF THE DAY=======================================
// Select each grid item
const deal1 = document.querySelector('.deal1');
const deal2 = document.querySelector('.deal2');
const deal3 = document.querySelector('.deal3');
const deal4 = document.querySelector('.deal4');
const deal5 = document.querySelector('.deal5');

// Function to add hover effect
function addHoverEffect(element, className) {
element.addEventListener('mouseenter', () => element.classList.add(className));
element.addEventListener('mouseleave', () => element.classList.remove(className));
}

// Apply unique hover effects
addHoverEffect(deal1, 'hover-effect-1');
addHoverEffect(deal2, 'hover-effect-2');
addHoverEffect(deal3, 'hover-effect-3');
addHoverEffect(deal4, 'hover-effect-4');
addHoverEffect(deal5, 'hover-effect-5');


//DEALS SWIPER FOR BACKGROUND=====================================
const dealsItem = document.querySelector('.deals__item');
const images = [
    '../images/jersey/category.jpeg',
    '../images/kids/category2.jpeg',
    '../images/jersey/category.jpeg'
];
let currentIndex = 0;
let intervalId;

// Function to change background image
function changeBackground() {
    dealsItem.style.backgroundImage = `url(${images[currentIndex]})`;
    currentIndex = (currentIndex + 1) % images.length; // Cycle back to the first image
}

// Start the interval
function startInterval() {
    intervalId = setInterval(changeBackground, 500); // Change 5000 to your desired interval in milliseconds
}

// Stop the interval
function stopInterval() {
    clearInterval(intervalId);
}

// Initial call to set the first image
changeBackground();
startInterval();

// Pause the background change on hover
dealsItem.addEventListener('mouseenter', stopInterval);
dealsItem.addEventListener('mouseleave', startInterval);


</script>

<script>
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

document.querySelectorAll('.accordion-content').forEach(item => {
    if (item.style.display === "flex") { // Use '===' for comparison
        item.parentNode.classList.add("active_accordion_item"); // Corrected classList.add() syntax
        console.log(item.parentNode);
    }
});

</script>
<!-- ============for cleaning==================== -->
<script>
 document.querySelector('.checkbox').addEventListener('change', function() {
    const resultBox = document.querySelector('.result_box');
    if (this.checked) {
        resultBox.style.display = 'none';  // Hide results otherwise
    } else {
       
        resultBox.style.display = 'block'; // Show results when checked
    }
});

</script>
<!-- ================================get brands========================== -->
<script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function loadbrands() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_brands.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.getElementById("brands_drop").innerHTML = this.response;
                    console.log("brands loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    loadbrands() ;

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(loadbrands, 1000000000); // Refresh every 1 second
});
</script>
<script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function loadCategories() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "Load_categories.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.querySelector('.accordians').innerHTML = this.response;
                    console.log("categories loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    loadCategories() ;

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(loadCategories, 1000000000); // Refresh every 1 second
});
</script>
<!-- load products -->
<!-- <script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function loadUsers() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "Load_products.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.querySelector('.products__container').innerHTML = this.responseText;
                    console.log("products loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    loadUsers();

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(loadUsers, 1000000000); // Refresh every 1 second
});
</script> -->



<!-- <script>
const searchInput = document.querySelector('.mainbox .search_input');
const searchContainer = document.querySelector('.search-container');
const suggestion= document.querySelector('.suggestion-content-live');
// Show the search container when the input gains focus
searchInput.addEventListener('focus', () => {
    searchContainer.style.display = 'block';
});

// Hide the search container when the input loses focus
searchInput.addEventListener('blur', () => {
    searchContainer.style.display = 'none';
});
searchInput.addEventListener('keyup', () => {
    suggestion.style.display = 'block'; // Show suggestions
    searchContainer.style.display = 'none'; // Ensure searchContainer remains visible
    let searchTerm = searchInput.value.trim(); // Trim whitespace
    
    // Check if the searchTerm is not empty
    if (searchTerm !== "") {
        searchInput.classList.add("active");

        // First request
        let xhr1 = new XMLHttpRequest(); // Creating XMLHttpRequest object
        xhr1.open("POST", "search.php", true);
        xhr1.onload = () => {
            if (xhr1.readyState === XMLHttpRequest.DONE) {
                if (xhr1.status === 200) {
                    let data = xhr1.responseText;
                    document.querySelector('.suggestion').innerHTML = data; 
                    console.log("Response from search.php received");
                } else {
                    console.error("Error in request to search.php:", xhr1.status, xhr1.statusText);
                }
            }
        };

        xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr1.send("searchTerm=" + encodeURIComponent(searchTerm));
    } else {
        suggestion.style.display = 'none'; // Hide suggestions if search term is empty
    }
});

document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !suggestion.contains(e.target)) {
        suggestion.style.display = 'none';
    }
});



</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search_input');
    const cameraIcon = document.querySelector('.cameraContainer');

    searchInput.addEventListener('focus', () => {
        cameraIcon.classList.add('hide');
    });

    searchInput.addEventListener('blur', () => {
        if (searchInput.value.trim() === '') {
            cameraIcon.classList.remove('hide');
        }
    });
});

</script> -->

<script>
    async function getCurrentCountry() {
        try {
            const response = await fetch("https://ipapi.co/json/");
            const data = await response.json();
            document.querySelector('#countryToggle span').innerText = data.country_name;
            console.log("Your current country is:", data.country_name);

            switch (data.country_name.toUpperCase()) {  // Fixed the method name
                case "TANZANIA":
                    document.querySelector('#countryToggle img').src = "../images/country/Tanzania.jpeg";
                    break;
                case "KENYA":
                    document.querySelector('#countryToggle img').src = "../images/country/Kenya.jpeg";
                    break;
                case "UGANDA":
                    document.querySelector('#countryToggle img').src = "../images/country/Uganda.jpeg";
                    break;
                case "RWANDA":
                    document.querySelector('#countryToggle img').src = "../images/country/Rwanda.jpeg";
                    break;
                case "BURUNDI":
                    document.querySelector('#countryToggle img').src = "../images/country/Burundi.jpeg";
                    break;
                default:
                    document.querySelector('#countryToggle img').src = "../images/country/Congo.jpeg";
            }

            return data.country_name;
        } catch (error) {
            console.error("Error fetching country:", error);
            return null;
        }
    }

    getCurrentCountry();

    function changeLanguage(lang) {
    switch (lang) {
        case "En":
            document.getElementById("selectedLanguage").innerText = "En";
            document.getElementById("lang").innerText = "Language";
            document.getElementById("log").innerText = "Login | Signup";
            document.querySelector(".header__alert-news").innerText = "Super Value Deals - Save more with coupons";
            document.getElementById("account_id").innerText = "My Account";
            document.getElementById("shop").innerText = "Shop";
            document.getElementById("shop_brand").innerText = "Shop By Brand";
            document.getElementById("search_hist").placeholder = "Search";
            document.querySelector(".aside_advertisement h2").innerText = "Categories";
            document.querySelector(".categories .section__title").innerText = "Popular";
            document.querySelector(".categories .section__title span").textContent = "category";
            document.getElementById("feature").innerText = "Featured";
            document.getElementById("popular").innerText = "Popular";
            document.getElementById("added").innerText = "New added";
            document.getElementById("hot").innerText = "Hot Releases";
            document.getElementById("deal").innerText = "Deals & Outlet";
            document.getElementById("top").innerText = "Top Selling";
            document.getElementById("trend").innerText = "Trend";
            document.querySelector(".newsletter__title").innerText = "Sign Up to Newsletter";
            document.querySelector(".newsletter__description").innerText = "..and receive 400Tsh coupon for first shopping";
            document.querySelector(".footer__title").innerText = "Address";
            let footerContents = document.querySelectorAll(".footer__content");

            footerContents.forEach(function (footerContent, index) {
                let footerLinks = footerContent.querySelectorAll(".footer__link");

                if (index === 0) {
                    footerContent.querySelector('.footer__title').innerText = "Address";
                    footerLinks[0].innerText = "About Us";
                    footerLinks[1].innerText = "Delivery Information";
                    footerLinks[2].innerText = "Privacy Policy";
                    footerLinks[3].innerText = "Terms & Conditions";
                    footerLinks[4].innerText = "Contact";
                    footerLinks[5].innerText = "Support Center";
                } else if (index === 1) {
                    footerContent.querySelector('.footer__title').innerText = "My Account";
                    footerLinks[0].innerText = "Sign In";
                    footerLinks[1].innerText = "View Cart";
                    footerLinks[2].innerText = "My Wishlist";
                    footerLinks[3].innerText = "Track My Order";
                    footerLinks[4].innerText = "Help";
                    footerLinks[5].innerText = "Order";
                } else {
                    footerContent.querySelector('.footer__title').innerText = "Secured Payment Gateway";
                }
            });
            break;

        case "sw":
            document.getElementById("selectedLanguage").innerText = "Sw";
            document.getElementById("lang").innerText = "Lugha";
            document.getElementById("log").innerText = "Ingia | Jisajili";
            document.querySelector(".header__alert-news").innerText = "Ofa za Thamani Kubwa - Okoa zaidi kwa kuponi";
            document.getElementById("account_id").innerText = "Akaunti Yangu";
            document.getElementById("shop").innerText = "Duka";
            document.getElementById("shop_brand").innerText = "Nunua kwa Chapa";
            document.getElementById("search_hist").placeholder = "Tafuta";
            document.querySelector(".aside_advertisement h2").innerText = "Kategoria ";
            console.log(document.querySelector(".categories .section__title").innerText);
            document.querySelector(".categories .section__title").innerHTML = "Maarufu <span>Kategoria</span>";
            document.getElementById("feature").innerText = "Mambo ya Kuchagua";
            document.getElementById("popular").innerText = "Maarufu";
            document.getElementById("added").innerText = "Imeongezwa Mpya";
            document.getElementById("hot").innerText = "Releases Moto";
            document.getElementById("deals").innerText = "Ofa & Maduka";
            document.getElementById("top_sell").innerText = "Mauzo Bora";
            document.getElementById("trends").innerText = "Mwelekeo";
            document.querySelector(".newsletter__title").innerText = "Jisajili kwa Jarida";
            document.querySelector(".newsletter__description").innerText = "..na upokee kuponi ya 400Tsh kwa manunuzi ya kwanza";
            document.querySelector(".footer__title").innerText = "Anwani";
            let footerContentsSw = document.querySelectorAll(".footer__content_li");
            console.log(footerContentsSw.length);

            footerContentsSw.forEach(function (footerContent, index) {
    let footerLinks = footerContent.querySelectorAll(".footer__link");
    console.log(`Footer ${index} has ${footerLinks.length} links`);
    if (footerLinks.length > 0) {
        console.log("First footer link:", footerLinks[0].innerText); // Should not be undefined
    } else {
        console.log("No footer links found in this section.");
    }
    if (true) {
        footerContent.querySelector('.footer__title').innerText = "Anwani";
        footerLinks[0].innerText = "Kuhusu Sisi";
        console.log("After update:", footerLinks[0].innerText);
        footerLinks[1].innerText = "Taarifa za Uwasilishaji";
        footerLinks[2].innerText = "Sera ya Faragha";
        footerLinks[3].innerText = "Sheria na Masharti";
        footerLinks[4].innerText = "Wasiliana Nasi";
        footerLinks[5].innerText = "Kituo cha Msaada";
    } else if (index === 1 && footerLinks.length >= 6) {
        footerContent.querySelector('.footer__title').innerText = "Akaunti Yangu";
        footerLinks[0].innerText = "Ingia";
        footerLinks[1].innerText = "Angalia Kikapu";
        footerLinks[2].innerText = "Orodha yangu ya Matamanio";
        footerLinks[3].innerText = "Fuatilia Agizo Langu";
        footerLinks[4].innerText = "Msaada";
        footerLinks[5].innerText = "Agizo";
    }
    else{
        console.log("hello_cat")
    }
});

            break;

        case "fr":
            document.getElementById("selectedLanguage").innerText = "Fr";
            document.getElementById("lang").innerText = "Langue";
            document.getElementById("log").innerText = "Connexion | Inscription";
            document.querySelector(".header__alert-news").innerText = "Super offres - Économisez plus avec des coupons";
            document.getElementById("account_id").innerText = "Mon Compte";
            document.getElementById("shop").innerText = "Magasin";
            document.getElementById("shop_brand").innerText = "Acheter par Marque";
            document.getElementById("search_hist").placeholder = "Chercher";
            document.querySelector(".aside_advertisement h2").innerText = "Catégories";
            document.querySelector(".categories .section__title").innerText = "Populaire";
            document.querySelector(".categories .section__title span").innerText = "catégories";
            document.getElementById("feature").textContent = "En vedette";
            document.getElementById("popular").textContent = "Populaire";
            document.getElementById("added").innerText = "Ajouté récemment";
            document.getElementById("hot").innerText = "Nouveautés";
            document.getElementById("deal").innerText = "Offres & Ventes";
            document.getElementById("top").innerText = "Meilleures ventes";
            document.getElementById("trend").innerText = "Tendance";
            document.querySelector(".newsletter__title").innerText = "Inscrivez-vous à la newsletter";
            document.querySelector(".newsletter__description").innerText = "..et recevez un coupon de 400Tsh pour vos premiers achats";
            document.querySelector(".footer__title").innerText = "Adresse";
            let footerContentsFr = document.querySelectorAll(".footer__content");

            footerContentsFr.forEach(function (footerContent, index) {
                let footerLinks = footerContent.querySelectorAll(".footer__link");

                if (true) {
                    footerContent.querySelector('.footer__title').innerText = "Adresse";
                    footerLinks[0].innerText = "À propos de nous";
                    footerLinks[1].innerText = "Informations de livraison";
                    footerLinks[2].innerText = "Politique de confidentialité";
                    footerLinks[3].innerText = "Termes et conditions";
                    footerLinks[4].innerText = "Contact";
                    footerLinks[5].innerText = "Centre de support";
                } else if (index === 1) {
                    footerContent.querySelector('.footer__title').innerText = "Mon Compte";
                    footerLinks[0].innerText = "Se connecter";
                    footerLinks[1].innerText = "Voir le panier";
                    footerLinks[2].innerText = "Ma liste d'envies";
                    footerLinks[3].innerText = "Suivre ma commande";
                    footerLinks[4].innerText = "Aide";
                    footerLinks[5].innerText = "Commande";
                } else {
                    footerContent.querySelector('.footer__title').innerText = "Passerelle de paiement sécurisée";
                }
            });
            break;

        case "de":
            document.getElementById("selectedLanguage").innerText = "De";
            document.getElementById("lang").innerText = "Sprache";
            document.getElementById("log").innerText = "Anmelden | Registrieren";
            document.querySelector(".header__alert-news").innerText = "Super Angebote - Sparen Sie mehr mit Gutscheinen";
            document.getElementById("account_id").innerText = "Mein Konto";
            document.getElementById("shop").innerText = "Shop";
            document.getElementById("shop_brand").innerText = "Kaufen nach Marke";
            document.getElementById("search_hist").placeholder = "Suche";
            document.querySelector(".aside_advertisement h2").innerText = "Kategorien";
            document.querySelector(".categories .section__title").innerText = "Beliebt";
            document.querySelector(".categories .section__title span").innerText = "Kategorie";
            document.getElementById("feature").innerText = "Empfohlene Produkte";
            document.getElementById("popular").innerText = "Beliebt";
            document.getElementById("added").innerText = "Neu hinzugefügt";
            document.getElementById("hot").innerText = "Heiße Neuerscheinungen";
            document.getElementById("deal").innerText = "Angebote & Ausverkauf";
            document.getElementById("top").innerText = "Top Verkauf";
            document.getElementById("trend").innerText = "Trend";
            document.querySelector(".newsletter__title").innerText = "Newsletter abonnieren";
            document.querySelector(".newsletter__description").innerText = "..und erhalten Sie einen 400Tsh Gutschein für Ihren ersten Einkauf";
            document.querySelector(".footer__title").innerText = "Adresse";
            let footerContentsDe = document.querySelectorAll(".footer__content");

            footerContentsDe.forEach(function (footerContent, index) {
                let footerLinks = footerContent.querySelectorAll(".footer__link");

                if (index === 0) {
                    footerContent.querySelector('.footer__title').innerText = "Adresse";
                    footerLinks[0].innerText = "Über uns";
                    footerLinks[1].innerText = "Lieferinformationen";
                    footerLinks[2].innerText = "Datenschutz";
                    footerLinks[3].innerText = "AGB";
                    footerLinks[4].innerText = "Kontakt";
                    footerLinks[5].innerText = "Support Center";
                } else if (index === 1) {
                    footerContent.querySelector('.footer__title').innerText = "Mein Konto";
                    footerLinks[0].innerText = "Anmelden";
                    footerLinks[1].innerText = "Warenkorb ansehen";
                    footerLinks[2].innerText = "Meine Wunschliste";
                    footerLinks[3].innerText = "Bestellung verfolgen";
                    footerLinks[4].innerText = "Hilfe";
                    footerLinks[5].innerText = "Bestellung";
                } else {
                    footerContent.querySelector('.footer__title').innerText = "Sichere Zahlungs-Gateway";
                }
            });
            break;
    }
}



</script>

<!-- Load React, ReactDOM, and Babel -->
<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<!-- React Component with Babel -->
<script type="text/babel">
   const ProductList = () => {
    const [products, setProducts] = React.useState([]);
    const [loading, setLoading] = React.useState(true);
    const [cartCount, setCartCount] = React.useState(0); // State for cart item count
    const [wishCount, setwishCount] = React.useState(0); // State for wish item count
    const [page, setPage] = React.useState(1); // Track current page
     const [hasMore, setHasMore] = React.useState(true); // Check if there are more products

     React.useEffect(() => { // Only one useEffect here
  let isMounted = true;
  
  const fetchProducts = async () => {
    try {
      console.log(`Fetching products for page ${page}...`);
      const response = await fetch(`react_load_product.php?page=${page}`);
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      const data = await response.json();
      console.log("Fetched data:", data);

      if (isMounted) {
        if (data.products && data.products.length > 0) {
          // Filter out products that are already in the state to avoid duplicates
          const newProducts = data.products.filter(product => 
            !products.some(existingProduct => existingProduct.product_id === product.product_id)
          );
          
          if (newProducts.length > 0) {
            setProducts((prevProducts) => [...prevProducts, ...newProducts]);
          } else {
            setHasMore(false); // No more new products to fetch
          }
        } else {
          setHasMore(false); // No more products
        }
        setLoading(false);
      }
    } catch (error) {
      console.error("Error fetching products:", error);
      if (isMounted) {
        setLoading(false);
      }
    }
  };

  fetchProducts();

  return () => {
    isMounted = false;
  };
}, [page]);


  React.useEffect(() => {
    const handleScroll = () => {
      if (
        window.innerHeight + document.documentElement.scrollTop >=
          document.documentElement.offsetHeight - 100 &&
        !loading &&
        hasMore
      ) {
        console.log("Reached the bottom, loading next page...");
        setPage((prevPage) => prevPage + 1);
      }
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, [loading, hasMore]);
     // Load initial cart count from localStorage on component mount
     // Load initial cart count from localStorage on component mount
     React.useEffect( () => {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        //initialize cart count based on total quantity of items in the cart
        setCartCount(cart.reduce((acc, item) => acc + item.quantity, 0));
      },[]
) ;

    const addToCart = (product) => {
      // Check if user is logged in
      const userId = localStorage.getItem("userToken"); // Example check

      if (userId) {
        // User is logged in, send cart item to backend
        fetch("add_to_cart.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ productId: product.product_id, quantity: 1, userId }),
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              setCartCount(cartCount + 1); // Increment cart count
            } else {
              alert("Error adding item to cart.");
            }
          });
      } else{
        window.location.href='../user_area/user_loginnew.php?redirect="../eccom/index_pages/index.php"';
        exit();
      }
       /*  // User is not logged in, use localStorage
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        
        // Check if product is already in cart
        const existingItem = cart.find(item => item.productId === product.product_id);
        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          cart.push({ productId: product.product_id,productTitle: product.product_title,productImage: product.product_image1, price: product.new_price, quantity: 1 });
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        setCartCount(cartCount + 1); // Increment cart count
        alert("Item added to cart!");
       */
    };
      React.useEffect(()=>{
        const cartCountElement = document.getElementById('count_cart');
    if (cartCountElement) {
      cartCountElement.textContent = cartCount;
    }
  }, [cartCount]); // Run this effect whenever cartCount changes


   // Load initial wish count from localStorage on component mount
   React.useEffect( () => {
        const wish = JSON.parse(localStorage.getItem("wish")) || [];
        setwishCount(wish.reduce((acc, item) => acc + item.quantity, 0));
      },[]
) ;

    const addTowish = (product) => {
      // Check if user is logged in
      const userId = localStorage.getItem("userId"); // Example check

      if (userId) {
        // User is logged in, send wish item to backend
        fetch("add_to_wish.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ productId: product.product_id, quantity: 1, userId }),
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert("Item added to wish!");
              setwishCount(prevCount => prevCount + 1); // Increment wish count
            } else {
              alert("Error adding item to wish.");
            }
          });
      } else {
        // User is not logged in, use localStorage
        const wish = JSON.parse(localStorage.getItem("wish")) || [];
        
        // Check if product is already in wish
        const existingItem = wish.find(item => item.productId === product.product_id);
        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          wish.push({ productId: product.product_id, quantity: 1 });
        }

        localStorage.setItem("wish", JSON.stringify(wish));
        setwishCount(prevCount => prevCount + 1); // Increment wish count
        alert("Item added to wish!");
      }
    };
      React.useEffect(()=>{
        const wishCountElement = document.getElementById('count_wish');
    if (wishCountElement) {
      wishCountElement.textContent = wishCount;
    }
  }, [wishCount]); // Run this effect whenever `wishCount` changes
    if (loading) {
      return <div className="loader">Loading...</div>;
    }

    return (
      <div>
        {/* Display cart count */}
        <div className="cart__count">Items in Cart: {cartCount}</div>

        <div className="products__container grid">
          {products.map((product) => (
            <div className="product__item" key={product.product_id}>
              <div className="product__banner">
              <a href={`details.php?product_id=${product.product_id}`} className="product__images">
                  <img
                    src={`../admin_area/product_images/${product.product_image1}`}
                    alt={product.product_title}
                    className="product__img hover"
                  />
                  {product.product_image2 && (
                    <img
                      src={`../admin_area/product_images/${product.product_image2}`}
                      alt={product.product_title}
                      className="product__img default"
                    />
                  )}
                </a>
                <div className="product__actions">
                  <button className="action__btn" aria-label="Quick View">
                    <i className="fa-regular fa-eye"></i>
                  </button>
                  <button className="action__btn" aria-label="Add To Wishlist" onClick={() => addTowish(product)}>
                    <i className="fa-regular fa-heart"></i>
                  </button>
                  <button className="action__btn" aria-label="Compare">
                    <i className="fa-solid fa-shuffle"></i>
                  </button>
                </div>
                {product.discount_percent > 0 && (
                  <div className="product__badge light-pink">-{product.discount_percent}%</div>
                )}
              </div>
              <div className="product__content">
                <h3 className="product__title">{product.product_title}</h3>
                <div className="product__rating">
                  <i className="fa-solid fa-star"></i>
                  <i className="fa-solid fa-star"></i>
                  <i className="fa-solid fa-star"></i>
                  <i className="fa-solid fa-star"></i>
                  <i className="fa-solid fa-star"></i>
                </div>
                <div className="product__price flex">
                  <span className="new__price">{product.new_price} Tsh</span>
                  {product.old_price !== product.new_price && (
                    <span className="old__price">{product.old_price} Tsh</span>
                  )}
                </div>
                <button
                  className="action__btn cart__btn"
                  aria-label="Add To Cart"
                  onClick={() => addToCart(product)}
                >
                  <i className="fa-solid fa-cart-shopping"></i>
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    );
  };

  ReactDOM.render(<ProductList />, document.getElementById("featured"));
</script>

<script type="text/babel">
const Cart = () => {
  const [cart, setCart] = React.useState([]);

  // Retrieve cart data from localStorage when the component mounts
  React.useEffect(() => {
    const cartRef = { current: cart };
        const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
        if (JSON.stringify(storedCart) !== JSON.stringify(cartRef.current)) {
      setCart(storedCart);
    }

  }, [cartRef.current]);
  const handleDelete = (productId) => {
    const updateCart = cart.filter((item) => item.productId !== productId);
    setCart(updateCart);
    localStorage.setItem("cart", JSON.stringify(updateCart)); // Update localStorage with the new cart
  };
  React.useEffect(() => {
  const cartCountElement = document.getElementById('count_cart');
  const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0); // Sum of all quantities
  if (cartCountElement) {
    cartCountElement.textContent = totalQuantity;
  }
}, [cart]); // Run this effect whenever `cartCount` changes
  // Function to handle the quantity change (increase or decrease)
  const handleQuantityChange = (productId, operation) => {
    // Create a new updatedCart array instead of mutating the original one
    const updatedCart = cart.map((item) => {
      if (item.productId === productId) { // Use productId to match items
        if (operation === 'increase') {
          item.quantity += 1; // Increase quantity
        } else if (operation === 'decrease' && item.quantity > 1) {
          item.quantity -= 1; // Decrease quantity if it's greater than 1
        }
      }
      return item;
    });

    setCart(updatedCart); // Update state with the new cart
    localStorage.setItem('cart', JSON.stringify(updatedCart)); // Save updated cart to localStorage
  };

  return (
    <div className="listCart">
       
      {cart.length === 0 ? (
        <p>Your cart is empty</p>
      ) : (
        cart.map((item) => (
          <div className="item" key={item.productId}>
            <img src={`../admin_area/product_images/${item.productImage}`} alt={item.productTitle} />
            <div className="item_details">
               <div className="name">{item.productTitle}</div>
                <div className="price">${item.price} / {item.quantity} Product{item.quantity > 1 ? 's' : ''}</div>
             </div>
            <div className="quantity">
              <button onClick={() => handleQuantityChange(item.productId, 'decrease')}><i class="fa-solid fa-circle-minus"></i></button>
              <span className="value">{item.quantity}</span>
              <button onClick={() => handleQuantityChange(item.productId, 'increase')}><i class="fa-solid fa-circle-plus"></i></button>
            </div>
            <div onClick={() => handleDelete(item.productId)} className="delete_cart">
            <i class="fa-solid fa-trash"></i></div>
          </div>
        ))
      )}
    </div>
  );
};

ReactDOM.render(<Cart />, document.getElementById("cart-list"));
</script> 
 

<!-- load_hot_release========================================== -->
<script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function load_hot_release() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "Hot_release.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.querySelector('.hot_release').innerHTML = this.responseText;
                    console.log("products loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    load_hot_release() ;

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(load_hot_release, 1000000000); // Refresh every 1 second
});
</script>
<!-- load_trend============================================== -->
<script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function load_trend() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "Hot_release.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.querySelector('.trend').innerHTML = this.responseText;
                    console.log("products loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    load_trend()  ;

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(load_trend , 1000000000); // Refresh every 1 second
});
</script>
<!-- load_deals================================================================= -->
<script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function load_deal() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "Deals.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.querySelector('.deal').innerHTML = this.responseText;
                    console.log("products loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    load_deal() ;

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(load_deal, 1000000000); // Refresh every 1 second
});
</script>
<!-- load_top_selling========================================================= -->
<script >
    document.addEventListener("DOMContentLoaded", function () {
    // Function to load users via AJAX
    function load_top() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "top_selling.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                
                    document.querySelector('.top').innerHTML = this.responseText;
                    console.log("products loaded.");
               
            } else {
                console.error("Error loading users.");
            }
        };
        xhr.send();
    }

    // Call loadUsers once the page is fully loaded
    load_top() ;

    // Refresh the user list every 1 second (1000 milliseconds)
    setInterval(load_top, 1000000000); // Refresh every 1 second
});

</script>
<!-- load popular categories================================================ -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const container_cat = document.querySelector(".categories__container");
    let swiper;  // Declare the swiper variable globally within this scope

    // Function to load popular categories via AJAX
    function load_popular_categories() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "popular_categories.php", true);
        xhr.onload = function () {
        
            if (this.status === 200) {
                // Insert the categories into the DOM
                document.querySelector('.categories').innerHTML = this.response;
                console.log("products loaded.");

                // Reinitialize Swiper after categories are loaded
                initializeSwiper();
            } else {
                console.error("Error loading categories.");
            }
        };
        xhr.send();
    }

    // Function to initialize Swiper
    function initializeSwiper() {
        var swiperContainer = document.querySelector('.categories__container');
        if (swiperContainer) {
            // Destroy any existing Swiper instance to avoid conflicts
            if (swiper) {
                swiper.destroy(true, true);
            }

            // Initialize Swiper and store the instance in the swiper variable
            swiper = new Swiper(".categories__container", {
                spaceBetween: 15,
                loop: true,
                freemode: true,
                speed: 6000,
                allowTouchMove: true, // ✅ Allow manual swiping
                autoplay: {
                    delay: 0, 
                    disableOnInteraction: false, // ✅ Continue autoplay after interaction
                },
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

            // Stop autoplay on mouse enter and start autoplay on mouse leave
            container_cat.addEventListener("mousemove", () => swiper.autoplay.stop());
            container_cat.addEventListener("mouseleave", () => swiper.autoplay.start());
        }
    }

    // Load popular categories when the page is loaded
    load_popular_categories();

    // Refresh the categories list every 30 seconds (30000 milliseconds)
    setInterval(load_popular_categories, 30000); // Refresh every 30 seconds
});
</script>


<!-- ==load new arrivals=============================================== -->
<script >
   document.addEventListener("DOMContentLoaded", function () {
    function load_new() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "new_arrivals.php", true);
        xhr.onload = function () {
            if (this.status === 200) {
                const wrapper = document.querySelectorAll('.new__arrivals .swiper-wrapper');
                wrapper.innerHTML = this.responseText;
                console.log("New arrivals loaded.");

                // Check if enough slides are available
             } else {
                console.error("Error loading new arrivals.");
            }
        };
        xhr.send();
    }

    // Load products when the page is fully loaded
    load_new();
});

</script>

<script>
  // Select the search input correctly with class selector
const searchbar = document.querySelector('.search_input');

function list_value(selectedValue) {
    searchbar.value = selectedValue; // Set the value of the search input to the selected item
    document.querySelector('.result_box').style.display="none";
    
}

// Debounce function to limit the frequency of search requests
function debounce(func, delay) {
    let timeout;
    return function(...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), delay);
    };
}
function clear_search() {
    searchbar.value = ""; // Clear the search input
    searchbar.classList.remove("active"); // Remove active class if you have one
    document.querySelector('.result_box').innerHTML = ""; // Clear any displayed search results
    loadProducts(); // Optionally reload the products if needed
}

// Search functionality

function loadProducts() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "Load_products.php", true);
    xhr.onload = function () {
        if (this.status === 200) {
            document.querySelector('.products__container').innerHTML = this.responseText;
            console.log("Products loaded.");
        } else {
            console.error("Error loading products.");
        }
    };
    xhr.send();
} 

/* searchbar.onkeyup = debounce(() => {
    let searchTerm = searchbar.value.trim(); // Trim whitespace
   
    // Check if the searchTerm is not empty
    if (searchTerm !== "") {
        searchbar.classList.add("active");

        // First request
        let xhr1 = new XMLHttpRequest(); // Creating XML object
        xhr1.open("POST", "search.php", true);
        xhr1.onload = () => {
            if (xhr1.readyState === XMLHttpRequest.DONE) {
                if (xhr1.status === 200) {
                    let data = xhr1.responseText;
                    document.querySelector('.result_box').innerHTML = data; 
                    console.log("Response from search.php received");
                } else {
                    console.error("Error in request to search.php:", xhr1.status, xhr1.statusText);
                }
            }
        };

        xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr1.send("searchTerm=" + encodeURIComponent(searchTerm));

        // Second request for products
        /* let xhr2 = new XMLHttpRequest();
        xhr2.open("POST", "display_search_products.php", true);
        xhr2.onload = () => {
            if (xhr2.readyState === XMLHttpRequest.DONE) {
                if (xhr2.status === 200) {
                    let data = xhr2.responseText;
                    document.querySelector('.products__container').innerHTML = data;
                    console.log("Response from display_search_products.php received");
                } else {
                    console.error("Error in request to display_search_products.php:", xhr2.status, xhr2.statusText);
                }
            }
        };

        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.send("searchTerm=" + encodeURIComponent(searchTerm)); 

    } else {
        // If searchTerm is empty, clear the result box and product container
        console.log("Search term is empty. Clearing results.");
        searchbar.classList.remove("active");
        document.querySelector('.result_box').innerHTML = ""; // Clear the search results
        document.querySelector('.products__container').innerHTML = ""; // Clear the product display
        location.reload();
        // Load products
        /* loadProducts(); // Call loadProducts to refresh the product list
    } 
}, 300); */ // Adjust the delay as necessary (e.g., 300ms)

// Load products when the page is fully loaded
document.addEventListener("DOMContentLoaded", loadProducts);

// Refresh the user list every second (1000 milliseconds)
setInterval(loadProducts, 10000000000); // Refresh every 1 second

/* function list_value(selectedValue) {
    searchbar.value = selectedValue; // Set the search input value
    document.querySelector('.result_box').style.display = "none"; // Hide the suggestion box
    window.location.href = `shop.php?searchTerm=${encodeURIComponent(selectedValue)}`;


    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "display_search_products.php", true); // AJAX request to backend
    xhr2.onload = () => {
        if (xhr2.readyState === XMLHttpRequest.DONE) {
            if (xhr2.status === 200) {
                let data = xhr2.responseText;
                document.querySelector('.products__container').innerHTML = data; // Update product container
                console.log("Products updated dynamically.");
            } else {
                console.error("Error in request to display_search_products.php:", xhr2.status, xhr2.statusText);
            }
        }
    };

    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr2.send("searchTerm=" + encodeURIComponent(selectedValue)); // Pass the search term
}
 */
</script>   
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
  const container_cat = document.querySelector(".categories__container");

  if (container_cat) { // Ensure container exists before adding event listeners
    var swiper = new Swiper(".swiper.categories__container", {
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
});
</script>
 -->
<script>

</script>
</body>
</html>