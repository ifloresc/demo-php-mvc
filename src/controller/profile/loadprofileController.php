<?php

class loadprofileController extends EditController {
	
	protected  function getTitle() {
		return "PROFILE_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addFieldList('packet', "INPUT_PACKET", 'select', 0, true, $this->getListPacket());
		$this->addFieldList('option', "INPUT_APP", 'multiGroupRadio', 100, true, $this->getListOption());
	}
	
	protected function loadService(){	
		return "profile";
	}
	
	protected function setUrl() {
		return 'profile/edit';
	}
	
	private function getListPacket() {
		return $this->getService("packet")->listAll();
	}
	
	private function getListOption() {
		$app = new Profile();
		$app->id = $this->getId();
	
		return $this->getService("profile")->listOption($app);
	}

	protected function getOption() {
		return "profile.mod";
	}


}

?>
