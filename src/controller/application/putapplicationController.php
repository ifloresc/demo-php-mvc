<?php

class putapplicationController extends AddController {
	
	protected  function getTitle() {
		return "APPLICATION_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('code', "INPUT_CODE", 'input', 5, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
	}
	
	protected function setUrl() {
		return 'application/add';
	}
	
	protected function getOption() {
		return "app.add";
	}

}

?>
