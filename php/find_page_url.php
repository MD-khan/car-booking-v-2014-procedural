<?php
/**
* Finds Current Page URL
* @return string
*/
function find_current_page_url() {
 //defines page url
 $page_url = 'http'; 
 
 // if page is protocol is https
 // Ntte: @ sign use for avoiding error
 // Without @ : Error "Undefined index: HTTPS in...."
 if (@$_SERVER["HTTPS"] == "on") { 
	 $page_url .= "s";
	 } 
	 
 $page_url .= "://";
 
 if ($_SERVER["SERVER_PORT"] != "80") {
  $page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $page_url;
}
 
?>

<?php 

?>
