<?php 
include_once('session_start.php');
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800 )) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
	header('Location: index.php?session_expire');
}
$_SESSION['LAST_ACTIVITY'] = time();
?>