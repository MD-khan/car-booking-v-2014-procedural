// JavaScript Document
function makeRequestObject(){
	var xmlhttp=false; 
   		try {
      	xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
   		}catch (e) {
      		try {
         	xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); 
      } catch (E) {
         xmlhttp = false;
		 
      }
   }
   if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest(); 
   }
   return xmlhttp;
}
//Calculate infant seat Cost
function InfantSeatCost(str) {
  var xmlhttp=makeRequestObject(); 
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
       document.getElementById("infantChrg").value=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","php/select_seat.php?infant="+str,+ Math.random(),true);
xmlhttp.send();
}
// calculate Regular Seat cost
function RegularSeatCost(str) {
 	var xmlhttp=makeRequestObject(); 
  	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      	document.getElementById("RegularSeatChrg").value=xmlhttp.responseText;
    	}
	} 
xmlhttp.open("GET","php/select_seat.php?regular="+str,+ Math.random(),true);
xmlhttp.send();
}

// calculate Boster Seat cost
function BosterSeatCost(str) {
 	var xmlhttp=makeRequestObject(); 
  	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      	document.getElementById("BosterSeatChrg").value=xmlhttp.responseText;
    	}
	} 
xmlhttp.open("GET","php/select_seat.php?boster="+str,+ Math.random(),true);
xmlhttp.send();
}

function StopOverSeatCost(str) {
 	var xmlhttp=makeRequestObject(); 
  	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      	document.getElementById("StopOverSeatChrg").value=xmlhttp.responseText;
    	}
	} 
xmlhttp.open("GET","php/select_seat.php?stopover="+str,+ Math.random(),true);
xmlhttp.send();
}

