<?php 
/**
* File: 		php/class.customerregistration
* Date: 		Nov 19, 2014
* Author: 		MD KHAN 
* Desciption:	This Class insert customer informatin in to data base. Before inserting data 
*			:	This class requres three class: 
*			:	1) class.dbconnect.php and  (2 class.datafilter 
*			:   All data will be valided and sanitized before sebd to database	
* Dependency:	processing_registration.php
*			
*/
require("class.dbconnect.php");
require("class.datafilter.php");

class CustomerRegistration {
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
	public $customer_id = NULL;
	public $customer_fname;
	public $customer_lname;
	public $customer_email;
	public $cutomer_address;
	public $customer_phone;
	public $customer_pass;
	public $pass_hash;
	public $customer_db_id;
		
		// Construction 
		public function __construct() {
			$this->db = new Dbconnection();
			$this->db = $this->db->dbCon();
		}
	
		/**
		* This function Does the following tast:
		*	: 1. Get All the data from customer.
		*	: 2. Filter and Sanatized 
		*	: 3. Set data to  class level data. such as $this->that
		*  
		*/
		public function setCustomerInfo($c_fname, $c_lname, $c_email, $c_address, $c_phone, $c_pass) {
			$filter = new DataFilter(); //Inseating Datafilter class
			// secure and put to class level
			$this->customer_fname = $filter->SecureData($c_fname); 
			$this->customer_lname = $filter->SecureData($c_lname);
			$this->cutomer_address = $filter->SecureData($c_address);
			
			//fisrt sanatizing customer email then securing: setting null if data is not appropriate
			$this->customer_email = $filter->SanatizeEmail($c_email) ? $filter->SecureData($c_email) : NULL;
			$this->customer_phone = $filter->validatePhone($c_phone) ? $filter->SecureData($c_phone) : NULL;
			$this->customer_pass =  $filter->SanatizePassword($c_pass) ? $filter->SecureData($c_pass) : NULL;
			 
		}
		
		/**
		* This function add salt into customer password
		* @param $password
		* @return long string $pass_hash
		*/
		public function addSalt() {
			$passwod = $this->customer_pass;
			$this->pass_hash = password_hash($passwod, PASSWORD_DEFAULT);
			return $this->pass_hash;
			//dosen't work the following line
			//$this->pass_hash = password_hash($this->customer_pass, PASSWORD_DEFAULT);
			//return $this->pass_hash;
			}
		/**
		* This function insert all the data to  database
		* @param as defined at the class level
		* @return boolean
		*/
		public function InsertCustomarData() {
			
			//seting time zone New York. reason-> customer mostly from this zone
		   	date_default_timezone_set("America/New_York");	
		  	$reg_time = date("d,M Y: g:i a");
		  	$stm = $this->db->prepare("INSERT INTO car_customer (cus_id, customer_fname, customer_lname,
		 customer_email, customer_address, customer_phone, pass_hash, registration_time, customer_ip)
		  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		  
		   $stm->bindParam(1,$this->customer_id);
		   $stm->bindParam(2,$this->customer_fname);
		   $stm->bindParam(3,$this->customer_lname);
		   $stm->bindParam(4,$this->customer_email);
		   $stm->bindParam(5,$this->cutomer_address);
		   $stm->bindParam(6,$this->customer_phone);
		   $stm->bindParam(7,$this->pass_hash);
		   $stm->bindParam(8,$reg_time);
		   $stm->bindParam(9,$_SERVER['REMOTE_ADDR']);
		      $result = $stm->execute() ? true : false;
		  		 return $result;		// return true if all data are correct       
		 }
	
		
	}//class

 
/** 
 $obj = new CustomerRegistration();
	
 $obj->setCustomerInfo("md","khan","b@gmail.com", "192 London St, Boston", "619-123-1212", "Monir123");
	
 var_dump ($obj->pass_hash);
 var_dump($obj->addSalt());
	
	//echo phpinfo();	
	 
	 $result = $obj->InsertCustomarData();
	 if ( $result ) {
		 echo "Data inserted";
	 }
	 else {
	    echo "Found some error on data";
		  }
		
echo $obj->getCustomerDbID();
	var_dump($obj->getCustomerDbID());
  */
 