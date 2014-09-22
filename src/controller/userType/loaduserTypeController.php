<?php

class loaduserTypeController extends EditController {
	
	protected  function getTitle() {
		return "USER_TYPE_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
	}
	
	protected function loadService(){	
		return "userType";
	}
	
	protected function setUrl() {
		return 'userType/edit';
	}

	protected function getOption() {
		return "userType.mod";
	}

}

?>
