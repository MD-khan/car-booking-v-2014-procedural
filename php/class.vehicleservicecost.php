<?php 
include('define.constant.value.php'); // included some constant veriale
//----------------------------------------------------------------------------------------------------------------------------
// Calculate Based Vehicle Service Cost. Meaning this cost will be added to other vehicle service type. such as Service To  
// Airport, Door to Door Service etc. 
// @return Based Vehicle Service Cost
//----------------------------------------------------------------------------------------------------------------------------
class VehicleServiceCost {
	public $_distance;
	public $_fare;
	public $_estimatedFare;
	public $_gratuity;
	public $_salesTax;
	public $_extraSeatCost;
	public $_stopOverCost;
	public $_nigtCharge;
	public $_hourlyRate;
	public $_basicVehicleServiceCost;

//----------------------------------------------------------------------------------------------------------------------------
// Defined Construct function
//---------------------------------------------------------------------------------------------------------------------------
	public  function __construct() {
		
		}
//----------------------------------------------------------------------------------------------------------------------------
//  define setter method
// set distance for vehicle service
//----------------------------------------------------------------------------------------------------------------------------
	public function  setDistance($distance) {
		//$this->_distance = $distance;
		$this->_distance = preg_replace( '/[^0-9.]/', '', $distance );
		}
//----------------------------------------------------------------------------------------------------------------------------
// get distance 
//----------------------------------------------------------------------------------------------------------------------------		
	public function getDistance(){
		return $this->_distance;
		}
//----------------------------------------------------------------------------------------------------------------------------
// Find fare based on the distance between pick up and drop off address
// @return fare. if distance is more than 10,  regulerfare otherwise miminum fare
//----------------------------------------------------------------------------------------------------------------------------		
	public function getFare(){
		  $this->_fare = ($this->_distance <=10) ? MINFARE : REGFARE;
		  return $this->_fare;
		}
//----------------------------------------------------------------------------------------------------------------------------
// Calculate basic fare with the multiplication of distance and fare rate
// @return Fare based on the distance. if distance is more than 10,  regulerfare otherwise miminum fare
//----------------------------------------------------------------------------------------------------------------------------		 
	 public function getEstimatedFare() {
		 $this->_estimatedFare = $this->_distance * $this->_fare;
		 return $this->_estimatedFare = round($this->_estimatedFare, 0, PHP_ROUND_HALF_UP); 
		 } 
		 
//----------------------------------------------------------------------------------------------------------------------------
// Get Hourly Rate
// It won't increase with extra service.
// @return _hourlyRate
//---------------------------------------------------------------------------------------------------------------------------- 
	 public function getHourlyRate(){
			  return $this->_hourlyRate = 50;
		
		}
//----------------------------------------------------------------------------------------------------------------------------
// Get Driver's Gratuity based on multiplication of distance and fare.
// It won't increase with extra service.
// @return dirver gratuity
//---------------------------------------------------------------------------------------------------------------------------- 
	 public function getGratuity(){		  
	    $this->_gratuity = $this->_estimatedFare * GRATUITY;
		return $this->_gratuity = round($this->_gratuity, 0, PHP_ROUND_HALF_UP); 
		 }
//----------------------------------------------------------------------------------------------------------------------------
// Calculate Sales Tax
// @return sales tax
//----------------------------------------------------------------------------------------------------------------------------
    public function getSalesTax() {	
		$this->_salesTax = $this->_estimatedFare * SALESTAX;
		return $this->_salesTax;	
		}
//----------------------------------------------------------------------------------------------------------------------------
// Set Extra seat Coast 
// ---------------------------------------------------------------------------------------------------------------------------
	public function setExtraSeatCost($extraSeatCost){
		$this->_extraSeatCost = $extraSeatCost;
	}
//----------------------------------------------------------------------------------------------------------------------------
// Get Extra seat Coast 
// @retunr int Extra Seat Cost
// ---------------------------------------------------------------------------------------------------------------------------
	public function getExtraseatCost(){
		return $this->_extraSeatCost;
		}
//----------------------------------------------------------------------------------------------------------------------------
// Set Stop Over Coast 
// ---------------------------------------------------------------------------------------------------------------------------
	public function setStopOverCost($stopOverCost){
		$this->_stopOverCost = $stopOverCost;
		}
//----------------------------------------------------------------------------------------------------------------------------
// Get Stop over Cost
// @retunr stop over cost
//----------------------------------------------------------------------------------------------------------------------------
	public function getStopOverCost(){
		return $this->_stopOverCost;
		}
//----------------------------------------------------------------------------------------------------------------------------
// Set Nigth Charge value 
// ---------------------------------------------------------------------------------------------------------------------------
	public function setNightCharge($time){
			if(
			$time == "10:00 PM" || $time == "12:00 AM"  || $time == "2:00 AM" || $time == "4:00 AM" ||
			$time == "10:15 PM" || $time == "12:15 AM"  || $time == "2:15 AM" || $time == "4:15 AM" ||
			$time == "10:30 PM" || $time == "12:30 AM"  || $time == "2:30 AM" || $time == "4:30 AM" ||
			$time == "10:45 PM" || $time == "12:45 AM"  || $time == "2:45 AM" || $time == "4:45 AM" ||
			$time == "11:00 PM" || $time == "1:00 AM"   || $time == "3:00 AM" || $time == "5:00 AM" ||
			$time == "11:15 PM" || $time == "1:15 AM"   || $time == "3:15 AM" || $time == "5:15 AM" ||
			$time == "11:30 PM" || $time == "1:30 AM"   || $time == "3:30 AM" || $time == "5:30 AM" ||
			$time == "11:45 PM" || $time == "1:45 AM"   || $time == "3:45 AM" || $time == "5:45 AM" ||
			 $time == "6:00 AM" ){ 		 		
			
			$this->_nigtCharge = TIMINGFARE;
			}else
			$this->_nigtCharge = 0;
				
		
		}
//----------------------------------------------------------------------------------------------------------------------------
// Get Stop over Cost
// @retunr stop over cost
//----------------------------------------------------------------------------------------------------------------------------
	public function getNightCharge(){
		return $this->_nigtCharge;
		}
//---------------------------------------------------------------------------------------------------------------------------
// Now Time to Calculate VehicleService Cost with the value of others entities
// @retun Basic Total Fare
//---------------------------------------------------------------------------------------------------------------------------
	public function getBasicVehicleServiceCost(){
		return $this->_basicVehicleServiceCost = $this->_estimatedFare
			 + $this->_salesTax 
			 +  $this->_gratuity 
			 + $this->_extraSeatCost 
			 + $this->_stopOverCost
			 + $this->_nigtCharge;
		//$this->_basicVehicleServiceCost =  $this->_estimatedFare; 
		//$this->_basicVehicleServiceCost +=  $this->_salesTax;
		//$this->_basicVehicleServiceCost +=  $this->_gratuity;
		//$this->_basicVehicleServiceCost +=  $this->_extraSeatCost;
		//$this->_basicVehicleServiceCost +=  $this->_stopOverCost;
		// return $this->_basicVehicleServiceCost;
		}
function __destruct() {
	// echo 'The class "', __CLASS__, '" was destroyed.<br />';
	  //echo  __CLASS__ ." Taken: " . memory_get_usage() . "bytes memory\n";
   }
}


?>