<?php
// Menu Section
function register_my_menus() {
	register_nav_menus(
		array(
			'main-menu' => 'main-menu1', 
			'main-menu-down' => 'main-menu-down', 
			'left-menu' => 'left-menu', 
			'footer-menu' => 'footer-menu1'
		)
	);
}
if (function_exists('register_nav_menus')) { add_action('init', 'register_my_menus' );	}

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}

function get_site_url_root() {
	$protocol = (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off' || empty($_SERVER['HTTPS']) ? 'http://' : 'https://');
	$name = $_SERVER['SERVER_NAME'];
	
	return $protocol . $name;
}
// End ofMenu Section



// Helper of home detection
function is_home_qs() {
    return (($_SERVER['QUERY_STRING'] == '') ? true : false);
}
function get_site_subfolder() {
	$url_root = get_site_url_root();
	$site_address = get_site_url();
	$subfolder = str_replace($url_root, '', $site_address);
	
	return $subfolder;	
}
function is_home_ru() {
	$request_uri = str_replace(get_site_subfolder(), '', $_SERVER['REQUEST_URI']);
	
    return (in_array($request_uri, array('/index.php/', '/')) ? true : false);
}

function is_home_tmpl() {
    return (is_home_qs() && is_home_ru() ? true: false);
}

function is_calc() {
	return (isset($_GET['calc']) && $_GET['calc'] == 'yes' ? true : false);
}
//End of helper





// Data functions
function load_tone_data($layout) {
	require_once 'wp-content/plugins/tone/data/data.php';
	require_once 'wp-content/plugins/tone/data/' . $layout . '.php';
	global $wpdb;
	$class_name = ucfirst($layout);
	$Data = new $class_name($wpdb);
	
	return $Data;
}

function simplify($object_list, $value, $key=null, $type='object') {
	$simplidied = [];
	
	foreach ($object_list as $object) {
		$object = (object)$object;
		
		if (empty($key)) {
			$simplidied[] = $object->{$value};
		}
		else {
			$simplidied[$object->{$key}] = $object->{$value};
		}	
	}
	
	if ($type == 'object') { $simplidied = (object)$simplidied; }
	
	return $simplidied;
}
// End of data functions






// Ajax Mail functions
add_action('wp_ajax_mail_report', 'report_about_request');
add_action('wp_ajax_nopriv_mail_report', 'report_about_request');

function get_html_type() {
	return 'text/html';
}
function report_about_request() {
	add_filter('wp_mail_content_type', 'get_html_type');

	$qty = $_POST['quantity'];
	$client = (object)$_POST['client_data'];
	
	$to = get_option('admin_email');
	$subject = 'Request from site "' . get_option('blogname') . '"';
	$message = 'Hello!<br><br>';
	$message .= 'Customer ' . $client->name . ' want to buy <b>' . $qty . '</b> phones. Please, help him.<br>';
	$message .= 'You can contact with client next way:</br>';
	$message .= '<ul>';
	$message .= '<li>E-Mail: ' . $client->email . '</li>';
	$message .= '<li>Phone: ' . $client->phone . '</li>';
	$message .= '</ul>';
	
	if (!empty($client->company) || !empty($client->site)) {
		$message .= '<br>Client also provedid next information:';
		
		if (!empty($client->company)) {
			$message .= '<br>Clients company is "' . $client->company . '"';
		}
		if (!empty($client->site)) {
			$message .= '<br>Clients site is <a href="' . $client->site . '">' . $client->site . '</a>';
		}
	}
	
	$headers[] = 'From: ' . $client->name . '<' . $client->email . '>';

	
	$result = wp_mail($to, $subject, $message, $headers);
	
	remove_filter('wp_mail_content_type', 'get_html_type');
	
	echo $result;
}


add_action('wp_ajax_contact_form', 'send_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'send_contact_form');

function send_contact_form() {
	add_filter('wp_mail_content_type', 'get_html_type');
	
	$contact = (object)$_POST['contact'];
	
	$to = get_option('admin_email');
	$subject = 'Used Contact Form on the site "' . get_option('blogname') . '"';
	$message = 'Hello!<br><br>';
	$message .= 'Customer ' . $contact->name . ' with e-mail ' . $contact->email . ' wrote:<br>';
	$message .= '<i>' . $contact->message . '</i>';
	$headers[] = 'From: ' . $contact->name . '<' . $contact->email . '>';
	
	$result = wp_mail($to, $subject, $message, $headers);
	
	remove_filter('wp_mail_content_type', 'get_html_type');
	
	echo $result;
}
// End of ajax mail functions






// Render functions
function render_tmpl($view, $vars=[]) {	
	if (!empty($vars)) {
		foreach ($vars as $name=>$value) {
			${$name} = $value;
		}	
	}
		
	ob_start();		
	require_once($view);
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}

function get_calc_template($type) {
	$template ='';
	if (in_array($type, ['rect_bed', 'round_bed', 'tile', 'coupling'])) {
		$template .= render_tmpl('calcs/' . $type . '.php');
	}
	
	return $template;
}
// End of render function






// Theme settings
function tonelp_edit_options() {
    // Save options
    if (isset($_POST['options'])) {
        foreach ($_POST['options'] as $option=>$value) {
            update_option($option, $value);
        }
    }
    
    // Show edit page
    echo render_tmpl(__DIR__  . "/admin/options.php");
}

add_action('admin_menu', function() { 
    add_options_page("Theme", "Theme", "manage_options", "options-theme", "tonelp_edit_options");
});
// End of theme settings
?>
