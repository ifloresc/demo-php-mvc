<?php

class deluserController extends CrudController {

	public function crudAction() {
		$data = new User();
		$data->id = $this->getId();
		
		$this->getService("user")->delete($data);
	}
	
	protected function getOption() {
		return "user.del";
	}

}

?>
