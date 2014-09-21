<?php

class profileDAO extends DAO  {

	public function existProfile($profile) {
		$query = sprintf("SELECT * FROM Profile WHERE name = '%s'",
				$this->real_escape_string($profile->name));
	
		return $this->existData($query);
	}
	
	public function listOptionProfileActive($user) {
	
		$query = sprintf("SELECT A.id app, A.name appName, A.code appCode , O.id opt , O.name optName, O.code optCode, O.url , M.id module , M.name modName, M.code modCode, O.father_option father FROM ProfileOption po, PacketOption pa, ApplicationOption AO , Application A , Options O , Module M WHERE po.packet_opt_id = pa.id AND pa.app_opt_id = AO.id AND AO.application_id = A.id AND AO.option_id = O.id AND O.module_id = M.id AND A.enabled = 1 AND M.enabled = 1 AND O.enabled = 1 AND po.profile_id = %s ORDER BY A.name, M.name, O.id",
			$this->real_escape_string($user->profile));
	
		return $this->listData($query);
	}

	public function listOptionProfile($user) {
	
		$query = sprintf("SELECT A.id app, A.name appName, A.code appCode, O.id opt , O.name optName, O.code optCode, O.url , M.id module , M.name modName, M.code modCode, O.father_option father FROM ProfileOption po, PacketOption pa, ApplicationOption AO , Application A , Options O , Module M WHERE po.packet_opt_id = pa.id AND pa.app_opt_id = AO.id AND AO.application_id = A.id AND AO.option_id = O.id AND O.module_id = M.id AND po.profile_id = %s AND A.enabled = 1 AND M.enabled = 1 AND O.enabled = 1 ORDER BY A.name, M.name, O.id",
			$this->real_escape_string($user->id));
	
		return $this->listData($query);
	}
	
	public function listOption($app) {
	
		$query =  sprintf("SELECT p.id, o.id opt, o.name optName, o.code optCode, o.father_option father, a.id app, a.name appName, a.code appCode, m.id module, m.name modName, m.code modCode, po.id selected From PacketOption p LEFT JOIN Profile pr ON (p.packet_id = pr.packet_id) LEFT JOIN ProfileOption po ON (po.packet_opt_id = p.id AND pr.id = po.profile_id), ApplicationOption ap, Options o, Application a, Module m WHERE ap.id = p.app_opt_id AND o.id = ap.option_id AND a.id = ap.application_id AND o.module_id = m.id AND pr.id = %s",
				$this->real_escape_string($app->id));
		
		return $this->listData($query);
	}
	
	public function addProfileOpt($opt, $profile) {
		$query = sprintf("INSERT INTO ProfileOption (packet_opt_id, profile_id, enabled) values (%s, %s, 1)",
				$this->real_escape_string($opt),
				$this->real_escape_string($profile));
	
		return $this->addData($query);
	}
	
	public function listAll() {
	
		$query = 'SELECT * FROM Profile ';
		
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size, $dataFilter) {
	
		$sql =  "SELECT * FROM Profile ";

		if (array_key_exists('name', $dataFilter)) {
			$sql .= sprintf(" WHERE name = '%s'", $this->real_escape_string($dataFilter['name']));
		}	
	
		return $this->listDataPaginated($sql, $init, $size);
	}
	
	public function listActive() {
	
		$query = 'SELECT * FROM Profile WHERE enabled = 1';
	
		return $this->listData($query);
	}
	
	public function add($app) {
		$query = sprintf("INSERT INTO Profile (name, description, packet_id, enabled) values ('%s', '%s', %s, 1)", 
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->description),
				$this->real_escape_string($app->packet));
		
		return $this->addData($query);
	}
	
	public function load($app) {
	
		$query =  sprintf("SELECT p.id, p.name, p.description, p.enabled, p.packet_id packet, pa.name packetName FROM Profile p, Packet pa WHERE p.packet_id = pa.id AND p.id = %s", 
				$this->real_escape_string($app->id));
	
		return $this->loadData($query);
	}
	
	public function update($app) {
		$query = sprintf("UPDATE Profile SET name = '%s', description = '%s', packet_id = %s WHERE id = %s",
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->description),
				$this->real_escape_string($app->packet),
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function delete($app) {
		$query = sprintf("DELETE FROM Profile  WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function deleteProfileOption($app) {
		$query = sprintf("DELETE FROM ProfileOption  WHERE profile_id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function disabled($app) {
		$query = sprintf("UPDATE Profile SET enabled = 0 WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function enabled($app) {
		$query = sprintf("UPDATE Profile SET enabled = 1 WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
}
?>