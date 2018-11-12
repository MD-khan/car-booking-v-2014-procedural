</div> <!-- ./container -->



<footer class="site-footer"> 

<!-- Site Technology's information  -->
<div class="row"> 

	<div class="col-sm-6">
    	<div class="row">
        	<div class="col-xs-4 col-sm-4">
            	<h3> Payment GateWay: </h3>
                
               <a href="<?=PAYMENT_GATE_WAY_WEB_LINK?>"> <i class="fa fa-cc-stripe fa-3x"></i>  </a>  
             </div>
             
            <div class="col-xs-8 col-sm-8">
            	 <h3> We Accept: </h3>
                  <a href="#"> <i class="fa fa-cc-visa fa-3x"></i> </a>
                  <a href="#"><i class="fa fa-cc-mastercard fa-3x"></i> </a>
                  <a href="#"><i class="fa fa-cc-amex fa-3x"></i> </a>
                  <a href="#"> <i class="fa fa-cc-discover fa-3x"></i> </a>
                  <a href="#"><i class="fa fa-cc-paypal fa-3x"></i> </a>
                 
             </div>
         </div>
      
     </div>
    
    <div class="col-sm-6">
     <h3> BUILT WITH: </h3>
       <a href=""> <i class="fa fa-google fa-3x"> </i>   </a>
     <a href=""> <i class="fa fa-css3 fa-3x"> </i> </a>
     <a href=""> <i class="fa fa-html5 fa-3x"> </i> </a>
      <a href=""> <i class="fa fa-linux fa-3x"> </i> </a>
      <img src="images/twitter-bootstrap.png" class="img-circle"  alt="Bootstrap" width="50" height="50"> 
     <img src="images/jQuery-logo.png" class="img-circle"  alt="Bootstrap" width="50" height="50"> 
     
    </div>
   
     	 
</div>


<!-- Copy Write Information -->
<div class="row copy-write-info"> 
    <h3> <i class="fa fa-copyright"></i> <?php echo date('Y')?> <?=SITE_TITLE?></h3>
	 
</div>



<!-- Developer Information -->
<div class="row developer-info"> 
    <h4>Powered By <a href="<?=DEVELOPER_WEB_SITE?>"> <?=DEVELOPER?> </a>  </h4>
    <h4> Contact to Developer: <i class="fa fa-phone"></i> <?=DEVELOPER_PHONE?> </h4>	 
</div>


</footer> <!-- ./site-footer -->


 <!-- Bootstrap core JavaScript ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src="//code.jquery.com/jquery-1.10.2.js"> </script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"> </script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"> </script>

<script src="js/google-auto-address.js"> </script>

<script src="js/formvalidation.js"> </script>

<script src="js/headeslider.js"> </script>



     <!-- use jssor.slider.mini.js (40KB) instead for release -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="jassor.js"></script>
    <script type="text/javascript" src="jasor.slider.js"></script>


