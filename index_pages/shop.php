<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ================flation============== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- ================================swiper=================== -->
     <link
     rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
   />    
      
     <!-- ==================css -->
     <link rel="stylesheet" href="assets/css/style.css?v=1.2">
      <title>Ecommerce website</title>

      <style>
        section{
    padding-block:2rem;
    padding-left: 50px;
    padding-right: 50px;
}@media screen and (max-width:576px){
    section{
        padding-block:2rem;
        padding-left:7px;
        padding-right: 0px;
        

    }
    #shop_products .product__item{
        width:100%;
    }
    .cart_slide{
        width:360px;
    }
}

.nav{
    height:50px;
}
      </style>
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
           <a href="login-register.html" class="header__top-action">
               <i class="fa-solid fa-globe"></i> <span>Language</span>
           </a>
           <a href="user_login.html" class="header__top-action hidden_object">
               <i class="fa-solid fa-user-tie"></i> <span id="log">Login | Signup</span>
           </a>
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
             <a href="login-register.html" class="header__top-action hidden_object">
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
           <li class="nav__item"><a href="shop.html" class="nav__link" id="shop" >Shop</a></li>
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
             <a href="login-register.html" class="header__top-action">
               <button class="btn_user">R</button>  <span id="account_id">My Account</span>
            </a>
   </div>

       <!-- ===============================MAIN==================== -->
        <main class="main"></main>

        <!-- ========================BREADCRUMB============================= -->
         <section class="breadcrumb">
            <ul class="breadcrumb__list container flex">
                <li><a href="index.html" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link">Shop</span></li>
                
            </ul>
         </section>

         <!-- ============================PRODUCT====================== -->

         <section class="products section">
            <p class="total__products">
                We found <span>400</span> items for you!
            </p> 
            <div class="products__container grid" id="shop_products">
                <!-- <div class="product__item">
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
            <!-- <ul class="pagination">
                <li><a href="#" class="pagination__link active">01</a></li>
                <li><a href="#" class="pagination__link">02</a></li>
                <li><a href="#" class="pagination__link">03</a></li>
                <li><a href="#" class="pagination__link">...</a></li>
                <li><a href="#" class="pagination__link">16</a></li>
                <li><a href="" class="pagination__link">
                    <i class="fa-solid fa-angles-right"></i>
                </a></li>
            </ul> -->
        
         </section>
         <!-- ==========================SHOWCASE=================== -->
          <!-- ===============================NEWSLETTER===================== -->

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
           <!-- ============================================FOOTER================= -->
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
                                <a href="">
                                    <img src="images/icons/whatsup.jpeg" alt="" class="footer__social-icon">
                                </a>
                                <a href="">
                                    <img src="images/icons/telegram.jpeg" alt="" class="footer__social-icon">
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

         <!-- ===========================SWIPER JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
       <!-- INDEX JS -->
    <script src="assets/js/index.js"></script>

    <!-- Load React, ReactDOM, and Babel -->
<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<!-- ===========================================index to shop searching============================ -->
 <!-- Container for displaying products -->
<div id="productContainer"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- -====================================searching================================== -->
<script>
const searchInput = document.querySelector('.mainbox .search_input');
const searchContainer = document.querySelector('.search-container');
const suggestion_values = document.querySelector('.history-section');
const suggestion = document.querySelector('.suggestion-content-live');
const categories = document.querySelector('.categories-bar');
const products_cat = document.querySelector('.grid-section');
const iconSearch=document.querySelector('.iconContainer');
const historySection=document.getElementById('history');

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
         <li><span class="delete_hist" key=${item.key}>&times;</span> <span class="hist_value">${item}</span></li>
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
                            <img src='${product.image1}' alt='${product.title}'>
                            <p class='product-name'>${product.title}</p>
                            <p class='product-price'>$${product.new_price}</p>
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
        xhr1.open("POST", "search_shop.php", true);
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
        
    } 
});



