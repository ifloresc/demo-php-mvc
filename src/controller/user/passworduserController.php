<?php

class passworduserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->id = $this->getId();
		
		$this->getService("user")->resetLogin($data);
	}
	
	protected function getOption() {
		return "user.password";
	}
}

?>
