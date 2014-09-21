<?php

class putprofileController extends AddController {
	
	protected  function getTitle() {
		return "PROFILE_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addFieldListAjax('packet', "INPUT_PACKET", 'select', 0, true, $this->getListPacket(), 'options');
	}
	
	protected function setUrl() {
		return 'profile/add';
	}

	private function getListPacket() {
		
		$list = $this->getService("packet")->listActive();		
		
		return $list;
	}

	protected function getOption() {
		return "profile.add";
	}


}

?>