<script>
$(document).ready(function(e) {
	
 //slider 
 // source: http://www.sitepoint.com/web-foundations/making-simple-image-slider-html-css-jquery/
 
 var index = 0,
  slides = $('.header-slider div'),
  totalSlide = slides.length;

function slideSliding() {
  var item = $('.header-slider div').eq(index);
   slides.hide();
   item.css('display','inline');
}

var autoSlide = setInterval(function() {
  index += 1;
  if (index > totalSlide - 1) {
    index = 0;
  }
  slideSliding();
}, 5000);


$('.next').click(function() {
  //clearInterval(autoSlide); not usefull cx it stops auto slide
  index += 1;
  if (index > totalSlide - 1) {
    index = 0;
  }
  slideSliding();
});

$('.prev').click(function() {
  //clearInterval(autoSlide);
  index -= 1;
  if (index < 0) {
    index = totalSlide - 1;
  }
  slideSliding();
});
 
 //----------------

//----------toggle input address-------------------------
$("#servicecat").change(function(){
	var servicecat = $("#servicecat").val();
	
if(servicecat==0){ 
$("#autoaddress1").html("<input class='form-control input-sm' name='fromAddress' type='text' id='fromAddress' 	placeholder='Please Enter street no. name, city, zip code' />");
initialize2();

$("#autoaddress2").html("<input class='form-control input-sm' name='toAddress' type='text' id='toAddress' placeholder='Please Enter street no. name, city, zip code' />");
initialize1();
$('#hidewhenhourly').show();
$('#frmgrphourly').hide();
}
	
if(servicecat==1){
$("#autoaddress1").html("<input class='form-control input-sm' name='fromAddress' type='text' id='fromAddress' placeholder='Please Enter street no. name, city, zip code' />");
		 
$("#autoaddress2").html("<select class='form-control input-sm' name='toAddress' id='toAddress'><option value=''>Select Airport</option><option         value='Logan International Airport, Boston, MA'>Boston Logan International Airport</option><option    value='Manchester, NH 03103'>Manchester Airport  NH</option><option value='200 Hanscom Dr, Ma 01730'>Laurence G Hanscom Field Bedford MA</option><option value='2000 Post Rd Warwick, Rhode Island 02886'>T F Green State Airport Rhode Island</option><option value='jfk Access Road New York ny  10010'>John  F Kennedy Airport New York  </option><option value='Ditmars Blvd, New York 11371'>LaGuardia Airport New York </option></select>");

$('#fromAddress').focus();
initialize2();
$('#hidewhenhourly').show();
$('#frmgrphourly').hide();
}//sercive type to airport

if(servicecat==2){
$("#autoaddress1").html("<select  class='form-control input-sm' name='fromAddress' id='fromAddress' ><option value=''>Select Airport</option><option value='Logan International Airport, Boston, MA'>Boston Logan International Airport</option><option value='Manchester, NH 03103'>Manchester Airport  NH</option><option value='200 Hanscom Dr, Ma 01730'>Laurence G Hanscom Field Bedford MA</option><option value='2000 Post Rd Warwick, Rhode Island 02886'>T F Green State Airport Rhode Island</option><option value='jfk Access Road New York ny  10010'>John  F Kennedy Airport New York  </option><option value='Ditmars Blvd, New York 11371'>LaGuardia Airport New York </option></select>");
		
$("#autoaddress2").html("<input class='form-control input-sm' name='toAddress' type='text' id='toAddress' placeholder='Please Enter street no. name, city, zip code' />");
$('#fromAddress').focus();		
initialize3();
$('#hidewhenhourly').show();
$('#frmgrphourly').hide();
}//service type from airport


if((servicecat==4) || (servicecat==5)){ //door to door and logn distance
$("#autoaddress1").html("<input class='form-control input-sm' name='fromAddress' type='text' id='fromAddress' placeholder='Please Enter street no. name, city, zip code' />");
	
$("#autoaddress2").html("<input class='form-control input-sm' name='toAddress' type='text' id='toAddress' placeholder='Please Enter street no. name, city, zip code' />");

$('#hidewhenhourly').show();
$('#frmgrphourly').hide();
$("#fromAddress").focus();
initialize1();
}

if(servicecat==3) {
	$('#frmgrphourly').show();
	$('#hidewhenhourly').hide();
	 $("#autoaddress2").html("<input class='form-control input-sm' name='toAddress' type='text' id='toAddress' value='lo' />");
	$("#autoaddress1").html("<input class='form-control input-sm' name='fromAddress' type='text' id='fromAddress' placeholder='Please Enter street no. name, city, zip code' />");
	initialize2();
	
	
	}
});//-------End of input toggle------------------------------

//--------Toggle Maps and whychose us---------------------------------

$('#autoaddress1').one('change click',function (e) { 
	$('#whychoseus').fadeOut();
	$('#route-text').fadeIn(5000);
	$('#map-canvas').fadeIn(5000).css("display","block");
	  initialize();  
	  $('#map-canvas').fadeOut(); 
	});
$('#autoaddress2').bind('change click mousemove mousedown mouseleave blur focus focusin focusout',function () {
	$('#pickupdate').change();
	   calcRoute();
	  // getDistance();
	});


//----------datepicker-------------------------------------------------
$('#pickupdate').datepicker({  
            inline: true,  
            showOtherMonths: true,  
			minDate: 0,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],  
        });  
//---------------------------------------------------------------	

//-----toggle vheicle type passenger and l-----
	$('#vehicle_type').change(function() {
			var cartype = $('#vehicle_type').val();
			if( cartype == "2/3-passenger Sedan") {
				$("#selectpassangers").html("<select  class='form-control input-sm' name='passengers' id='passengers' > <option value=''>Number of Passengers</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option></select>");
				$("#selectluggage").html("<select  class='form-control input-sm' name='luggage' id='luggage'> <option value=''>Number of Luggage</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>");
		
				}
		if( cartype == "6-passenger Mini Van") {
				$("#selectpassangers").html("<select  class='form-control input-sm' name='passengers' id='passengers' > <option value=''>Number of Passengers</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option></select>");
				
				$("#selectluggage").html("<select  class='form-control input-sm' name='luggage' id='luggage'> <option value=''>Number of Luggage</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option></select>");
				}		
		
		});
//---------------------------------------------------------------

//------------------------------------------------------------
	//-------Extra seat Expand
	$('#extracarseat').change(function() {
		$('#expand-extraseat').toggle();
		
	});
	
	//---Stop over expand
	$('#stop-over').change(function() {
     $('#expand-stop-over').toggle();
	});
	
	//-------modal for showing quote
	
	//-------modal for registration
	 $('.btnregistration').click(function(){
	 	$('.show-Registraion').modal('show');
		$('.customer_fname').focus();
	});
  
 //Validate registration form
 
	
 $('.customer_fname').blur(function(e) {
	 	e.preventDefault();
	 var inValue = $(this).val();
	 if( !inValue.match(/^[A-Za-z]{2,20}$/)  ) {
		 	    $('.c-fname').addClass('glyphicon glyphicon-remove form-control-feedback');
				$('.customer_fname').css("border-color","#F00");
				$('.err-c-fname').show().html("<span>No number, space, and less than 2 Letter please</span>") 	
		    //   $('.customer_fname').focus();	
	} else {			   		 
	   		$('.c-fname').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-fname').hide();
			$('.customer_fname').css("border-color","#0F0");	 
		   	$('.c-fname').addClass('glyphicon glyphicon-ok form-control-feedback error');
			$('.customer_lname').focus();
			}
			
	
});
 
 var iscustomer = false;
$('.customer_lname').blur(function(e) {
	e.preventDefault();
	 var inValue = $(this).val();
	if( !inValue.match(/^[a-zA-Z'-]{2,20}$/)  ) {
  		$('.c-lname').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.customer_lname').css("border-color","#F00");
		$('.err-c-lname').show().html("<span>No number, space, and less than 2 Letter please</span>")
	//	$(this).focus()
		 
	} else {			   		 
	   		$('.c-lname').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-lname').hide();
			$('.customer_lname').css("border-color","#0F0");	 
		   	$('.c-lname').addClass('glyphicon glyphicon-ok form-control-feedback error');
			$('.customer_email').focus();
			}
});

$('.customer_email').blur(function(e) {
	 var inValue = $(this).val();
	
	if( !inValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) ){
		 	
  		$('.c-email').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.customer_email').css("border-color","#F00");
		$('.err-c-email').html("");
		 $('.user-exist').hide();
		 $('.user-not-exist').hide();
		 $('.err-c-email').show().html("<span>Sorry! Not a Valid Email</span>")	
		 return false;
		//$(this).focus();
	} else {			   		 
	   		$('.c-email').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-email').hide();
			$('.customer_email').css("border-color","#0F0");	 
		   	$('.c-email').addClass('glyphicon glyphicon-ok form-control-feedback error');
			$('.customer_address').focus();
			 
			 if($('.c-email').hasClass('glyphicon-ok')) {
			 var DATA = 'inValue='+inValue;
			 $.ajax({
		  	type: "POST",
			url: "php/check_customer_existance.php",
			data: DATA,
			cache: false,
			beforeSend: function() {
       		 $('.chk-c-email').show().html("<span> <img src='images/ajax-loader.gif'>Cheking Availability...</span>")	
	 			},
			success: function(exist){
				if(exist =="UserExist") {
					$('.user-exist').show().css("color","#840000").html("You Already is our member, Please Login");
					$('.user-not-exist').html("");	
					iscustomer = true;
					//alert(iscustomer);
					//disabling submit button
										}
					if(exist =="notexist") {
						$('.user-exist').html("");
						$('.user-not-exist').show().css("color","#007500").html("Yes: available, Go Ahead");
				 		//alert("user not exsit");
						}
			},//success
			 complete: function(){
       		 $('.chk-c-email').hide();
   				 },
				 
				 
					  
		  }); 
		// alert("ok but user already exist");
		 }
			
	}//else 
	
});
  
  $('.customer_address').blur(function(e) {
	 e.preventDefault();
	  var inValue = $(this).val();
	if( (!inValue.match(/^[a-zA-Z]/)) && !(inValue.match(/[0-9]/) ) ) { //alphanumeric
  		$('.c-address').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.customer_address').css("border-color","#F00");	
		$('.err-c-address').show().html("<span>Sorry! addrees not valid</span>")	
		//$(this).focus();
	} else {			   		 
	   		$('.c-address').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-address').hide();
			$('.customer_address').css("border-color","#0F0");	 
		   	$('.c-address').addClass('glyphicon glyphicon-ok form-control-feedback error');
			}
});

$('.customer_phone').blur(function(e) {
	 e.preventDefault();
	   var inValue = $(this).val();
		if( !inValue.match(/^[0-9-]{10,20}$/)  ) {
  		$('.c-phone').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.customer_phone').css("border-color","#F00");
		$('.err-c-phone').show().html("<span>Sorry! Not a Valid Phone Number</span>")	
		//$('.customer_phone').focus();	
	} else {			   		 
	   		$('.c-phone').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-phone').hide();	
			$('.customer_phone').css("border-color","#0F0");	 
		   	$('.c-phone').addClass('glyphicon glyphicon-ok form-control-feedback error');
			$('.customer_pass').focus();
			}
});

$('.customer_pass').blur(function(e) {
	 e.preventDefault();
	 var inValue = $(this).val();
	 //should contain at least one digit (?=.*\d)    
      //should contain at least one lower case (?=.*[a-z]) 
      //should contain at least one upper case (?=.*[A-Z]) 
      //should contain at least 6 from the mentioned characters [a-zA-Z0-9]{8,} 
	if( !inValue.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/)  ) {
     	$('.c-pass').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.customer_pass').css("border-color","#F00");	
	$('.err-c-pass').show().html("<span>At least one upper and lower case, and minimum 6 characters please</span>")
		//$('.customer_pass').focus();
 	} else {			   		 
	   		$('.c-pass').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-pass').hide();
			$('.customer_pass').css("border-color","#0F0");	 
		   	$('.c-pass').addClass('glyphicon glyphicon-ok form-control-feedback error');
			 $('.customer_re_pass').focus();
			}
});

$('.customer_re_pass').blur(function(e) {
	 e.preventDefault();
	 	var inValue = $(this).val();
		if( inValue !== $('.customer_pass').val() ) {
  		$('.c-repass').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.customer_re_pass').css("border-color","#F00");	
		$('.err-c-repass').show().html("<span>Password Didn't Match</span>")	
		$('.customer_pass').focus();
	} else {			   		 
	   		$('.c-repass').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-c-repass').hide();
			$('.customer_re_pass').css("border-color","#0F0");	 
		   	$('.c-repass').addClass('glyphicon glyphicon-ok form-control-feedback error');
			 
			}

});

 $('.btn-customer-registration').click(function(e) {
	 	//console.log(iscustomer);
	      if(iscustomer) { //customer exist
	   $('.top-message').css("color","#F00").html("You already is our member: please login")
	  e.preventDefault();
	  } else {
	   $('.frm-registration').each(function(index, element) {
        var ok = $(this).find('.glyphicon-ok');
		//var not_ok = $(this).find('input');
			if(ok.length ==7) {
				var DATA = $('.frm-registration').serializeArray();
				//var URL = "php/processing_registraion";
				$.ajax({
					data: DATA,
					type: "POST",
					url: "php/processing_registraion.php",
					cache: false,
					success: function(response){
						if(response =="success"){
							$('.top-message').css("color","#004F00")
							.html("<h1>Thank You.Registration is done Please Log in</h1>");
							setTimeout(function(){
  						$('.show-Registraion').modal('hide')
						}, 3000);
						$('.reg-ack').css({"color":"#004F00","font-size":"16px"})
						 .html("Registration Success: Please Login");
						// console.log(DATA)
						}else {
								alert("Something wrong");
								}
						}					
					});
					
				
				}// ./if check all input are filled
			else {
				//return false;
				$('.top-message').css("color","#F00").html("Please fill all field")
				}
		//console.log(ok);
		//alert(ok.length);
    });
	}
 });//btn click
 // end of registration 



 
<!-- -----Login toggle------ -->
$('.lnkLogin').click(function() {
	$('.loginfrmcontainer').slideToggle("slow");
	});
//----procesinglogin----->
$('.btn-user-login').click(function() {
	var username = $('.cus_email').val();
	var userpass = $('.cus_pass').val();
	if( !username.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) || !userpass.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/)){
		//alert("invalide email format client");
		$('.login-ack').css("color","#B22400").html("Invalid Email or Password")
		$('.frm-customer-login').each(function(index, element) {
		$('.login-error').css("color","#B22400").addClass('glyphicon glyphicon-remove form-control-feedback');
		});
		return false;
}//if
	else {
	var DATA = 'username='+username+'&userpass='+userpass;
	  $.ajax({
			type: "POST",
			url: "php/processinglogin.php",
			data: DATA,
			cache: false,
			success: function(response){
				if(response =="success") {
					//window.location = "http://localhost/bootstrcarpro/index.php?success";
					  window.location = window.location.href;
					}
				else if(response =="notValiEmailorpass") {
					alert("notValiEmail");
					}
			  else if(response =="wrongpassorid") {
					//alert("Plsease check your user name or password");
					$('.login-ack').css("color","#B22400").html("Wrong user Name or Password");
					}
				}//success	
		})//ajax
			
	} 	//else	

});
// checking live user input on quote form

