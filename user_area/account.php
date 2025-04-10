<?php
if (session_id() == '') {
    // If session ID is empty, start a session
    session_start();
}

if (!isset($_SESSION['user_id']) && !isset($_COOKIE['userToken'])) {
    $current_page = urlencode($_SERVER['REQUEST_URI']); // Current page URL
    header("Location: ../user_area/user_loginnew.php?redirect=$current_page");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../index_pages/assets/css/style.css">
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
 .swiper{
    overflow:visible;
    overflow-X: hidden;
    overflow-y:visible;
    padding-top:0px;
    margin-top: 0px;

}

.swiper-button-next:after,.swiper-button-prev:after
{
content:'';

}
.swiper-button-next, .swiper-button-prev{
  top:25px;
   background-color: var(--first-color-alt);
   border: 1px solid var(--border-color);
  width: 50px;
  height:50px;
  border-radius: 50%;
  color:var(--first-color);
  /* font-size:var(--tiny-font-size); */
  overflow:visible;
}
.swiper-button-prev{
    left:initial;
    right:5rem;
}
.container_order {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #444;
    }
    .order-status {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .status-tab {
      flex: 1;
      text-align: center;
      padding: 15px;
      background: #f1f1f1;
      border-radius: 8px;
      margin: 0 10px;
      font-weight: bold;
      color: #666;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .status-tab.active {
      background: #ff5722;
      color: white;
    }
    .status-tab:hover {
      background: #ff5722;
      color: white;
    }
    #deliveredOrders, #shippedOrders, #processingOrders, #unpaidOrders{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap:10px;
    }
    .order-card {
      display: flex;
      justify-content: space-between;
      padding: 15px;
      margin-bottom: 10px;
      background: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      flex-direction:column;
      width:100%;
    }
    .order-card:nth-child(1){
      display:flex;
      flex-direction:row;
      align-items: center;
    }
    .order-details {
      flex: 2;
    }
    .order-details img{
        width:150px;
        height:200px;
    }
    .order-actions {
      flex: 1;
      text-align: right;
    }
    .order-actions button {
      padding: 8px 12px;
      border: none;
      border-radius: 4px;
      background: #ff5722;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .order-actions button:hover {
      background: #e64a19;
    }
    .order-title {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 5px 0;
    }
    .order-meta {
      font-size: 14px;
      color: #888;
    }
    .empty-state {
      text-align: center;
      padding: 50px;
      color: #bbb;
    }
    .order_details{
        display:flex;
        justify-content:space-between;
        width:100%;
        background-color:var(--first-color-alt);
        height:50px;
        align-items: center;
        margin-bottom:10px;
        color:black;
        padding-right:5px;
        padding-left:20px;

    }
    .order_button{
        width:100px;
        height:25px;
        border: 1px solid ;
        border-color:var(--first-color);
        border-radius:5px;

    }
    @media screen and (max-width: 576px){
      .order_button{
        height:50px;

      }

    }
    .order_button:hover{
        background-color:var(--first-color);
    }
    .cart_btn-order{
        width:50px;
        height:50px;
        background-color:var(--first-color);
        border-radius:50%;

    }
    .order_btn{
        width:15%;
        text-align:center;
        position:relative;
    }
    .action__btn{
      position:absolute;
      top:-10!important;
      left: 8px;

    }
    .order-actions{
      top:-40px;
    }
    .modal_review{
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 10;
  left: 0;
  top: -30px;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent background */
  text-decoration: center;
}

.modal_review .modal-content {
  background-color: white;
  margin: 15% auto;
  padding: 20px;
  border-radius: 5px;
  width: 70%;
  max-width: 500px;
  transform: translateY(-100px);
}

.modal_review .close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.modal_review .close:hover,
.modal_review .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal_review h2 {
  text-align: center;
}

.modal_review .rating {
  display: flex;
  justify-content: space-around;
  margin-bottom: 15px;
}

.modal_review .rating input {
  display: none;
}

.modal_review .rating label {
  font-size: 25px;
  color: #ccc;
  cursor: pointer;
}

/* Colorize the stars in ascending order (left to right) when a radio button is checked */
/* Style for the review section */
.modal_review label {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
  display: block;
}

.modal_review textarea {
  width: 100%;
  height: 150px;
  padding: 15px;
  border-radius: 8px;
  border: 1px solid #ddd;
  resize: none;
  font-size: 16px;
  font-family: 'Arial', sans-serif;
  color: #555;
  transition: border-color 0.3s ease-in-out;
  margin-bottom: 20px;
}

/* Focus effect on textarea */
.modal_review textarea:focus {
  border-color: var(--first-color); /* Highlight color on focus */
  outline: none;
}

/* Style for the submit button */
.modal_review button[type="submit"] {
  background-color: var(--first-color); /* Bright color for the button */
  color: white;
  font-size: 16px;
  font-weight: bold;
  padding: 12px 20px;
  border: 1px solid var(--first-color);
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  width: 100%;
  margin-top: 10px;
}

/* Hover effect for the submit button */
.modal_review button[type="submit"]:hover {
  background-color: transparent;
  color:var(--first-color);
}

/* Additional spacing for the form */
.modal_review form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.modal_review form h2 {
  text-align: center;
  margin-bottom: 30px;
}


.modal_review .rating label.selected {
  color: #f39c12; /* Color for selected stars */
}
/* ==============upload input============================= */
/* From Uiverse.io by akshat-patel28 */ 
.modal_review .input-div {
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 2px solid var(--first-color);
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  box-shadow: 0px 0px 100px var(--first-color) , inset 0px 0px 10px var(--first-color),0px 0px 5px rgb(255, 255, 255);
  animation: flicker 2s linear infinite;
}

.modal_review .icon {
  color: var(--first-color);
  font-size: 2rem;
  cursor: pointer;
  animation: iconflicker 2s linear infinite;
}

.modal_review .input {
  position: absolute;
  opacity: 0;
  width: 100%;
  height: 100%;
  cursor: pointer !important;
  left:0px;
}

@keyframes flicker {
  0% {
    border: 2px solid var(--first-color);
    box-shadow: 0px 0px 100px var(--first-color) , inset 0px 0px 10px var(--first-color),0px 0px 5px rgb(255, 255, 255);
  }

  5% {
    border: none;
    box-shadow: none;
  }

  10% {
    border: 2px solid var(--first-color);
    box-shadow: 0px 0px 100px var(--first-color) , inset 0px 0px 10px var(--first-color),0px 0px 5px rgb(255, 255, 255);
  }

  25% {
    border: none;
    box-shadow: none;
  }

  30% {
    border: 2px solid var(--first-color);
    box-shadow: 0px 0px 100px var(--first-color), inset 0px 0px 10px var(--first-color),0px 0px 5px rgb(255, 255, 255);
  }

  100% {
    border: 2px solid var(--first-color);
    box-shadow: 0px 0px 100px var(--first-color),0px 0px 5px rgb(255, 255, 255);
  }
}

@keyframes iconflicker {
  0% {
    opacity: 1;
  }

  5% {
    opacity: 0.2;
  }

  10% {
    opacity: 1;
  }

  25% {
    opacity: 0.2;
  }

  30% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}
.modal_review .flex-upload{
    display:flex;
    flex-direction: row;
    justify-content: space-between;
    width:100%;
}
.modal_review .flex-upload img{
    width: 100px;
    height:100px;
    border-radius:10px;
    border:none;
}
/* ==========================0rder details================================= */

.container__orders {
    display:none;
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.container__orders h1, h2 {
    color: var(--first-color);
    margin-bottom: 15px;
}

.container__orders p {
    margin: 10px 0;
    font-size: 1rem;
}

.container__orders .order-info,.container__orders .items-list,.container__orders .price-breakdown,.container__orders .address,.container__orders .payment-method {
    margin-bottom: 20px;
    background: #f9f9f9;
    padding: 15px;
    border-radius: 5px;
}

.container__orders .items-list .item {
    background: #f1f1f1;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.container__orders .price-breakdown p {
    font-size: 1rem;
}

.container__orders .price-breakdown .total {
    font-size: 1.2rem;
    color: #000;
    font-weight: bold;
    margin-top: 10px;
}

.container__orders .address p, .payment-method p {
    font-size: 1rem;
}

.container__orders .back-button {
    text-align: center;
}

.container__orders .btn {
    display: inline-block;
    background: var(--first-color);
    color: #fff;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s;
}

.container__orders .btn:hover {
    background-color:transparent;
    color:var(--first-color);
}
.container__orders .item{
    display: flex;
    flex-direction: row;
    justify-content:space-between;
}
.container__orders .item img{
    width: 120px;
    height:120px;
    border-radius: 10px;
}
.tabs__content {
    max-height: 100vh; /* Prevents overflow */
    overflow: hidden; /* Initially hides scrolling */
    transition: overflow 0.3s ease-in-out;
    scrollbar-width: 0px;
}
     </style>

</head>
<body>

     <!-- ====================HEADER============== -->
     <header class="header">
        <div class="header__top">
            <div class="container header__container">
                <div class="header__contact">
                    <span>(+255) - 744-037-399</span>
                    <span>Our location</span>
                </div>
                <p class="header__alert-news">
                    Super value Deals -Save more with coupons
                </p>
                <a href="login-register.html" class="header__top-action">
                    log In
                </a>
            </div>
        </div>
        <nav class="nav container">
            <a href=" " class="nav__logo-img">
                <img src="" alt="hello">
        </a>
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.html" class="nav__link ">Home</a></li>
                <li class="nav__item"><a href="shop.html" class="nav__link">Shop</a></li>
                <li class="nav__item"><a href="accounts.html" class="nav__link active-link">My account</a></li>
                <li class="nav__item"><a href="compare.html" class="nav__link">Compare</a></li>
                <li class="nav__item"><a href="login.html" class="nav__link">Login</a></li>
            </ul>
    <div class="header__search">
        <form action="post">
            <input type="text" placeholder="Search" name="text" class="form-input" name="search">
            <button class="search__btn" name="search-btn"><svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
            </svg></button>
        </form>
      
    </div>
    <div class="header__user-actions">
        <a href="wishlist.html" class="header__action-btn"><i class="fa-solid fa-heart"></i><span><sup class="count">5</sup></span></a></div>
        <a href="cart.html" class="header__action-btn"><i class="fa-solid fa-cart-plus"></i><span><sup class="count">5</sup></span></a></div>
    </div>
        </div>
        </nav>
       </header>
       <!-- =========================MAIN===================== -->
        <main class="main"></main>
        <!-- ===========================BREADCRUMB============================== -->
        <section class="breadcrumb">
            <ul class="breadcrumb__list container flex">
                <li><a href="index.html" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link">Fashion</span></li>  
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link">Henley Shirt</span></li>  
            </ul>
         </section>
<!-- ===============================ACCOUNTS================= -->

<section class="accounts section--lg">
    <div class="accounts__container container grid">
    <button class="hamburgeraccount" id="hamburger">
        ☰ Menu
    </button>
        <div class="account__tabs" id="accountTabs">
            <p class="account__tab active-tab" data-target="#Dashboard">
                <i class="fa-solid fa-sliders"></i>Dashboard
            </p>
            <p class="account__tab" data-target="#orders">
                <i class="fa-solid fa-cart-shopping"></i>Orders
            </p>
            <p class="account__tab" data-target="#Update-profile">
                <i class="fa-solid fa-user"></i>Update Profile
            </p>
            <p class="account__tab" data-target="#address">
              <i class="fa-solid fa-location-dot"></i>My Address
            </p>
            <p class="account__tab" data-target="#refund">
              <i class="fa-solid fa-money-bill-transfer"></i>Refund and return
            </p>
            <p class="account__tab" data-target="#chat">
              <i class="fa-solid fa-comments"></i>Chat with us
            </p>
            <p class="account__tab" data-target="#follow">
              <i class="fa-solid fa-user-plus"></i>Invite friends
            </p>
            <p class="account__tab" data-target="#suggestion">
              <i class="fa-solid fa-person-chalkboard"></i>suggestion
            </p>
            <p class="account__tab">
              <i class="fa-solid fa-user-lock"></i>Logout
            </p>
        </div>
        <div class="tabs__content">
                        <div class="tab__content" content id="Dashboard">
                <div class="profile_flex">
                    <div class="user_name">
                       
                        <h3> <button class="profile_image">R</button> Renatus Sebastian</h3>
                    </div>
                     <div class="profile_item">
                        <div class="user_perk">
                            <button><i class="fa-solid fa-heart"></i></button>
                            <h4 class="user_perk_title">My wishlist</h4>
                        </div>
                        <div class="user_perk">
                            <button><i class="fa-solid fa-cart-arrow-down"></i><button>
                            <h4 class="user_perk_title">My Cart</h4>
                        </div>
                        <div class="user_perk">
                            <button><i class="fa-solid fa-clipboard-check"></i></button>
                            <h4 class="user_perk_title">coupons</h4>
                        </div>
                        <div class="user_perk">
                            <button><i class="fa-solid fa-user-plus"></i></button>
                            <h4 class="user_perk_title">following</h4>
                        </div>
                    </div>
                    </div>
                    <div class="profile_flex">
                        <div class="user_name">
                           
                            <h3> My Orders</h3>
                        </div>
                         <div class="profile_item" data-context="Dashboard">
                            
                            <div class="user_perk">
                                <button data-target="#order_track" onclick="filterOrders('unpaid')"><i class="fa-solid fa-sack-dollar"></i><button>
                                <h4 class="user_perk_title">Unpaid</h4>
                            </div>
                            <div class="user_perk">
                                <button data-target="#order_track" onclick="filterOrders('tobeshipped')"><i class="fa-solid fa-warehouse"></i><button>
                                <h4 class="user_perk_title">To be shipped</h4>
                            </div>
                            <div class="user_perk">
                                <button data-target="#order_track" onclick="filterOrders('shipped')"><i class="fa-solid fa-truck"></i></button>
                                <h4 class="user_perk_title">Shipped</h4>
                            </div>
                            <div class="user_perk">
                                <button data-target="#order_track" onclick="filterOrders('processed')"><i class="fa-solid fa-truck-ramp-box"></i></button>
                                <h4 class="user_perk_title">Awaiting delivery</h4>
                            </div>
                        </div>
                        </div>

                       
                        </div>
                        <div class="tab__content" content id="orders">
                            <h3 class="tab__header">Your Orders</h3>
                            <div class="tab__body" id="orderList">
                                <div class="profile_flex">
                                    <div class="order_details">
                                        <div class="status">Complete</div>
                                        <div class="order_id"><span>OrderId:</span>
                                             0879347374937493</div>
                                        <div class="order_product_details"><button class="order_button">Order details <i class="fa-solid fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="flex_details">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity  order_btn" id="open-review-modal">
                                            <a href="#" class="action__btn" aria-label="Add a Review"><i class="fa-regular fa-comment"></i></a>
                                           
                                        </div>
                                        </div>
                                        
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                              <!--  <div class="profile_flex">
                                    <div class="order_details">
                                        <div class="status">Complete</div>
                                        <div class="order_id"><span>OrderId:</span>
                                             0879347374937493</div>
                                        <div class="order_product_details"><button class="order_button">Order details <i class="fa-solid fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity  order_btn" id="open-review-modal">
                                            <a href="#" class="action__btn" aria-label="Add a Review"><i class="fa-regular fa-comment"></i></a>
                                           
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_flex">
                                    <div class="order_details">
                                        <div class="status">Complete</div>
                                        <div class="order_id"><span>OrderId:</span>
                                             0879347374937493</div>
                                        <div class="order_product_details"><button class="order_button">Order details <i class="fa-solid fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity  order_btn" id="open-review-modal">
                                            <a href="#" class="action__btn" aria-label="Add a Review"><i class="fa-regular fa-comment"></i></a>
                                           
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_flex">
                                    <div class="order_details">
                                        <div class="status">Complete</div>
                                        <div class="order_id"><span>OrderId:</span>
                                             0879347374937493</div>
                                        <div class="order_product_details"><button class="order_button">Order details <i class="fa-solid fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity  order_btn" id="open-review-modal">
                                            <a href="#" class="action__btn"  aria-label="Add a Review"><i class="fa-regular fa-comment"></i></a>
                                           
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_flex">
                                    <div class="order_details">
                                        <div class="status">Complete</div>
                                        <div class="order_id"><span>OrderId:</span>
                                             0879347374937493</div>
                                        <div class="order_product_details"><button class="order_button">Order details <i class="fa-solid fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity  order_btn" id="open-review-modal">
                                            <a href="#" class="action__btn" aria-label="Add a Review"><i class="fa-regular fa-comment"></i></a>
                                           
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div> -->
                                 
                               
                                
                                
                            </div>
                        </div>
                        <div class="tab__content" content id="Update-profile">
                            <h3 class="tab__header">Update Profile</h3>
                            <div class="tab__body">
                                <form action="" class="form grid">
                                    <div class="update_form">
                                        <label for="phone">Email</label>
                                        <input type="tel" name="phone" placeholder="Enter your email address" required>
                                      </div> 
                                    <div class="update_form">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" name="phone" placeholder="Enter your phone number" required>
                                      </div>
                                      <div class="update_form">
                                        <label for="phone">User name</label>
                                        <input type="text" name="user_name" placeholder="Enter your are username" required>
                                      </div>
                                      <div class="update_form">
                                        <label for="phone">Current password</label>
                                        <input type="password" name="current_password" placeholder="Enter your current password" required>
                                      </div>
                                      <div class="update_form">
                                        <label for="current password">New password</label>
                                        <input type="password" name="new_password" placeholder="Enter your new password" required>
                                      </div>
                                      <div class="update_form">
                                        <label for="profile_img">Profile image</label>
                                        <input type="file" name="profile_img" placeholder="Enter profile image" required>
                                      </div>
                                    <div class="form__btn">
                                        <button class="btn btn--md">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                          <!-- Address Display Section -->
                        <div class="tab__content" content id="address">
    <div class="address_header tab__header">
      <h3>Shipping Address</h3>
      <button id="openModal">Add Address</button>
    </div>
  
    <div class="tab__body">
      <address class="address">
        344 Interstate 75 Business Spur, <br>
        Sault site
      </address>
      <p class="city">New York</p>
      <a href="#" class="edit" id="editAddress">Edit</a>
    </div>
    <div class="tab__body">
        <address class="address">
          344 Interstate 75 Business Spur, <br>
          Sault site
        </address>
        <p class="city">New York</p>
        <a href="#" class="edit" id="editAddress">Edit</a>
      </div>
                        </div>
  
                        <div class="tab__content" content id="Update-profile">
                <h3 class="tab__header">Change Password</h3>
                <div class="tab__body">
                    <form action="" class="form grid">
                        <input type="Password" placeholder="Current Password" class="form__input">
                        <input type="Password" placeholder="New Password" class="form__input">
                        <input type="Password" placeholder="Confirm Password" class="form__input">
                        <div class="form__btn">
                            <button class="btn btn--md">Save</button>
                        </div>
                    </form>
                </div>
                        </div>
                        <div class="tab__content" content id="refund">
                            <h3 class="tab__header">Your Orders</h3>
                            <div class="tab__body">
                                <div class="profile_flex">
                                    <div class="profile_item">
                                        <form action="" class="form grid">
                                            <div class="refund_form">
                                                <label for="order_id">Order Id</label>
                                                <input type="text" placeholder="Current Password" class="form__input">
                                            </div>
                                            <div class="refund_form">
                                                <label for="order_id">Order Id</label>
                                                <input type="text" placeholder="Current Password" class="form__input">
                                            </div>
                                            <div class="form__btn">
                                                <button class="btn btn--md">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="profile_flex">
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity">
                                            <button class="decrease"><i class="fa-solid fa-circle-minus"></i></button>
                                            <input type="number" class="quantity_value" value="1">
                                            <button class="increase"><i class="fa-solid fa-circle-plus"></i><button>
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_flex">
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity">
                                            <button class="decrease"><i class="fa-solid fa-circle-minus"></i></button>
                                            <input type="number" class="quantity_value" value="1">
                                            <button class="increase"><i class="fa-solid fa-circle-plus"></i><button>
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_flex">
                                    <div class="profile_item">
                                        <img src="images/kids/kids (1).jpeg" alt="">
                                        <div class="product_title">This cloth is very good for children </div>
                                        <div class="p_price">4009Tsh</div>
                                        <div class="quantity">
                                            <button class="decrease"><i class="fa-solid fa-circle-minus"></i></button>
                                            <input type="number" class="quantity_value" value="1">
                                            <button class="increase"><i class="fa-solid fa-circle-plus"></i><button>
                                        </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- ==============================order details=========================== -->
                        <div class="container__orders" id="order_details_track">
                          <!--  -->
                      </div>
                      <!-- ===========================order track=========================== -->
                        <div class="container_order" id="order_track">
                            <h1>My Orders</h1>
                            <!-- Status Tabs -->
                            <div class="order-status">
                              <div class="status-tab active" onclick="filterOrders('unpaid')">Unpaid</div>
                              <div class="status-tab" onclick="filterOrders('tobeshipped')">To Be Shipped</div>
                              <div class="status-tab" onclick="filterOrders('shipped')">Shipped</div>
                              <div class="status-tab" onclick="filterOrders('processed')">Processed</div>
                            </div>
                            <!-- Order List -->
                            <div class="order-list" id="orderList">
                              <!-- Sample Order -->
                              <div class="order-card unpaid" id="unpaidOrders">
                                <!-- <div class="order-details">
                                    <img src="images/jersey/category.jpeg" alt="">
                                  <p class="order-title">Order #001</p>
                                  <p class="order-meta">Total: $20.00 | Placed: 12/21/2024</p>
                                </div>
                                <div class="order-actions">
                                  <button>Pay Now</button>
                                </div> -->
                              </div>
                              <div class="order-card tobeshipped" id= "processingOrders">
                                <!-- <div class="order-details">
                                    <img src="images/jersey/category.jpeg" alt="">
                                  <p class="order-title">Order #002</p>
                                  <p class="order-meta">2 Items | Placed: 12/20/2024</p>
                                </div>
                                <div class="order-actions">
                                  <button><a href="track.php?order">Track</a></button>
                                </div> -->
                              </div>
                              <div class="order-card shipped" id="shippedOrders">
                                <!-- <div class="order-details">
                                    <img src="images/jersey/category.jpeg" alt="">
                                  <p class="order-title">Order #003</p>
                                  <p class="order-meta">Delivered: 12/19/2024</p>
                                </div>
                                <div class="order-actions">
                                  <button>View Details</button>
                                </div> -->
                              </div>
                              <div class="order-card shipped"id="deliveredOrders">
                                <!-- <div class="order-details">
                                    <img src="images/jersey/category.jpeg" alt="">
                                  <p class="order-title">Order #004</p>
                                  <p class="order-meta">Completed: 12/18/2024</p>
                                </div>
                                <div class="order-actions">
                                  <button>Reorder</button>
                                </div> -->
                              </div>
                            </div>
                          </div>
                          <script>
                            function filterOrders(status) {
                              const tabs = document.querySelectorAll('.status-tab');
                              const cards = document.querySelectorAll('.order-card');
                        
                              // Update active tab
                              tabs.forEach(tab => tab.classList.remove('active'));
                              event.target.classList.add('active');
                         
                              // Filter orders
                              cards.forEach(card => {
                                if (card.classList.contains(status) || status === 'all') {
                                  card.style.display = 'flex';
                                } else {
                                  card.style.display = 'none';
                                }
                              });
                        
                              // Empty state
                              const visibleCards = document.querySelectorAll('.order-card[style*="display: flex"]');
                              if (visibleCards.length === 0) {
                                document.getElementById('orderList').innerHTML = `<div class="empty-state">No orders found</div>`;
                              }
                            }
                          </script>
        </div>
        </div>
           
           
  <!-- Modal for Edit Address -->

  

         <!-- ==========================edit address -->
             <!-- Shipping Form -->
<div class="modal" id="modal_edit_address" style="display: none;">
    <div class="form-container modal_content">
        <div class="modal_header">
            <h2>Shipping Address</h2>
            <button type="button" class="btn btn--md" id="closeModal">Close</button>
        </div>
      
      <form id="shippingForm">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" id="fullName" name="fullName" placeholder="Ingiza jina kamili" required>
        </div>
  
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="ingiza email yako" required>
        </div>
  
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" placeholder="Ingiza namba za simu" required>
        </div>
  
        <div class="form-group">
          <label for="address">Street Address</label>
          <input type="text" id="address" name="address" placeholder="maelezo ya mtaa unaokaa na namba ya nyumba" required>
        </div>
  
        <div class="form-group">
          <label for="city">Region</label>
          <input type="text" id="city" name="region" placeholder="ingiza mkoa" required>
        </div>
  
        <div class="form-group">
          <label for="state">District</label>
          <input type="text" id="state" name="district" placeholder="ingiza wilaya" required>
        </div>
  
        <div class="form-group">
          <label for="zip">ZIP/Postal Code</label>
          <input type="text" id="zip" name="zip" placeholder="Ingiza ZIP au postal code" required>
        </div>
  
        <div class="form-group">
          <label for="country">Country</label>
          <div class="count">
            <select id="country" name="country" required>
              <option value="" disabled selected>ingiza Taifa lako</option>
              <option value="USA">Tanzania</option>
              <option value="USA">United States</option>
              <option value="CAN">Canada</option>
              <option value="UK">United Kingdom</option>
              <option value="AUS">Australia</option>
              <option value="IND">India</option>
              <!-- Add more countries as needed --> 
            </select>
            <img src="images/icons/Tanzania (2).jpeg" class="country_img" alt="Country Icon">
          </div>
        </div>
  
        <button type="submit" class="submit-btn" id="submit_shipping">Submit</button>
      </form>
    </div>
  </div>
  
    </div>
    <!-- ============================reviw==================== -->
    <div id="review-modal" class="modal_review">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Write a Review</h2>
          <form id="review-form" enctype="multipart/form-data">
            <label for="rating">Rating:</label>
            <div class="rating">
              <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
              <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
              <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
              <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
              <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
            </div>
                  <label for="review-text">Review:</label>
            <textarea id="review-text" name="review-text" placeholder="Write your review here..."></textarea>
            <input type="text" class="review_input" hidden>
            <div class="flex-upload">
              <div class="upload_img">
            <label for="product-image">Upload Image:</label>
            <div class="input-div">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon"><polyline points="16 16 12 12 8 16"></polyline><line y2="21" x2="12" y1="12" x1="12"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
            <input class="input" name="file" type="file" id="product-image">
            </div>
              </div>
              <img src="images/jersey/09b47ec9-a497-427a-a26e-c1025b2d5b37.jpeg" alt="">
            </div>
            
      
            <button type="submit">Submit Review</button>
          </form>
        </div>
      </div>
</section>
<!-- ==============================new section slide ========================================== -->
<section class="new__arrivals container section">
    <h3 class="section__title"><span>Your</span>Favourite
    </h3>
 <div class="swiper mySwiper new__container">
     <div class="swiper-wrapper">
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
        <div class="product__item swiper-slide">
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
     </div>

     <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
     <div class="swiper-button-prev" ><i class="fa-solid fa-arrow-left"></i></div>
 </div>
</section>
    
 <!-- ========================================NEWSLETTER========================== -->
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
<!-- =========================================handle reviews=============================== -->
 
<!-- ==============================insert shiping infomation in the database=============================== -->
 <script>
  document.getElementById("shippingForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    const formData = new FormData(this); // Collect form data

    // Send an AJAX POST request
    fetch("handle_shipping_form.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Shipping address saved successfully!");
                document.getElementById("shippingForm").reset(); // Clear the form
                document.getElementById("modal_edit_address").style.display = "none"; // Close the modal
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
});

// Close modal functionality
document.getElementById("closeModal").addEventListener("click", function () {
    document.getElementById("modal_edit_address").style.display = "none";
});

 </script>

<!-- load user orders============================================= -->
 <script>
  let orders=[];
function loadOrders() {
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "user_orders.php", true);
    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(this.responseText);
            
            // Fix response checking
            if(response.success === true){  
              orders=response.orders;
                const orderListContainer = document.getElementById('orderList'); 

                orders.forEach(function(order) {
                    const orderItem = document.createElement("div"); // Fix: Use createElement
                    const OrderList= document.createElement("div");
                    orderItem.innerHTML = `
                         <div class="profile_flex">
                                    <div class="order_details">
                                        <div class="status">${order.order_status}</div>
                                        <div class="order_id"><span>OrderId:${order.invoice_number}</span>
                                             0879347374937493</div>
                                        <div class="order_product_details"><button class="order_button" onclick="orderDetails(${order.order_id})">Order details <i class="fa-solid fa-arrow-right"></i></button></div>
                                    </div>
                                    <div class="profile_item">
                                        <img src="../admin_area/product_images/${order.product_details.product_image}" alt="">
                                      <div class="flex-details">
                                        <div class="product_title">${order.product_details.product_description} </div>
                                        <div class="p_price">${order.amount_due}Tsh</div>
                                        <div class="quantity  order_btn" id="open-review-modal" data-order-id="${order.product_details.product_id}">
                                            <a href="#" class="action__btn"  aria-label="Add a Review"><i class="fa-regular fa-comment"></i></a>
                                           
                                        </div>
                                      </div>
                                        <div class="delete"><i class="fa-solid fa-delete-left"></i>
                                        </div>
                                    </div>
                                </div>
                    `;
                   
                
                    orderListContainer.appendChild(orderItem); // Fix: Use appendChild()
                });
                orders.forEach(function(order) {
    let orderContainer = "";
    let actionButton = "";
    let statusText = "";

    // Check if product details exist
    let productImage = order.product_details && order.product_details.product_image 
        ? `../admin_area/product_images/${order.product_details.product_image}` 
        : 'images/default_product.png'; // Default image if not available

    let productTitle = order.product_details && order.product_details.product_description 
        ? order.product_details.product_description 
        : 'No description available';

    let orderAmount = order.amount_due ? `${order.amount_due} Tsh` : 'N/A';

    // Determine where to place the order based on its status
    switch (order.shipping_status || order.order_status){
        case 'unpaid':
            orderContainer = "unpaidOrders";
            statusText = "Unpaid";
            actionButton = `<button>Pay Now</button>`;
            break;
        case 'processing':
            orderContainer = "processingOrders";
            statusText = "Processing";
            actionButton = `<button>Processing</button>`;
            break;
        case 'shipped':
            orderContainer = "shippedOrders";
            statusText = "Shipped";
            actionButton = `<button><a href="track.php?order=${order.invoice_number}">Track</a></button>`;
            break;
        case 'delivered':
            orderContainer = "deliveredOrders";
            statusText = "Delivered";
            actionButton = `<button>Reorder</button>`;
            break;
        case 'Incomplete':
            orderContainer = "deliveredOrders"; // Added handling for 'Incomplete' status
            statusText = "Incomplete";
            actionButton = `<button>View Details</button>`;
            break;
        default:
            orderContainer = "deliveredOrders";
            statusText = "Unknown";
            actionButton = `<button>View Details</button>`;
            break;
    }

    // Construct order card HTML dynamically
    const orderList = document.createElement('div');


    orderList.innerHTML = `
    
        <div class="order-details">
            <img src="${productImage}" alt="Product Image">
            <p class="order-title">Order #${order.invoice_number}</p>
            <p class="order-meta">${orderAmount} | Placed: ${order.order_date}</p>
            <p class="order-status"><strong>Status: ${statusText}</strong></p>
        </div>
        <div class="order-actions" >
            ${actionButton}
        </div>
    `;
    /* */
    // Debugging output
    console.log(orderContainer);  // Check if the correct container ID is being used
    console.log(orderList);  // Log the created orderItem to verify its structure

    // Ensure container exists before appending
    const container = document.getElementById(orderContainer);
    if (container) {
       setTimeout(container.appendChild(orderList), 1000) ;
    } else {
        console.error(`Container with ID ${orderContainer} not found.`);
    }
});



                alert('Orders Loaded Successfully');
            } else {
                alert(`Error: ${response.message}`);
            }
        } else {
            console.error("Error loading users.");
        }
    };
    xhr.send();
}
document.addEventListener("DOMContentLoaded", function() {
    loadOrders();
});
function orderDetails(orderId) {
  console.log('hello');
  orders.forEach(function (ord) {
    if (ord.order_id == orderId) {
      const detail_order = document.createElement("div");
      detail_order.innerHTML = `
        <h1>Order Details</h1>
        <!-- Order Information -->
        <div class="order-info">
            <p><strong>Order Number:</strong> ${ord.invoice_number}</p>
            <p><strong>Order Date:</strong> ${ord.order_date}</p>
        </div>

        <!-- Items Purchased -->
        <h2>Items Purchased</h2>
        <div class="items-list">
            <div class="item">
                <div>
                    <p><strong>Product:</strong> ${ord.product_details.product_title}</p>
                    <p><strong>Quantity:</strong> ${ord.total_products}</p>
                    <p><strong>Price:</strong> ${ord.amount_due / ord.total_products} Tsh</p>
                </div>
                <img src="../admin_area/product_images/${ord.product_details.product_image}" alt="Product Image">
            </div>
        </div>

        <!-- Price Breakdown -->
        <h2>Price Breakdown</h2>
        <div class="price-breakdown">
            <p><strong>Subtotal:</strong> ${ord.amount_due}</p>
            <p><strong>Shipping:</strong> ${ord.shipping_charge}</p>
            <p><strong>Discount:</strong> 0</p>
            <p class="total"><strong>Total:</strong> ${ord.amount_due + ord.shipping_charge}</p>
        </div>

        <!-- Addresses -->
        <h2>Billing & Shipping Address</h2>
        <div class="address">
            <p><strong>Shipping Address:</strong> ${ord.address_street}, ${ord.district}, ${ord.region}, USA</p>
        </div>

        <!-- Payment Method -->
        <h2>Payment Method</h2>
        <div class="payment-method">
            <p>Credit Card (last 4 digits: 1234)</p>
        </div>

        <!-- Back Button -->
        <div class="back-button">
            <a href="#" class="btn">Back to Orders</a>
        </div>`;

      // Append to the correct container
      const orderTrackDetails = document.getElementById("order_details_track");
      if (orderTrackDetails) {
        console.log(orderTrackDetails);
        orderTrackDetails.innerHTML=detail_order.innerHTML;
      } else {
        console.error("Error: Element with ID 'order_track_details' not found.");
      }
    }
  });
}


