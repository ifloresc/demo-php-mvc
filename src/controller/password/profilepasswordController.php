<?php

class profilepasswordController extends EditController {
	
	protected  function getTitle() {
		return "USER_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldType('login', "INPUT_USER", 'detail');
		$this->addField('oldpassword', "INPUT_OLDPASSWORD", 'password', 50, true);
		$this->addField('password', "INPUT_PASSWORD", 'password', 50, true);
		$this->addField('repassword', "INPUT_REPASSWORD", 'password', 50, true);
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
		return 'password/edit';
	}

	protected function isFreeAccess() {
		return true;
	}
	
}

?>
