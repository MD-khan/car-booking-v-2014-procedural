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
class CustomerLogin {
	private $db;
	public $customerFastName;
	public $customerLasName;
	public $customerEmail;
	public $pass_hash;
	public $isDatavalid = false;
	public $isCustomer =false;
	
	
	public function __construct() {
		$this->db = new Dbconnection();
		$this->db = $this->db->dbCon();
		}
   
     public function CustomerLoginVeryfy($email, $pass) {
		 	 try {
			 		if(!empty($email) && !empty($pass)){	
			 			$STM = $this->db->prepare("select * from car_customer where customer_email=?");
			 			$STM->bindParam(1,$email);
		   				 $STM->execute();
						 $STM->setFetchMode(PDO::FETCH_ASSOC);
			 			$row = $STM->fetch();
					//assing variable
			 		$this->customerFastName = $row['customer_fname']; //getting customer name
			 		$this->customerLasName = $row['customer_lname'];
			 		$this->customerEmail = $row['customer_email'];
			 		$this->pass_hash = $row['pass_hash'];
						 
			 //varifuenf password hash
			 $this->pass_hash =  password_verify($pass, $this->pass_hash);	
			  if( $this->pass_hash) {
				 return true;// wright pass and id
			  }
			 //check password match
			  
			     if( ($this->pass_hash) && $row['customer_email'] === $email) {
				 return true;// wright pass and id
			 			}  
				 }//if 1
				
					 	
			 }catch (PDOException $e) {
    	//Do your error handling here
  		  $message = $e->getMessage();
			}
		//error handle	 
	 
	}//fun
	
	//retriving customer database id
		public function getCustomerDbID() {
	    
	 $STM = $this->db->prepare("SELECT cus_id FROM car_customer WHERE `car_customer`.`customer_email`=? LIMIT 1");
			 $STM->bindParam(1,$this->customerEmail);
		     $STM->execute();
		    $STM->setFetchMode(PDO::FETCH_ASSOC);
		    $row = $STM->fetch(); // retriving data
			 $this->customer_db_id = $row['cus_id'];		 
			 if($STM->rowCount() == 1) {
			  return $this->customer_db_id;
			  } else  {
				  //no exist
			  return false;
			  }
			
	} 	 	
 public function __toString(){
			  return $this->customerEmail;
			  }

}//class

  

 /**  
$custome = new CustomerLogin();
$re = $custome->CustomerLoginVeryfy("monir@gmail.com","Monir123");
$id = $custome->getCustomerDbID();
var_dump($id);

if ($re) {
	echo "Login";
	}else {
	echo "invalid user Name or Password";
	}
	 */
 