</script>
<script>

</script>

<script>
    document.getElementById('openModal').addEventListener('click', function () {
    document.getElementById('modal_edit_address').style.display = 'block';
  });
  
  document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('modal_edit_address').style.display = 'none';
  });
  
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const dashboard = document.querySelector('[data-context="Dashboard"]'); // Ensure this attribute exists
    const orderTrackSection = document.querySelector('#order_track');
    const accountTabs = document.querySelectorAll('.account__tab');

    // Hide #order_track on page load
    if (orderTrackSection) {
        orderTrackSection.style.display = 'none';
    }

    // Add click event to account tabs
    accountTabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const target = this.getAttribute('data-target');
            console.log('Tab clicked:', target);

            // Show or hide #order_track based on active tab
            if (target === '#Dashboard' && dashboard) {
                orderTrackSection.style.display = 'none'; // Hide by default on dashboard load
            } else {
                orderTrackSection.style.display = 'none'; // Ensure it's hidden for other tabs
            }
        });
    });

    // Add click event to buttons inside the dashboard
    if (dashboard) {
        const buttons = dashboard.querySelectorAll('button[data-target]');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                console.log('Button clicked with target:', targetId);

                // Show or hide #order_track based on button click
                if (targetId === '#order_track' && orderTrackSection) {
                    orderTrackSection.style.display = 'block';
                } else if (orderTrackSection) {
                    orderTrackSection.style.display = 'none';
                }
            });
        });
    }
});


