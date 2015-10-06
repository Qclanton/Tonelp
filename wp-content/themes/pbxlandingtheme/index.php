<!doctype html>
<html lang=ru>
<head>
	<meta charset=utf-8>
	<title>T-One. PBX Phone System</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="wp-admin/load-scripts.php?c=1&load%5B%5D=jquery-core,jquery-migrate,utils,json2&ver=3.9.1"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/anchors.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.arcticmodal-0.3.min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/tabs.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/message-button.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.arcticmodal-0.3.css" />
	<script>
		var $j = jQuery.noConflict();
		$j(function(){ 
			$j('#location').on('click', function() { $j('#google-map').arcticmodal(); });
			$j('.button-phone-system').on('click', function() { $j('#phone-system-builder').arcticmodal(); });
			$j('.menu-item-17').on('click', function() { $j('#phone-system-builder').arcticmodal(); });
			
			// Send contact form
			$j('.contact-form').on('submit', function(event) { 
				event.preventDefault();				
				
				var form_id = $j(this).attr('id');
				var data = $j(this).serialize();
				var url = '<?= get_site_subfolder(); ?>/wp-admin/admin-ajax.php';
				
				$j(this).html('<span>Sending...</span>');
				
				$j.post(url, data, function(response) {
					if (response == 10 || response == 1) {
						$j('#' + form_id).html('<span>Mail sent!</span>');
					}
				});
			});
		});
	</script>
	<!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="header-wrapper">
			<div id="logo">
				<a href="<?= site_url(); ?>">
					<img src="<?= get_option("tonelp_logo_url", "wp-content/themes/pbxlandingtheme/images/logo.png") ?>"></img>		
				</a>
			</div>
			<div id="menu-wrapper">
			
			<nav class="top-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
			</nav>
			</div>
			<ul class="soc">
				<li><a class="soc-twitter" href="#"><i class="fa fa-twitter-square"></i></a></li>
				<li><a class="soc-facebook" href="#"><i class="fa fa-facebook-square"></i></a></li>
				<li><a class="soc-google" href="#"><i class="fa fa-google-plus-square"></i></a></li>
				<li><a class="soc-linkedin soc-icon-last" href="#"><i class="fa fa-linkedin-square"></i></a></li>
			</ul>
		</div>
	</header>
	
	<?= render_tmpl('calc.php'); ?>
	<section id="info-block">
		<?= get_post('21')->post_content; ?>
	</section>
	<section id="skills">
		<?= get_post('36')->post_content; ?>
	</section>		
	<section id="video-tutorial">
		<?= get_post('38')->post_content; ?>
	</section>
	<section id="testimonials">
		<?= get_post('40')->post_content; ?>
	</section>
	<section id="price-block">
		<?= get_post('42')->post_content; ?>
	</section>
	<section id="partners-block">
		<?= get_post('44')->post_content; ?>
	</section> 
		
	<footer>
		<div class="footer block">
			<div class="company-about">
				<div class="company-about-wrapper">
                    <?= stripcslashes(get_option("tonelp_footer_main_text", "")) ?>
				</div>
			</div>
			<div class="contact-sidebar">
                <?= stripcslashes(get_option("tonelp_footer_contact_us_text", "")) ?>
			</div>
			<form class="contact-form" id="contact-form">
				<input type="hidden" name="action" value="contact_form"></input>
				
				<div class="contact-form-wrapper">
					<h2 class="title">Contact Form</h2>
					<input id="form_name" class="validate[required]" type="text" data-prompt-position="topLeft" placeholder="Name" name="contact[name]" ></input>
					<input id="form_email" class="validate[required,custom[email]]" type="text" data-prompt-position="topRight" placeholder="Email" name="contact[email]" ></input>
					<textarea id="form_message" class="validate[required]" data-prompt-position="bottomRight" placeholder="Message" name="contact[message]" rows="3" style="overflow: hidden; min-height: 4em; height: 34px;"></textarea>
					
					<button id="contact-form-button-send">Send</button>
				</div>				
			</form>
			
		</div>
	</footer>
</body>
</html>
