<?php

class detailapplicationController extends DetailController {
	
	protected  function getTitle() {
		return "APPLICATION_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('code', "INPUT_CODE");
		$this->addFieldDetail('description', "INPUT_DESCRIPTION");
	}

	protected function loadService(){	
		return "application";
	}
	
	protected function getOption() {
		return "app.detail";
	}

}

?>
