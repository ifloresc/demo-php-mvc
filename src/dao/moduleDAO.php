<?php

class moduleDAO extends DAO  {

	
	public function listAll() {
	
		$query = 'SELECT * FROM Module ';
		
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size, $dataFilter) {

		$sql =  "SELECT * FROM Module WHERE 1 = 1 ";

		if (array_key_exists('name', $dataFilter)) {
			$sql .= sprintf(" AND name = '%s'", $this->real_escape_string($dataFilter['name']));
		}	

		if (array_key_exists('code', $dataFilter)) {
			$sql .= sprintf(" AND code = '%s'", $this->real_escape_string($dataFilter['code']));
		}
	
		return $this->listDataPaginated($sql, $init, $size);
	}
	
	public function add($module) {
		$query = sprintf("INSERT INTO Module (name, code, description, url, enabled) values ('%s', '%s', '%s', '%s', 1)", 
				$this->real_escape_string($module->name),
				$this->real_escape_string($module->code),
				$this->real_escape_string($module->description),
				$this->real_escape_string($module->url));
		
		$this->addData($query);
	}
	
	public function load($module) {
	
		$query =  sprintf("SELECT * FROM Module WHERE id = %s", 
				$this->real_escape_string($module->id));
	
		return $this->loadData($query);
	}
	
	public function update($module) {
		$query = sprintf("UPDATE Module SET name = '%s', code = '%s', description = '%s', url = '%s' WHERE id = %s",
				$this->real_escape_string($module->name),
				$this->real_escape_string($module->code),
				$this->real_escape_string($module->description),
				$this->real_escape_string($module->url),
				$this->real_escape_string($module->id));
		
		$this->executeData($query);
	}
	
	public function delete($module) {
		$query = sprintf("DELETE FROM Module  WHERE id = %s",
				$this->real_escape_string($module->id));
	
		$this->executeData($query);
	}
	
	public function disabled($module) {
		$query = sprintf("UPDATE Module SET enabled = 0 WHERE id = %s",
				$this->real_escape_string($module->id));
	
		$this->executeData($query);
	}
	
	public function enabled($module) {
		$query = sprintf("UPDATE Module SET enabled = 1 WHERE id = %s",
				$this->real_escape_string($module->id));
	
		$this->executeData($query);
	}
	
}
?>