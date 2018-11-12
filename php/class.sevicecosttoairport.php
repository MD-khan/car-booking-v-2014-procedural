<?php 
function my_autoloader($class_name) {
    include_once "../class.php/class.".$class_name.".php";
}
spl_autoload_register('my_autoloader');
  
 
/*
ini_set("memory_limit","512M");
include('../class.php/class.sevicecosttoairport.php');
Fatal error: Allowed memory size of 536870912 bytes exhausted (tried to allocate 6144 bytes) in C:\xampp\htdocs\carrentalservice\class.php\class.sevicecosttoairport.php on line 3
*/
class ServiceCostToAirport extends VehicleServiceCost {
	
	public $_airportName;
	public $_toAirporToll;
	public $_toAirportFare;
	
	public function __construct(){
  	      //echo "A new constructor in " . __CLASS__ . ".<br />";
 	 }
 
 	public function setAirportName($airportname){
		$this->_airportName = $airportname;		
		}
	public function getAirportName() {
		 return $this->_airportName;
		}
	public function setAirportToll($airportToll){
			$this->_toAirporToll = $airportToll;
		}	
		
	public function getAirportToll(){
			if ($this->_airportName == "Logan International Airport, Boston, MA"){
				return $this->_toAirporToll = TOLOGANAIRPORTTOLL;
				}
			else if ($this->_airportName == "jfk Access Road New York ny  10010"){
				return $this->_toAirporToll = TOJFKAIRPORTTOLL;
				}
			else return $this->_toAirporToll = 0.00;
		
		}
	public function getToAirportFare(){
		 $this->_toAirportFare = parent::getBasicVehicleServiceCost();
		 $this->_toAirportFare += $this->_toAirporToll;		 
		return $this->_toAirportFare;
	}
  public function __toString(){
	  return $this->_toAirportFare;
	  }
	public function __destruct(){
  	  parent::__destruct();
	 // echo 'The class "', __CLASS__, '" was destroyed.<br />';
 	 }
} 
/*
$obj = new ServiceCostToAirport;
$obj->setDistance(11.1);
$obj->setExtraSeatCost(10);
$obj->setStopOverCost(10);
$obj->setAirportToll(7.5);
$obj->setNightCharge(10);

 
echo"--------------------------------------------------------<br>";
echo "Total Distance: ". $obj->getDistance() . "<br>";
echo "Fare per distance: ". $obj->getFare() . "<br>";
echo "Estimated Fare: ". $obj->getEstimatedFare() . "<br>";
echo "Gratuity: ". $obj->getGratuity() . "<br>";
echo"---------------------------------------------------------<br>";
echo "ExtraSeat Cost: ". $obj->getExtraSeatCost() . "<br>";
echo "Stop Over Cost: ". $obj->getStopOverCost() . "<br>";
echo "Night Charge: ". $obj->getNightCharge() . "<br>";
echo "Sales Tax: ". $obj->getSalesTax() . "<br>";
echo "Total Basic Fare: ". $obj->getBasicVehicleServiceCost() . "<br>";
echo"---------------------------------------------------------<br>";
echo "Airport Fare: ". $obj->getToAirportFare() . "<br>";
echo "Airport Toll: ". $obj->getAirportToll() . "<br>";
 
//----------------------------------------------------------

echo'---------------------Memory Uses----------------------<br>';
 echo "My PHP script have taken memory " . memory_get_usage() . "\n";
*/ 
?>