<?php 
  
 class Message {
	 public $_msg = "";

	 public function __construct(){
  	      //echo "A new constructor in " . __CLASS__ . ".<br />";
 	 }
	 
	 public function msgMinimumPyment(){
		  $minPaymnt = 1;
		  $this->_msg = "You shall only be Charged $$minPaymnt as Booking Fee now.<br>";
		 	return  $this->_msg;
		 }
//---------------------------------------------------------------------------------------------------------------------------
// Make sure customer pick appropriate date and time for booking
//@return msg
//----------------------------------------------------------------------------------------------------------------------------
	public function checkBookingTime($date, $time){
	    date_default_timezone_set("America/New_York");
		 // check user pick current time or not
		if (strtotime("$date $time") <= strtotime("now") ) {
 		 $this->_msg =  'You have selected '.$time.' that is less then current: '.date('g:i A').' </br>';
		}else if (strtotime("$date $time") < strtotime("now +3 hours") ){ // if user select time 3 hours earlier
	    	 $this->_msg = 
			 		 'We cannot process a reservation within 3 Hours of departure. For urgent
					  bookings please call:617-866-3824.</br> ';
		}
		 
	}
//---------------------------------------------------------------------------------------------------------------------------
// Check Luggages: if cutomer pick 2/3 passenger car and chose more than 3 luggage 
//---------------------------------------------------------------------------------------------------------------------------
	public function checkLuggage($carType, $noOfLuggages) {
				if($carType == "2/3-passenger Sedan" && $noOfLuggages > 3) {
					$this->_msg = "<strong style='color:red'>Luggage limit exceeded.</strong> </br>
								  Please choose a suitable vehicle(MINI VAN) or
								 book multiple rides accroding to your requirment.</br>";
			  } else if($carType == "6-passenger Mini Van" && $noOfLuggages > 6) {
				   $this->_msg = "<strong style='color:red'>Luggage limit exceeded.</strong> </br>
								  Please choose a suitable vehicle(MINI VAN) or
								 book multiple rides accroding to your requirment.</br>";
				}
		}
//---------------------------------------------------------------------------------------------------------------------------
// Check Passengers: if cutomer pick 2/3 passenger car and chose more than 3 Passengers 
//---------------------------------------------------------------------------------------------------------------------------
	public function checkPassenger($carType, $noOfPassenger) {
				if($carType == "2/3-passenger Sedan" && $noOfPassenger > 3) {
					$this->_msg = "<strong style='color:red'> Passenger limit exceeded.</strong> </br>
								  Please choose a suitable vehicle(MINI VAN) or
								 book multiple rides accroding to your requirment.</br>";
			  } else if($carType == "6-passenger Mini Van" && $noOfPassenger > 6) {
				   $this->_msg = "<strong style='color:red'> Passenger limit exceeded..</strong> </br>
								  Please choose a suitable vehicle(MINI VAN) or
								 book multiple rides accroding to your requirment.</br>";
				}
		}
		
	  public function __toString(){
			  return $this->_msg;
			  }
    
        
	}
/*
 $ob1 = new Message;
 $ob2 = new Message;
 $ob3 = new Message;
 
 $t1 = "9/9/2014";
 $t2 =  "12:50 AM";
 
 $ob1->checkBookingTime( $t1, $t2);
 if($ob1->_msg == true){
	  echo $ob1->_msg; 
	 }

  
  
 $ob2->checkPassenger("6-passenger Mini Van", 1);
   echo $ob2->_msg;
   
 $ob3->checkLuggage("6-passenger Mini Van", 1);
    echo $ob3->_msg;
*/	
?>