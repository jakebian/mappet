//myLoc.js
window.onload = getMyLocation;
//Note that map has been globally declared.
var map;
function getMyLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(displayLocation);
  } else {
    alert("Something Broke");
  }
}



//This function is used by HTML5 geolocation API.
function displayLocation(position) {
  //The latitude and longitude values 
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

  //Latitude and longitude values with Google map.
  var latLng = new google.maps.LatLng(latitude, longitude);

  showMap(latLng);
  createMarker(latLng);
  displayList(coords);
  
  //Also setting the latitude and longitude values in another div.
  var div = document.getElementById("location");
  div.innerHTML = "You are at Latitude: " + latitude + ", Longitude: " + longitude;
}

function showMap(latLng) {
  //Setting up the map options 
  var mapOptions = {
    center: latLng,
    zoom: 18,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  //Creating the Map 
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
}
function createMarker(latLng) {
  //Setting up the marker to mark the location on the map canvas.
  var markerOptions = {
    position: latLng,
    map: map,
    animation: google.maps.Animation.DROP,
    clickable: true
  }
  var marker = new google.maps.Marker(markerOptions);

  var content = "You are here: " + latLng.lat() + ", " + latLng.lng();
  addInfoWindow(marker, latLng, content);

}

var coords=[ [48,-124],
			 [49,-124] ];

function displayList(coords) {
	for(var i=0; i<coords.length; i++){
		var myLatlng = new google.maps.LatLng(coords[i][0],coords[i][1]);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			animation: google.maps.Animation.DROP
		});
		
	}
}



function addInfoWindow(marker, latLng, content) {
  var infoWindowOptions = {
    content: content,
    position: latLng
  };

  var infoWindow = new google.maps.InfoWindow(infoWindowOptions);

  google.maps.event.addListener(marker, "click", function() {
    infoWindow.open(map);
  });
}
