<?php

class enabledpacketController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("packet")->enabled($app);
	}
	
	protected function getOption() {
		return "packet.enabled";
	}

}

?>
