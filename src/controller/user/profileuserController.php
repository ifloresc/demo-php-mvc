<?php

class profileuserController extends EditController {
	
	protected  function getTitle() {
		return "USER_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldType('login', "INPUT_USER", 'detail');
		$this->addField('name', "INPUT_NAME", 'input', 100, true);
		$this->addField('lastName', "INPUT_LASTNAME", 'input', 100, true);
		$this->addField('dni', "INPUT_DNI", 'input', 20, true);
		$this->addField('email', "INPUT_EMAIL", 'input', 100, true);
	}

	protected final function loadData() {
		$app = new Object();
		$app->id = $this->getUserSession()->id;
		
		$data = $this->getService('user')->load($app);
		
		return $data;
	}
	
	protected function loadService(){	
		return "user";
	}
	
	protected function setUrl() {
		return 'user/editprofile';
	}

	protected function isFreeAccess() {
		return true;
	}
	
}

?>
