<?php

class addprofileController extends CrudController {

	public function crudAction() {
		$data = new Profile();
		$data->name = $_POST["name"];
		$data->description = $_POST["description"];
		$data->packet = $_POST["packet"];
		$data->options = $_POST["option"];
		
		$this->getService("profile")->addProfile($data);
	}
	
	protected function getOption() {
		return "profile.add";
	}


}

?>
