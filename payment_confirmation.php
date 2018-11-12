<?php 
/**
* Basic Session Start
*/
include_once('php/session_start.php');
sec_session_start();

// seesion expire after 30 minutes
include_once( 'php/session_expire.php' );


//protecting unautorized user
if( ! isset($_SESSION['servicecat']) || ! isset($_SESSION['payment_page']) ) {
	header('location: hackertracer.php?unauthorized_access');
	}

// if some one direct access confirmation page
if( !isset($_POST['stripeToken'])) { 
		 header('location: hackertracer.php?');
	  	 exit();
	}

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
require_once( 'template_parts/page_payment_confirmation.php' );
?>


<?php
/**
* Foooter.php
*/
require_once( 'footer.php' ); 
?>
