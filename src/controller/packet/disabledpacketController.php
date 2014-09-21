<?php

class disabledpacketController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("packet")->disabled($app);
	}
	
	protected function getOption() {
		return "packet.enabled";
	}

}

?>
