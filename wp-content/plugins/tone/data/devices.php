<?
class Devices extends Data {
	public $table = 'tone_devices_info';
	public $fields = [
		'id' => [
			'type' => '%d',
			'default' => null,
			'editable_fl' => false
		],
		'type' => [
			'type' => '%s',
			'default' => 'PHONE',
			'editable_fl' => false
		],
		'cost' => [
			'type' => '%f',
			'default' => 0,
			'editable_fl' => true
		]
	]; 	
}
?>
