<?php

class applicationDAO extends DAO  {
	
	public function listAppOptionAll() {
	
		$query = 'SELECT o.id, a.id app, a.name appName, a.code appCode, m.id module, m.name modName, m.code modCode, op.id opt, op.name optName, op.father_option father FROM ApplicationOption o, Application a, Options op, Module m WHERE o.application_id = a.id AND o.option_id = op.id AND op.module_id = m.id AND a.enabled = 1 AND m.enabled = 1 and o.enabled = 1  ';
	
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size, $dataFilter) {

		$sql =  "SELECT * FROM Application WHERE 1 = 1 ";

		if (array_key_exists('name', $dataFilter)) {
			$sql .= sprintf(" AND name = '%s'", $this->real_escape_string($dataFilter['name']));
		}	

		if (array_key_exists('code', $dataFilter)) {
			$sql .= sprintf(" AND code = '%s'", $this->real_escape_string($dataFilter['code']));
		}
	
		return $this->listDataPaginated($sql, $init, $size);
	}
	
	public function listAll() {
	
		$query = 'SELECT * FROM Application ';
		
		return $this->listData($query);
	}
	
	public function add($app) {
		$query = sprintf("INSERT INTO Application (name, code, description, enabled) values ('%s', '%s', '%s', 1)", 
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->code),
				$this->real_escape_string($app->description));
		
		$this->addData($query);
	}
	
	public function load($app) {
	
		$query =  sprintf("SELECT * FROM Application WHERE id = %s", 
				$this->real_escape_string($app->id));
	
		return $this->loadData($query);
	}
	
	public function update($app) {
		$query = sprintf("UPDATE Application SET name = '%s', code = '%s', description = '%s' WHERE id = %s",
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->code),
				$this->real_escape_string($app->description),
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function delete($app) {
		$query = sprintf("DELETE FROM Application  WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function disabled($app) {
		$query = sprintf("UPDATE Application SET enabled = 0 WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function enabled($app) {
		$query = sprintf("UPDATE Application SET enabled = 1 WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
}
?>