<?php 
/**
* File: 		php/class.guest.entries
* Date: 		Nov 29, 2014
* Author: 		MD KHAN 
* Desciption:	This Class insert guest informatin in to data base. Before inserting data 
*			:	This class requres three class: 
*			:	1) class.dbconnect.php and  (2 class.datafilter 
*			:   All data will be valided and sanitized before sebd to database	
* Dependency:	processing_registration.php
*			
*/
require("class.dbconnect.php");
require("class.datafilter.php");

class GuestRegistration {
	/**
	* @param $customer fnmae, 
	* @param $customer_lname, 
	* @param $customer_email,
	* @param $customer_address
	* @param $customer_phone,
	* @param $customer_pass,
	* @param $pass_hash
	* @return boolean
	*/
	private $db;
	public $guest_id = NULL;
	public $guest_full_name;
	public $guest_email;
	public $guest_address;
	public $guest_phone;
	public $gues_db_id;
	 
	 
		
		// Construction 
		public function __construct() {
			$this->db = new Dbconnection();
			$this->db = $this->db->dbCon();
		}
	
		/**
		* This function Does the following tast:
		*	: 1. Get All the data from guest.
		*	: 2. Filter and Sanatized 
		*	: 3. Set data to  class level data. such as $this->that
		*  
		*/
		public function setguestInfo($g_fname, $g_email, $g_address, $g_phone) {
			$filter = new DataFilter(); //Inseating Datafilter class
			// secure and put to class level
			$this->guest_full_name = $filter->SecureData($g_fname); 
			$this->guest_address = $filter->SecureData($g_address);
			
			//fisrt sanatizing guest email then securing: setting null if data is not appropriate
			$this->guest_email = $filter->SanatizeEmail($g_email) ? $filter->SecureData($g_email) : NULL;
			$this->guest_phone = $filter->validatePhone($g_phone) ? $filter->SecureData($g_phone) : NULL;
			 		}
				 
		  public function InsertGuestData() {
					 
			//seting time zone New York. reason-> guest mostly from this zone
		   	date_default_timezone_set("America/New_York");	
		  	$reg_time = date("d,M Y: g:i a");
			  		
		  	$stm = $this->db->prepare("INSERT INTO car_guest (car_guest_id, guest_name,
					 guest_email, guest_address, guest_phone, guest_entry_time, guest_ip)
					  VALUES(?, ?, ?, ?, ?, ?, ?)");
		  
		   $stm->bindParam(1,$this->guest_id);
		   $stm->bindParam(2,$this->guest_full_name);
		   $stm->bindParam(3,$this->guest_email);
		   $stm->bindParam(4,$this->guest_address);
		   $stm->bindParam(5,$this->guest_phone);
		   $stm->bindParam(6,$reg_time);
		   $stm->bindParam(7,$_SERVER['REMOTE_ADDR']);
		   
		   $result = $stm->execute() ? true : false;
		  		 return $result;		// return true if all data are correct       
		 }
		 
		 //update guest data by email
		 public function updateGuestData($email) {
			$sql = "UPDATE `car_guest` SET `guest_name` = '$this->guest_full_name',
											 `guest_address` = '$this->guest_address', 
											 `guest_phone` = '$this->guest_phone' 
											  WHERE `car_guest`.`guest_email` = '$email' ";
											  
		      $statement = $this->db->prepare($sql);         
                         if($statement->execute()) {
							return true;
						} else 
						return false;
			
                     }//updateGuestData();
	//checking is guest exist
	public function isGuestExist() {
		    $STM = $this->db->prepare("SELECT guest_email FROM car_guest WHERE `car_guest`.`guest_email`=? LIMIT 1");
			 $STM->bindParam(1,$this->guest_email);
		     $STM->execute();
		    $STM->setFetchMode(PDO::FETCH_ASSOC);
		    $row = $STM->fetch(); // retriving data
			
			 if($STM->rowCount() == 1) {
			 //echo "Member exist";
			  return true;
			  } else  {
				  //no exist
			  return false;
			  }
			
		}	
		//retriving guest database id
		public function getGuestDbID() {
	    
		 $STM = $this->db->prepare("SELECT car_guest_id FROM car_guest WHERE `car_guest`.`guest_email`=? LIMIT 1");
			 $STM->bindParam(1,$this->guest_email);
		     $STM->execute();
		    $STM->setFetchMode(PDO::FETCH_ASSOC);
		    $row = $STM->fetch(); // retriving data
				$this->gues_db_id = $row['car_guest_id'];		 
			 if($STM->rowCount() == 1) {
			 	
			  return $this->gues_db_id;
			  } else  {
				  //no exist
			  return false;
			  }
			
	} 	 	
		
	}//class

 
 /** 
 $obj = new GuestRegistration();
	
  $obj->setguestInfo("shilpy farazi","monir@gmail.com", "shariatpur, Bangladesh", "0118801978545555");
  echo $obj->getGuestDbID();
  

  $result = $obj->isGuestExist();
    if($result) { // if guest already exist 
		//update the table
		$update = $obj->updateGuestData("shilpy@gmail.com");
		echo "Guest Exist: that's why Updated";
		} else {
		  $insert = $obj->InsertGuestData();
		   echo "New Guest: That's why  data inserted";
		}
	  
	  
	   */ 