// for clearing the modal data 
function clearForm(form)
{
    $(":input",  form).each(function()
    {
    var type = this.type;
    var tag = this.tagName.toLowerCase();
    	if (type == 'text')
    	{
    	this.value = "";
    	}
    });
};

// calling clearform function
// it is important to clear the frm-shoq-quote
$('.close-quote').click( function () {
	 clearForm("#frm-show-quote");
	});


$('#btnQuote').click(function( e ) {
	e.preventDefault();
	 //calcRoute();
	
	 
	  if(frmValidation()){
		  $( "#errormsg" ).html(frmValidation());
			  errorDialog();
			 // throw'';
		 return false;
		  }
	 
	 $.ajax({
			 url: "php/show_quote.php",
			  type: "GET",
			  data: 
				'servicecat='+($('#servicecat').val())
				+"&pickupdate="+($("#pickupdate").val())
				+"&picktime="+($("#picktime").val())
				+"&fromAddress="+($("#fromAddress").val())
				+"&toAddress="+($("#toAddress").val())
				+"&passengers="+($("#passengers").val())
				+"&luggage="+($("#luggage").val())
				+"&vehicle_type="+($("#vehicle_type").val())
				+"&hour="+($("#hour").val())
				+"&infantChrg="+($("#infantChrg").val())
				+"&RegularSeatChrg="+($("#RegularSeatChrg").val())
				+"&BosterSeatChrg="+($("#BosterSeatChrg").val())
				+"&StopOverSeatChrg="+($("#StopOverSeatChrg").val()	
				), 
			 beforeSend: function() {
			  $('.gif-ajax-loader').html("<img src='images/ajax-loader1.gif'>")	
			  $('#btnQuote').html("<< Working on Your Request >>")	
	 			},
			complete:function() {
          	    $('.gif-ajax-loader').fadeOut();
				$('#btnQuote').html("Get a Quote")
				 
					
    			 },
			 success: function(result) {
					$('.show_quote_result').show().html(result)
					$("#show-quote").modal('show');
					
				 },//success
				 
			
			})
	 
	});


 // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $(".navbar-nav a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("li").addClass("currrent");
        }
    });



