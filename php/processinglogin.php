<?php
require("class.customerlogin.php");
require("class.datafilter.php");
include_once('session_start.php');

sec_session_start();
 $_SESSION['LAST_ACTIVITY'] = time();

$user = $_POST['username'];
$pass = $_POST['userpass'];

 /***
 for testing 
  $user = "monir@gmail.com";
  $pass = "Monir123";
*/ 
 
//Valadating data
$filter = new DataFilter();
$user = $filter->SecureData($user);
$pass =$filter->SecureData($pass);

//if(!$filter->SanatizeEmail($user) || !$filter->SanatizePassword($pass)) {
	//echo "notValiEmailorpass";
//exit(); //exit exicution;
//} 

$custome = new CustomerLogin();

$result = $custome->CustomerLoginVeryfy($user, $pass);

if ($result) {
	echo "success";
	//assing session variables
			$_SESSION['is_user_logged_in'] = "yes";
	        $_SESSION['c_first_name'] = $custome->customerFastName;
	        $_SESSION['c_laast_name'] = $custome->customerLasName;
			$_SESSION['c_eamil'] = $custome->customerEmail;
			$_SESSION['customer_db_id'] = $custome->getCustomerDbID();
			
			//here we need to check if guest is going to register and login in
			// if guest has done with one booking, his session will be conflick with member
			// so that we need to unset guest session
			if(isset($_SESSION['guest_email'])) {
				unset($_SESSION['guest_email']);//important for database
				}
					
	}
	else {
		echo "wrongpassorid";
		}
 

 