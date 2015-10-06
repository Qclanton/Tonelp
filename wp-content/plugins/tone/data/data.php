<?
class Data {
	public $Db;
	public $table;
	public $fields;
	public $default_exemplar;
	public $values_types;
	public $editable_fields;
	
	private function setDefaultExemplar() {
		$exemplar = [];
		
		foreach ($this->fields as $name=>$field) {
			$exemplar[$name] = $field['default'];
		}
		
		$this->default_exemplar = (object)$exemplar;
	}
	
	private function setValuesTypes() {
		$types = [];
		
		foreach ($this->fields as $name=>$field) {
			$types[] = $field['type'];
		}
		
		$this->values_types = $types;
	}
	
	public function setEditableFields() {
		$editable_fields = [];	
				
		foreach ($this->fields as $name=>$field) {
			if ($field['editable_fl'] == true) {
				$editable_fields[] = "`" . $name . "`=" . $field['type'];
			}
		}
		
		$this->editable_fields = $editable_fields;
	}
			
	
	public function __construct($wpdb) {		
		$this->Db = $wpdb;
		
		$this->setDefaultExemplar();
		$this->setValuesTypes();
		$this->setEditableFields();
	}
	
	
	
	
	
	public function set($data) {
		$result = (is_object($data) ? $this->setOne($data) : $this->setAll($data));
		
		return $result;
	}
	
	private function setOne($exemplar) { 
		if (empty($exemplar->id)) { $exemplar->id=null; }
		
		$query = "INSERT INTO " . $this->Db->prefix . $this->table . " VALUES (" . implode(',', $this->values_types) . ")";		
		$query .= "ON DUPLICATE KEY UPDATE " . implode(',', $this->editable_fields);
		
		$params = [$query];
		foreach ($this->fields as $name=>$field) { $params[] = $exemplar->{$name}; }
		foreach ($this->fields as $name=>$field) { if ($field['editable_fl'] == true) { $params[] = $exemplar->{$name}; } }
		
		return $this->Db->query(call_user_func_array([$this->Db, 'prepare'], $params));
	}
	
	private function setAll($exemplars) {
		foreach ($exemplars as $exemplar) {
			$exemplar = (object)$exemplar;
			
			$existed_exemplar = $this->get($exemplar->id);
			$exemplar = (object)array_merge((array)$existed_exemplar, (array)$exemplar);
			
			$this->setOne($exemplar); 
		}
	}
	
	
	
	
	
	public function get($id = false) {
		$result = ($id ? $this->getOne($id) : $this->getAll());
		
		return $result;		
	}
	
	public function getOne($id) {
		$query = "SELECT * FROM " . $this->Db->prefix . $this->table . " WHERE `id`=%d";
		$device = $this->Db->get_row($this->Db->prepare($query, $id));
		
		if (empty($exemplar)) { $exemplar = $this->default_exemplar; }
		
		return $exemplar;
	}
	
	public function getAll() {
		$query = "SELECT * FROM " . $this->Db->prefix . $this->table;
		$exemplars = $this->Db->get_results($query);
		
		return $exemplars;
	}
	
	
	
	
	
	public function remove($id) {
		$query = "DELETE FROM " . $this->Db->prefix . $this->table . " WHERE `id`=%d";		
		$result = $this->Db->query($this->Db->prepare($query, $id));
		
		return $result;
	}
}
?>
