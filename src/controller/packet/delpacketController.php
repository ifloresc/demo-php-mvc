<?php

class delpacketController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("packet")->delete($app);
	}
	
	protected function getOption() {
		return "packet.del";
	}

}

?>
