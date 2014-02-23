function newWizard(submap){
	geoReady(function(){
		var point;
		$('.next').click(function(e){
			e.preventDefault();
			$(this).addClass('chosen');
			$(this).siblings().removeClass('chosen');
			$( "#guide" ).wizard("forward");
		})
		function choose($step, action){
			var branch = $step.children('.chosen').data('next');
			return branch;
		}

		$("#guide").wizard({
			transitions: {
				start: choose,
				onsite: choose,
				offsite: choose,
				details: function(){
					name=$('#place-name').val();
					desc=$('#place-desc').val();
					add_place(
			            name,
			            desc,
			            point.pos()[0],
			            point.pos()[1],
			            getUser(),
			            submap,
			            function(){
			            	alert('done!');
			            });
				},

				adding: function($step, action){
					var branch = $step.children('.chosen').data('next');
					if(branch=='offsite'){
						point=MAP.addDragPin(MAP.getCenter());
					}
					if(branch=='onsite'){
						point=MAP.addDragPin(MYLOC);
					}
					return branch;
				},

			}
		});
	});	
}