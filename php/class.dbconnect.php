<?php 
//protecting unautorized user	
class Dbconnection {
	public function dbCon() {
		return new PDO("mysql:host=localhost; dbname=victor_livery_car_booking", "root", "");
		
	 //return new PDO("mysql:host=localhost; dbname=victorliverycarbooking6178663824", "victordhaka", "Carbooking@4life");
		}
	}
?>