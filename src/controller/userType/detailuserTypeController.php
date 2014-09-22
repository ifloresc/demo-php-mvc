<?php

class detailuserTypeController extends DetailController {
	
	protected  function getTitle() {
		return "USER_TYPE_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('description', "INPUT_DESCRIPTION");
	}

	protected function loadService(){	
		return "userType";
	}

	protected function getOption() {
		return "userType.detail";
	}

}

?>
