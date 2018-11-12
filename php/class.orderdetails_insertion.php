<?php 
/**
* File: 		php/class.orderdetails.entries
* Date: 		Dec 1, 2014
* Author: 		MD KHAN 
* Desciption:	This Class insert order details in to data base. Before inserting data 
*			:	This class requres three class: 
*			:	1) class.dbconnect.php and  (2 class.datafilter 
*			:   All data will be valided and sanitized before sebd to database	
* Dependency:	processing_registration.php
*			
*/
require("class.dbconnect.php");
require("class.datafilter.php");
include_once('generate_cinfirmation_num.php');

class InsertOrderDetails {
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
	
	public $totalPaied;
	public $distance;
	public $cartype;
	public $estimatedFare;
	public $gratuity;
	public $airporttoll;
	public $extraCost;
	public $nightCharge;
	public $serviceName;
	public $datepicker;
	public $picktime;
	public $fromAddress;
	public $toAddress;
	public $passengers;
	public $luggage;
	
	public $order_id = NULL;
	public $cus_id;
	public $car_guest_id ;
		  
		
		// Construction 
		public function __construct() {
			$this->db = new Dbconnection();
			$this->db = $this->db->dbCon();
		}
	
		/**
		* This function Does the following tast:
		*	: 1. Get All the data from orderdetails.
		*	: 2. Filter and Sanatized 
		*	: 3. Set data to  class level data. such as $this->that
		*  
		*/
		public function setOrderDetails($totalPaied, $distance, $cartype, $estimatedFare,
										 $gratuity, $airporttoll, $extraCost,$nightCharge, $serviceName, 
										 $datepicker, $picktime, $fromAddress, 
		 								 $toAddress, $passengers, $luggage, $guestDbId, $customerDbId) {
			$filter = new DataFilter(); //Inseating Datafilter class
			// secure and put to class level
			$this->totalPaied = $filter->SecureData($totalPaied); 
			$this->distance = $filter->SecureData($distance);
			$this->cartype = $filter->SecureData($cartype);
			$this->estimatedFare = $filter->SecureData($estimatedFare);
			$this->gratuity = $filter->SecureData($gratuity);
			$this->airporttoll = $filter->SecureData($airporttoll);
			$this->extraCost = $filter->SecureData($extraCost);
			$this->nightCharge = $filter->SecureData($nightCharge);
			$this->serviceName = $filter->SecureData($serviceName);
			$this->datepicker = $filter->SecureData($datepicker);
			$this->picktime = $filter->SecureData($picktime);
			$this->fromAddress = $filter->SecureData($fromAddress);
			$this->toAddress = $filter->SecureData($toAddress);
			$this->passengers = $filter->SecureData($passengers);
			$this->luggage = $filter->SecureData($luggage);
			
			//checking customer type.
			//if cutomer checking out: set customer id inot database, otherwise it would be 0
			//if guest checkking out : set guest id into database, default valeu 0
			
			if($guestDbId != 0) {
				$this->car_guest_id = $guestDbId;
				} else {
					$this->car_guest_id = -1;
					}
		     if($customerDbId != 0) {
				$this->cus_id = $customerDbId;
				} else {
					$this->cus_id = -1;
					}
			 
			 
	}
				
		public function InsertOrderData() {
			
			//seting time zone New York. reason-> guest mostly from this zone
		   	date_default_timezone_set("America/New_York");	
		  	$reg_time = date('d,M Y: g:i a');
			
			//calling confirmation num
			$confirmationNum = randomConfirmationNum();
			
		  	$stm = $this->db->prepare("INSERT INTO order_details (
									order_id, cus_id, car_guest_id, order_confermation_num,
									total_paid, car_type, distance, estm_fare, gratuity, 
									airport_toll, night_charg, extra, service_type, date,
									time, frm_address, to_address, passengers, lagguess, 
									booking_time, user_ip)
					  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
			 
		  			  $stm->bindParam(1,$this->order_id);
					  $stm->bindParam(2,$this->cus_id);
					  $stm->bindParam(3,$this->car_guest_id);
					 		 
			 		  $stm->bindParam(4,$confirmationNum);
					  $stm->bindParam(5,$this->totalPaied);
			 		  $stm->bindParam(6,$this->cartype);
			    	  $stm->bindParam(7,$this->distance);
				 	  $stm->bindParam(8,$this->estimatedFare);
				  	  $stm->bindParam(9,$this->gratuity);
				      $stm->bindParam(10,$this->airporttoll);
				      $stm->bindParam(11,$this->nightCharge);
					  $stm->bindParam(12,$this->extraCost);
					  $stm->bindParam(13,$this->serviceName);
					  $stm->bindParam(14,$this->datepicker);
					  $stm->bindParam(15,$this->picktime);
					  $stm->bindParam(16,$this->fromAddress);
					  $stm->bindParam(17,$this->toAddress);
					  $stm->bindParam(18,$this->passengers);
					  $stm->bindParam(19,$this->luggage);
					  $stm->bindParam(20,$reg_time);
		  			  $stm->bindParam(21,$_SERVER['REMOTE_ADDR']);
		    
			
			  $result = $stm->execute() ? true : false;
		  		 return $result;		// return true if all data are correct       
		 }
	
		
	}//class

/***
 $obj = new InsertOrderDetails();
	
   $obj->setOrderDetails("100", "20","sds","400","50","400","20","30","bjkb","420","2:pm","mnmnmnm","12123","ad","asd", 21, "");
 	//echo phpinfo();	
	 	 
	 $result = $obj->InsertOrderData();
	 if ( $result ) {
		 echo "Data inserted";
	 }
	 else {
	    echo "Found some error on data";
		  }
	//var_dump($result);

 */