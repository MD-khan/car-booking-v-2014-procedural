<?php 
define("INFANTCOST", 8, true);
define("REGULARSEATCOST", 6, true);
define("BOSTERSEATCOST", 5, true);
define("STOPOVERCOST", 5, true);
$result  = 0;
$no_of_seat = 0;

if(isset($_GET['infant'])) {
	$no_of_seat = intval($_GET['infant']);
	$result = $no_of_seat * INFANTCOST;
	echo "$result";
	} else if(isset($_GET['regular'])) {
	$no_of_seat = intval($_GET['regular']);
    $result = $no_of_seat * REGULARSEATCOST;
	echo "$result";
}  else if(isset($_GET['boster'])) {
	$no_of_seat = intval($_GET['boster']);
	$result = $no_of_seat * BOSTERSEATCOST;
	echo "$result";
   } else if(isset($_GET['stopover'])) {
	$no_of_seat = intval($_GET['stopover']);
	$result = $no_of_seat * STOPOVERCOST;
	echo "$result";
   }
?>