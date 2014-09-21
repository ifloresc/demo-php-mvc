<?php

class editprofileuserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->id = $this->getUserSession()->id;
		$data->name = $_POST["name"];
		$data->lastName = $_POST["lastName"];
		$data->email = $_POST["email"];
		$data->rut = $_POST["dni"];
		
		$this->getService("user")->updateProfile($data);
	}
	
	protected function isFreeAccess() {
		return true;
	}

}

?>
