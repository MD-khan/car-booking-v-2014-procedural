$(document).ready(function(e) {
	$(".btnuserlogin").click( function() { //1
	
	if( $("#username").val() == "" || $("#userpass").val() == "" ) { //2
  	$(".login-ack").css({"color":"red", "font-size":"20px", "margin-left":"20px"});
    $(".login-ack").html("Please Enter both Username and Password");
  }//2
  
	var customer_name = $('#username').val();
	var customer_pass = $('#userpass').val();
	 $.ajax({//3

                type: "POST",
                url:"php/processinglogin.php",
				data:"customer_name="+customer_name+"&customer_pass="+customer_pass,
			    cache:false,
				success:function(result){
					if(result == "1"){ //redirect...
                      	//$('#logresponse').html('<span>Login xzxZXSuccess</span></br>');
						// window.location = "http://carbooking.us/";
						window.location.href=window.location.href;
						//$("#loginpopup").fadeOut();
						//$("#loginpopup").hide();
						 }
					else if(result == "2"){ //
                      	$(".login-ack").css({"color":"red", "font-size":"20px", "margin-left":"20px"});
    	 				$(".login-ack").html("Invalid Password or User Name");
						clear();
					 }
					 else {
						$(".login-ack").css({"color":"red", "font-size":"20px", "margin-left":"20px"});
    	 				$(".login-ack").html(result);
						clear();
						 }
				
				
    }});//3
			$("#user-login").submit( function() { //4
	  		 return false;	
	
		});	//4
 
});//1
    
});


function clear() {
	$("#user-login :input").each(function(index, element) {
		$(this).val("");
		$('#username').focus();		
    });
}