</script>
<!-- ===========================order details script========================== -->

<script>
  document.addEventListener('DOMContentLoaded', () => {
      const orderButtons = document.querySelectorAll('.order_button'); // Select all order buttons
      const orderSection = document.querySelector('#order_details_track'); // The order details section
      const ordersTab = document.querySelector('#orders'); // The main orders tab
      const accountTabs = document.querySelectorAll('.account__tab'); // All account tabs

      // Hide #order_details_track on page load
      if (orderSection) {
          orderSection.style.display = 'none';
      }

    // Event delegation for dynamically loaded .order_button
    document.body.addEventListener('click', (event) => {
        if (event.target.closest('.order_button')) { // Check if a button was clicked
            event.preventDefault();
            console.log('Order details button clicked.');

            // Hide the orders tab and show order details
            if (ordersTab) ordersTab.style.display = 'none';
            if (orderSection) orderSection.style.display = 'block';
        }
    });

      // Add event listeners to account tabs
      accountTabs.forEach(tab => {
          tab.addEventListener('click', function () {
              const target = this.getAttribute('data-target'); // Get the target from data attribute
              console.log('Tab clicked:', target);

              // Toggle visibility based on active tab
              if (target === '#orders') {
                  if (ordersTab) ordersTab.style.display = 'block'; // Show orders tab
                  if (orderSection) orderSection.style.display = 'none'; // Hide order details
              } else {
                  if (ordersTab) ordersTab.style.display = 'none'; // Hide orders tab
                  if (orderSection) orderSection.style.display = 'none'; // Ensure order details is hidden
              }
          });
      });

      // Add click event for "Back to Orders" button
      // Event delegation for dynamically loaded Back button
      document.body.addEventListener('click', (event) => {
        if (event.target.matches('.back-button .btn')) { // Ensure correct element is clicked
            event.preventDefault();
            console.log('Back to orders button clicked.');

            // Show orders tab and hide order details
            if (orderSection) orderSection.style.display = 'none';
            if (ordersTab) ordersTab.style.display = 'block';
        }
    });
  });
