<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link rel="stylesheet" href="../index_pages/assets/css/style.css">
    <link rel="stylesheet" href="../index_pages/assets/js/index.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<!-- react rendering link -->
<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .dark-mode {
            background-color: #2c2c2c;
            color: #fff;
        }
        header {
            background-color: var(--first-color-alt);
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .container {
            margin: 2rem auto;
            max-width: 800px;
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .breadcrumb {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        .breadcrumb a {
            text-decoration: none;
            color: var(--first-color);
        }
        .order-summary {
            border-bottom: 1px solid #ddd;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
        }
        .order-summary h3 {
            margin: 0;
            font-size: 1.2rem;
        }
        .order-summary a{
            text-decoration:none;
            color:var(--first-color);
        }
        .courier-Details {
            border-bottom: 1px solid #ddd;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
        }
        .courier-Details h3 {
            margin: 0;
            font-size: 1.2rem;
        }
        .courier-Details a{
            text-decoration:none;
            color:var(--first-color);
        }
        .timeline {
            margin: 1.5rem 0;
            padding: 0;
            list-style-type: none;
        }
        .timeline li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        .timeline li span {
            width: 20px;
            height: 20px;
            background: var(--first-color);
            border-radius: 50%;
            margin-right: 10px;
        }
       
        .tracking-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .tracking-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-top: 20px;
            padding: 0;
            list-style: none;
        }

        .tracking-bar::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            right: 10%;
            height: 4px;
            background: #ddd;
            z-index: 0;
            transform: translateY(-50%);
        }

        .tracking-bar li {
            position: relative;
            z-index: 1;
            text-align: center;
            flex: 1;
        }

        .tracking-bar li .circle {
            width: 20px;
            height: 20px;
            margin: 0 auto;
            border-radius: 50%;
            background: #ddd;
            position: relative;
            transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .tracking-bar li.active .circle {
            background: var(--first-color);
            transform: scale(1.2);
        }

        .tracking-bar li .label {
            margin-top: 8px;
            font-size: 12px;
            color: #666;
        }

        .tracking-bar li.active .label {
            color: var(--first-color);
            font-weight: bold;
        }

        .tracking-bar li.completed .circle {
            background: var(--first-color);
        }

        .tracking-bar li.completed::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: calc(50% - 10px);
            height: 4px;
            background: var(--first-color);
            transform: translateY(-50%);
            z-index: -1;
        }

        .tracking-bar li:first-child::after {
            display: none;
        }
        .product-details h3{
           text-align:center;
           padding-top:20px;
           padding-bottom:20px;
           font-size:25px;
        }

    </style>
</head>
<body>

<header>
    <h1>Track Your Order</h1>
</header>

<div class="container">
    <nav class="breadcrumb">
        <a href="#">Home</a> &gt; <a href="#">My Orders</a> &gt; Track Your Order
    </nav>

    <div class="order-summary">
        <h3>Order #12345</h3>
        <p>Order Date: December 15, 2024</p>
        <p>Total Amount: $150.00</p>
        <p>Delivery Address: 123 Main Street, Cityville</p>
        <p>Contact: +123 456 7890</p>
        <a href="https://wa.me/12345678901?text=Hello%20I%20have%20a%20question%20about%20your%20product" target="_blank">Chat with us on WhatsApp</a>
    </div>
    <div class="courier-Details">
        <h3>Courier: DHL</h3>
        <p>Tracking Number: 1234567890</p>
        <p>Status: In Transit</p>
        <p>Estimated Delivery: 2024-12-30 </p>
        <p>Contact: +123 456 7890</p>
        <p>Address: 123 Main Street, Cityville</p>
        <a href="https://wa.me/12345678901?text=Hello%20I%20have%20a%20question%20about%20your%20product" target="_blank">Chat with us on WhatsApp</a>
    </div>

    <div class="tracking-container">
        <h2>Track Your Product</h2>
        <ul class="tracking-bar" id="tracking-bar">
            <li id="step-0" class="completed">
                <div class="circle"></div>
                <div class="label">Order Placed</div>
            </li>
            <li id="step-1" class="completed">
                <div class="circle"></div>
                <div class="label">Shipped</div>
            </li>
            <li id="step-2" class="active">
                <div class="circle"></div>
                <div class="label">In Transit</div>
            </li>
            <li id="step-3">
                <div class="circle"></div>
                <div class="label">Out for Delivery</div>
            </li>
            <li id="step-4">
                <div class="circle"></div>
                <div class="label">Delivered</div>
            </li>
        </ul>
    </div>

    <div class="product-details">
        <h3>Products in Your Order</h3>
        <div class="cart_item">
            <img src="images/kids/kids (1).jpeg" alt="">
            <div class="product_title">This cloth is very good for children </div>
            <div class="p_price">4009Tsh</div>
            <div class="quantity">
                <p>3</p>
             </div>
        </div>
            <div class="cart_item">
                <img src="images/kids/kids (1).jpeg" alt="">
                <div class="product_title">This cloth is very good for children </div>
                <div class="p_price">4009Tsh</div>
                <div class="quantity">
                   <h4>3</h4>
                </div>
            </div>
    </div>

    <!-- <div class="chat-section">
        <h3>Need Help? Chat with Us</h3>
        <iframe src="https://example.com/live-chat"></iframe>
    </div>

    <div class="map-section">
        <h3>Delivery Agent Location</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15847.676437887108!2d39.206912!3d-6.7796992000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2stz!4v1735044477658!5m2!1sen!2stz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="notes-section">
        <h3>Leave a Note for Delivery</h3>
        <textarea rows="4" style="width: 100%; border-radius: 4px; border: 1px solid #ddd; padding: 10px;"></textarea>
        <button style="margin-top: 10px; padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px;">Submit Note</button>
    </div>

</div>

<button class="toggle-dark-mode" onclick="toggleDarkMode()">Toggle Dark Mode</button> -->

<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
    }
