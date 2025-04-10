<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page with Tracking</title>\ <link rel="stylesheet" href="assets/css/style.css">
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
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            margin: 0 0 1rem;
        }
        input,.checkout-button {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .checkout-button {
            background-color:var(--first-color);
            color: white;
            border: 1px solid;
            cursor: pointer;
            transition: 0.3s ease color;
        }
        button:hover {
            border-color: var(--first-color);
            background-color: transparent;
        }
        .tracking-bar {
            display: flex;
            justify-content: space-between;
            margin: 0 0 2rem;
            padding: 0;
            list-style: none;
            counter-reset: step;
        }
        .tracking-bar li {
            position: relative;
            flex: 1;
            text-align: center;
            font-size: 0.9rem;
            color: #999;
        }
        .tracking-bar li::before {
            content: counter(step);
            counter-increment: step;
            display: block;
            width: 30px;
            height: 30px;
            margin: 0 auto 10px;
            background: #ddd;
            color: white;
            border-radius: 50%;
            line-height: 30px;
        }
        .tracking-bar li.active {
            color: var(--first-color);
        }
        .tracking-bar li.active::before {
            background: var(--first-color);
        }
        .tracking-bar li::after {
            content: '';
            position: absolute;
            top: 15px;
            right: -50%;
            height: 2px;
            width: 100%;
            background: #ddd;
            z-index: -1;
        }
        .tracking-bar li:last-child::after {
            display: none;
        }
        .tracking-bar li.active + li::after {
            background: var(--first-color);;
        }
        .hidden {
            display: none;
        }
        .radio_item{
            display: flex;
            flex-direction: row;
            align-items: center;
            
        }
        .radio_item label{
            background-color:var(--first-color);
            width:200px
        }
    </style>
</head>
<body>

<div class="container">
    <ul class="tracking-bar">
        <li id="step-checkout" class="active">Checkout</li>
        <li id="step-payment">Payment</li>
        <li id="step-confirmation">Confirmation</li>
    </ul>

    <div id="checkout-step">
        <h1>Checkout</h1>
        <form id="checkout-form">
            <h2>Shipping Information</h2>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
            
            <label for="contact">Contact Number</label>
            <input type="text" id="contact" name="contact" required>
            
            <h2>Payment Method</h2>
            <label for="payment-method">Choose Payment Method</label>
            <div class="radio">
                <div class="radio_item">
                    <label for="credit Card">credit Card</label>
                    <input type="radio" name="payment-method" value="credit-card" required>
                </div>
                <div class="radio_item">
                    <label for="paypal">paypal</label>
                    <input type="radio" name="payment-method" value="Paypal" required>
                </div>
                <div class="radio_item">
                    <label for="Mobile Money">Mobile Money</label>
                    <input type="radio" name="payment-method" value="M-money" required>
                </div>
                
            </div>
                
            
            <button type="button" class="checkout-button" id="proceed-payment">Proceed to Payment</button>
        </form>
    </div>
    <!-- Mobile Money Options -->
    <div id="mobile-money-options" class="hidden">
        <h1>Mobile Money Options</h1>
        <p>Please choose your mobile money provider:</p>
        <div class="radio_item">
            <label for="mpesa">M-pesa</label>
            <input type="radio" name="Mobile-method" value="mpesa" required>
        </div>
        <div class="radio_item">
            <label for="airtel-money">Airtel Money</label>
            <input type="radio" name="Mobile-method" value="Paypal" required>
        </div>
        <div class="radio_item">
            <label for="YasMix">YasMix</label>
            <input type="radio" name="Mobile-method" value="yasmix" required>
        </div>
        <div class="radio_item">
            <label for="HaloPesa">HaloPesa</label>
            <input type="radio" name="Mobile-method" value="halopesa" required>
        </div>
        <button type="button" class="checkout-button" id="confirm-mobile-payment">Confirm Mobile Payment</button>
        <button class="back checkout-button"><i class="fa-solid fa-arrow-left"></i></button>
    </div>

    <div id="payment-step" class="hidden">
        <h1>Payment</h1>
        <form id="payment-form">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" name="card-number" required>
            
            <label for="expiry-date">Expiry Date</label>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
            
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" required>
            
            <button type="button" class=" checkout-button" id="confirm-payment">Confirm Payment</button>
            <button class="back checkout-button"><i class="fa-solid fa-arrow-left"></i></button>
        </form>

    </div>

    <div id="confirmation-step" class="hidden">
        <h1>Confirmation</h1>
        <p id="confirmation-message"></p>
        <button type="button" class=" checkout-button" id="close-confirmation">Finish</button>
        <button class="back checkout-button"><i class="fa-solid fa-arrow-left"></i></button>
    </div>
    
</div>

<script>
    const proceedPaymentButton = document.getElementById('proceed-payment');
    const confirmPaymentButton = document.getElementById('confirm-payment');
    const confirmPaymentMobileButton = document.getElementById('confirm-mobile-payment');
    const closeConfirmationButton = document.getElementById('close-confirmation');
    const trackingSteps = document.querySelectorAll('.tracking-bar li');
    
    const checkoutStep = document.getElementById('checkout-step');
    const paymentStep = document.getElementById('payment-step');
    const confirmationStep = document.getElementById('confirmation-step');
    const confirmationMessage = document.getElementById('confirmation-message');
    const MobileStep= document.getElementById('mobile-money-options');

    // Update active step
    function updateTracking(activeIndex) {
        trackingSteps.forEach((step, index) => {
            step.classList.toggle('active', index === activeIndex);
        });
    }
    document.querySelectorAll('.back').forEach(button => {
        button.addEventListener('click', () => {
            const currentStep = document.querySelector('.container > div:not(.hidden)').id;
            if (currentStep === 'payment-step'||currentStep=='mobile-money-options') {
                checkoutStep.classList.remove('hidden');
                paymentStep.classList.add('hidden');
                MobileStep.classList.add('hidden');
                updateTracking(0);
            } else if (currentStep === 'confirmation-step') {
                paymentStep.classList.remove('hidden');
                confirmationStep.classList.add('hidden');
                updateTracking(1);
            }
        });
    });
    // Go to payment step
    proceedPaymentButton.addEventListener('click', () => {
    const selectedValue = document.querySelector('input[name="payment-method"]:checked')?.value;
    if (selectedValue=="M-money") {
        checkoutStep.classList.add('hidden');
        MobileStep.classList.remove('hidden');
        updateTracking(1);
    } else {
        checkoutStep.classList.add('hidden');
        paymentStep.classList.remove('hidden');
        updateTracking(1);
    }
       
    });

    // Go to confirmation step
    confirmPaymentButton.addEventListener('click', () => {
        paymentStep.classList.add('hidden');
        confirmationStep.classList.remove('hidden');
        updateTracking(2);
        confirmationMessage.textContent = 'Thank you for your payment. Your order has been successfully placed!';
    });
    confirmPaymentMobileButton.addEventListener('click', () => {
        MobileStep.classList.add('hidden');
        confirmationStep.classList.remove('hidden');
        updateTracking(2);
        confirmationMessage.textContent = 'Thank you for your payment. Your order has been successfully placed!';
    });

    // Finish and reset
    closeConfirmationButton.addEventListener('click', () => {
        confirmationStep.classList.add('hidden');
        checkoutStep.classList.remove('hidden');
        updateTracking(0);
    });
</script> 

</body>
</html>
