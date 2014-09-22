<?php

class putuserTypeController extends AddController {

	protected  function getTitle() {
		return "USER_TYPE_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
	}
	
	protected function setUrl() {
		return 'userType/add';
	}

	protected function getOption() {
		return "userType.add";
	}

}

?>
