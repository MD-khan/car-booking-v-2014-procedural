<?php 
require("class.customerregistraion.php");
require("class.sending_mail.php");
$obj = new CustomerRegistration();

	$customer_fname = $_POST['customer_fname'];
	$customer_lname = $_POST['customer_lname'];
	$customer_email = $_POST['customer_email'];
	$cutomer_address = $_POST['customer_address'];
	$customer_phone = $_POST['customer_phone'];
	$customer_pass = $_POST['customer_pass'];
 /**
    $customer_fname = "md";
	$customer_lname = "khan";
	$customer_email = "m@gmail.com";
	$cutomer_address = "192 London St, Boston";
	$customer_phone = "619-123-1212";
	$customer_pass = "Monir123";
	*/
	
$obj->setCustomerInfo($customer_fname,$customer_lname,$customer_email, $cutomer_address, $customer_phone,$customer_pass);	
//$obj->setCustomerInfo("md","khan","m@gmail.com", "192 London St, Boston", "619-123-1212", "Monir123");
	
 
    $obj->addSalt();
	//var_dump ($obj->pass_hash);
	
	//echo phpinfo();	
	 
	 $result = $obj->InsertCustomarData();
	 if ( $result ) {
		 echo "success";
		 $email = new SendEamil();
		 $email->mailRegistrationConfirm($customer_email,$customer_fname);
	 }
	 else {
	    echo "Found some error on data";
		  }


