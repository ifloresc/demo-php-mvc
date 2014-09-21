<?php

class disabledmoduleController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->id = $this->getId();
		
		$this->getService("module")->disabled($module);
	}
	
	protected function getOption() {
		return "module.active";
	}

}

?>
