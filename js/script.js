$('.wallpaper-item').isotope({
	itemSelector : '.item',
	layoutModel : 'fitRows'
});

$('.wallpaper-menu ul li').click(function () {
	$('.wallpaper-menu ul li').removeClass('active');
	$(this).addClass('active');
	var selector = $(this).attr('data-filter');
	$('.wallpaper-item').isotope({
		filter :selector
	});
});