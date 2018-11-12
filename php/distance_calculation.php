<?php

function get_Distance ( $from , $to ) {
	
	$from = urlencode($from);
	$to = urlencode($to);
	
	
	$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&units=imperial&language=en-EN&sensor=false");
	
	$data = json_decode($data);
	
	$time = 0;
	$distance = 0;
	
	foreach( $data->rows[0]->elements as $road) {
    $time += $road->duration->value;
    $distance += $road->distance->value;
	}
	
	
	// converting to meter to mile
	// m x 0.000621371 = mi 
	 $distance = $distance * 0.0006213712;
	 $distance = round( $distance ,1);

	// converting second to hour
	$time =  $time  / 60  ;
	$time = $time / 60 ;
	$time = round($time, 1);
	
	/*
	echo "To: ".$data->destination_addresses[0];
	echo "<br/>";
	echo "From: ".$data->origin_addresses[0];
	echo "<br/>";
	echo "Time: ".$time." Hours";
	echo "<br/>";
	echo "Distance: ".$distance." Miles";
	*/
	
	return $distance;
	
}


// testing the function
 /*
$from = "D.C. United, 2400 East Capitol Street Southeast, Washington, DC 20003";
$to = "197 Clarendon St, Boston, MA 02116";
$distance = get_Distance ( $from , $to );

echo $distance;
*/
 








