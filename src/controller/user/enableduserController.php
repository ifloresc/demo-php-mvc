<?php

class enableduserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->id = $this->getId();
		
		$this->getService("user")->enabled($data);
	}
	
	protected function getOption() {
		return "user.enabled";
	}

}

?>
