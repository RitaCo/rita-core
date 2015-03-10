$(document).ready(function(){

var w = $('.admin-sidebar-wrapper').width();
$('.admin-navigator-container').width(w) ;

//	menu();
});




function menu(){



	
 var menu = $('.admin-navigator-container');
 
 
 var li = $('li:has(ul)',menu);

 $(li).on('click','a',function(){
 	$(this).parent('li').toggleClass('isOpened').find('ul').slideToggle();
 })
 	
	
}