// Guets Bookinh 
$('.btn-continue-guest').click(function() {
	$('.show-guest-modal').modal('show');
	})


$('.btn-guest-booking').click(function() {
	 
	$('.frm-guest-booking').each(function(index, element) { 
	 var ok = $(this).find('.glyphicon-ok');
	 	if(ok.length == 4) {
				//geting data
				var dataArray = $('.frm-guest-booking').serializeArray(); 	
				//console.log(dataArray);			
				$.ajax({
					url: "php/process_guest_booking.php",
					data: dataArray,
					type: "POST",
					cache:false,
					beforeSend: function() {
       				$('.btn-guest-booking')
						.html("<span> <img src='images/ajax-loader.gif'>Working on Your request...</span>")	
					},
					success: function(response) {
						if(response == "success") {
							window.location = "http://localhost/victorlivery.com/guest_payment.php";
						 // window.location = "http://localhost/victorlivery.com/guest_payment.php";
							}else {
								alert("Something Went Wrong");
								}
							
						}//success
					
					})
				} else {
					$('.error-in-guest-frm').show().css("color","#F00")
					.html("Opps! either field(s) empty or data invalid");
					return false;
					}
	});//each
});


// continue as a guest
 $('.guest-name').blur(function(e) {
	 	e.preventDefault();
	 var inValue = $(this).val();
	 if( !inValue.match(/^[A-Za-z]{2,500}/)  ) {
		 	    $('.g-guest-name').addClass('glyphicon glyphicon-remove form-control-feedback');
				$('.guest-name').css("border-color","#F00");
				$('.err-g-guest-name').show().html("<span>No number, space, and less than 2 Letter please</span>") 	
		    //   $('.customer_fname').focus();	
	} else {			   		 
	   		$('.g-guest-name').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-g-guest-name').hide();
			$('.guest-name').css("border-color","#0F0");	 
		   	$('.g-guest-name').addClass('glyphicon glyphicon-ok form-control-feedback error');
			$('.guest_email').focus();
			}
			
});

