<?php

class optionDAO extends DAO  {
	
	public function optionApp($app) {
	
		$query =  sprintf("Select o.id, o.name, o.module_id modId, m.name module, o.father_option father, ao.id app From Options o LEFT JOIN ApplicationOption ao ON (o.id = ao.option_id AND ao.application_id = %s), Module m WHERE m.id = o.module_id", 
				$this->real_escape_string($app->id));
	
		return $this->listData($query);
	}
	
	public function addOpt($app, $opt) {
		$query = sprintf("INSERT INTO ApplicationOption (application_id, option_id, enabled) values (%s, %s, 1)",
				$this->real_escape_string($app),
				$this->real_escape_string($opt));
	
		$this->addData($query);
	}
	
	public function listAll() {
	
		$query = 'SELECT o.id, o.name, o.description, o.code, o.url, m.name module, o.module_id modId, father_option father, o.enabled  FROM Options o, Module m WHERE o.module_id = m.id ';
		
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size, $dataFilter) {

		$sql = "SELECT o.id, o.name, o.description, o.code, o.url, m.name module, o.module_id modId, father_option father, o.enabled  FROM Options o, Module m WHERE o.module_id = m.id ";

		if (array_key_exists('name', $dataFilter)) {
			$sql .= sprintf(" AND o.name = '%s'", $this->real_escape_string($dataFilter['name']));
		}

		if (array_key_exists('module', $dataFilter)) {
			$sql .= sprintf(" AND m.id = %s", $this->real_escape_string($dataFilter['module']));
		}

		$sql .= " ORDER BY m.name, o.id";
	
		return $this->listDataPaginated($sql, $init, $size);
	}
	
	public function add($opt) {
		$query = sprintf("INSERT INTO Options (name, description, code, url, module_id, father_option, enabled) values ('%s', '%s', '%s', '%s', %s, %s, 1)", 
				$this->real_escape_string($opt->name),
				$this->real_escape_string($opt->description),
				$this->real_escape_string($opt->prop),
				$this->real_escape_string($opt->url),
				$this->real_escape_string($opt->module),
				$this->real_escape_string($opt->father));
		
		$this->addData($query);
	}
	
	public function load($opt) {
	
		$query =  sprintf("SELECT o.id, o.name, o.description, o.code, o.url, o.module_id, m.name module, father_option father, o.enabled  FROM Options o, Module m WHERE o.module_id = m.id AND o.id = %s", 
				$this->real_escape_string($opt->id));
	
		return $this->loadData($query);
	}
	
	public function update($opt) {
		$query = sprintf("UPDATE Options SET name = '%s', description = '%s', code = '%s', url = '%s', module_id = %s, father_option = %s WHERE id = %s",
				$this->real_escape_string($opt->name),
				$this->real_escape_string($opt->description),
				$this->real_escape_string($opt->prop),
				$this->real_escape_string($opt->url),
				$this->real_escape_string($opt->module),
				$this->real_escape_string($opt->father),
				$this->real_escape_string($opt->id));
	
		$this->executeData($query);
	}
	
	public function delete($opt) {
		$query = sprintf("DELETE FROM Options  WHERE id = %s",
				$this->real_escape_string($opt->id));
	
		$this->executeData($query);
	}

	public function deleteAppOpt($opt) {
		$query = sprintf("DELETE FROM ApplicationOption  WHERE application_id = %s",
				$this->real_escape_string($opt->id));
	
		$this->executeData($query);
	}
	
	public function disabled($opt) {
		$query = sprintf("UPDATE Options SET enabled = 0 WHERE id = %s",
				$this->real_escape_string($opt->id));
	
		$this->executeData($query);
	}
	
	public function enabled($opt) {
		$query = sprintf("UPDATE Options SET enabled = 1 WHERE id = %s",
				$this->real_escape_string($opt->id));
	
		$this->executeData($query);
	}
	
}
?>