<?php

class edituserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->id = $_POST["id"];
		$data->name = $_POST["name"];
		$data->lastName = $_POST["lastName"];
		$data->email = $_POST["email"];
		$data->rut = $_POST["dni"];
		$data->profile = $_POST["profile"];
		
		$this->getService("user")->update($data);
	}
	
	protected function getOption() {
		return "user.mod";
	}

}

?>
