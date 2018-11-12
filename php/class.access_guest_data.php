<?php
/**
* Author: 		MD KHAN
* DAte: 		11/20/2014
* Description:	This Class is responsible for veryfy customer email as a ID and Rehas the password
*				Retrive Customer Details. 
*				It is not cheeking customer exist or not
*				It will be called from another php page that page is connect to Ajax metho 
*/
require("class.dbconnect.php");
class GuestInformation {
	private $db;
	public $gustID;
	public $guestNmae;
	public $guestEmail;
	public $guestAddress;
	public $guestPhone;
	public $guestEntryTime;
	public $guest_ip;
	
	
	public function __construct() {
		$this->db = new Dbconnection();
		$this->db = $this->db->dbCon();
		}
     
	 public function getGuestinformation() {
		 $STM = $this->db->prepare("select * from car_guest");
		 $STM->execute();
		return $result = $STM -> fetchAll();
		
		 }
	 
    
}//class

  
 /**
   
$custome = new GuestInformation();
 $result = $custome->getGuestinformation();
  foreach( $result as $row ) {
   			 echo    $row['car_guest_id'];
   			 echo    $row['guest_name'];
			 echo    $row['guest_email'];
			 echo    $row['guest_phone'];
			 echo    $row['guest_entry_time'];
			 echo    $row['guest_ip'];
		    }
*/
 