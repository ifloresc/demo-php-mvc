<?php

class disabledoptionController extends CrudController {

	public function crudAction() {
		$opt = new Option();
		$opt->id = $this->getId();
		
		$this->getService("option")->disabled($opt);
	}
	
	protected function getOption() {
		return "option.active";
	}

}

?>
