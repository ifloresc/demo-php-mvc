<?php
/**

Servicio para Aplicaciones

**/
class optionService extends Service  {
	
	public function disabled($opt) {
		$this->getDAO("option")->disabled($opt);
	}
	
	public function enabled($opt) {
		$this->getDAO("option")->enabled($opt);
	}
	
	public function optionApp($app) {
		return $this->getDAO("option")->optionApp($app);
	}
	
	public function addOpt($app) {
		foreach ($app->option as &$opt) {
			$this->getDAO("option")->addOpt($app->id, $opt);
		}
	}
	
}
?>