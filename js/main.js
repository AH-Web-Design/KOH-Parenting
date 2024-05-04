// JavaScript Document

var $ = jQuery.noConflict();


/*************************** Owl Carousel ****************************/
 			
$(document).ready(function() {
	  
    $("#srvc-carousel").owlCarousel({
        autoplay: false,
        items : 3, 
		loop:false,
		navText: false,
		dots: false,      
		nav : true,
		mouseDrag:true,
		lazyLoad : false,
		responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
      });	
			            
 });	
 
 $(window).load(function(){
    "use strict";	
    
    $('.auto-size').isotope({
        itemSelector: '.masonry-item',
        layoutMode: 'masonry'
      });
      
  });  
  
jQuery(function() {
  jQuery('.smoothScroll').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top -100
        }, 500);
        return false;
      }
    }
  });
});  
  
  
  
  
  