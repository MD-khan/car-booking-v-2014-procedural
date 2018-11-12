<?php
	include('class.vehicleservicecost.php');  
	include('class.sevicecosttoairport.php'); 
	include('class.servicecostfromairport.php');
	include('class.message.php'); 
	include('distance_calculation.php');
	include_once('session_start.php');
	sec_session_start();
	 
	 if( ! isset($_GET['servicecat']) ) {
		 header( 'location: ../hackertracer.php?unauthorized_user' );
		 }
	
	$serviceType = $_GET['servicecat'];
	$datepicker = $_GET['pickupdate'];
	$picktime = $_GET['picktime'];
	$fromAddress = $_GET['fromAddress'];
	
	$toAddress  = $_GET['toAddress'];
	$hour = $_REQUEST['hour'];
	
	$passengers = $_GET['passengers'];
	$luggage = $_GET['luggage'];
	$vehicle_type = $_GET['vehicle_type'];
	
	//$distance = $_GET['distance'];
	
	$infantChrg = $_GET['infantChrg'];
	$RegularSeatChrg = $_GET['RegularSeatChrg'];
	$BosterSeatChrg = $_GET['BosterSeatChrg'];
	$StopOverSeatChrg = $_GET['StopOverSeatChrg'];

//caling distance function

if( $hour ) {
	$distance = 0;
	} else {
   $distance = get_Distance ( $fromAddress , $toAddress );
	} 

$serviceFare =  new VehicleServiceCost();

$serviceFare->setDistance($distance);
$_distance = $serviceFare->getDistance(); //distance


$serviceFare->getFare();
$_estimatedFare = $serviceFare->getEstimatedFare(); // estimited fare
$_gratuity = $serviceFare->getGratuity();

// Calculate Extra Cost
$extraSeatCost = $infantChrg + $RegularSeatChrg + $BosterSeatChrg + $StopOverSeatChrg;
$serviceFare->setExtraSeatCost($extraSeatCost);
$extraCost = $serviceFare->getExtraseatCost();

$_extraCost = "";
if ($extraCost == true) {
	$_extraCost = '<div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Extra Cost:</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="extraCost" value="$'.$extraCost.'" disabled />
                        </div>
                    </div><!--./form-group -->';
	}

// Stop over Cost
$serviceFare->setStopOverCost($StopOverSeatChrg);
$_stopOvercost = $serviceFare->getStopOverCost();
$extraCost = $extraSeatCost + $_stopOvercost;
$serviceFare->setNightCharge($picktime); // customer desired time
$_nightCharge = $serviceFare->getNightCharge(); // $10 would be added if time is between 10pm to 6am



//---------------------------------------------------------------------------------
// Generate Message based on customer
//--------------------------------------------------------------------------------------------------------------------------
$messageBookingTime = new Message;
$messageExceedPassanger = new Message;
$messageExceedLuggage = new Message;
$messageMiniMumPay = new Message;


//Bookinh time and date 
$messageBookingTime->checkBookingTime($datepicker,$picktime); 
$msg1 = $messageBookingTime->_msg; // if user select booking time 3 hours erlier

$messageMiniMumPay->msgMinimumPyment();
$msg2 = $messageMiniMumPay->_msg; //minimum payment Message 

$message="";
$btn_contionue=""; //button will be disabled is got any error
					
if ($msg1 == true) {
	$message = '<div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Message:</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        '.$msg1.'
                        </div>
                    </div><!--./form-group -->';
	} else {
		$message = '<div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Message:</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        '.$msg2.'
                        </div>
                    </div><!--./form-group -->';
					
		 $btn_contionue ='<button type="submit" class="btn btn-default comon-button" id="btn-continue-booking">
                     Continue to Booking
                    <span class="glyphicon glyphicon-chevron-right"> </span>
                    </button>';
		}

$_airportToll = 0;
$_hourlyRate = 0;


if($serviceType == 1) {
		$serviceAirport = new ServiceCostToAirport;
		 $serviceAirport->setAirportName($toAddress);
		 $_airportToll = $serviceAirport->getAirportToll();
echo '
   					
 <form  action="faredetails.php" class="form-horizontal" name="frm-show-quote" id="frm-show-quote" method="post">
        <h3> Ride To Airport </h3>
                    	<div class="form-group">
                        <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Total Distance</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
				<input type="text" class="form-control" name="distance" id="" value="'.$_distance.' Miles" 		  readonly="readonly" />
                        </div>
                    </div><!--./form-group -->
                    
                    <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Estimated Fare</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="estimatedFare" value="$'.$_estimatedFare.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Gratuity :</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="gratuity" value="$'.$_gratuity.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Airport TollTax:</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="airportToll" value="$'.$_airportToll.'" disabled />
                        </div>
                    </div><!--./form-group -->
                   
				    '.$_extraCost.'
					'.$message.'
					 <div class="modal-footer">
                 	<button type="button" class="btn btn-default close" data-dismiss="modal"
                 	 id="btn-change-quote" style="float:left">
                 	   Change
                    </button>
                     '.$btn_contionue.'
                    
                  </div> 				
                    </form>  
                                  
               
';
}

