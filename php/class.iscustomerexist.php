<?php
/**
* Check user is exit or not 
* @author     MD KHAN <md.monir.khan@gmail.com>
* Required class clasa.dbconnect.php
*/
require("class.dbconnect.php"); // db coonection file
require("class.datafilter.php");

class IsCustomerExist{
	/**
	* @param Strin $db
	* @param string $email
	* return boolean
	*/
	private $db;
	 
	
	public function __construct() {
		$this->db = new Dbconnection();
		$this->db = $this->db->dbCon();
		}
	/**
	* Geting email 
	* Connecting to data base and search for email
	* return true if user exist
	* return false if user dosent exist
	*/
	public function isExitUser($email) {
		  $filter = new DataFilter(); //Inseating Datafilter class
		  $email  = $filter->SecureData($email); 
		  
		 $STM = $this->db->prepare("select customer_email from car_customer where customer_email=?");
		 $STM->bindParam(1,$email);
		 $STM->execute();
		 $STM->setFetchMode(PDO::FETCH_ASSOC);
		 $row = $STM->fetch(); // retriving data
		  if($STM->rowCount() >= 1) {
			 //echo "Member exist";
			  return true;
			  } else  {
				  //no exist
			  return false;
			  }
		}
	
	
	}//class
 
// testing this class
//$checkUserAvailablity = new IsCustomerExist();

//$chk = $checkUserAvailablity->isExitUser("Jumakhan@gmail.com");
//var_dump($chk);
