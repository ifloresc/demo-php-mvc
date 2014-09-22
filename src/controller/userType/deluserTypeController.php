<?php

class deluserTypeController extends CrudController {

	public function crudAction() {
		$module = new Module();
		$module->id = $this->getId();
		
		$this->getService("userType")->delete($module);
	}
	
	protected function getOption() {
		return "userType.del";
	}

}

?>
