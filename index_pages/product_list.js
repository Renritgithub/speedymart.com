
    import React, { useState, useEffect } from 'react';

const ProductList = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const response = await fetch("react_load_product.php");
        const data = await response.json();
        setProducts(data.products);
        setLoading(false);
        console.log("react is loading product");
      } catch (error) {
        console.error("Error fetching products:", error);
        setLoading(false);
      }
    };

    fetchProducts();
  }, []);

  if (loading) {
    return <div className="loader">Loading...</div>;
  }

  return (
    <div className="product-list">
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
              <button className="action__btn" aria-label="Add To Wishlist">
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
              {product.old_price && <span className="old__price">{product.old_price} Tsh</span>}
            </div>
            <button className="action__btn cart__btn" aria-label="Add To Cart">
              <i className="fa-solid fa-cart-shopping"></i>
            </button>
          </div>
        </div>
      ))}
    </div>
  );
};

ReactDOM.render(<ProductList />, document.getElementById('product_list'));

