<?php

class addapplicationController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->name = $_POST["name"];
		$app->code = $_POST["code"];
		$app->description = $_POST["description"];
		
		$this->getService("application")->add($app);
	}

	protected function getOption() {
		return "app.add";
	}

}

?>
