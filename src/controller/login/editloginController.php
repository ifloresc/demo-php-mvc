<?php

class editloginController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->login = $this->getUserSession()->login;
		$data->password = $_POST["oldpassword"];
		$data->newpassword = $_POST["password"];
		$data->renewpassword = $_POST["repassword"];
		
		$this->getService("user")->changePassword($data);
		// Borramos Session
		$this->deleteSession();
	}

	protected function isFreeAccess() {
		return true;
	}

}

?>