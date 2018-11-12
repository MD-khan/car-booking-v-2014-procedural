<?php 
spl_autoload_register('my_autoloader');

class ServiceCostFromAirport extends VehicleServiceCost {
	
	public $_airporToll;
	public $_fromAirportFare;
	
	public function __construct(){
  	   parent::__construct();
      // echo "A new constructor in " . __CLASS__ . ".<br />";
 	 }
	 
	 public function setAirportName($airportname){
		$this->_airportName = $airportname;		
		}
	public function getAirportName() {
		 return $this->_airportName;
		}
	public function setAirportToll($airportToll){
		$this->_airporToll = $airportToll;
		}
	public function getAirportToll(){
			if ($this->_airportName == "Logan International Airport, Boston, MA"){
				return $this->_toAirporToll = FROMLOGANAIRPORTTOLL;
				}
			else if ($this->_airportName == "jfk Access Road New York ny  10010"){
				return $this->_toAirporToll = TOJFKAIRPORTTOLL;
				}
		  else return $this->_toAirporToll = 0.00;
		
		}
	public function getFromAirportFare() {
		$this->_fromAirportFare = parent:: getBasicVehicleServiceCost();
		return $this->_fromAirportFare;
		}
	public function __toString(){
	  return $this->_fromAirportFare;
	  }
	 
	public function __destruct(){
  	  parent::__destruct();
      //echo 'The class "', __CLASS__, '" was destroyed.<br />';
 	 }
} 
/*
$obj = new ServiceCostFromAirport;
$obj->setDistance(10.9996);
$obj->setExtraSeatCost(10);
$obj->setStopOverCost(2);
 $obj->setAirportToll(10.5);
echo "distance: \n". $obj->getDistance(). "<br>\n";

echo "Fare: ". $obj->getFare() . "<br>";
echo "Estimated Fare: ". $obj->getEstimatedFare() . "<br>";
echo "Gratuity: ". $obj->getGratuity() . "<br>";
echo "Sales Tax: ". $obj->getSalesTax() . "<br>";
echo "Extra Seat: ". $obj->getExtraseatCost() . "<br>";
echo "Stop Over: ". $obj->getStopOvverSeatCost() . "<br>";
echo "Total Fare: ". $obj->getBasicVehicleServiceCost() . "<br>";
echo "Airport Toll: ". $obj->getAirportToll() . "<br>";
echo "From Airport Fare: ". $obj->getFromAirportFare() . "<br>";
 
//----------------------------------------------------------
 echo "My PHP script have taken memory " . memory_get_usage() . "\n";
*/ 
?>