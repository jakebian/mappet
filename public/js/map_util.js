MAPINIT=false;
function mapInit(){
	// $('body').css('opacity',0);
	MAP= new Map();
	google.maps.event.addListenerOnce(MAP.getMap(), 'idle', function(){
		MAPINIT=true;
		$('body').css('opacity',1)
    // do something only the first time the map is loaded
	});
}
function getNearest(id){
	return id*314;
}