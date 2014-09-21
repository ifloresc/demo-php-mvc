<?php

class delmoduleController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->id = $this->getId();
		
		$this->getService("module")->delete($module);
	}
	
	protected function getOption() {
		return "module.del";
	}

}

?>
