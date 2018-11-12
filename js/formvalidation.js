// JavaScript Document
function frmValidation() {
var error = [];
	var i = 0;
	var errormsg = "";
	
		do {
		if($("#servicecat").val() == 0){
			error.push("Please Select Service Type<br>")
			errormsg = error[i];
			 i++;
			$("#servicecat").css("background-color","yellow");
			} else {			 
				$("#servicecat").css("background-color","#FFF");
				  }
		 if($("#pickupdate").val() == ""){
			error.push("Please Select Date<br>")
			errormsg += error[i];
			 i++;
			 $("#pickupdate").css("background-color","yellow");
			} else {			 
				$("#pickupdate").css("background-color","#FFF");
				  }
			
		if($("#picktime").val() == ""){
			error.push("Please Select Time<br>")
			errormsg += error[i];
			 i++;
			$("#picktime").css("background-color","yellow");
			} else {			 
				$("#picktime").css("background-color","#FFF");
				  }
			
			if($("#fromAddress").val() == ""){
			error.push("Please Enter Pick Up address<br>")
			errormsg += error[i];
			 i++;
			 $("#fromAddress").css("background-color","yellow");
			} else {			 
				$("#fromAddress").css("background-color","#FFF");
				  }
				  
			
			if(  $("#toAddress").val() == "") {
					error.push("Please Enter Destination address<br>")
					errormsg += error[i];
			 i++;
			 $("#toAddress").css("background-color","yellow");
			} else {			 
				$("#toAddress").css("background-color","#FFF");
				  }
			
			
			if($("#passengers").val() == ""){
			error.push("Please Select Number of Passanger(s)<br>")
			errormsg += error[i];
			 i++;
			  $("#passengers").css("background-color","yellow");
			} else {			 
				$("#passengers").css("background-color","#FFF");
				  }
			
			if($("#luggage").val() == ""){
			error.push("Please Select Number of Luggage(s)<br>")
			errormsg += error[i];
			 i++;
			  $("#luggage").css("background-color","yellow");
			 
			} else {			 
				$("#luggage").css("background-color","#FFF");
				  }
				
			if($("#vehicle_type").val() == ""){
			error.push("Please Select Your Vehicle<br>")
			errormsg += error[i];
			 i++;
			 $("#vehicle_type").css("background-color","yellow");
			} else {			 
				$("#vehicle_type").css("background-color","#FFF");
				  }
				  
	} while (error.length <0) 
	   return errormsg;
}

function errorDialog() {
	  	$( "#errormsg" ).dialog( {
			title:"Something Went Wrong",
			height:"auto",
	  		width:"auto",
			 buttons: {
        			"Ok": function() {
          			$( this ).dialog( "close" );
        			},
        			Cancel: function() {
          			$( this ).dialog( "close" );
        			}
			   	}
                          
			});
}	
 