</script>


<script>
    // Get modal and elements
const modal = document.getElementById("review-modal");
const openModalBtn = document.querySelectorAll("#open-review-modal");
const closeModalBtn = document.getElementsByClassName("close")[0];
const reviewForm = document.getElementById("review-form");

// Open the modal when the "Add a Review" button is clicked
document.addEventListener("click", (event) => {
    // Check if the clicked element is the review modal button
    const button = event.target.closest("#open-review-modal");
    if (button) {
        const orderId = button.getAttribute("data-order-id"); // Get the order ID from the clicked button

        // Open the modal
        modal.style.display = "block"; 

        // Store the order ID inside the modal for later use
        modal.setAttribute("data-order-id", orderId);
        document.querySelector('.review_input').value= orderId;
        // Log the orderId for debugging
        console.log("Order ID:", orderId);
    }
});

// Close the modal when the user clicks the "x"
closeModalBtn.addEventListener("click", () => {
    const modal = document.getElementById("review-modal");
    modal.style.display = "none";
});

// Close the modal if the user clicks anywhere outside the modal
window.addEventListener("click", (event) => {
    const modal = document.getElementById("review-modal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
});


// Handle the form submission (this can be changed to AJAX or direct submission)
reviewForm.addEventListener("submit", (event) => {
  event.preventDefault();

  // Get review data
  const rating = document.querySelector('input[name="rating"]:checked');
const reviewText = document.getElementById("review-text").value;
const productImage = document.getElementById("product-image");
const orderId = document.querySelector('.review_input').value; // Get the value of order ID input element

if (!rating || !reviewText) {
    alert("Please provide a rating and review text.");
    return;
}

const formData = new FormData();
formData.append("rating", rating.value);
formData.append("review-text", reviewText);
formData.append("product_id", orderId); // Use the value here, not the element

if (productImage && productImage.files.length > 0) {
    formData.append("product-image", productImage.files[0]);
}

// Print the FormData content (for debugging purposes)
for (const [key, value] of formData.entries()) {
    console.log(key + ": " + value);
    if (value instanceof File) {
                console.log(`File Name: ${value.name}`);
                console.log(`File Size: ${value.size}`);
                console.log(`File Type: ${value.type}`);
            }
}

  // You can now send this form data to your server (e.g., using fetch or AJAX)
  // Here's an example of how to use fetch:
  fetch("submit_review.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        alert("Your review has been submitted!");
        modal.style.display = "none"; // Close the modal after submission
      } else {
        alert("There was an issue submitting your review. Please try again.");
      }
    })
    .catch((error) => {
      console.error("Error submitting review:", error);
    });
});

