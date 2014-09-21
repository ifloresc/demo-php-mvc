<?php

class PacketDAO extends DAO  {

	public function listActive() {
	
		$query = 'SELECT * FROM Packet WHERE enabled = 1 ';
		
		return $this->listData($query);
	}
	
	/**
	* Lista Opciones de una Packete, para sociar a un perfil
	*/
	public function listOptionPacket($app) {
	
		$query =  sprintf("SELECT po.id,  ap.option_id opt, o.name optName, o.father_option father, m.id module, m.name modName, m.code modCode, a.id app, a.name appName, a.code appCode  FROM ApplicationOption ap, PacketOption po, Options o, Module m, Application a WHERE ap.id = po.app_opt_id AND ap.application_id = a.id AND ap.option_id = o.id AND o.module_id = m.id AND a.enabled = 1 AND m.enabled = 1 AND o.enabled = 1  AND po.packet_id = %s ",
				$this->real_escape_string($app->id));
	
		return $this->listData($query);
	}
	
	/**
	* Lista Opciones de una Packete, para sociar a un Packete
	*/
	public function listOption($app) {
	
		$query =  sprintf("SELECT ap.id,  ap.option_id opt, o.name optName, o.father_option father, o.code optCode, m.id module, m.name modName, m.code modCode, a.id app, a.name appName, a.code appCode, po.id selected From ApplicationOption ap LEFT JOIN PacketOption po ON (ap.id = po.app_opt_id AND po.packet_id = %s), Options o, Module m, Application a WHERE ap.application_id = a.id AND ap.option_id = o.id AND o.module_id = m.id",
				$this->real_escape_string($app->id));
	
		return $this->listData($query);
	}
	
	public function listAll() {
	
		$query = 'SELECT * FROM Packet ';
		
		return $this->listData($query);
	}
	
	public function listPaginated($init, $size) {
	
		$query =  sprintf("SELECT * FROM Packet LIMIT %s, %s",
				$this->real_escape_string($init),
				$this->real_escape_string($size));
	
		return $this->listData($query);
	}
	
	public function add($app) {
		$query = sprintf("INSERT INTO Packet (name, description, enabled) values ('%s', '%s', 1)", 
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->description));
		
		return $this->addData($query);
	}
	
	public function addPacketOpt($app, $packet) {
		$query = sprintf("INSERT INTO PacketOption (app_opt_id, packet_id, enabled) values (%s, %s, 1)",
				$this->real_escape_string($app),
				$this->real_escape_string($packet));
	
		$this->addData($query);
	}
	
	public function load($app) {
	
		$query =  sprintf("SELECT * FROM Packet WHERE id = %s", 
				$this->real_escape_string($app->id));
	
		return $this->loadData($query);
	}
	
	public function update($app) {
		$query = sprintf("UPDATE Packet SET name = '%s', description = '%s' WHERE id = %s",
				$this->real_escape_string($app->name),
				$this->real_escape_string($app->description),
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function delete($app) {
		$query = sprintf("DELETE FROM Packet  WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function deletePacketOption($app) {
		$query = sprintf("DELETE FROM PacketOption  WHERE packet_id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function disabled($app) {
		$query = sprintf("UPDATE Packet SET enabled = 0 WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
	public function enabled($app) {
		$query = sprintf("UPDATE Packet SET enabled = 1 WHERE id = %s",
				$this->real_escape_string($app->id));
	
		$this->executeData($query);
	}
	
}
?>