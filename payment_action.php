<?php
    include_once('php/class.sending_mail.php');
	include_once('php/class.orderdetails_insertion.php');
	include_once('php/session_start.php');
	sec_session_start();
	require_once(dirname(__FILE__) . '/config_stripe.php');
	
		
	if( !isset($_POST['stripeToken'])) { 
		 header('location: hackertracer.php?');
	  	 exit();
	}
	
	
	if( !isset($_SESSION['guest_email']) && !isset($_SESSION['is_user_logged_in'])) {
	       header('location: payment.php?pay_without_session');
				   exit();
	 }
	
	
	// define service name
	if( $_SESSION['servicecat'] == 1) {
		$serviceName = "Ride  To the Airport";
		}
	else if( $_SESSION['servicecat'] == 2) {
		$serviceName = "Ride From the Airport";
		}
	else if( $_SESSION['servicecat'] == 3) {
		$serviceName = "Hourly Service";
		}
	else if( $_SESSION['servicecat']== 4) {
		$serviceName = "Door to Door Service";
		}
	else if( $_SESSION['servicecat'] == 5) {
		$serviceName = "Long Distance Service";
		}
	 
	
	// Assind totap payable
	//$payable = 0;
	if( isset($_REQUEST['dolar']) ) {
		$payable = 1;
		}
	else {
		$payable = $_SESSION['total_payable'];
		}
	
	
	 
		  
	if (isset($_POST['stripeToken'])) {
	 $payable = $payable * 100;
     $token  = $_POST['stripeToken'];
	
	// assign customer or guest email
	$payer_email = "";
	$c_payer_db_Id= 0; //customer
	$g_payer_db_Id= 0; //guest
	
	if(isset($_SESSION['guest_email'])) {
		$payer_email = $_SESSION['guest_email'];
		$g_payer_db_Id = $_SESSION['guest_db_id'];
		 
		  //unseting user loginsession
			
		  } 
		  //seting for customer
		 if(isset($_SESSION['c_eamil'])) {
			$payer_email = $_SESSION['c_eamil'];
			$c_payer_db_Id = $_SESSION['customer_db_id'];
				 
			}
			
  $customer = Stripe_Customer::create(array(
      'email' => $payer_email,
      'card'  => $token
  ));

  $charge = Stripe_Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $payable,
      'currency' => 'usd'
  ));
  //sending email to payer
  $obs =  new SendEamil();
  // assingining payer name
  $payerName ="";
  if(isset($_SESSION['guest_name'])) {
  $payerName = $_SESSION['guest_name'];
  	} else if(isset($_SESSION['c_first_name'])) { 
		$payerName = $_SESSION['c_first_name'];
		}
 
   
   // get back original value
   $payable = $payable / 100;
   
   $obs->mailOrderConfermation($payer_email, $payerName,
  								 $payable, $_SESSION['vehicle_type'], $_SESSION['distance'], 
								 $_SESSION['_estimatedFare'], $_SESSION['_gratuity'], $_SESSION['_airportToll'],
								 $_SESSION['extraCost'], $_SESSION['nightCharge'],
								 $_SESSION['serviceName'], $_SESSION['datepicker'], 
								 $_SESSION['picktime'], $_SESSION['fromAddress'], 
								 $_SESSION['toAddress'], $_SESSION['passengers'],
								 $_SESSION['luggage'], $confirmationNum);
    
	// inserting inot database
	 $obj = new InsertOrderDetails();
	 //
	  $obj->setOrderDetails( $payable, $_SESSION['distance'],$_SESSION['vehicle_type'],
	  						$_SESSION['_estimatedFare'],$_SESSION['_gratuity'],$_SESSION['_airportToll'],
							 $_SESSION['extraCost'],$_SESSION['nightCharge'], $serviceName,
							 $_SESSION['datepicker'], $_SESSION['picktime'],$_SESSION['fromAddress'],
							 $_SESSION['toAddress'],$_SESSION['passengers'],$_SESSION['luggage'],
							 $g_payer_db_Id,$c_payer_db_Id);
	  
	  $obj->InsertOrderData();
	  //unseting all seesion values
	  unset ( $_SESSION['servicecat'] );
	  unset($_SESSION['total_payable']);	 
	  unset($_SESSION['distance']);	 	 
	  unset($_SESSION['_estimatedFare']);
	  unset($_SESSION['_gratuity']);
	  unset($_SESSION['_airportToll']);
	  unset($_SESSION['extraCost']);
	  unset($_SESSION['nightCharge']);
	  unset($_SESSION['serviceName']);
	  unset($_SESSION['datepicker']);
	  unset($_SESSION['picktime']);
	  unset($_SESSION['fromAddress']);
	  unset($_SESSION['toAddress']);
	  unset($_SESSION['passengers']);
	  unset($_SESSION['luggage']);
	  unset( $_SESSION['guest_email'] );
	  	  
	 header('location: http://victorlivery.com/payment_confirmation.php?payment_success');	  
	// header('location: payment_confirmation.php?payment_success ');
	 //http://carbooking.us/payment.php
  //echo '<h1>Successfully charged "'.$_SESSION['total_payable'].'"!</h1>';
  } 
  else {
	   header('location: payment_confirmation.php?payment_failed');
	  } 
?>