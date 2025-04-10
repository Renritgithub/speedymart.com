<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ====================================flation=================== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ================================swiper=================== -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />    
     
    <!-- ==================css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
    
</head>
<body>
 <!--======================HEADER=================  -->
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
            <li class="nav__item"><a href="index.html" class="nav__link active-link">Home</a></li>
            <li class="nav__item"><a href="shop.html" class="nav__link">Shop</a></li>
            <li class="nav__item"><a href="accounts.html" class="nav__link">My account</a></li>
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

   <!-- =======================MAIN======================== -->
<!-- =========================BREADCRUMB====================== -->

<section class="breadcrumb">
<ul class="breadcrumb__list container flex">
    <li><a href="index.html" class="breadcrumb__link">Home</a></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">Shop</span></li>  
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">shop</span></li>  
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">Checkout</span></li>  
</ul>
</section>

<!-- ====================================CHECKOUT========================== -->

<section class="checkout section--lg">
    <div class="checkout__container container grid">
        <div class="checkout__group">
            <h3 class="section__title">Billing Details</h3>
            <form action="" class="form grid">
                <input type="text" placeholder="Name" class="form__input">
                <input type="text" placeholder="Address" class="form__input">
                <input type="text" placeholder="City" class="form__input">
                <input type="text" placeholder="Country" class="form__input">
                <input type="text" placeholder="Postcode" class="form__input">
                <input type="text" placeholder="Phone" class="form__input">
                <input type="text" placeholder="Email" class="form__input">
                <h3 class="checkout__title">Additional Information</h3>

                <textarea name="" id="" class="form__input textarea" placeholder="Order note" cols="30" rows="10"></textarea>
            </form>
        </div>
        <div class="checkout__group">
            <h3 class="section__title">Cart Totals</h3>
            <table class="order__table">
                <tr>
                    <th col-spa="2">Products</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td><img src="images/electronics/category.jpeg" alt="" class="order__img"></td>
                    <td><h3 class="table__title">Laptop hp</h3>
                    <p class="table__quantity">x 2</p></td>2000Tsh
                    <td><span class="table__price"></span></td>
                </tr>

                <tr>
                    <td><img src="images/electronics/category.jpeg" alt="" class="order__img"></td>
                    <td><h3 class="table__title">very cool</h3>
                    <p class="table__quantity">x 2</p></td>200Tsh
                    <td><span class="table__price"></span></td>
                </tr>
                <tr>
                    <td><img src="images/electronics/category.jpeg" alt="" class="order__img"></td>
                    <td><h3 class="table__title">laptop apple</h3>
                    <p class="table__quantity">x 2</p></td>2000Tsh
                    <td><span class="table__price"></span></td>
                </tr>
                <tr><td><span class="order__subtitle">Subtotal</span></td>
                    <td><span class="table__price">400Tsh</span></td>
                </tr>
                <tr>
                    <td><span class="order__subtitle">Shipping</span></td>
                    <td><span class="table__price">4000Tsh</span></td>
                </tr>

                <tr>
                    <td><span class="order__subtitle">Total</span></td>
                    <td><span class="table__price">4000Tsh</span></td>
                </tr>
                
            </table>
            <div class="payment__methods">
                <h3 class="checkout__title payment__title">Payment</h3>
                <div class="payment__option flex">
                    <input type="radio" name="radio" class="payment__input">
                    <label for="" class="payment__label">Direct Bank Transfer</label>
                </div>
                <div class="payment__option flex">
                    <input type="radio" name="radio" class="payment__input">
                    <label for="" class="payment__label">Check payment</label>
                </div>
                <div class="payment__option flex">
                    <input type="radio" name="radio" class="payment__input">
                    <label for="" class="payment__label">Paypal</label>
                </div>
                <button class="btn btn--md">Place Order</button>
            </div>
        </div>
    </div>
</section>
     
    <!-- =================================NEWSLETTER================================== -->
    <section class="newsletter section">
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


       
  <!-- =================================FOOTER======================== -->

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
<!-- =================================SWIPER JS=========================== -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- ==================================MAIN JS=========================================== -->
<script src="assets/js/index.js"></script>  
</body>
</html>