$('.guest_email').blur(function(e) {
	 var inValue = $(this).val();
	
	if( !inValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) ){
		 	
  		$('.g-guest_email').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.guest_email').css("border-color","#F00");
		$('.err-g-guest_email').html("");
		$('.err-g-guest_email').show().html("<span>Sorry! Not a Valid Email</span>")	
		 return false;
		$(this).focus();
	} else {			   		 
	   		$('.g-guest_email').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-g-guest_email').hide();
			$('.guest_email').css("border-color","#0F0");	 
		   	$('.g-guest_email').addClass('glyphicon glyphicon-ok form-control-feedback error');
			$('.guest_address').focus();
			 
	}
	
});

 $('.guest_address').blur(function(e) {
	 e.preventDefault();
	  var inValue = $(this).val();
	if( (!inValue.match(/^[a-zA-Z]/)) && !(inValue.match(/[0-9]/) ) ) { //alphanumeric
  		$('.g-address').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.guest_address').css("border-color","#F00");	
		$('.err-g-address').show().html("<span>Sorry! addrees not valid</span>")	
		//$(this).focus();
	} else {			   		 
	   		$('.g-address').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-g-address').hide();
			$('.guest_address').css("border-color","#0F0");	 
		   	$('.g-address').addClass('glyphicon glyphicon-ok form-control-feedback error');
			}
});


$('.guest_phone').blur(function(e) {
	 e.preventDefault();
	   var inValue = $(this).val();
		if( !inValue.match(/^[0-9-]{10,20}$/)  ) {
  		$('g-phone').addClass('glyphicon glyphicon-remove form-control-feedback');
		$('.guest_phone').css("border-color","#F00");
		$('.err-g-phone').show().html("<span>Sorry! Not a Valid Phone Number</span>")	
		//$('.customer_phone').focus();	
	} else {			   		 
	   		$('.g-phone').removeClass('glyphicon glyphicon-remove form-control-feedback');
			$('.err-g-phone').hide();	
			$('.guest_phone').css("border-color","#0F0");	 
		   	$('.g-phone').addClass('glyphicon glyphicon-ok form-control-feedback error');
		}
});
	

// User Account 
$('.account_home').click( function() {
	$('.account_home').addClass('active');
	})	
	
	
	
});//document
 </script>

 
   
</body>
</html>