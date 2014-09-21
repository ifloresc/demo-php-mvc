<?php

class addmoduleController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->name = $_POST["name"];
		$module->code = $_POST["code"];
		$module->description = $_POST["description"];
		$module->url = $_POST["url"];
		
		$this->getService("module")->add($module);
	}
	
	protected function getOption() {
		return "module.add";
	}

}

?>
