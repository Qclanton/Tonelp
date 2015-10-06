var $j = jQuery.noConflict();

$j(function() {
    $j('.contact-form').on('click', function() {
        $j('#contact-form-button-send').fadeIn('fast', function() {
            $j('#contact-form-button-send').animate({
                'margin-left': '-20px'
            }, 500, function() {
                $j('#contact-form-button-send').animate({
                    'margin-left': '0px'
                }, 500);
            });
        });
    });
});
