<!doctype html>
<html lang=ru>
<head>
	<meta charset=utf-8>
	<title>T-One. PBX Phone System</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://sites.qcldev.ru/lp/wp-admin/load-scripts.php?c=1&load%5B%5D=jquery-core,jquery-migrate,utils,json2&ver=3.9.1"></script>
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
				<a href="http://sites.qcldev.ru/lp/">
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
		<div class="block">
			<div id="description-home">
				<div class="text-wrapper">
					<p class="developer">T-One Business Solutions presents</p>
					<h1 id="header" class="maintext">Telephony of Tomorrow at Your Service Today!</h1>
					<div class="descriptiontext">
						<p>We truly believe that business phone systems should not be that expensive. T-One offers you the lowest rates and newest technologies in the industry. Our PBX phone system can provide you with hundreds of features, functions and free services.</p>
					</div>
					<a class="button button-phone-system"> build your phone system now <i class="fa fa-chevron-circle-right"></i> </a>
					
				</div>
			</div>
			<div class="stack">
				<img class="gadget" src="<?php echo get_template_directory_uri(); ?>/images/banner.png" />
			</div>
		</div>
		<div class="separator">
			<img  src="<?php echo get_template_directory_uri(); ?>/images/figure.png" />
		</div>
	</section>

	<section id="skills">
		<div class="block-container block">
			<h2>advantages</h2>
			<div class="skill-wrapper">
				<div class="skill-logo">
					<div class="logo-container">
						<i class="fa fa-sliders"></i>
					</div>
				</div>
				<h4 class="title">redundancy</h4>
				<div class="description">
					<p>No worries about the internet outage. Our Phone Systems are hybrid which can work with VOIP and standard phone lines. You will always stay connected.</p>
				</div>
			</div>
			<div class="skill-wrapper">
				<div class="skill-logo">
					<div class="logo-container">
						<i class="fa fa-money"></i>
					</div>
				</div>
				<h4 class="title">scalability</h4>
				<div class="description">
					<p>No worries about additional extensions. Our Phone Systems are license free. You will have unlimited numbers of extensions and all the features for free.</p>
				</div>
			</div>
			<div class="skill-wrapper">
				<div class="skill-logo">
					<div class="logo-container">
						<i class="fa fa-cogs"></i>
					</div>
				</div>
				<h4 class="title">support‏</h4>
				<div class="description">
					<p>No worries about the maintenance of your Phone System. Our professional support team will take care of any your needs and we will always be in touch with you.</p>
				</div>
			</div>
		</div>
	</section>		
	<section id="video-tutorial">
		<div class="videot-wrapper block">
			<h2>Video</h2>
			<div class="box visible">
				<iframe  width="50%" height="350px;" src="//www.youtube.com/embed/vhzUdZIGYCw" frameborder="0" allowfullscreen></iframe>
				<div class="description">
					<div class="text-wrapper">
						<ul>
							<li><i class="fa fa-check-circle"></i> Interactive Voice Response (IVR)</li>
							<li><i class="fa fa-check-circle"></i> Call Parking</li>
							<li><i class="fa fa-check-circle"></i> Call Transfer</li>
							<li><i class="fa fa-check-circle"></i> Call conference</li>
							<li><i class="fa fa-check-circle"></i> Telephone Directory</li>
							<li><i class="fa fa-check-circle"></i> Follow me</li>
							<li><i class="fa fa-check-circle"></i> Intercom</li>
							<li><i class="fa fa-check-circle"></i> Music On Hold</li>
							<li><i class="fa fa-check-circle"></i> Call Pickup</li>
							<li><i class="fa fa-check-circle"></i> Remote Support</li>
							<li><i class="fa fa-check-circle"></i> Ring Groups</li>
							<li><i class="fa fa-check-circle"></i> Roaming Extensions</li>
							<li><i class="fa fa-check-circle"></i> Time Intervals</li>
							<li><i class="fa fa-check-circle"></i> Voicemail-to-email</li>
							<li><i class="fa fa-check-circle"></i> Call recording</li>
							<li><i class="fa fa-check-circle"></i> Advanced call forwarding</li>
							<li><i class="fa fa-check-circle"></i> BLF‏</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="box">
				<iframe  width="50%" height="350px;" src="//www.youtube.com/embed/136_6pZcl-c" frameborder="0" allowfullscreen></iframe>
				<div class="description">
					<div class="text-wrapper">
						<ul>
							<li><i class="fa fa-check-circle"></i> Interactive Voice Response (IVR)</li>
							<li><i class="fa fa-check-circle"></i> Call Parking</li>
							<li><i class="fa fa-check-circle"></i> Call Transfer</li>
							<li><i class="fa fa-check-circle"></i> Call conference</li>
							<li><i class="fa fa-check-circle"></i> Telephone Directory</li>
							<li><i class="fa fa-check-circle"></i> Follow me</li>
							<li><i class="fa fa-check-circle"></i> Intercom</li>
							<li><i class="fa fa-check-circle"></i> Music On Hold</li>
							<li><i class="fa fa-check-circle"></i> Call Pickup</li>
							<li><i class="fa fa-check-circle"></i> Remote Support</li>
							<li><i class="fa fa-check-circle"></i> Ring Groups</li>
							<li><i class="fa fa-check-circle"></i> Roaming Extensions</li>
							<li><i class="fa fa-check-circle"></i> Time Intervals</li>
							<li><i class="fa fa-check-circle"></i> Voicemail-to-email</li>
							<li><i class="fa fa-check-circle"></i> Call recording</li>
							<li><i class="fa fa-check-circle"></i> Advanced call forwarding</li>
							<li><i class="fa fa-check-circle"></i> BLF‏</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tabs-block">
				<ul class="tabs">
					<li class="current" id="tab1">Video 1</li>
					<li id="tab2">Video 2</li>
				</ul>
			</div>
		</div>
	</section>
	<section id="testimonials">
		<div class="testimonials-wrapper block">
			<h2 class="title">what people are saying</h2>
			<div class="testimonial-wrapper">
				<div class="testimonialtext">
				<img class="review-avatar" src="<?php echo get_template_directory_uri(); ?>/images/avatar1.jpg" />
					<p>
						Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. 
					</p> 
					<div class="review-author">Slobodan Umicevic</div>
					<div>Web&Graphic designer</div>
				</div>
			</div>
			<div class="testimonial-wrapper">
				<div class="testimonialtext">
				<img class="review-avatar" src="<?php echo get_template_directory_uri(); ?>/images/avatar1.jpg" />
					<p>
						Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. 
					</p> 
					<div class="review-author">Slobodan Umicevic</div>
					<div>Web&Graphic designer</div>
				</div>
			</div>
			<div class="testimonial-wrapper">
				<div class="testimonialtext">
				<img class="review-avatar" src="<?php echo get_template_directory_uri(); ?>/images/avatar1.jpg" />
					<p>
						Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. 
					</p> 
					<div class="review-author">Slobodan Umicevic</div>
					<div>Web&Graphic designer</div>
				</div>
			</div>
		
		<div class="separator">
			<img  src="<?php echo get_template_directory_uri(); ?>/images/figure.png" />
		</div>
		</div>
	</section>
	<section id="price-block">
		<div class="price block">
		<h2 class="title">We can offer</h2>
		<div class="description">Our high quality services for your Phone System‏</div>
			<div class="price-item">
				<div class="item-wrapper">
					<h3 class="title">Business Phone Services</h3>
					<div class="services-list">
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>Unlimited calls to Canada, USA, China and +50 countries.</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>We provide Toll Free and local phone numbers from over 50 countries.</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>To see our competitive rates for other destinations <a href="https://portal.t-one.ca/order/main/packages/services/?group_id=1">click here.</a></span>
						</div>
					</div>
					<div class="cost">
						<div class="container">
							<p class="starting" style="text-align: left;">Starting from</p>
							<h1>$23.95</h1>
							<span class="line">/month</span>
						</div>
					</div>
					<input class="button" value="Buy Now" onclick="location.href='https://portal.t-one.ca/order/main/packages/services/?group_id=77'" type="button" />
				</div>
			</div>
			<div class="price-item">
				<div class="item-wrapper second">
					<h3 class="title">Fax 2 Email <br /> services</h3>
					<div class="services-list">
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>$0.05 for additional pages.</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>up to 1500 free pages included monthly (inbound or outbound).</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>To see our competitive rates for other destinations <a href="https://portal.t-one.ca/order/main/packages/services/?group_id=8">click here.</a></span>
						</div>
					</div>
					<div class="cost">
						<div class="container">
							<p class="starting" style="text-align: left;">Starting from</p>
							<h1>$13.95</h1>
							<span class="line">/month</span>
						</div>
					</div>
					<input class="button" value="Buy Now" onclick="location.href='https://portal.t-one.ca/order/main/packages/services/?group_id=8'" type="button" />
				</div>
			</div>
			<div class="price-item">
				<div class="item-wrapper">
					<h3 class="title">business internet services</h3>
					<div class="services-list">
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>$0.05 for additional pages.</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>up to 1500 free pages included monthly (inbound or outbound).</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>To see our competitive rates for other destinations <a href="https://portal.t-one.ca/order/main/packages/services/?group_id=8">click here.</a></span>
						</div>
					</div>
					<div class="cost">
						<div class="container">
							<p class="starting" style="text-align: left;">Starting from</p>
							<h1>$13.95</h1>
							<span class="line">/month</span>
						</div>
					</div>
					<input class="button" value="Buy Now" onclick="location.href='https://portal.t-one.ca/order/main/packages/services/?group_id=8'" type="button" />
				</div>
			</div>
			<div class="price-item">
				<div class="item-wrapper second">
					<h3 class="title">Pay As You Go Services</h3>
					<div class="services-list">
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>Pay per use.</span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>To see our competitive rates for other destinations <a href="https://portal.t-one.ca/order/main/packages/services/?group_id=35">click here.</a></span>
						</div>
						<div class="service include">
							<i class="fa fa-check-circle"></i>
							<span>A fair usage policy applies.</span>
						</div>
					</div>
					<div class="cost">
						<div class="container">
							<p class="starting" style="margin-top: 60px;"> </p>
							<h1>$0.00</h1>
							<span class="line">/month</span>
						</div>
					</div>
					<input class="button" value="Buy Now" onclick="location.href='https://portal.t-one.ca/order/main/packages/services/?group_id=35'" type="button" />
				</div>
			</div>
		</div>
	</section>

	<section id="partners-block">
		<div class="partners block">
			<h2 class="title">OUR PARTNERS</h2>
			<div class="partners-list">
				<a class="partner" href="#">
					<img class="partner-logo" alt="partner5" src="<?php echo get_template_directory_uri(); ?>/images/cisco.png" />
				</a>
				<a class="partner" href="#">
					<img class="partner-logo" alt="partner5" src="<?php echo get_template_directory_uri(); ?>/images/Logo_Grandstream.png" />
				</a>
				<a class="partner" href="#">
					<img class="partner-logo" alt="partner5" src="<?php echo get_template_directory_uri(); ?>/images/shp_logo.png" />
				</a>
				<a class="partner" href="#">
					<img class="partner-logo" alt="partner5" src="<?php echo get_template_directory_uri(); ?>/images/logo-voip-switch.png" />
				</a>
				<a class="partner" href="#">
					<img class="partner-logo" alt="partner5" src="<?php echo get_template_directory_uri(); ?>/images/3logo.png" />
				</a>
			</div>
			
			<div class="separator">
				<img  src="<?php echo get_template_directory_uri(); ?>/images/figure.png" />
			</div>
		</div>
	</section> 
		
	<footer>
		<div class="footer block">
			<div class="company-about">
				<div class="company-about-wrapper">
					<div id="logo-footer">
						<a href="http://sites.qcldev.ru/lp/">
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
			<div class="contact-form">
				<div class="contact-form-wrapper">
					<h2 class="title">Contact Form</h2>
					<input id="form_name" class="validate[required]" type="text" data-prompt-position="topLeft" placeholder="Name" name="name" ></input>
					<input id="form_email" class="validate[required,custom[email]]" type="text" data-prompt-position="topRight" placeholder="Email" name="email" ></input>
					<textarea id="form_message" class="validate[required]" data-prompt-position="bottomRight" placeholder="Message" name="message" rows="3" style="overflow: hidden; min-height: 4em; height: 34px;"></textarea>
					
					<button id="contact-form-button-send" href="">Send</button>
				</div>				
			</div>
			
		</div>
	</footer>
</body>
</html>
