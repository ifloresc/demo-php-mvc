<?php

class editmoduleController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->id = $_POST["id"];
		$module->name = $_POST["name"];
		$module->code = $_POST["code"];
		$module->description = $_POST["description"];
		$module->url = $_POST["url"];
		
		$this->getService("module")->update($module);
	}
	
	protected function getOption() {
		return "module.edit";
	}

}

?>
