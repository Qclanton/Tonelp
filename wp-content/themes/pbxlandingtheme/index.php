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
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></img>		
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
					<div id="logo-footer">
						<a href="<?= site_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png"></img>		
						</a>
					</div>
					<div class="description">
						T-One is a Canadian telecommunications company based in Toronto. For over 10 years T-One has been providing telecommunication services to corporate and residential customers Canada wide. Our technical staff and software developers are university graduates with master’s degrees in the appropriate fields. 
					</div>
					<div class="description">
						Using cutting-edge telecommunication technologies, T-One is able to operate significantly below cost of existing traditional business phone systems, which improves the operation and profitability of any company. We can honestly and proudly say that T-One is your best business solution.
					</div>
				</div>
			</div>
			<div class="contact-sidebar">
			<h2 class="title">Contact Us</h2>
				<div class="contact--">
					<i class="fa fa-home"></i>
					<span class="contact-location"><div id="location">338-550 HWY 7 E, Richmond Hill, Ontario, L4B 3Z4, Canada.</div> Mailing Address Only</span>
				</div>
				
				<div style="display: none;">
					<div class="box-modal" id="exampleModal">
						<div class="box-modal_close arcticmodal-close">Close</div>
						<div id="google-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2877.5159666184663!2d-79.38383374603272!3d43.84513328561721!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2b4bbf136629%3A0xc5a8edae387a0974!2s550+Hwy+7+E!5e0!3m2!1sru!2sru!4v1404218000305" width="550" height="430" frameborder="0" style="border:0; display: inline-block;	float: left; padding-left: 80px; padding-top: 30px;"></iframe>
						</div>
					</div>
				</div>
				<div class="contact--">
					<i class="fa fa-phone"></i>
					<span class="contact-phone">1-888-989-TONE (8663)</span>
				</div>
				<div class="contact--">
					<i class="fa fa-fax"></i> 
					<span class="contact-fax">1-888-974-8137</span>
				</div>
				<div class="contact--">
					<i class="fa fa-envelope-o"> </i>
					<span class="contact-email">
						<a href="mailto:mail@t-one.ca">mail@t-one.ca</a>
					</span>
				</div>
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
