function Gmap(){
	var map;
	/**
	 * Initializees the map
	 * @param  {google.maps.LatLng} pos - center of the map, the type Pos is specified by the pos function in this class
	 * @param  {float} zoom - zoom level
	 */
	var markers=[];
	this.init=function(pos,zoom){

		var mapOptions = {
		    center: pos,
		    zoom: zoom,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map= new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	}

	/**
	 * Attaches a infobox to a marker
	 * @param {google.maps.Marker} marker
	 * @param {string} content
	 */
	this.addBox=function(marker, content) {

	  var options = {
	    content: content,
	    position: marker.getPosition()
	  };

	  var infoWindow = new google.maps.InfoWindow(options);

	  google.maps.event.addListener(marker, "click", function() {
	    infoWindow.open(map);
	  });
	  return infoWindow;
	}

	/**
	 * Clears all markers
	 */
	this.clear=function(){
		map.clearMarkers();
	}

	/**
	 * A representation of position used by the map API
	 * @param  {float} lat - lattitude
	 * @param  {float} lng - Longitude
	 * @return {google.maps.LatLng} 
	 */
	this.pos=function(lat,lng){
		return new google.maps.LatLng(lat,lng);
	}

	/**
	 * Adds a list of places to the maps
	 * @param {array} list - must contain objects {LatLng,String}
	 */
	this.addPlaces=function(list){
		for(var i=0; i<list.length;i++){
			this.addPlace(list[i]);
		}
	}

	/**
	 * adds a draggable pin
	 * @param {Pos} pos
	 */
	this.addDragPin=function(pos){
		var marker = new google.maps.Marker({
		    position: pos,
		    draggable: true,
		    map: map,
		    animation: google.maps.Animation.DROP
		 });
		this.addBox(marker,'drag me');
		return new this.marker(marker);
	}

	this.marker=function(marker){
		this.marker=marker;
		this.pos=function(){
			var p=marker.getPosition();
			return [p.lat(),p.lng()];
		}
	}

	/**
	 * Adds a a marker with content box given position and content
	 * @param {LatLng,String} data
	 */
	this.addPlace=function(data){
		var marker= new google.maps.Marker({
	      position: this.pos(data.pos[0],data.pos[1]),
	      map: map,
	      animation: google.maps.Animation.DROP
	    });
	    this.addBox(marker,data.content);
	    markers[markers.length]=marker;
	}


	google.maps.Map.prototype.clearMarkers = function() {
	    for(var i=0; i<markers.length; i++){
	        markers[i].setMap(null);
	    }
	    markers = new Array();
	};
	this.getCenter=function(){
		return map.getCenter();
	}
	this.getMap=function(){
		return map
	}
}