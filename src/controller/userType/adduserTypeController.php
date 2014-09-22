<?php

class adduserTypeController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->name = $_POST["name"];
		$module->description = $_POST["description"];
		
		$this->getService("userType")->add($module);
	}
	
	protected function getOption() {
		return "userType.add";
	}

}

?>
