function handleUX(){
	$('.img-fill').each(function(){
		var $this=$(this)
		var thisimg=$(this).find('img');
		var theImage = new Image();
		theImage.src = thisimg.attr("src");
		theImage.onload = function() {
			thisimg.width('auto');
			thisimg.height('auto');
			var rat1=(parseInt($this.width())/parseInt($this.height()));
			var rat2=(parseInt(theImage.width)/parseInt(theImage.height));
			
			if(rat1>=rat2) {
					thisimg.width('100%');
					thisimg.height('auto');
			}
			else{
				thisimg.height('100%');
				thisimg.width('auto');
			}
		}
	})
	$('body').on('click','.post-popup',function(e){
		e.preventDefault();
		$(this).magnificPopup({
		  type: 'ajax',
		  tError: 'sorry please try again later',
		    mainClass: 'mfp-fade',
		});
		$(this).click();
	})


	
}