//or
</script>
<!-- ==================================modal-review============================== -->
<script>
    // Select all the star labels and inputs
const stars = document.querySelectorAll('.rating label');
const inputs = document.querySelectorAll('.rating input');

// Add event listeners to the input radio buttons
inputs.forEach((input, index) => {
  input.addEventListener('click', () => {
    // Remove the 'selected' class from all stars
    stars.forEach(star => star.classList.remove('selected'));

    // Add the 'selected' class to all stars up to the clicked one
    for (let i = 0; i <= index; i++) {
      stars[i].classList.add('selected');
    }
  });
});

// Select the image element
const img = document.querySelector('.flex-upload img');

// Check if the 'src' attribute is empty or the image doesn't exist
if (!img.src || img.src === '') {
    img.style.display = 'none';
}

</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("hamburger").addEventListener("click", function () {
        document.querySelector(".account__tabs").classList.toggle("active");
    });
});

</script>
<script>
  let lastScrollTop = 0;
const hamburger = document.querySelector(".hamburgeraccount");

window.addEventListener("scroll", function () {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;
    let scrollHeight = document.documentElement.scrollHeight;
    let clientHeight = document.documentElement.clientHeight;

    if (scrollTop > lastScrollTop) {
        // Scrolling down
        hamburger.classList.add("hidden");
    } else {
        // Scrolling up
        hamburger.classList.remove("hidden");
    }

    // Show again when reaching the bottom
    if (scrollTop + clientHeight >= scrollHeight) {
        hamburger.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
});

</script>
<script>
  let lastScrollTopContent = window.scrollY;

window.addEventListener("scroll", function () {
    let currentScroll = window.scrollY;
    let content = document.querySelector(".tabs__content");

    if (currentScroll < lastScrollTopContent) {
        // Scrolling Up -> Allow scrolling
        content.style.overflowY = "auto";
    } else {
        // Scrolling Down -> Hide scrolling
        content.style.overflowY = "hidden";
    }

    lastScrollTopContent = currentScroll;
});

</script>
  <!-- =================================SWIPER JS=========================== -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- ==================================MAIN JS=========================================== -->
  <script src="assets/js/index.js"></script>
</body>
</html>