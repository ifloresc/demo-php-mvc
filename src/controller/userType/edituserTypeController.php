<?php

class edituserTypeController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->id = $_POST["id"];
		$module->name = $_POST["name"];
		$module->description = $_POST["description"];
		
		$this->getService("userType")->update($module);
	}
	
	protected function getOption() {
		return "userType.mod";
	}

}

?>
