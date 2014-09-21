<?php

class detailuserController extends DetailController {
	
	protected  function getTitle() {
		return "USER_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('lastName', "INPUT_LASTNAME");
		$this->addFieldDetail('dni', "INPUT_DNI");
		$this->addFieldDetail('email', "INPUT_EMAIL");
		$this->addFieldDetail('login', "INPUT_USER");
		$this->addFieldDetail('profileName', "INPUT_PROFILE");
	}

	protected function loadService(){	
		return "user";
	}

	protected function getOption() {
		return "user.detail";
	}

}

?>
