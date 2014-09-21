<?php

class disableduserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->id = $this->getId();
		
		$this->getService("user")->disabled($data);
	}
	
	protected function getOption() {
		return "user.enabled";
	}

}

?>
