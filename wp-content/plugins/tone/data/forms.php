<?
class Forms extends Data {
	public $table = 'tone_forms_posts';
	public $fields = [
		'id' => [
			'type' => '%d',
			'default' => null,
			'editable_fl' => false
		],
		'step' => [
			'type' => '%s',
			'default' => 'FIRST',
			'editable_fl' => false
		],
		'post_id' => [
			'type' => '%d',
			'default' => 0,
			'editable_fl' => true
		]
	]; 	
}
?>
