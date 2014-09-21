<?php

class putuserController extends AddController {
	
	protected  function getTitle() {
		return "USER_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 100, true);
		$this->addField('lastName', "INPUT_LASTNAME", 'input', 100, true);
		$this->addField('dni', "INPUT_DNI", 'input', 20, true);
		$this->addField('email', "INPUT_EMAIL", 'email', 100, true);
		$this->addField('user', "INPUT_USER", 'input', 20, true);
		$this->addFieldList('profile', "INPUT_PROFILE", 'select', 0, true, $this->getListProfile());
	}
	
	protected function setUrl() {
		return 'user/add';
	}

	private function getListProfile() {
		return $this->getService("profile")->listActive();	
	}

	protected function getOption() {
		return "user.add";
	}

}

?>
