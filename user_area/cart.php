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
    <link rel="stylesheet" href="../index_pages/assets/css/style.css?v=1.4">
     <title>Ecommerce website</title>

    <title>Document</title>
    <style>
        
    </style>
</head>
<body>

    <!-- =====================================HEADER======================= -->
    <header class="header">
        <div class="header__top">
            <div class="container header__container">
                <a href="login-register.html" class="header__top-action">
                    <i class="fa-solid fa-globe"></i> <span>Language</span>
                </a>
                <a href="user_login.html" class="header__top-action">
                    <i class="fa-solid fa-user-tie"></i> <span>Login | Signup</span>
                </a>
                <div class="dropdown_app">
                    <a class="header__top-action" href="#" id="countryToggle google_translate_element">
                      <i class="fa-solid fa-globe"></i>
                      <span> Language: </span> 
                      <button class="btn-lang" id="selectedLanguage">En</button>
                    </a>
                    <div class="dropdown-menu_country" id="countryMenu">
                      <div class="dropdown-item_country" data-lang="sw">Swahili</div>
                      <div class="dropdown-item_country" data-lang="en">English</div>
                      <div class="dropdown-item_country" data-lang="fr">French</div>
                      <div class="dropdown-item_country" data-lang="es">Spanish</div>
                    </div>
                  </div> 
    
                <div class="dropdown_app">
                    <a class="header__top-action country" href="#" id="countryToggle"><img src="images/icons/Congo (1).jpeg" alt="Congo Flag"> Tanzania ▼</a>
                    <div class="dropdown-menu_country">
                      <div class="dropdown-item_country">
                        <img src="images/icons/Kenya (1).jpeg" alt="Kenya Flag">
                        <a href="#">Kenya</a>
                      </div>
                      <div class="dropdown-item_country">
                        <img src="images/icons/Uganda.jpeg" alt="Uganda Flag">
                        <a href="#">Uganda</a>
                      </div>
                      <div class="dropdown-item_country">
                        <img src="images/icons/Congo (1).jpeg" alt="Congo Flag">
                        <a href="#">Congo</a>
                      </div>
                      <div class="dropdown-item_country">
                        <img src="images/icons/Burundi.jpeg" alt="Burundi Flag">
                        <a href="#">Burundi</a>
                      </div>
                      <div class="dropdown-item_country">
                        <img src="images/icons/Rwanda (1).jpeg" alt="Rwanda Flag">
                        <a href="#">Rwanda</a>
                      </div>
                    </div>
                  </div>
    
                
                <p class="header__alert-news">
                    Super value Deals -Save more with coupons
                </p>
                <div class="dropdown_app">
                    <a class="header__top-action app" href="#" id="countryToggle"><i class="fa-solid fa-tablet-screen-button"></i>  Get our app</a>
                    <div class="dropdown-menu_country">
                      <div class="dropdown-item_country">
                        <img src="images/icons/PlayStore.jpeg" alt="Kenya Flag">
                        <a href="#">Playstore</a>
                      </div>
                      <div class="dropdown-item_country">
                        <img src="images/icons/appStore.jpeg" alt="Uganda Flag">
                        <a href="#">AppStore</a>
                      
                    </div>
                  </div>
    
                      
                    </ul>
                  </div>
                  <a href="login-register.html" class="header__top-action">
                    <button class="btn_user">R</button>  <span>My Account</span>
                </a>
    
            </div>
        </div>
        
    </header>
      

    <!-- ===================================MAIN========================= -->
     <!-- =========================BREADCRUMB====================== -->

     <section class="breadcrumb">
        <ul class="breadcrumb__list container flex">
            <li><a href="index.html" class="breadcrumb__link">Home</a></li>
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Shop</span></li>  
            <li><span class="breadcrumb__link">></span></li>
            <li><span class="breadcrumb__link">Cart</span></li>  
        </ul>
     </section>

     <!-- =====================================CART========================== -->
      <section class="cart section--lg container">
       <!--  <div class="table__container">
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>
                <tr>
                    <td>
                        <img src="images/electronics/category (2).jpeg" alt="" class="table__img">
                    </td>
                    <td>
                        <h3 class="table__title">
                            J.crew very beautiful pc
                        </h3>
                        <p class="table__description">
                            Maboriosam in a tonto nescing eget disting
                        </p>
                    </td>
                    <td>
                    <span class="table__price">1000Tsh</span>
                    </td>
                    <td>
                    <input type="number" value="3" class="quantity">
                    </td>
                    <td>
                    <span class="table__subtotal">400Tsh</span>
                    </td>
                    <td class="table__trash">
                    <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="images/electronics/category (2).jpeg" alt="" class="table__img">
                    </td>
                    <td>
                        <h3 class="table__title">
                            J.crew very beautiful pc
                        </h3>
                        <p class="table__description">
                            Maboriosam in a tonto nescing eget disting
                        </p>
                    </td>
                    <td>
                    <span class="table__price">1000Tsh</span>
                    </td>
                    <td>
                    <input type="number" value="3" class="quantity">
                    </td>
                    <td>
                    <span class="table__subtotal">400Tsh</span>
                    </td>
                    <td class="table__trash">
                    <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="images/electronics/category (2).jpeg" alt="" class="table__img">
                    </td>
                    <td>
                        <h3 class="table__title">
                            J.crew very beautiful pc
                        </h3>
                        <p class="table__description">
                            Maboriosam in a tonto nescing eget disting
                        </p>
                    </td>
                    <td>
                    <span class="table__price">1000Tsh</span>
                    </td>
                    <td>
                    <input type="number" value="3" class="quantity">
                    </td>
                    <td>
                    <span class="table__subtotal">400Tsh</span>
                    </td>
                    <td class="table__trash">
                    <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="images/electronics/category (2).jpeg" alt="" class="table__img">
                    </td>
                    <td>
                        <h3 class="table__title">
                            J.crew very beautiful pc
                        </h3>
                        <p class="table__description">
                            Maboriosam in a tonto nescing eget disting
                        </p>
                    </td>
                    <td>
                    <span class="table__price">1000Tsh</span>
                    </td>
                    <td>
                    <input type="number" value="3" class="quantity">
                    </td>
                    <td>
                    <span class="table__subtotal">400Tsh</span>
                    </td>
                    <td class="table__trash">
                    <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>
                
            
            </table>
        </div> -->
         <div class="container_cart">
            <div class="cart_details">
                <div id="cart_details">

                </div>
             
                <div class="cart__actions">
                    <a href="#" class="btn flex btn--md">
                        <i class="fa-solid fa-shuffle"></i>Update Cart
                    </a>
                    <a href="#" class="btn flex btn--md">
                        <i class="fa-solid fa-cart-shopping"></i>Continue Shopping
                    </a>
                </div> 
        
                <div class="divider">
                    <i class="fa-solid fa-fingerprint"></i>
                </div>
                <div class="cart__group grid">
                    <div>
                       <!--  <div class="cart__shipping">
                            <h3 class="section__title">Calculate Shipping</h3>
                            <form action="" class="form grid">
                              <input type="text" class="form__input" placeholder="state/ country"/>
                              <div class="form__group grid">
                                <input type="text" class="form__input" placeholder="city"/>
                                <input type="text" class="form__input" placeholder="PostCode/ ZIP"/>
                              </div>
                              <div class="form__btn">
                                <button class="btn flex btn--sm"> <i class="fa-solid fa-shuffle"></i>Update</button>
                              </div>
                            </form>
                        </div> -->
                        <div class="cart__coupon">
                            <h3 class="section__title">Apply Coupon</h3>
                            <form action="" class="coupon__form form grid">
                                <div class="form__group grid">
                                    <input type="text" class="form__input" placeholder="Enter your Coupon">
                                    <div class="form__btn">
                                        <button class="btn flex btn--sm"> <i class="fa-solid fa-tag"></i></i>apply</button>
                                      </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                   
            </div>
            
            <div class="cart__total">
                <h3 class="section__title">Cart Total</h3>
                <table class="cart__total-table">
                    <tr>
                        <td><span class="cart__total-title" >Cart Subtotal</span></td>
                        <td><span class="cart__total-price" id="subtotal">300Tsh</span></td>
                    </tr>
                    <tr>
                        <td><span class="cart__total-title">Shipping</span></td>
                        <td><span class="cart__total-price" id="shipping_cost">300Tsh</span></td>
                    </tr>
                    <tr>
                        <td><span class="cart__total-title">Total</span></td>
                        <td><span class="cart__total-price" id="total">300Tsh</span></td>
                    </tr>
                </table>
                <a href="checkout.html" class="btn flex btn--md">
                    <i class="fa-solid fa-box"></i> Checkout
                </a>
            </div>
         </div>
      </section>

     <!-- =================================NEWSLETTER================================== -->
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
 <!-- react rendering link -->
