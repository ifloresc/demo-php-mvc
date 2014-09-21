<?php

class userDAO extends DAO  {

	public function existRut($user) {
		$query = sprintf("SELECT * FROM User WHERE dni = '%s'",
				$this->real_escape_string($user->rut));
	
		return $this->existData($query);
	}
	
	public function existLogin($user) {
		$query = sprintf("SELECT * FROM User WHERE login = '%s'",
				$this->real_escape_string($user->login));
	
		return $this->existData($query);
	}

	public function existDNI($user) {
		$query = sprintf("SELECT * FROM User WHERE dni = '%s'",
				$this->real_escape_string($user->rut));
	
		return $this->existData($query);
	}
	
	public function isPasswordValid($user) {
	
		$query = sprintf("SELECT * FROM Login l, User u WHERE l.user_id = u.id AND l.enabled = 1 AND u.enabled = 1 AND l.expirate > now() AND l.id = %s",
				$this->real_escape_string( $user->password));
			
		return $this->existData($query);
	}
	
	public function login($user) {
	
		$query = sprintf("SELECT u.id, l.id user, u.dni, u.id user_id, u.name, u.lastName, u.login, u.profile_id profile, l.temp, l.attempts, l.id password FROM Login l, User u WHERE l.user_id = u.id AND l.enabled = 1 AND u.enabled = 1 AND login = '%s' AND password = PASSWORD('%s') ",
				$this->real_escape_string( $user->login),
				$this->real_escape_string( $user->password));
		 
		return $this->loadData($query);
	}

	public function loadLogin($user) {
	
		$query = sprintf("SELECT u.id, l.id user, u.dni, u.id user_id, u.name, u.lastName, u.login, u.profile_id profile, l.temp, l.attempts, l.id password FROM Login l, User u WHERE l.user_id = u.id AND l.enabled = 1 AND u.enabled = 1 AND login = '%s'",
				$this->real_escape_string( $user->login));
		 
		return $this->loadData($query);
	}

	public function loadRut($user) {
	
		$query = sprintf("SELECT u.id, l.id user, u.dni, u.id user_id, u.name, u.lastName, u.login, u.profile_id profile, l.temp, l.attempts, l.id password FROM Login l, User u WHERE l.user_id = u.id AND l.enabled = 1 AND u.enabled = 1 AND dni = '%s'",
				$this->real_escape_string( $user->rut));
		 
		return $this->loadData($query);
	}
	
	public function updatelogin($user) {
	
		$query = sprintf("update Login SET lastLogin = NOW(), attempts = 0 WHERE id = %s", $this->real_escape_string( $user->password));
	
		return $this->executeData($query);
	}
	
	public function updateAttemps($user) {
	
		$query = sprintf("update Login SET attempts = attempts + 1 WHERE user_id = (Select id From User where login = '%s') AND enabled = 1", $this->real_escape_string( $user->login));
	
		return $this->executeData($query);
	}
	
	public function changePassword($user) {
		$query = sprintf("UPDATE  Login SET password = PASSWORD('%s')  WHERE id = %s",
    		$this->real_escape_string($user->password),
    		$this->real_escape_string($user->id));
    
		return $this->executeData($query);
	}
	
	public function listAll() {
	
		$query = 'SELECT u.id, u.name, u.lastName, u.creation, u.login, u.enabled, p.name profile, l.lastLogin FROM User u LEFT JOIN  Login l ON (u.id = l.user_id AND l.enabled = 1), Profile p WHERE u.profile_id = p.id ';
		
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size, $dataFilter) {

		$sql =  "SELECT u.id, u.name, u.lastName, u.creation, u.login, u.enabled, p.name profile, l.lastLogin FROM User u LEFT JOIN  Login l ON (u.id = l.user_id AND l.enabled = 1), Profile p WHERE u.profile_id = p.id  ";

		if (array_key_exists('name', $dataFilter)) {
			$sql .= sprintf(" AND u.name = '%s'", $this->real_escape_string($dataFilter['name']));
		}	

		if (array_key_exists('lastName', $dataFilter)) {
			$sql .= sprintf(" AND u.lastName = '%s'", $this->real_escape_string($dataFilter['lastName']));
		}

		if (array_key_exists('login', $dataFilter)) {
			$sql .= sprintf(" AND u.login = '%s'", $this->real_escape_string($dataFilter['login']));
		}

		if (array_key_exists('profile', $dataFilter)) {
			$sql .= sprintf(" AND p.id = %s", $this->real_escape_string($dataFilter['profile']));
		}
	
		return $this->listDataPaginated($sql, $init, $size);
	}
	
