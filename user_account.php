<?php 
/**
* Basic Session Start
*/
include_once('php/session_start.php');
sec_session_start();

// seesion expire after 30 minutes
include_once( 'php/session_expire.php' );


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
* page_user_account.php
* Has user account details
*  
*  
* 
*/
require_once( 'template_parts/page_user_account.php' );
?>


<?php
/**
* Foooter.php
*/
require_once( 'footer.php' ); 
?>
