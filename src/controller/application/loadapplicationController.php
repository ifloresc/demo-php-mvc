<?php

class loadapplicationController extends EditController {
	
	protected  function getTitle() {
		return "APPLICATION_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('code', "INPUT_CODE", 'input', 5, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
	}
	
	protected function loadService(){	
		return "application";
	}
	
	protected function setUrl() {
		return 'application/edit';
	}
	
	protected function getOption() {
		return "app.edit";
	}

}

?>
