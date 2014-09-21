<?php
/**

Servicio para Modulos

**/
class moduleService extends Service  {
	
	public function disabled($module) {
		$this->getDAO("module")->disabled($module);
	}
	
	public function enabled($module) {
		$this->getDAO("module")->enabled($module);
	}
	
}
?>