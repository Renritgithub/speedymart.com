
   const ProductList = () => {
    const [products, setProducts] = React.useState([]);
    const [loading, setLoading] = React.useState(true);
    const [cartCount, setCartCount] = React.useState(0); // State for cart item count
    const [wishCount, setwishCount] = React.useState(0); // State for wish item count

    React. useEffect(() => {
    if (filteredProducts) {
      setProducts(filteredProducts);
      setLoading(false);
    } else {
      const fetchProducts = async () => {
        try {
          const response = await fetch('react_load_product.php');
          const data = await response.json();
          setProducts(data.products);
          setLoading(false);
        } catch (error) {
          console.error('Error fetching products:', error);
        }
      };
      fetchProducts();
    }
  }, [filteredProducts]);
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
                <a href="details.html" className="product__images">
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
