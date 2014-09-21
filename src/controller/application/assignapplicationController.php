<?php

class assignapplicationController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $_POST["id"];
		$app->option = $_POST["option"];
		
		$this->getService("option")->addOpt($app);
	}
	
	protected function getOption() {
		return "appOpt.list";
	}

}

?>
