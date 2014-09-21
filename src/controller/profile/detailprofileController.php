<?php

class detailprofileController extends DetailController {
	
	protected  function getTitle() {
		return "PROFILE_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('description', "INPUT_DESCRIPTION");
		$this->addFieldDetail('packetName', "INPUT_PACKET");
		$this->addFieldDetailList('optName', "INPUT_APP", $this->getListApp());
	}

	protected function loadService(){	
		return "profile";
	}

	private function getListApp() {
		$app = new Profile();
		$app->id = $this->getId();
		
		return $this->getService("profile")->listOptionProfile($app);
	}

	protected function getOption() {
		return "profile.detail";
	}


}

?>
