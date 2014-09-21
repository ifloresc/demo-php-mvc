<?php

class disabledapplicationController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("application")->disabled($app);
	}
	
	protected function getOption() {
		return "app.active";
	}

}

?>
