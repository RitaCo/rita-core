	if ($.support.pjax) {
	

		$(document).on('submit', 'form', function(event) {
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
		 	$.pjax.submit(event, {container: container});
    	});
    	

	}
