<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
<title> <?=SITE_TITLE?> </title>

<!-- Core CSS --> 
<link rel="stylesheet" href="css/style.css" />    
<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
  <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
   
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
   
   <link rel="stylesheet" href="/resources/demos/style.css">
   
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Jassor slider-->
     <link rel="stylesheet" href="css/jassor.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]-->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
      <script src="js/google-mapswithroute.js"> </script>
      <script src="js/calculate-distance.js"> </script> 
       <script src="js/validate_input.js"> </script> 
       <script src="js/cal_extra_seat.js"> </script>
       
       <!-- for slider -->
        <!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="js/jaquery1.9.js"></script>
     <!-- use jssor.slider.mini.js (40KB) instead for release -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="js/jassor.js"></script>
    <script type="text/javascript" src="js/jassor.slider.js"></script>
    <script type="text/javascript" src="js/jassor.jaquery.js"></script>

 

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58769041-1', 'auto');
  ga('send', 'pageview');

</script> 


  
</head>


<!-- site header -->
<header class="site-header"> 

<nav class="navbar navbar-default">

<div class="container-fluid"> 
 <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"
      			 data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" ><i class="fa fa-car"></i> <?=SITE_BRAND?> </a>
    </div>
    
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse main-navigation" id="bs-example-navbar-collapse-1"> 
    
    	<ul class="nav navbar-nav">
        	 <li> <a  href="index.php"> Get Quote </a> </li>
             <li> <a href="car_reservation.php"> Book Your Car </a> </li>
             <li> <a href="services.php"> Services </a> </li>
             <li> <a href="car_service_area.php"> Our Service Area </a> </li>
             <li> <a href="about_us.php"> About Us </a> </li>
             <li> <a href="contact_us.php"> Contact Us </a> </li>
             
          </ul> <!-- ./navbar-nav -->
          
           <ul class="nav navbar-nav navbar-right visible-lg">
           	 <li>
             <a href="#"><span class="glyphicon glyphicon-phone-alt"> </span> <?=SITE_CONTACT_PHONE?> </a>
             </li>
           </ul>
         
    </div> <!-- ./collapse -->
    
    
</div> <!-- ./container-fluid -->

</nav> <!-- ./nav -->

</header> <!-- ./site-header -->


<body>

<!-- Sections: Logo and Slider -->
<div class="container-fluid top-banner-wrapper"> 

  
<div class="site-logo">

  <img src="images/Victor-logo.png"> 
 </div>
 
 
 <div class="slide-direction next">  <i class="fa fa-angle-right fa-2x"></i>  </div>
  <div class="slide-direction prev"> <i class="fa fa-angle-left fa-2x"> </i>  </div>

 
  <div class="header-slider">
  
  
   <div style="display: inline-block;">
      
     <img src="slide_imgs/welcome.jpg">
    </div>
    
     <div>
     <img src="slide_imgs/ride-from-airport.jpg">
    </div>
    
     <div>
     <img src="slide_imgs/ride-to-airport.jpg">
    </div>
    
    <div>
     <img src="slide_imgs/hourly-service.jpg">
    </div>
    
    <div>
     <img src="slide_imgs/long-distance-service.jpg">
    </div>
    
     <div>
     <img src="slide_imgs/door-to-door-service.jpg">
    </div>
    
    <div>
     <img src="slide_imgs/get-free-quote.jpg">
    </div>
    
     <div>
     <img src="slide_imgs/get-quote-no-info.jpg">
    </div>
    
    
   
    
    
   
      
   
 </div> <!-- header-slider -->


</div> <!-- ./container-fluid -->


<!-- User Log in and Welcome section -->
<div class="container-fluid user-login-socal-bnt" >
 
<!-- Social Bittom -->
<div class="row social-button">

		<div class="col-xs-12 col-sm-6">
     	<strong> Help Line: <i class="fa fa-mobile"></i></strong>    
         <a href="#"> <?=SITE_CONTACT_PHONE?> </a>
    </div><!-- ./col-sm-6 -->
		<!-- adding social button -->
	 <div class=" col-xs-12 col-sm-6">
     	  <strong> Conncet with us: </strong>   
     		 <a href="#">
   				 <i class="fa fa-facebook-official fa-2x"></i>
 			 </a>
             
          	 <a>
           	   <i class="fa fa-pinterest-square fa-2x"></i>
 			 </a>
     
    		  <a>
   				<i class="fa fa-google-plus-square fa-2x"></i>
 	 		 </a>
     </div><!-- ./col-sm-6 -->
     
     
    
</div> <!-- ./row -->


<!-- Session Expired message -->
<?php 
 	if( isset( $_REQUEST['session_expire'] ) ) { ?>
		 
<div class="row">
 <h1 style="color:#C30"> Your Session expired.Please Log in  again </h1>
		
 </div> <!-- row -->
 
  <?php } // seesion ?>

  <!-- =======userinterfacation================ -->
<?php if(!isset($_SESSION['is_user_logged_in'])) {?>
<div class="row welcome">
 
<div class="user-nav" role="navigation">
	<ul>
    	<li>Welcome:<span>Guest</span></li>
  		 <li><span class="glyphicon glyphicon-user small"></span>
       	 <span class="lnkLogin" style="cursor:pointer">Login | Register
          <span class="glyphicon glyphicon-chevron-down small"> </span> 
          </span>
          </li>
     </ul> 
</div><!--=======user-nav===-->
 
</div><!--./welcome-->
<?php } else {?>
<!--==========if-user--logged in=============-->
<div class="row profile">
  
<div class="user-nav" role="navigation">
  <ul>
	  <li class="text-capitalize">Welcome:
      <span><?=$_SESSION['c_first_name']?></span>
	  <span><?=$_SESSION['c_laast_name']?></span>
      </li>
  		<span class="linktoprofile"> 
        	<li class="dropdown">
            <span class="glyphicon glyphicon-user"></span>
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Acount <span class="caret"></span></a>
         		<ul class="dropdown-menu" role="menu">
           		 <li><a href="user_account.php">Account Details</a></li>
                 <li><a href="php/logout.php">Log out</a></li>
                </ul>
        </li>
   </span>
 </ul> 
</div><!--./user-nav -->
 
</div><!--./profile -->
<?php }?>



<?php
/**
* Places user login, registration and new user section
* Has user registration form
* Has User login form
* Has guest registration form
*/
require ( 'php/find_page_url.php' ); // finds current page url
$curent_url = find_current_page_url();

// http://victorlivery.com/payment.php
// http://localhost/victorlivery.com/payment.php
if(!isset($_SESSION['is_user_logged_in']) && $curent_url == 'http://localhost/victorlivery.com/payment.php' ) {
	require ( 'template_parts/new_customer_reg.php' ); 
	}
	else {
		require( 'template_parts/login_reg_section.php' );
		}
?>



</div> <!-- ./container -->





<div class="container">



