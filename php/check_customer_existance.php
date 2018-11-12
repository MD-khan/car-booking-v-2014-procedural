<?php 
require("class.iscustomerexist.php");

 if( ! isset($_POST['inValue']) ) {
		 header( 'location: ../hackertracer.php?unauthorized_user' );
		 }

$user_email =  $_POST['inValue'];
//$user_email =  "m@gmail.com";
$filter = new DataFilter(); //Inseating Datafilter class
$user_email = $filter->SanatizeEmail($user_email) ? $filter->SecureData($user_email) : NULL;
//var_dump($user_email);
// if data good to go to data base
if( ($user_email)) { // if email validation and sanatizatrion is ok
	$checkUserAvailablity = new IsCustomerExist();
	$chkemail = $checkUserAvailablity->isExitUser($user_email); //retrunnig true or false
	//var_dump($chkemail);
	if($chkemail) {
		echo "UserExist";
		}else {
			echo "notexist";
			}
				
} else {
   echo "Email_not_valid";
	}
