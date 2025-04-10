<?php
if (session_id() == '') {
    // If session ID is empty, start a session
    session_start();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css?v=2.5">
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

     <title>Ecommerce website</title>
<style>
    .nav{
        height:50px;
    }
    .video-container {
    position: absolute; /* Allow the container to move freely */
    width: 100px;
    height: 200px;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s;
    cursor: grab;
    z-index:20;
}

.video-container:active {
    cursor: grabbing;
}

.video-container:hover {
    transform: scale(1.05);
}

.hover-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
:fullscreen {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: black;
}

video:fullscreen {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.fullscreen-cancel {
    display: none; /* Hidden by default */
    position: fixed;
    top: 20px;
    right: 20px;
    background: var(--first-color);
    color: white;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
    z-index: 1000;
    transition: background 0.3s;
}

.fullscreen-cancel:hover {
    background: rgba(255, 0, 0, 0.7);
}
.details__group{
    position:relative;
}
#videoContainer{
    position:absolute;
    top:1px;
    left:0px;
    cursor:grab;
}
.selected_options{
    padding-top:20px;
}
.size__link.selected {
    border-color: black; /* Highlight the selected size */
    background-color: lightgray; /* Optional for a better visual */
}
.color__link.selected {
    border-color: black; /* Highlight the selected color */
    border:3px solid;
}
.star-filled {
    color: gold;
}
.star-empty {
    color: #ccc;
}
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


        

</style>
</head>
<body>

     <!-- ====================HEADER============== -->
     <header class="header">
   
   
   <nav class="nav container">
       <a href=" " class="nav__logo-img">
           <img src="" alt="hello">
   </a>
   <div class="nav__menu" id="nav-menu">
       <div class="navbar-bottom">
       <ul class="nav__list">
           <li class="nav__item"><a href="index.html" class="nav__link active-link"><i class="fa-solid fa-house"></i> Home</a></li>
           <li class="nav__item"><a href="shop.php" class="nav__link" id="shop" >Shop</a></li>
       </ul>
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
        <div class="cart_list">
            <div class="listCart">
                <div class="item">
                    <img src="images/kids/kids (1).jpeg" alt="">
                    <div class="item_details">
                        <div class="name">
                            Product Name
                        </div>
                        <div class="price">$50/1 Product
                        </div>
                        
                    </div>
                    <div class="quantity">
                        <button><i class="fa-solid fa-circle-minus"></i></button>
                        <span  class="value">3</span>
                        <button><i class="fa-solid fa-circle-plus"></i></button>
                    </div>
                  <div>
                    <i class="fa-solid fa-trash"></i></div>
                </div>
        </div>
        <div class="listCart">
            <div class="item">
                <img src="images/kids/kids (1).jpeg" alt="">
                <div class="item_details">
                    <div class="name">
                        Product Name
                    </div>
                    <div class="price">$50/1 Product
                    </div>
                    
                </div>
                <div class="quantity">
                    <button><i class="fa-solid fa-circle-minus"></i></button>
                    <span  class="value">3</span>
                    <button><i class="fa-solid fa-circle-plus"></i></button>
                </div>
              <div>
                <i class="fa-solid fa-trash"></i></div>
            </div>
    </div>
    <div class="listCart">
        <div class="item">
            <img src="images/kids/kids (1).jpeg" alt="">
            <div class="item_details">
                <div class="name">
                    Product Name
                </div>
                <div class="price">$50/1 Product
                </div>
                
            </div>
            <div class="quantity">
                <button><i class="fa-solid fa-circle-minus"></i></button>
                <span  class="value">3</span>
                <button><i class="fa-solid fa-circle-plus"></i></button>
            </div>
          <div>
            <i class="fa-solid fa-trash"></i></div>
        </div>
    </div>
    <div class="listCart">
        <div class="item">
            <img src="images/kids/kids (1).jpeg" alt="">
            <div class="item_details">
                <div class="name">
                    Product Name
                </div>
                <div class="price">$50/1 Product
                </div>
                
            </div>
            <div class="quantity">
                <button><i class="fa-solid fa-circle-minus"></i></button>
                <span  class="value">3</span>
                <button><i class="fa-solid fa-circle-plus"></i></button>
            </div>
          <div>
            <i class="fa-solid fa-trash"></i></div>
        </div>
    </div>
    <div class="listCart">
        <div class="item">
            <img src="images/kids/kids (1).jpeg" alt="">
            <div class="item_details">
                <div class="name">
                    Product Name
                </div>
                <div class="price">$50/1 Product
                </div>
                
            </div>
            <div class="quantity">
                <button><i class="fa-solid fa-circle-minus"></i></button>
                <span  class="value">3</span>
                <button><i class="fa-solid fa-circle-plus"></i></button>
            </div>
          <div>
            <i class="fa-solid fa-trash"></i></div>
        </div>
    </div>
    
        <div class="listCart">
            <div class="item">
                <img src="images/kids/kids (1).jpeg" alt="">
                <div class="item_details">
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
              <div><i class="fa-solid fa-trash"></i></div>
            </div>
    </div>
    <div class="listCart">
        <div class="item">
            <img src="images/kids/kids (1).jpeg" alt="">
            <div class="item_details">
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
          <div><i class="fa-solid fa-trash"></i></div>
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
    </div>  
            </div>
            <div class="buttons">
                <div class="close">CLOSE</div>
                <div class="checkout">
                    <a href="checkout.html">CHECKOUT</a>
                </div>
        </div>
    </div>
       <!-- =========================MAIN===================== -->
        <main class="main"></main>
        <!-- ===========================BREADCRUMB============================== -->
        <section class="breadcrumb">
            <ul class="breadcrumb__list container flex">
                <li><a href="index.php" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link" id="category">Fashion</span></li>  
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link" id="product_title">Henley Shirt</span></li>  
            </ul>
         </section>


           <!-- =============================DETAILS=========================== -->
      <div class="details section--lg">
        <div class="details__container container grid" id='details'>
                
     
        </div>
      </div>


    <!-- =================================DETAILS TAB======================= -->
     <section class="details__tab container">
        <div class="detail__tabs">
            <span class="detail__tab active-tab" data-target="#info">Additional Info</span>
            <span class="detail__tab" data-target="#reviews">Review(3)</span>
        </div>
        <div class="details__tabs-content">
            <div class="details__tab-content active-tab" content id="info">
                <table class="__table" id="table_specification">
                    <tr>
                        <th>Stand up</th>
                        <td>35*L X 24*W X 37-45*H(front to back wheel)</td>
                    </tr>
                    <tr>
                        <th>Folded (w/0 wheels)</th>
                        <td>35*L X 24*W X 37-45*H</td>
                    </tr>
                    <tr>
                        <th>Folded (w/0 wheels)</th>
                        <td>35*L X 24*W X 37-45*H</td>
                    </tr>
                    <tr>
                        <th>Door pass through</th>
                        <td>24</td>
                    </tr>
                    <tr>
                        <th>Frame</th>
                        <td>Aluminium</td>
                    </tr>
                    <tr>
                        <th>Weight (w/0 wheels)</th>
                        <td>20LBS</td>
                    </tr>
                    <tr>
                        <th>Weight capacity</th>
                        <td>60LBS</td>
                    </tr>
                    <tr>
                        <th>width</th>
                        <td>24</td>
                    </tr>
                    <tr>
                        <th>Handle height</th>
                        <td>37-42</td>
                    </tr>
                    <tr>
                        <th>Wheels</th>
                        <td>12 air/wide track</td>
                    </tr>
                    <tr>
                        <th>Seat back height</th>
                        <td>21.5</td>
                    </tr>
                    <tr>
                        <th>Head room (inside canopy)</th>
                        <td>25</td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <td>Black, Blue and red</td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td>M,S</td>
                    </tr>

                </table>
            </div>
            <div class="details__tab-content" content id="reviews">
                <div class="reviews__container grid" id="reviewContainer">
                   <!--  <div class="review__single">
                        <div>
                            <img src="images/kids/kids (10).jpeg" alt="" class="review__img">
                            <h4 class="review__title">Jacky Chan</h4>
                        </div>
                        <div class="review__data">
                            <div class="review__rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="review__description">
                                Thank you very fast shipping from Poland only 3days.
                            </p>
                            <span class="review__date">December 4 , 2020 at 3:12pm</span>
                        </div>
                    </div>
                    <div class="review__single">
                        <div>
                            <img src="images/kids/kids (10).jpeg" alt="" class="review__img">
                            <h4 class="review__title">Jacky Chan</h4>
                        </div>
                        <div class="review__data">
                            <div class="review__rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="review__description">
                                Thank you very fast shipping from Poland only 3days.
                            </p>
                            <span class="review__date">December 4 , 2020 at 3:12pm</span>
                        </div>
                    </div>
                    <div class="review__single">
                        <div>
                            <img src="images/kids/kids (10).jpeg" alt="" class="review__img">
                            <h4 class="review__title">Jacky Chan</h4>
                        </div>
                        <div class="review__data">
                            <div class="review__rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="review__description">
                                Thank you very fast shipping from Poland only 3days.
                            </p>
                            <span class="review__date">December 4 , 2020 at 3:12pm</span>
                        </div>
                    </div> -->
                    
                </div>

                <div class="review__form">
                    <h4 class="review__form-title">Add a review</h4>
                    <div class="rate__product">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <form action="Post" class="form grid">
                        <textarea name="" rows="10" class="form__input textarea" placeholder="Write Comment"></textarea>
                        <div class="form__group grid">
                            <input type="text" class="form__input" placeholder="Name">
                            <input type="email" class="form__input" placeholder="Email">
                        </div>
                        <div class="form__btn">
                            <button class="btn">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </section>

   
     <!-- ==================================PRODUCTS=============== -->
      <section class="products container section--lg">
        <h3 class="section__title">
            <span>Related</span>Products
        </h3>

        <div class="products__container grid">
           <!--  <div class="product__item">
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
                    <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
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
            </div> -->
            
        </div>
      </section>
      <!-- ========================================NEWSLETTERN========================== -->
      <section class="newsletter section ">
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
       <!-- ===========================FOOTER========================== -->

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
                    <div class="footer__social flex">
                        <h4 class="footer__subtitle">Follow Me</h4>
                        <div class="footer__social-links">
                            <a href="">
                                <img src="images/icons/twitter.jpeg" alt="" class="footer__social-icon">
                            </a>
                            <a href="">
                                <img src="images/icons/fb.jpeg" alt="" class="footer__social-icon">
                            </a>
                            <a href="https://wa.me/254712345678" target="_blank">
                                <img src="images/icons/whatsup.jpeg" alt="" class="footer__social-icon">
                            </a>
                            <a href="https://wa.me/254712345678" target="_blank">
                                <img src="images/icons/telegram.jpeg" alt="Chat on WhatsApp" class="footer__social-icon">
                            </a>
                        </div>
                    </div>   
                </a>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">Address</h3>
                <ul class="footer__content">
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
                <ul class="footer__content">
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
    <!-- ================================insert order================================ -->
     
<!-- ==========================================product review=========================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    $(document).ready(function () {
        function fetchReviews(productId) {
            const urL = "get_reviews.php"; // Use this for POST requests

            $.ajax({
                url: urL,
                type: "POST",
                data: { product_id: productId },
                dataType: "json",
                success: function (response) {
                    let reviewsHtml = "";
                    if (response.length > 0) {
                        response.forEach(review => {
                            let stars = "";
                            for (let i = 1; i <= 5; i++) {
                                stars += `<i class="fa-solid fa-star ${i <= review.rating ? 'star-filled' : 'star-empty'}"></i>`;
                            }

                            reviewsHtml += `
                                <div class="review__single">
                                    <div>
                                        <img src="${review.image_path}" alt="User Image" class="review__img">
                                        <h4 class="review__title">${review.first_name}</h4>
                                    </div>
                                    <div class="review__data">
                                        <div class="review__rating">${stars}</div>
                                        <p class="review__description">${review.review_text}</p>
                                        <span class="review__date">${review.review_date}</span>
                                    </div>
                                </div>`;
                        });
                    } else {
                        reviewsHtml = `<p>No reviews yet.</p>`;
                    }
                    $("#reviewContainer").html(reviewsHtml);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        }

        // Get product ID from URL and fetch reviews
        const productId = getQueryParam("product_id") || 1; // Default to 1 if not found
        setInterval(function() {
    fetchReviews(productId);
}, 60000);

    });
</script>

     <!-- ===========================insert product details ================================= -->
     <script>
// Fetch the product details dynamically using AJAX (Fetch API)
const product_Id = getQueryParam("product_id");
const url = `fetch_product_details.php?product_id=${product_Id}`;
const url1=`breadcrumb.php?product_id=${product_Id}`;
const category=document.getElementById("category");
const product_title=document.getElementById("product_title");
fetch(url1, {
    method: "GET",
})
.then(response => response.json())
.then(data => {
    if (data.status === "success") {
        // Assuming `breadcrumb` is part of the response
        category.textContent = `${data.breadcrumb.category}`;
        product_title.textContent = `${data.breadcrumb.product_title}`;
    } else {
        // Show the message from the response
        alert(data.message);
    }
})
.catch(error => {
    // Handle any error that occurred during the fetch request
    console.error("Error fetching data:", error);
    alert("An error occurred while fetching the data.");
});

fetch(url, {
    method: "GET", // GET request is correct
})
.then(response => response.json()) // Parse JSON response
.then(data => {
    if (data) {
        // Successfully fetched data, now handle the product details

        // Update the page with the product details (dynamic content)
        document.getElementById('details').innerHTML = data.data;
        var specificationPath = `../admin_area/${data.product_specification}`;

        console.log(specificationPath);
fetch(specificationPath, {
    method: "GET",
})
.then(response => response.json()) // Parse the response as JSON
.then(specifications => {
    // Empty the existing table content before adding new rows
    let tableContent = '';

    // Loop through the specifications and add rows to the table
    specifications.forEach(spec => {
        tableContent += `
            <tr>
                <th>${spec.name}</th>
                <td>${spec.value}</td>
            </tr>
        `;
    });

    // Insert the generated HTML into the table
    document.getElementById("table_specification").innerHTML = tableContent;
})
.catch(error => {
    // Handle any errors (e.g., network issues, JSON parsing issues)
    console.error('Error:', error);
    alert('Something went wrong while loading specifications.');
});

        // Example: Show product name and price in an alert
        alert(`success`);

        // Reinitialize the gallery function after dynamic content is added
        imgGallery();

    } else {
        alert(`something went wrong`);
    }
})
.catch(error => {
    alert("An unexpected error occurred.");
});

// Function to get a query parameter by name
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// Gallery function to handle image click event
function imgGallery() {
    const mainImg = document.querySelector('.details__img');
    const smallImg = document.querySelectorAll('.details__small-img');
    if (!mainImg || smallImg.length === 0) return; // Safety check

    smallImg.forEach((img) => {
        img.addEventListener('click', function() {
            mainImg.src = img.src;
        });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Event delegation: Attach event listeners to the parent (body or container)
    document.body.addEventListener('click', function(e) {
        // Handle color selection
        if (e.target && e.target.classList.contains('color__link')) {
            const colorOptions = document.querySelectorAll('.color__link');
            colorOptions.forEach(c => c.classList.remove('selected'));
            e.target.classList.add('selected');
            document.getElementById('selected-color').textContent = e.target.getAttribute('data-value');
        }

        // Handle size selection
        if (e.target && e.target.classList.contains('size__link')) {
            const sizeOptions = document.querySelectorAll('.size__link');
            sizeOptions.forEach(s => s.classList.remove('selected'));
            e.target.classList.add('selected');
            document.getElementById('selected-size').textContent = e.target.getAttribute('data-value');
        }
    });
    setTimeout(( )=>{
        const video = document.getElementById('hoverVideo');
    const videoContainer = document.getElementById('videoContainer');
    const fullscreenCancel = document.getElementById('fullscreenCancel');

    if (video && videoContainer && fullscreenCancel) {
        let position = { top: (window.innerHeight - videoContainer.offsetHeight) / 2, left: (window.innerWidth - videoContainer.offsetWidth) / 2 };
        let isDragging = false;
        let dragStart = { x: 0, y: 0 };

        // Play video on hover
        video.addEventListener('mouseenter', () => {
            video.play();
        });

        // Pause video on mouse leave
        video.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });

        // Handle fullscreen toggle
        video.addEventListener('dblclick', () => {
            if (document.fullscreenElement) {
                document.exitFullscreen();
            } else {
                video.muted = false;
                video.requestFullscreen();
                fullscreenCancel.style.display = 'block';
            }
        });

        // Close fullscreen when clicking on the cancel button
        fullscreenCancel.addEventListener('click', () => {
            if (document.fullscreenElement) {
                document.exitFullscreen();
            }
        });

        // Adjust position with arrow keys
        document.addEventListener('keydown', (event) => {
            const step = 10;
            switch (event.key) {
                case 'ArrowUp':
                    position.top = Math.max(0, position.top - step);
                    break;
                case 'ArrowDown':
                    position.top = Math.min(window.innerHeight - videoContainer.offsetHeight, position.top + step);
                    break;
                case 'ArrowLeft':
                    position.left = Math.max(0, position.left - step);
                    break;
                case 'ArrowRight':
                    position.left = Math.min(window.innerWidth - videoContainer.offsetWidth, position.left + step);
                    break;
            }
            updatePosition();
        });

        // Mouse drag functionality
        videoContainer.addEventListener('mousedown', (e) => {
            isDragging = true;
            dragStart.x = e.clientX - position.left;
            dragStart.y = e.clientY - position.top;
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                position.left = Math.max(0, Math.min(window.innerWidth - videoContainer.offsetWidth, e.clientX - dragStart.x));
                position.top = Math.max(0, Math.min(window.innerHeight - videoContainer.offsetHeight, e.clientY - dragStart.y));
                updatePosition();
            }
        }, { passive: true });

        document.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Update the position of the video container
        function updatePosition() {
            videoContainer.style.top = `${position.top}px`;
            videoContainer.style.left = `${position.left}px`;
        }

        updatePosition(); // Set initial position

    } else {
        console.error('One or more elements are missing.');
    }
    
    },2000)
    
    // Set initial position
    
  // Adjust value increment/decrement for quantity
 
  
});
</script>
<script>
const prod_Id = getQueryParam("product_id");
const ur = `fetch_related_products.php?product_id=${prod_Id}`;
console.log(ur);
fetch(ur, {
    method: "GET", // GET request is correct
})
.then(response => response.text()) // Parse JSON response
.then(data => {
    if (data) {
        // Successfully fetched data, now handle the product details

        // Update the page with the product details (dynamic content)
        document.querySelector('.products__container').innerHTML = data

        // Example: Show product name and price in an alert
        alert(`successfully`);



    } else {
        alert(`something went wrong`);
    }
})
.catch(error => {
    alert("An unexpected error occurred.");
});

// Function to get a query parameter by name
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
</script>

        <!-- =================================SWIPER JS=========================== -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- ==================================MAIN JS=========================================== -->
        <script src="assets/js/index.js"></script>
        <script>
    document.addEventListener('DOMContentLoaded', () => {  // Fixed typo here
        function loadDynamicContent() {
            setTimeout(() => {
        const buyNowButton = document.getElementById("buy");
        const selectedColorElement = document.getElementById("selected-color");
        const selectedSizeElement = document.getElementById("selected-size");
        const quantityElement = document.getElementById("value_input");
        const productDetailsDiv = document.getElementById('product-price');
        const buttonPrice=document.querySelectorAll('.quantity_details button');
        const product_Price=document.getElementById('product-price');
    
    // Get the price from the data attribute
    console.log(buttonPrice);
    buttonPrice.forEach(button => {
    button.addEventListener('click', () => {
        // Handle button click here
        console.log('Button clicked:', button);
    });
});
    const productPrice = productDetailsDiv.getAttribute('data-product-price');
    console.log("Product Price:", productPrice);  // Logs the price
    function updatePrice(){
         // Get the quantity value as a number
         const quantity = parseInt(quantityElement.value, 10);

if (!isNaN(quantity) && productPrice) {
    const amountDue = productPrice * quantity;
    console.log("Amount Due:", amountDue); // Logs the calculated amount
    product_Price.textContent=amountDue;
} else {
    console.error("Invalid quantity or product price");
}


    }
    quantityElement.addEventListener('input', updatePrice);  // Also consider 'change' event if you want to update when input is confirmed

// Initial price update (in case the quantity is pre-filled)
updatePrice();

        // Get product_id from the URL
        const productId = getQueryParam("product_id");

        console.log("Product ID:", productId);  // Log to check product_id

        // Ensure product_id is present
        if (!productId) {
            console.error("Product ID is missing from the URL.");
            return;
        }

        // Handle color selection
        document.querySelectorAll(".color__link").forEach(colorLink => {
            colorLink.addEventListener("click", () => {
                const selectedColor = colorLink.getAttribute("data-value");
                selectedColorElement.textContent = selectedColor;
                console.log("Selected color:", selectedColor);  // Log selected color
            });
        });

        // Handle size selection
        document.querySelectorAll(".size__link").forEach(sizeLink => {
            sizeLink.addEventListener("click", () => {
                const selectedSize = sizeLink.getAttribute("data-value");
                selectedSizeElement.textContent = selectedSize;
                console.log("Selected size:", selectedSize);  // Log selected size
            });
        });
       
        // Handle Buy Now button click
        buyNowButton.addEventListener("click", () => {
            const selectedColor = selectedColorElement.textContent;
            const selectedSize = selectedSizeElement.textContent;
            const quantity = parseInt(quantityElement.value, 10);  // Fix here if quantity is from input field
            const priceValue=product_Price.textContent;
            console.log(priceValue);

            console.log("Selected color:", selectedColor);
            console.log("Selected size:", selectedSize);
            console.log("Quantity:", quantity);

            if (selectedColor === "None" || selectedSize === "None" || isNaN(quantity)) {
                alert("Please select a color, size, and quantity.");
                return;
            }

            // AJAX request to insert the order
            fetch("insert_order.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    product_id: productId,
                    color: selectedColor,
                    size: selectedSize,
                    quantity: quantity,
                    amountdue: priceValue,
                    price_per_unit: productPrice
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message);
                 
                }
                 else if(data.status ==="redirect"){
                        window.location.href=data.url;
                 }else {
                    alert(`Error: ${data.message}`);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An unexpected error occurred.");
            });
        });

        // Function to get a query parameter by name
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }
        
    },1000);
}
loadDynamicContent();
    });
</script>


  <!--  -->     

</body>
</html>