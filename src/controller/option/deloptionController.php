<?php

class deloptionController extends CrudController {

	public function crudAction() {
		$opt = new Option();
		$opt->id = $this->getId();
		
		$this->getService("option")->delete($opt);
	}
		
	protected function getOption() {
		return "option.del";
	}

}

?>
