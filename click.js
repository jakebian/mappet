window.onload = initialize();

function initialize() {
  var mapOptions = {
    zoom: 4,
    center: new google.maps.LatLng(-25.363882,131.044922)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

   var listener1 = google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map, listener1);
  });
}

function placeMarker(position, map, listener1) {
  var marker = new google.maps.Marker({
    position: position,
    draggable: true,
    map: map
  });
  google.maps.event.removeListener(listener1);
}
