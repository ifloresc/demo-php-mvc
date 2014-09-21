<?php

class detailmoduleController extends DetailController {
	
	protected  function getTitle() {
		return "MODULE_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('code', "INPUT_CODE");
		$this->addFieldDetail('description', "INPUT_DESCRIPTION");
		$this->addFieldDetail('url', "INPUT_URL");
	}

	protected function loadService(){	
		return "module";
	}
	
	protected function getOption() {
		return "module.detail";
	}

}

?>
