// JavaScript Document
 $(function() {
		
			$(".slider >  .slice:gt(0)").hide();
	
			setInterval(function() { 
			  $('.slider > .slice:first')
			    .fadeOut(2000)
			    .next()
			    .toggle(2000)
			    .end()
			    .appendTo('.slider');
			},  5000);
			
		});