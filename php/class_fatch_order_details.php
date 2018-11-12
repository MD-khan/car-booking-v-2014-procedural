<?php 
/**
* File: 		php/class_fatch_order_details.php
* Date: 		Feb 2, 2015
* Author: 		MD KHAN 
* Desciption:	This Class fetches user order dtails from database
*			:	This class requres three class: 
*			:	1) class.dbconnect.php and  (2 class.datafilter 
*			:   All data will be valided and sanitized before sebd to database	
* Dependency:	processing_registration.php
*			
*/
require("class.dbconnect.php");
require("class.datafilter.php");

class DataQuery{
	private $db;
	
	
		// Construction 
		public function __construct() {
			$this->db = new Dbconnection();
			$this->db = $this->db->dbCon();
		}
		
		//Retriving all customer information
		public function retriveSingleOrderInformation() {
				# using the shortcut ->query() method here since there are no variable
                # values in the select statement.
                $STH = $this->db->query('SELECT * FROM order_details, car_customer 
										WHERE car_customer.customer_email = "'.$_SESSION['c_eamil'].'"
										 AND car_customer.cus_id = order_details.cus_id 
										 ORDER BY `order_details`.`order_id` DESC ' );
 
               # setting the fetch mode
               $STH->setFetchMode(PDO::FETCH_ASSOC);
			    $row = $STH->fetch();
			   ?>
             
<div class="row account_home_details">
		<h3> Order Confirmation Number: <?=$row['order_confermation_num']?>  </h3>
        <h3> You made this order on  <?=$row['booking_time']?> </h3>
    <div class="col-xs-12 col-sm-6">
	 <div class="panel panel-default vehicle-panel"> 
     
     <div class="panel-heading">
   			 <h3>Vehicle And Rate</h3>
  		</div> <!-- ./panel-heading -->
        
        <div class="panel-body">
        
         <form class="form-horizontal">
         	 <form class="form-horizontal"> 
             	 
             <div class="form-group">
               <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Your Car</label>
                </div> <!-- ./col-sm-4 col-xs-7 -->
         
         	<div class="col-sm-8 col-xs-5">
               <?php if ( $row['car_type'] =="6-passenger Mini Van") {?>
                <img class="img-responsive" src="images/6-passenger.png"alt="6-passenger Mini Van">
                <span> 6 passenger mini van</span>
                <?php } else {?>
                 <img class="img-responsive" src="images/2-3car.png" alt="2/3-passenger Sedan">
                  <span>2/3-passenger Sedan</span>
                 <?php }?>
               
            </div> <!-- ./col-sm-8 col-xs-5 -->
      </div> <!-- ./form-group -->
         
<div class="form-group">
           
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">You Paid</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
                <div class="col-sm-8 col-xs-5">
                 <label class="control-label" style="margin-bottom:5px;">
                 <span class="glyphicon glyphicon-usd" > </span> 
				 <span style="font-size:20px; font-weight:bold">
                   <?=$row['total_paid']?> </span> </label>
                 </div> <!-- ./col-sm-8 col-xs-5 -->
                 
  </div><!--./form-group -->
  
  
   <div class="form-group faredetials-row2">
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Distance Covered</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
       <div class="col-sm-8 col-xs-5">
                 <label class="control-label">
                  <?=$row['distance']?> <span> Miles</span>
                  </label>
           </div> <!-- ./col-sm-8 col-xs-5 -->
       </div><!--./form-group -->      
     
     
     
      <div class="form-group faredetials-row1">
          
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Estimated Fare</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
          <div class="col-sm-8 col-xs-5">
                 <label class="control-label"> 
                <span class="glyphicon glyphicon-usd"></span> 
                  <?=$row['estm_fare']?></label>
                 </label>
           </div> <!-- ./col-sm-8 col-xs-5 -->
         </div><!--./form-group -->    
        
        
        
         <div class="form-group faredetials-row2">
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Gratuity</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
       <div class="col-sm-8 col-xs-5">
                 <label class="control-label">
                 <span class="glyphicon glyphicon-usd"></span> 
                  <?=$row['gratuity']?>
                  <span style="font-size:10px"> (20%)</span>
                  </label>
                 </div> <!-- ./col-sm-8 col-xs-5 -->
         </div><!--./form-group -->  
   
    <!-- if has airport toll -->
         <?php if( $row['airport_toll'] != "0" ) {?>
         <div class="form-group faredetials-row1">
         
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Airport Toll</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
          <div class="col-sm-8 col-xs-5">
                 <label class="control-label">
                 <span class="glyphicon glyphicon-usd"></span> 
                <?=$row['airport_toll']?>
                 </label>
           </div> <!-- ./col-sm-8 col-xs-5 -->
         </div><!--./form-group -->
         <?php }?>
    
      <!-- if has extra seat or stop over-->
          <?php if( $row['extra'] !="0") {?>
           <div class="form-group faredetials-row2">
           
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Extra</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
       <div class="col-sm-8 col-xs-5">
                 <label class="control-label">
                 <span class="glyphicon glyphicon-usd"></span> 
                  <?=$row['extra']?>
                  </label>
           </div> <!-- ./col-sm-8 col-xs-5 -->
         </div><!--./form-group --> 
          <?php }?>  
          
          
          
          <!-- if has nignt charge-->
            <?php if( $row['night_charg'] !="0" ) {?>
          <div class="form-group faredetials-row1">
                <div class="col-sm-4 col-xs-7"> 
                  <label class="control-label">Night Charge</label>
                 </div> <!-- ./col-sm-4 col-xs-7 -->
                 
          <div class="col-sm-8 col-xs-5">
                 <label class="control-label">
                <span class="glyphicon glyphicon-usd"></span> 
                <?=$_SESSION['nightCharge']?>
                  </label>
           </div> <!-- ./col-sm-8 col-xs-5 -->
         </div><!--./form-group -->
              <?php }?>                
         
  </form>
        
        </div> <!-- ./panel-body -->
        
        
     </div>  <!-- ./vehicle-panel -->             
   </div> <!-- ./col-xs-12 col-sm-6 -->    
   
<div class="col-xs-12 col-sm-6"> 
      <div class="panel panel-default booking-details">
		  <div class="panel-heading">
   			 <h3>Booking Details</h3>
  		</div> <!-- ./panel-heading -->
  		<div class="panel-body">
   		 
         <form class="form-horizontal"> 
         
           <div class="form-group">
           
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">Service Type</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
    		  <div class="col-sm-8 col-xs-12">
                 <label class="control-label">
                <span style="font-size:20px; font-weight:bold">  <?=$row['service_type']?> </span>
                 </label>
           </div> <!-- ./col-sm-8 col-xs-12 -->
         </div><!--./form-group -->
         
          <div class="form-group">
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">Date</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
      <div class="col-sm-8 col-xs-12">
                 <label class="control-label">
                 <span class="glyphicon glyphicon-calendar"></span>
                 <?=$row['date']?>
                 </label>
           </div> <!-- ./col-sm-8 col-xs-12 -->
         </div><!--./form-group -->
         
         <div class="form-group">
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">Time</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
        <div class="col-sm-8 col-xs-12">
                 <label class="control-label">
                 <span class="glyphicon glyphicon-time"></span>
                  <?=$row['time']?>
                  </label>
           </div> <!-- ./col-sm-8 col-xs-12 -->
         </div><!--./form-group -->
         
         
          <div class="form-group">
          
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">Pick-Up Address:</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
      	 <div class="col-sm-8 col-xs-12">
         			<label class="control-label">
                    <!-- Changing Bootstrap Icon depends on
                    	   User service selection -->
                    <?php if ( $row['service_type'] == "Ride From the Airport") { ?>
                    <span class="glyphicon glyphicon-home"></span>
                    <?=$row['frm_address']?>
                    
                    <?php } else if ( $row['service_type'] == "Ride To the Airport") {?>
                     <span class="glyphicon glyphicon-plane"></span>
                    <?=$row['frm_address']?>
                   <?php } else {?>
                    <span class="glyphicon glyphicon-upload"></span>
                    <?=$row['frm_address']?>
                    <?php }?>
                    </label>
          			 </div>
         </div><!--./form-group -->
         
         
          <div class="form-group">
          
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">Drop-Off Address:</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
         <div class="col-sm-8 col-xs-12">
                 <label class="control-label">
                   <!-- for dynamicl change the bootsrtap icon -->
                   <?php if ( $row['service_type'] == "Ride From the Airport") { ?>
                    <span class="glyphicon glyphicon-home"></span>
                      <?=$row['to_address']?>
                    
                   <?php } else if ( $row['service_type'] == "Ride To the Airport") {?>
                     <span class="glyphicon glyphicon-plane"></span>
                     <?=$row['to_address']?>
                    
					<?php } else {?>
                    <span class="glyphicon glyphicon-download"></span>
                     <?=$row['to_address']?>
                    <?php }?>
                   </label>
           </div>
         </div><!--./form-group -->
                     
          <!-- if has extra seat or stop over-->
          <div class="form-group">
          
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">No.of Passengers</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
       <div class="col-sm-8 col-xs-12">
                 <label class="control-label">
                  <span class="glyphicon glyphicon-user"> </span>
                    <?=$row['passengers']?>
                  </label>
           </div> <!-- ./col-sm-8 col-xs-12  -->
         </div><!--./form-group -->
         
         
          <!-- if has Night Charge-->
          <div class="form-group">
                <div class="col-sm-4 col-xs-12"> 
                  <label class="control-label">No. of Luggage:</label>
                 </div> <!-- ./col-sm-4 col-xs-12 -->
                 
      <div class="col-sm-8 col-xs-12">
                 <label class="control-label">
                  <span class="glyphicon glyphicon-briefcase"  > </span>
                  <?=$row['lagguess']?>
                 </label>
           </div> <!-- ./col-sm-8 col-xs-12 -->
         </div><!--./form-group -->
                      
        </form>
        
         
          
  		</div> 	<!-- ./panel-body -->
  	       
	</div> <!-- ./panel -->
    </div>
   
   
   
   
           
</div> <!-- ./ row account_home_details -->

 <?php  	   		   
			   
              
			}//retriveSingleOrderInformation()
	
			
	
	
	} // class
	
//testing 
$customerinfo = new DataQuery();
$customerinfo->retriveSingleOrderInformation();

