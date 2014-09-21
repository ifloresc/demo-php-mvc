<?php

class enabledmoduleController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->id = $this->getId();
		
		$this->getService("module")->enabled($module);
	}
	
	protected function getOption() {
		return "module.active";
	}

}

?>
