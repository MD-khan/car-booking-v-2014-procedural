<?php 
/**
* Basic Session Start
*/
include_once('php/session_start.php');
sec_session_start();

// seesion expire after 30 minutes
include_once( 'php/session_expire.php' );

//protecting unautorized user
if( ! isset($_SESSION['guest_email']) ) {
	header('location: http://victorlivery.com/index.php?unauthorized_access');
	}
	
$_SESSION['payment_page'] = "payment_page";


?>

<?php 
/**
* Configuration for Stripe
*/
require_once('config_stripe.php');
?>


<?php
/**
* site-config.php hold all the defined constant
* This file holds Site, developer details information
* Also It contains important configuration
*/
 require_once 'site-config.php';
?>

<?php 
/**
* header
*/
require_once( 'header.php' );
?>

<?php 
/**
* page page_payment.php
* Has Stripe payment gate way button
* Has Paypal Gateway button
* Has Booking and Fare Details 
* 
*/
require_once( 'template_parts/page_guest_payment.php' );
?>


<?php
/**
* Foooter.php
*/
require_once( 'footer.php' ); 
?>
