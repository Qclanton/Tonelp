var $j = jQuery.noConflict();
$j(function() {
	$j('.menu-item a').on('click', function(event) {
		var link =  $j(this).attr('href');

		if (link[0] == '#') {
			event.preventDefault();
			
			var	speed = 1000;		
			$j('html, body').animate({
				'scrollTop':   $j(link).offset().top 
			}, speed);			
			
			return false;
		}
	});
});
