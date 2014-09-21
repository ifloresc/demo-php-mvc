<?php

class enabledoptionController extends CrudController {

	public function crudAction() {
		$opt = new Option();
		$opt->id = $this->getId();
		
		$this->getService("option")->enabled($opt);
	}
	
	protected function getOption() {
		return "option.active";
	}

}

?>
