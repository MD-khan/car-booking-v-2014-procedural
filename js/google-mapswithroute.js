// JavaScript Document
       
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {	
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom:10,
    center: new google.maps.LatLng(42.3751379,-71.0370162)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));

  var control = document.getElementById('control');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
  
}

function calcRoute() {
  var start = document.getElementById('fromAddress').value;
  var end = document.getElementById('toAddress').value;
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
	 console.log(response);
	    }
  });
}

 
google.maps.event.addDomListener(window, 'load', initialize);

