include 'config.php';

// Use PayPal or Stripe API keys from config.php to process payment
$paypal_client_id = PAYPAL_API_CLIENT_ID;
$stripe_key = STRIPE_API_KEY;

// Process the payment with the selected gateway