// Hide suggestion and search containers when clicking outside
document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !suggestion.contains(e.target) && !searchContainer.contains(e.target)) {
        suggestion.style.display = 'none';
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
<!-- ====================================brand==================== -->
<script>
// Function to get query parameters from URL
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

$(document).ready(function() {
    // Read 'brand' and 'search' from the URL
    let brands=getQueryParam("rasndb") || "";
    let keyword = getQueryParam("keyword") || "";
    let category = getQueryParam("cat") || "";  // Use 'search' parameter from the URL

    // Function to fetch products based on search query
    function fetchSearchResults() {
        $.ajax({
            url: "fetch_product_search.php",  // Adjust URL for search results
            type: "POST",
            data: { keyword: keyword},
            success: function(response) {
                console.log("Search Results: ", response);  // Debugging
                $("#shop_products").html(response);  // Update the products container with the response
            }
        });
    }

    // Function to fetch products by brand
    function fetchProductByBrand() {
        $.ajax({
            url: "fetch_product_brand.php",  // URL for brand filtering
            type: "POST",
            data: { brand: brands },
            success: function(response) {
                console.log("Brand Filtered Products: ", response);  // Debugging
                $("#shop_products").html(response);  // Update the products container
            }
        });
    }

    // Fetch products based on search or brand
    if (keyword != "") {
        fetchSearchResults();  // Fetch search results if the search query exists
    } if(brand !=""){
        fetchProductByBrand();  // Fetch products by brand if the brand query exists
    }
});
</script>



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
    searchContainer.style.display = 'none'; // Hide container
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

</script>
 React Component with Babel --> 
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
              setCartCount(cartCount + 1);// Increment cart count
            } else {
              alert("Error adding item to cart.");
            }
          });
      } 
        // User is not logged in, use localStorage
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
      
    };
      React.useEffect(()=>{
        const cartCountElement = document.getElementById('count_cart');
    if (cartCountElement) {
      cartCountElement.textContent = cartCount;
    }
  }, [cartCount]); // Run this effect whenever `cartCount` changes




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
              setwishCount(wishCount + 1); // Increment wish count
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
        setwishCount(wishCount + 1); // Increment wish count
        alert("Item added to wish!");
      }
    };
      React.useEffect(()=>{
        const wishCountElement = document.getElementById('count_wish');
    if (wishCountElement) {
      wishCountElement.textContent = wishCount;
    }
  }, [wishCount]); // Run this effect whenever wishCount changes
    if (loading) {
      return(
       /* From Uiverse.io by paesjr */ 
      
<div className="loader">Loading
  <span></span>
</div>
      );
    }

    return (
      <div>
        {/* Display cart count */}
        <div className="cart__count">Items in Cart: {cartCount}</div>

        <div className="products__container grid">
          {products.map((product) => (
            <div className="product__item" key={product.product_id}>
              <div className="product__banner">
                <a href="details.php" className="product__images">
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
  
ReactDOM.render(<ProductList />, document.getElementById('shop_products'));

</script>

<script type="text/babel">
const Cart = () => {
  const [cart, setCart] = React.useState([]);

  // Retrieve cart data from localStorage when the component mounts
  React.useEffect(() => {
    const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
    setCart(storedCart);
  }, [ ]);
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
}, [ ]); // Run this effect whenever `cartCount` changes
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

<!-- // Select the search input correctly with class selector -->
<script>
const searchbar = document.querySelector('.search_input');

function list_value(selectedValue) {
    searchbar.value = selectedValue; // Set the value of the search input to the selected item
    let xhr2 = new XMLHttpRequest();
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
        xhr2.send("searchTerm=" + encodeURIComponent(selectedValue));

    document.querySelector('.history-section').style.display="none";
    
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
    document.querySelector('.history-section').innerHTML = ""; // Clear any displayed search results
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

searchbar.onkeyup = debounce(() => {
    let searchTerm = searchbar.value.trim(); // Trim whitespace
   
    // Check if the searchTerm is not empty
    if (searchTerm !== "") {
        searchbar.classList.add("active");

        // Second request for products
        let xhr2 = new XMLHttpRequest();
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
        document.querySelector('.history-section').innerHTML = ""; // Clear the search results
        document.querySelector('.products__container').innerHTML = ""; // Clear the product display
        location.reload();
        // Load products
        /* loadProducts(); */ // Call loadProducts to refresh the product list
    } 
}, 300); // Adjust the delay as necessary (e.g., 300ms)

// Load products when the page is fully loaded
/* document.addEventListener("DOMContentLoaded", loadProducts);

// Refresh the user list every second (1000 milliseconds)
setInterval(loadProducts, 10000000000); // Refresh every 1 second */


</script>   
 
</body>
</html>