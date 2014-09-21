<?php

class editprofileController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $_POST["id"];
		$app->name = $_POST["name"];
		$app->description = $_POST["description"];
		$app->packet = $_POST["packet"];
		$app->options = $_POST["option"];
		
		$this->getService("profile")->updateProfile($app);
	}

	protected function getOption() {
		return "profile.mod";
	}


}

?>
