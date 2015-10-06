<?
/*
Plugin Name: T-One
Description: Plugin for setting additional T-one data
Version: 100
Author: Qcl
*/

add_action('admin_menu', 'addMenuItem');
add_action('admin_menu', 'addSubMenuItems');

function addMenuItem() {
	add_menu_page('T-One', 'T-One', 'edit_posts', 'tone/action_list', null, null, 6);
}

function addSubMenuItems() {
	add_submenu_page('tone/action_list','Prices', 'Prices', 'edit_posts', 'tone/devices', 'manage');
	add_submenu_page('tone/action_list','Forms Texts', 'Forms Texts', 'edit_posts', 'tone/forms', 'manage');
	
	remove_submenu_page('tone/action_list', 'tone/action_list' );
}



function manage() {
	$layout = explode('/', $_GET['page'])[1];
	$Data = loadData($layout);
	$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : 'show');
	
	switch ($action) {
		case 'show':
			show($Data, $layout);
			break;
		case 'set':
			$Data->set($_POST[$layout]);
			show($Data, $layout, ['result'=>'success']);
			break;
	}
}


function show($Data, $layout, $params = []) {
	$vars = [
		'result' => 'none',
		'posts' => get_posts(['orderby'=>'post_date','order'=>'DESC']),
		$layout => $Data->get()
	];	
	$vars = array_merge($vars, $params);
	
	$html = render('views/manage_' . $layout . '.php', $vars);
	echo $html;	
}





function loadData($type) {
	global $wpdb;
	require_once 'data/data.php';
	require_once 'data/' . $type . '.php';
	$class_name = ucfirst($type);
	$Data = new $class_name($wpdb);
	
	return $Data;
}

function render($view, $vars=[]) {	
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

?>
