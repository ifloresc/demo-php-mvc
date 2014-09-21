<?php

class detailoptionController extends DetailController {
	
	protected  function getTitle() {
		return "OPTION_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('description', "INPUT_DESCRIPTION");
		$this->addFieldDetail('code', "OPTION_PROP");
		$this->addFieldDetail('url', "INPUT_URL");
		$this->addFieldDetail('module', "INPUT_MODULE");
		$this->addFieldDetail('father', "OPTION_FATHER");
	}

	protected function loadService(){	
		return "option";
	}
	
	protected function getOption() {
		return "option.detail";
	}

}

?>
