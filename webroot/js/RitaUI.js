var l = function(){
	console.log(arguments);
}

$(document).ready(function(){
  

    
/**
 * forms 
 */
$(document).on('click focus','.com-input','.error-message',function(){
	$('.error-message',this).remove();
})


var RitaForm = $('form.com-form');

var errors = $('.error-message', RitaForm).each(function(){
   var prv = $(this).prev();
   var parent = $(this).parents('.input-container');
   var pos = parent.offset(); 

      console.log(pos);
   var dir = $(this).css('direction');
   var right = (dir  == 'ltr') ?  20+"px" : 'initial';
   var left = (dir  == 'rtl') ?  20+"px"  : 'initial';
   
   $(this).css({
        "left" : left,
        "right" : right, 
        "top":prv.outerHeight(true)+15+"px" 
   }).slideDown();    
});
		     




/**
* tab components
*/ 	
$.fn.RitaTab = function(option){
	return this.each(function(){
		var $this = $(this);
			
		var data = $this.data();
		if (data.ritaTab){
			return;
		}
		data.ritaTab = true;
		var nav = $this.find('> .tab-nav');
		var body = $this.find('> .tab-container');
	
		var getTabID = function(tab){
			
			var tab = $(tab).data('tab');
			if(!tab) {
				return false;
			}
			if (tab.charAt(0) !== '#') {
				tab = '#'+tab;
			}
			
			return tab;
		}
		
		
		var showTab = function(event ){
			var tabID = getTabID(this);	
			if (!tabID) {
				return;
			}	
			$(tabID,body).addClass('active');
			$(this).addClass('active').siblings('.active').trigger('RitaTab:hide');
			
		}
		
		var hideTab = function(){
			$(this).removeClass('active');
			var tabID = getTabID(this);	
			$(tabID,body).removeClass('active');
		}
		
		
		nav.on('RitaTab:show','li:not(.disabled)',showTab);
		nav.on('RitaTab:hide','li',hideTab);
		

		nav.on('click','li:not(.disabled)',showTab)
		var active = nav.find('li.active,li a.active');
		nav.find('li a.disabled').each(function(){
		  $(this).removeClass('disabled').parent().addClass('disabled');
          
		});
		if(active.length == 0) {
			active= 	nav.find('li').first();
		}
		
		
		active.trigger('RitaTab:show');
	});
	
	

}


	$('.ui-tab').RitaTab();
	




/**
* my pjax components
*/
	if ($.support.pjax) {

		
		$(document).on('pjax:error', function(event,o) {
			event.preventDefault();
		
			var container = $('[data-pjax-container]');	
			container.html(o.responseText);
		}); 
	}

	
});