	public function add($app) {
		$query = sprintf("INSERT INTO User (name, lastName, email, dni, login, profile_id, user_type_id, enabled, creation) values ('%s', '%s', '%s', '%s', '%s', %s, %s, %s, now())", 
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->lastName),
				$this->real_escape_string($app->email),
				$this->real_escape_string($app->rut),
				$this->real_escape_string($app->login),
				$this->real_escape_string($app->profile),
				$this->real_escape_string($app->type),
				$this->real_escape_string($app->enabled));
		
		return $this->addData($query);
	}
	
	public function addLoginTmp($app) {
		$query = sprintf("INSERT INTO Login (user_id, password, enabled, temp, expirate) values (%s, PASSWORD('%s'), 1, 1, DATE_ADD(CURDATE(),INTERVAL 30 DAY))",
				$this->real_escape_string($app->id),
				$this->real_escape_string($app->password));
	
		return $this->addData($query);
	}
	
	public function addLogin($app) {
		$query = sprintf("INSERT INTO Login (user_id, password, enabled, temp, expirate) values (%s, PASSWORD('%s'), 1, 0, DATE_ADD(CURDATE(),INTERVAL 90 DAY))",
				$this->real_escape_string($app->id),
				$this->real_escape_string($app->password));
	
		return $this->addData($query);
	}
	
	public function disabledLogin($app) {
		$query = sprintf("UPDATE Login SET enabled = 0, expirate = now() WHERE user_id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function load($app) {
	
		$query =  sprintf("SELECT u.id, u.name, u.lastName, u.creation, u.login, u.enabled, u.email, u.dni, p.name profileName, u.profile_id profile FROM User u, Profile p WHERE u.profile_id = p.id AND u.id = %s", 
				$this->real_escape_string($app->id));
	
		return $this->loadData($query);
	}
	
	public function update($app) {
		$query = sprintf("UPDATE User SET name = '%s', lastName = '%s', email = '%s', dni = '%s', profile_id = %s, modify = now() WHERE id = %s",
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->lastName),
				$this->real_escape_string($app->email),
				$this->real_escape_string($app->rut),
				$this->real_escape_string($app->profile),
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function updateProfile($app) {
		$query = sprintf("UPDATE User SET name = '%s', lastName = '%s', email = '%s', dni = '%s', modify = now()  WHERE id = %s",
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->lastName),
				$this->real_escape_string($app->email),
				$this->real_escape_string($app->rut),
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function delete($data) {
		$query = sprintf("DELETE FROM User  WHERE id = %s",
				$this->real_escape_string($data->id));
	
		$this->executeData($query);
	}
	
	public function deleteLogin($data) {
		$query = sprintf("DELETE FROM Login  WHERE user_id = %s",
				$this->real_escape_string($data->id));
	
		$this->executeData($query);
	}
	
	public function disabled($data) {
		$query = sprintf("UPDATE User SET enabled = 0 WHERE id = %s",
				$this->real_escape_string($data->id));
	
		$this->executeData($query);
	}
	
	public function enabled($data) {
		$query = sprintf("UPDATE User SET enabled = 1 WHERE id = %s",
				$this->real_escape_string($data->id));
	
		$this->executeData($query);
	}

	public function bloqued($data) {
		$query = sprintf("UPDATE User SET bloqued = 1 WHERE id = %s",
				$this->real_escape_string($data->id));
	
		$this->executeData($query);
	}
	
}
?>