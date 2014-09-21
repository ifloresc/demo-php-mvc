<?php

class loaduserController extends EditController {
	
	protected  function getTitle() {
		return "USER_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addFieldType('login', "INPUT_USER", 'detail');
		$this->addField('name', "INPUT_NAME", 'input', 100, true);
		$this->addField('lastName', "INPUT_LASTNAME", 'input', 100, true);
		$this->addField('dni', "INPUT_DNI", 'input', 20, true);
		$this->addField('email', "INPUT_EMAIL", 'email', 100, true);
		$this->addFieldList('profile', "INPUT_PROFILE", 'select', 0, true, $this->getListProfile());
	}
	
	protected function loadService(){	
		return "user";
	}
	
	protected function setUrl() {
		return 'user/edit';
	}
	
	private function getListProfile() {
	
		$list = $this->getService("profile")->listActive();
	
		return $list;
	}

	protected function getOption() {
		return "user.mod";
	}

}

?>
