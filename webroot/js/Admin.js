$(document).ready(function(){

$('.admin-navigator-container').width($('.admin-sidebar-wrapper').width()) ;

//	menu();
});




function menu(){



	
 var menu = $('.admin-navigator-container');
 
 
 var li = $('li:has(ul)',menu);
 console.log(li);
 $(li).on('click','a',function(){
 	$(this).parent('li').toggleClass('isOpened').find('ul').slideToggle();
 })
 	
	
}