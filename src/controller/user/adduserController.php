<?php

class adduserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->name = $_POST["name"];
		$data->lastName = $_POST["lastName"];
		$data->email = $_POST["email"];
		$data->rut = $_POST["dni"];
		$data->login = $_POST["user"];
		$data->profile = $_POST["profile"];
		
		$this->getService("user")->add($data);
	}
	
	protected function getOption() {
		return "user.add";
	}

}

?>
