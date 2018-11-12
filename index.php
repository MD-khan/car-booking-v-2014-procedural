<?php 
/**
* Basic Session Start
*/
include_once('php/session_start.php');
sec_session_start();

// seesion expire after 30 minutes
//include_once( 'php/session_expire.php' );


$_SESSION['index'] = "index.php";

?>

<?php
/**
* site-config.php hold all the defined constant
* This file holds Site, developer details information
* Also It contains important configuration
*/
 require_once 'site-config.php';
?>

<?php 
/**
* header
*/
require_once( 'header.php' );
?>

<?php 
/**
* page_quote_reservation.php
* Contaoins all the neccessery content for quote
* Contains get quote form
* Contains reservation form
* 
*/
require_once( 'template_parts/page_quote_reservation.php' );
?>


<?php
/**
* Foooter.php
*/
require_once( 'footer.php' ); 
?>