</script>
<script>
    // Simulate dynamic status update
    const steps = document.querySelectorAll('.tracking-bar li');
    let currentStep = 2; // "In Transit"

    function updateTracking(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.remove('completed', 'active');
            if (index < stepIndex) {
                step.classList.add('completed');
            } else if (index === stepIndex) {
                step.classList.add('active');
            }
        });
    }   

    // Example: Update the status dynamically
    setInterval(() => {
        if (currentStep < steps.length) {
            updateTracking(currentStep);
            currentStep++;
        }
    }, 3000); // Simulates status updates every 3 seconds
</script>
<script>
    // Function to get a specific cookie's value
    function getCookie(name) {
    let nameEQ = name + "=";  
    let ca = document.cookie.split(';');  
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim(); // Trim spaces
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);  
    }
    return null;  
}

let interval = setInterval(() => {
    if (getCookie("your_cookie_name")) {  // Replace with your actual cookie name
        clearInterval(interval);  // Stop the interval if cookie is found
        console.log("Cookie found, interval stopped.");

        function fetchOrderStatus() {
    fetch(`get_order_status.php?order_id=${order_id}`)
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                let stepIndex = convertStatusToStep(data.status);
                updateTracking(stepIndex);
                if (stepIndex < steps.length - 1) {
                    updateOrderStatus(stepIndex + 1); // Move to next step
                }
            }
        })
        .catch(error => console.error('Error fetching status:', error));
}


    } else {
        console.log("Cookie not found, checking again...");
    }
}, 1000);
// Function to convert status text to step index
function convertStatusToStep(status) {
    const statusMap = {
        "Pending": 0,
        "Processing": 1,
        "Shipped": 2,
        "Delivered": 3
    };
    return statusMap[status] || 0;
}
/* // Example usage
let order_id = 123; // The specific order ID you want to check for
let cookie_name = "delivery_status_" + order_id; // Cookie name based on order ID
let deliveryStatus = getCookie(cookie_name);  // Get the delivery status cookie

if (deliveryStatus) {
    console.log("Delivery Status for Order " + order_id + ": " + deliveryStatus);
    // You can use this value to update the UI or perform any necessary actions
} else {
    console.log("No delivery status found for Order " + order_id);
}
 */
</script>

</body>
</html>
