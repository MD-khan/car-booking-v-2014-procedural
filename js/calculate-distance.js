// JavaScript Document
function getDistance() {
		 
  	var origin1 = document.getElementById("fromAddress").value; 
    var destination = document.getElementById("toAddress").value;
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
	{
	origins:[origin1],
	destinations:[destination],
	travelMode: google.maps.TravelMode.DRIVING,
	unitSystem:  google.maps.UnitSystem.IMPERIAL,
	//durationInTraffic: Boolean
	},callback);
} 

function callback(response, status) {//1
  	if (status == google.maps.DistanceMatrixStatus.OK) {//2
   		var origins = response.originAddresses;
		var destinations = response.destinationAddresses;
	 	//var output = document.getElementById('distance');
    		for (var i = 0; i < origins.length; i++) {//3
      			var results = response.rows[i].elements;
	  
      				for (var j = 0; j < results.length; j++) {//4
        				var element = results[j];
						//console.log(element);
						var distance = element.distance.text;
       				    var duration = element.duration.text;
        				var from = origins[i];
        				var to = destinations[j];
						//console.log(duration);
						//console.log(distance);
						//output.value = distance;
						return distance;
						 
						 
      				}//4
		}//3  
 
	}//2
}//1