//-------------------------------
if($serviceType == 2) {
		$serviceAirport = new ServiceCostFromAirport;
		 $serviceAirport->setAirportName($fromAddress);
		 $_airportToll = $serviceAirport->getAirportToll();


echo '<form action="faredetails.php" class="form-horizontal" name="frm-show-quote" id="frm-show-quote" method="post">
                     <h3> Ride From Airport </h3>
                    	<div class="form-group">
                        <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Total Distance</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
				<input type="text" class="form-control" name="distance" id="" value="'.$_distance.' Miles" readonly="readonly" />
                        </div>
                    </div><!--./form-group -->
                    
                    <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Estimated Fare</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="estimatedFare" value="$'.$_estimatedFare.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Gratuity :</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="gratuity" value="$'.$_gratuity.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Airport TollTax:</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="airportToll" value="$'.$_airportToll.'" disabled />
                        </div>
                    </div><!--./form-group -->
                   
				    '.$_extraCost.'
					'.$message.'
					 <div class="modal-footer">
                 	<button type="button" class="btn btn-default close" data-dismiss="modal"
                 	 id="btn-change-quote" style="float:left">
                 	   Change
                    </button>
                     '.$btn_contionue.'
                    
                  </div> 				
                    </form>  
                                  
               
';
}
//--------------------------------------------------------------------------------
if($serviceType == 3) {
		 $_hourlyRate = $serviceFare->getHourlyRate();
		 $_estimatedFare = $_hourlyRate * $hour;
		 $_gratuity = $_estimatedFare * .2;
echo ' <form   action="faredetails.php" class="form-horizontal" name="frm-show-quote" id="frm-show-quote" method="post">
         <h3> Hourly Service </h3>
          <div class="form-group">
           <div class="col-sm-3 col-xs-6"> 
            <label class="control-label">Total Hour(s)</label>
             </div>
              <div class=" col-xs-6 col-sm-6">
<input type="text" class="form-control" name="totalhours" id="" value="'.$hour.'" 		  readonly="readonly" />
       </div>
                    </div><!--./form-group -->
                    
                    <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Estimated Fare</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="estimatedFare" value="$'.$_estimatedFare.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Gratuity :</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="gratuity" value="$'.$_gratuity.'" disabled />
                        </div>
                   </div><!--./form-group -->
                              
                   
				    '.$_extraCost.'
					'.$message.'
					 <div class="modal-footer">
                 	<button type="button" class="btn btn-default close" data-dismiss="modal"
                 	 id="btn-change-quote" style="float:left">
                 	   Change
                    </button>
                     '.$btn_contionue.'
                    
                  </div> 				
                    </form>  
                                  
               
';
}

if($serviceType == 4) {//Door to Door Service
		
echo '<form action="faredetails.php" class="form-horizontal" name="frm-show-quote" id="frm-show-quote" method="post">
                     <h3> Door To Door Service </h3>
                    	<div class="form-group">
                        <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Total Distance</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
				<input type="text" class="form-control" name="distance" id="" value="'.$_distance.' Miles" 		  readonly="readonly" />
                        </div>
                    </div><!--./form-group -->
                    
                    <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Estimated Fare</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="estimatedFare" value="$'.$_estimatedFare.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Gratuity :</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="gratuity" value="$'.$_gratuity.'" disabled />
                        </div>
                   </div><!--./form-group -->
                                                            
				    '.$_extraCost.'
					'.$message.'
					 <div class="modal-footer">
                 	<button type="button" class="btn btn-default close" data-dismiss="modal"
                 	 id="btn-change-quote" style="float:left">
                 	   Change
                    </button>
                     '.$btn_contionue.'
                    
                  </div> 				
                    </form>  
                                  
               
';
}


if($serviceType == 5) {//Long Distance Service
		
echo '<form action="faredetails.php" class="form-horizontal" name="frm-show-quote" id="frm-show-quote" method="post">
                     <h3> Long Distance Service </h3>
                    	<div class="form-group">
                        <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Total Distance</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
				<input type="text" class="form-control" name="distance" id="" value="'.$_distance.' Miles" 		  readonly="readonly" />
                        </div>
                    </div><!--./form-group -->
                    
                    <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Estimated Fare</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="estimatedFare" value="$'.$_estimatedFare.'" disabled />
                        </div>
                   </div><!--./form-group -->
                    
                     <div class="form-group">
                         <div class="col-sm-3 col-xs-6"> 
                        <label class="control-label">Gratuity :</label>
                        </div>
                        <div class=" col-xs-6 col-sm-6">
                        <input type="text" class="form-control" name="gratuity" value="$'.$_gratuity.'" disabled />
                        </div>
                   </div><!--./form-group -->
                                                            
				    '.$_extraCost.'
					'.$message.'
					 <div class="modal-footer">
                 	<button type="button" class="btn btn-default close" data-dismiss="modal"
                 	 id="btn-change-quote" style="float:left">
                 	   Change
                    </button>
                     '.$btn_contionue.'
                    
                  </div> 				
                    </form>  
                                  
               
';
}

//assing session variable
 
$_SESSION['servicecat'] = $serviceType;
$_SESSION['datepicker'] = $datepicker;
$_SESSION['picktime'] = $picktime;
$_SESSION['fromAddress'] = $fromAddress;
$_SESSION['toAddress'] = $toAddress;
$_SESSION['passengers'] = $passengers;	
$_SESSION['luggage'] = $luggage;	
$_SESSION['vehicle_type'] = $vehicle_type;	
$_SESSION['distance'] = $_distance;	
$_SESSION['infantChrg'] = $infantChrg;	
$_SESSION['RegularSeatChrg'] = $RegularSeatChrg;
$_SESSION['BosterSeatChrg'] = $BosterSeatChrg;	
$_SESSION['StopOverSeatChrg'] = $StopOverSeatChrg;	
//----------------------------
//calculated variables 
//---------------------------------------
$_SESSION['_estimatedFare'] = $_estimatedFare;
$_SESSION['_gratuity'] = $_gratuity;
$_SESSION['_airportToll'] = $_airportToll;
$_SESSION['extraCost'] = $extraCost;
$_SESSION['nightCharge'] = $_nightCharge;
$_SESSION['hourlyRate'] = $_hourlyRate;	