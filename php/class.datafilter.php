<?php

class DataFilter {
	 
	public $phone;
	
	public function SecureData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}	
	public function validatePhone($phone) {
   		 $numbersOnly = preg_replace("[^0-9]", "", $phone);
   		 $numberOfDigits = strlen($numbersOnly);
    		if ($numberOfDigits >= 10) {
        		return true;
				} else {
       		    return false;
    		}
		}
		
	public function SanatizeEmail($email){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
			 return false;
			}else {
				return true;
				}
		}
	 public function SanatizePassword($password) {
		 $pass = preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,100}$/", $password);
		 if($pass) {
			 return true;
			 }
			else {
				return false;
				}
		 }	 

	
}
//testing
/* 
$ob = new DataFilter();
//$ob->SecureData("sdsad asd asd///dfdsfsdf<html> 0=0");
//echo $ob->general_data;
//var_dump( $ob->SanatizeEmail("mon@gmail.com"));
 //var_dump( $ob->SecureData("Who\'s Peter Griffin?"));
//var_dump ($ob->SanatizePassword("Monir123"));
$rt = $ob->SecureData("<script>alert(document.cookie)</script>");
//echo $rt;
 
//var_dump( $ob->validatePhone("1234567890"));
//var_dump($ob->SanatizePhone("34324"));

//var_dump($ob->SanatizeEmail("Monir@gmail.com"));
 */