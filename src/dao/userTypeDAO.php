<?php

class userTypeDAO extends DAO  {

	
	public function listAll() {
	
		$query = 'SELECT * FROM UserType ';
		
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size) {
	
		$query =  sprintf("SELECT * FROM UserType LIMIT %s, %s",
				$this->real_escape_string($init),
				$this->real_escape_string($size));
	
		return $this->listData($query);
	}
	
	public function add($app) {
		$query = sprintf("INSERT INTO UserType (name, description) values ('%s', '%s')", 
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->description));
		
		$this->addData($query);
	}
	
	public function load($app) {
	
		$query =  sprintf("SELECT * FROM UserType WHERE id = %s", 
				$this->real_escape_string($app->id));
	
		return $this->loadData($query);
	}
	
	public function update($app) {
		$query = sprintf("UPDATE UserType SET name = '%s',  description = '%s' WHERE id = %s",
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->description),
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function delete($app) {
		$query = sprintf("DELETE FROM UserType  WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
}
?>