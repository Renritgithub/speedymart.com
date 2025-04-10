<?php
require_once 'vendor/autoload.php';  // Autoload dependencies via Composer

use Twilio\Rest\Client;

$sid = 'your_account_sid';  // Replace with your Twilio Account SID
$token = 'your_auth_token'; // Replace with your Twilio Auth Token
$client = new Client($sid, $token);

echo "Twilio SDK installed and ready!";
?>
