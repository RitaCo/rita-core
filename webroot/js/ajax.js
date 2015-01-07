if ($.support.pjax) {
	$(document).on('click', 'a', function(event) {
			var Root = $('[data-container="root"]');	
			var container = $(this).closest('[data-container]');
		  	var data = $(this).data();
		  	
		  	if (data['ajax'] == false ) {
		  		return;
		  	}
		  	
		  	if (data['append']) {
		  		container = $(data['append']);
		  	}
		  	
	
		 	if (container.length  === 0 ){
				container = Root;	
		 	}	
		    $.pjax.click(event, {container: container});
    	});
}