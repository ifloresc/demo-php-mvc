<?php
/**
* Servicio para Aplicaciones
**/
class applicationService extends Service  {
	
	public function listAppOptionAll() {
		$opts =  $this->getDAO("application")->listAppOptionAll();

		return $this->groupOption($opts);
	}

	public function delete($app) {
		// Borramos Opciones
		$this->getDAO("option")->deleteAppOpt($app);
		// Borramos App
		$this->getDAO("application")->delete($app);
	}
	
}
?>