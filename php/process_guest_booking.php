<?php 
require("class.guest_entry.php");
include_once('session_start.php');
sec_session_start();
$obj = new GuestRegistration();
 
	$guest_fname = $_POST['guest-name'];
	$guest_email = $_POST['guest_email'];
	$guest_address = $_POST['guest_address'];
	$guest_phone = $_POST['guest_phone'];

	
	/**
    $guest_fname = "md";
	$guest_email = "m@gmail.com";
	$guest_address = "34325sdfdsg";
	$guest_phone =  "619-123-1212";
		*/
	
$obj->setguestInfo($guest_fname ,$guest_email, $guest_address, $guest_phone);	

$result = $obj->isGuestExist();

 if($result) { // if guest already exist 
		//update the table
		$update = $obj->updateGuestData($obj->guest_email);
		echo "success";
		 $_SESSION['guest_email'] = $obj->guest_email;
		 $_SESSION['guest_name'] = $obj->guest_full_name;
		 $_SESSION['guest_db_id'] = $obj->getGuestDbID();
		} else {// if new guest
		  $insert = $obj->InsertGuestData();
		  echo "success";
		 $_SESSION['guest_email'] = $obj->guest_email;
		 $_SESSION['guest_name'] = $obj->guest_full_name;
		 $_SESSION['guest_db_id'] = $obj->getGuestDbID();
			}
 /***
	 $result = $obj->InsertGuestData();
	 if ( $result ) {
		 echo "success";
		 $_SESSION['guest_email'] = $gest_session_email;
		 $_SESSION['guest_name'] = $gest_session_email;
		 }
	 else {
	    echo "Found some error on data";
		  }

*/