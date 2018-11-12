<?php
require_once('stripe-php-1.17.3/lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_HwasaaL4UEGTJH0S1sNhpI4w ",
  "publishable_key" => "pk_test_CMz85lEvvNyHTXiLdDdjFVVF"
);

Stripe::setApiKey($stripe['secret_key']);
?>
  