<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Swiper CSS -->
<script type="text/babel">
    const { useState, useEffect } = React;

    function Cart() {
        const [cartItems, setCartItems] = useState([]); // Initialize as an empty array
        const [totalPrice, setTotalPrice] = useState(0);
        const [shippingCost, setShippingCost] = useState(5.00); // Flat shipping cost

        const userId = localStorage.getItem("userToken");

        useEffect(() => {
    async function fetchCart() {
        try {
            const userId = localStorage.getItem("userToken");
            console.log("User ID from localStorage:", userId); // Verify userId

            const response = await axios.get('get_cart.php', {
                params: { userId }  // Make sure userId is passed properly
            });
          
            console.log("Fetched cart data from backend:", response.data);  // Log the full response

            // Check if cart items are present
            if (response.data.cart && Array.isArray(response.data.cart) && response.data.cart.length > 0) {
                console.log("Cart items found:", response.data.cart);
                setCartItems(response.data.cart);  // Set state with the fetched cart data
        
            } else {
                console.log("No items in cart");
                setCartItems([]);  // Set empty array if no items are found
            }
        } catch (error) {
            console.error("Error fetching cart data:", error);
        }
    }

    fetchCart();  // Call the fetch function when the component mounts
}, [cartItems]);  // Empty dependency array means it will run once on mount

    // Calculate total price including shipping
    const calculateTotal = (items) => {
    console.log("Items received for total calculation:", items);

    if (!items || items.length === 0) {
        console.log("No items to calculate.");
        setTotalPrice(shippingCost); // Default to shipping cost if cart is empty
        return;
    }

    const itemTotal = items.reduce((acc, item) => acc + parseFloat(item.price), 0);
    console.log("Calculated itemTotal:", itemTotal);

    setTotalPrice(itemTotal + shippingCost);
};

React.useEffect(() => {
    calculateTotal(cartItems); // Recalculate total when cartItems changes
}, [cartItems]);
// Update subtotal and total in the DOM whenever totalPrice changes
React.useEffect(() => {
    calculateTotal(cartItems);
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');

    if (subtotalElement && totalElement) {
        subtotalElement.textContent = `${totalPrice - shippingCost} Tsh`;
        totalElement.textContent = ` ${totalPrice} Tsh`;
    }
}, [totalPrice]);

        // Handle quantity change in cart
        const handleQuantityChange = async (itemId, newQuantity) => {
    // Step 1: Optimistically update the UI
    const prevCartItems = [...cartItems]; // Save current state for rollback
    const updatedItems = cartItems.map(item =>
        item.cart_id === itemId ? { ...item, quantity: newQuantity } : item
    );
    setCartItems(updatedItems); // Update state immediately for real-time UI

    try {
        // Step 2: Send the update to the backend
        const response = await axios.post('update_cart.php', { 
            itemId, 
            quantity: newQuantity, 
            userId 
        });

        if (response.data.success) {
            // Step 3: Recalculate totals if backend update is successful
            calculateTotal(updatedItems);
        } else {
            console.error("Backend error:", response.data.error || "Unknown error");
            setCartItems(prevCartItems); // Roll back UI if backend fails
        }
    } catch (error) {
        console.error("Error updating quantity:", error.message);
        setCartItems(prevCartItems); // Roll back UI on network or server error
    }
};

        // Handle item deletion from cart
        const handleDeleteItem = async (itemId) => {
            try {
                const response = await axios.post('delete_item.php', { itemId,userId });
                if (response.data.success) {
                    const updatedItems = cartItems.filter(item => item.id !== itemId);
                    setCartItems(updatedItems);
                    calculateTotal(updatedItems);
                    
                }
            } catch (error) {
                console.error("Error deleting item:", error);
            }
        };

        // Handle clearing the cart
        const handleClearCart = async () => {
            try {
                const response = await axios.post('/path-to-your-backend/clear_cart.php');
                if (response.data.success) {
                    setCartItems([]);
                    setTotalPrice(shippingCost); // Reset to shipping cost only
                }
            } catch (error) {
                console.error("Error clearing cart:", error);
            }
        };

        // Update shipping cost in DOM
        useEffect(() => {
            const shippingValue = document.getElementById('shipping_cost');
            if (shippingValue) {
                shippingValue.textContent = shippingCost;
            }
        }, []);

        return (
            <div>
            {cartItems && cartItems.length > 0 ? (cartItems.map(item => (
                <div className="cart_item" key={item.cart_id}>
                    <img src={`../admin_area/product_images/${item.productImage}`} alt={item.product_description} />
                    <div className="product_title">{item.product_description}</div>
                    <div className="p_price">{item.price} Tsh</div>
                    <div className="quantity">
                        <button className="decrease" onClick={() => handleQuantityChange(item.cart_id, item.quantity - 1)}>
                            <i className="fa-solid fa-circle-minus"></i>
                        </button>
                        <input
                            type="number"
                            value={item.quantity}
                            onChange={(e) => handleQuantityChange(item.cart_id, parseInt(e.target.value))}
                            min="1"
                            className="quantity_value"
                        />
                        <button className="increase" onClick={() => handleQuantityChange(item.cart_id, item.quantity + 1)}>
                            <i className="fa-solid fa-circle-plus"></i>
                        </button>
                    </div>
                    <div className="delete" onClick={() => handleDeleteItem(item.cart_id)}>
                        <i className="fa-solid fa-delete-left"></i>
                    </div>
                </div>
            ))): ( <p>No items in cart</p>)}
        </div>
            )
    }

    ReactDOM.render(<Cart />, document.getElementById('cart_details'));
</script>

</body>
</html>