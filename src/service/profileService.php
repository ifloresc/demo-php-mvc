<?php
/**
* Servicio para Aplicaciones
**/
class profileService extends Service  {
	
	public function disabled($app) {
		$this->getDAO("profile")->disabled($app);
	}
	
	public function enabled($app) {
		$this->getDAO("profile")->enabled($app);
	}
	
	public function addProfile($app) {
		$profileDao = $this->getDAO("profile");
		// Verificamos si existe
		if ($profileDao->existProfile($app)) {
			throw new Exception("profile.exist");
		}
		// Creamos el Perfil
		$profile = $profileDao->add($app);
		foreach ($app->options as $opt) {
			$profileDao->addProfileOpt($opt, $profile);
		}
	}
	
	public function updateProfile($app) {
		$packetDao = $this->getDAO("profile");
	
		// Actualizamos el paquete
		$packetDao->update($app);
	
		// Borramos las opciones
		$packetDao->deleteProfileOption($app);
		// Agregamos Opciones
		foreach ($app->options as $opt) {
			$packetDao->addProfileOpt($opt, $app->id);
		}
	}
	
	public function listOption($packet) {
		$opts = $this->getDAO("profile")->listOption($packet);

		return $this->groupOption($opts);
	}

	public function listOptionProfile($packet) {
		$opts = $this->getDAO("profile")->listOptionProfile($packet);

		return $this->groupOption($opts);
	}

	public function delete($app) {
		$pDao = $this->getDAO("profile");
		// Borramos las opciones
		$pDao->deleteProfileOption($app);
		// Eliminamos
		$pDao->delete($app);
	}
	
	public function listActive() {
		return $this->getDAO("profile")->listActive();
	}
	
}
?>