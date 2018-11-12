<?php 
 class SendEamil{
	
	public $sender ="user_registration@victorlivery.com";
	
		public function mailRegistrationConfirm($to, $fname) {
				$subject = "Registration Confirmation";
				$message = '<body>
 <table width="100%" border="0" cellpadding="5" cellspacing="2">
	 <tr>
   		 <td colspan="3" bgcolor="#CC6600">
   			 <h2 style="color:#FFF"> Registration Confirmation </h2> 
   	    </td>
  	</tr>
                           
 <tr bgcolor="#FFF">
  	<td>
   	<h4> Hello '.$fname.'  </h4>
    <p>Thank you for registering
	with Victor Livery. We are excited to have you! </p>
    
    <p> In Future use your email
		address as an user name to login for booking your car.</p>
   	</td>
 </tr>
 
	<tr>
   		 <td colspan="3" bgcolor="#CC6600">
   			 <h5 style="color:#FFF"> Contact: 781-346-8077, 781-521-6430 </h5> 
   	      </td>
  	</tr>
    
    <tr>
   		 <td colspan="3" bgcolor="#CC6600">
   			 <h5 style="color:#FFF">  &copy;victorlivery.com</h5> 
   	      </td>
  	</tr>
    
</table>
</body>';
					
$message = wordwrap($message, 70, "\r\n");
		// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'To: MD Khan <md.monir.khan707@gmail.com>, Monir Khan <monirkhan707@gmail.com@example.com>' . "\r\n";
$headers .= 'From: Victor Livery<user_registration@victorlivery.com>' . "\r\n";
$headers .= 'Reply-To: MD Khan <md.monir.khan707@gmail.com>' . "\r\n" ;
mail($to, $subject, $message, $headers); //This method sends the mail.
}
		
		
		
		
		//sending message after successful payment 	
		public function mailOrderConfermation($to, $name,
											 $totalPayable, $cartype, $distance, $estfare, $gratutiy, $airposttoll,
											 $estra, $night, $serviceNmae, $date, $time, $fromAddress,
											 $toAddress, $pasenger, $luggage, $confrm_num) {
			 		 
				$subject = "Order Confirmation and Details";
				$message = '<body>
							<table width="100%" border="0" cellpadding="5" cellspacing="2">
							
 					 <tr>
   					 	<td colspan="3" bgcolor="#009933">
					 		<h1 style="margin:2px; padding:4px; color:#FFF">Victor Livery</h1>	
					 	</td>
  					</tr>
  				<tr bgcolor="#F0F0F0">
    				<td colspan="2" bgcolor="#F0F0F0">
    					<h2 style="margin:2px; padding:4px; color:#009933">Order Confirmatrion!</h2>
    				</td>
   					 <td width="54%"><strong style="color:#009933">
					 Confirmation number: '.$confrm_num.' </strong>
					 </td>
  			</tr>
 			 <tr>
   			 <td colspan="3">
   				 <h3 style="margin:0; color:#009933">Hello '.$name.'</h3>
    			<p style="margin:2px;"> Thank you for shopping with us. Your orderdetails are included below.
				 If you would like to view the status of your order or make any change to it, Please visit your account 
				 profile. (if guest: call us to this number: 617-866-3824)</p>
   				 </td>
 		   </tr>
		  <tr>
   			 <td colspan="3" bgcolor="#F0F0F0"><h3 style="margin:0; color:#009933">Order Details:</h3></td>
  		</tr>
 		 <tr>
   		 <td colspan="3" bgcolor="#F0F0F0"><h4 style="margin:0;color:#009933">
		 <strong>Service Name: '.$serviceNmae.'</strong></h4>
		 </td>
  		</tr>
		
 		 <tr bgcolor="#009933">     
   			 <td colspan="3" bgcolor="#F0F0F0"><strong style="color:#009933">Vheicle And Rate</strong>
  				  <table width="100%" border="0">
				  
      					  <tr bgcolor="#E9E9E9">
                         <td width="22%">You Paid</td>
                         <td width="78%">$ '.$totalPayable.'</td>
                          </tr>
						  
						   <tr bgcolor="#E9E9E9">
                         <td width="22%">Vehicle Type</td>
                         <td width="78%">'.$cartype.'</td>
                          </tr>
						  
     					  <tr bgcolor="#E9E9E9">
                         <td width="22%">Estimated Fare</td>
                         <td width="78%">$ '.$estfare.'</td>
                          </tr>
						  						 
						 
      				<tr bgcolor="#E9E9E9">
       				 <td><label>Gratuity</label> </td>
      				  <td>  <span>$ </span> '.$gratutiy.' </td>
    			  </tr>
				    					
						  
						<tr bgcolor="#E9E9E9">
                         <td width="22%">Extra</td>
                         <td width="78%">$ '.$estra.'</td>
                          </tr>
		 
      <tr bgcolor="#DFDFDF">
        <td><label>Night Charge</label> </td>
        <td><span>$ </span>'.$night.'</td>
      </tr>
    </table>
    </td>
  </tr>
  
  	<tr bgcolor="#009933">
      <td colspan="3" bgcolor="#F0F0F0"><strong style="color:#009933">Booking Details</strong>
      		<table width="100%" border="0">
      <tr bgcolor="#E9E9E9">
        <td width="22%">Date</td>
        <td width="78%">'.$date.'</td>
      </tr>
      <tr bgcolor="#E9E9E9">
        <td>Time</td>
        <td> '.$time.'</td>
      </tr>
      <tr bgcolor="#E9E9E9">
        <td><label>Pick-Up Address:</label>
          <label> </label></td>
        <td><label>'.$fromAddress.'</label>
          <br /></td>
      </tr>
      <tr bgcolor="#E9E9E9">
        <td><label>Drop-Off Address:</label>
          <br /></td>
        <td><label> '.$toAddress.'</label>
          <br /></td>
      </tr>
      <tr bgcolor="#E9E9E9">
        <td><label>No.of Passengers</label>
          <br /></td>
        <td>'.$pasenger.'</td>
      </tr>
      <tr bgcolor="#E9E9E9">
        <td><label>No. of Luggage:</label>
          <br /></td>
        <td>'.$luggage.'</td>
      </tr>
    </table>
      </td>
  </tr>
  
  
  <tr>
    <td colspan="3" bgcolor="#009933"><h1 style="margin:2px; padding:4px; color:#FFF"> 
      <h3> Contact: 781-346-8077, 781-521-6430</h3>  
	  <a href="http://victorlivery.com/"> <h3>  &copy;victorlivery.com </h3></a>  
     
    </td>
  </tr>
</table>

</body>
</html>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'To: MD Khan <md.monir.khan707@gmail.com>, Monir Khan <monirkhan707@gmail.com@example.com>' . "\r\n";
$headers .= 'From: Victor Livery<carbooking_us@carbooking.us>' . "\r\n";
$headers .= 'Reply-To: MD Khan <md.monir.khan707@gmail.com>' . "\r\n" ;
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";


      mail($to,$subject,$message,$headers);
			
}
			
	} //clsaa


 /**
$obs = new SendEamil();
echo $obs->mailOrderConfermation("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16","17");	
 */

