<?php
/**
* Servicio para Aplicaciones
**/
class packetService extends Service  {
	
	public function listActive() {
		return $this->getDAO("packet")->listActive();
	}
	
	public function addPacketOpt($app) {
		$packetDao = $this->getDAO("packet");
		
		// Creamos el paquete
		$packet = $packetDao->add($app);
		foreach ($app->options as $opt) {
			$packetDao->addPacketOpt($opt, $packet);
		}
	}
	
	public function listOption($app) {
		$opts =  $this->getDAO("packet")->listOption($app);

		return $this->groupOption($opts);
	}
	
	public function listOptionPacket($app) {
		$opts =  $this->getDAO("packet")->listOptionPacket($app);

		return $this->groupOption($opts);
	}
	
	public function updatePacketOpt($app) {
		$packetDao = $this->getDAO("packet");
	
		// Actualizamos el paquete
		$packetDao->update($app);
		
		// Borramos las opciones
		$packetDao->deletePacketOption($app);
		// Agregamos Opciones
		foreach ($app->options as $opt) {
			$packetDao->addPacketOpt($opt, $app->id);
		}
	}
	
	public function delete($app) {
		$packetDao = $this->getDAO("packet");
		// Borramos las opciones
		$packetDao->deletePacketOption($app);
		// Eliminamos
		$packetDao->delete($app);
	}
	
}
?>