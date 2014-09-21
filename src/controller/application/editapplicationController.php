<?php

class editapplicationController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $_POST["id"];
		$app->name = $_POST["name"];
		$app->code = $_POST["code"];
		$app->description = $_POST["description"];
		
		$this->getService("application")->update($app);
	}
	
	protected function getOption() {
		return "app.edit";
	}

}

?>
