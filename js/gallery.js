$(document).ready(function(){

	var $grid = $('.grid').isotope({
	  itemSelector: '.grid-item'
	});

	// filter items on button click
	$('ul.filter-menu').on( 'click', 'li', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	  return false;
	});
	
	$("ul.filter-menu li").click(function() {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
    });

});