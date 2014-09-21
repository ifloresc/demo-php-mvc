<?php

class putmoduleController extends AddController {

	protected  function getTitle() {
		return "MODULE_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('code', "INPUT_CODE", 'input', 5, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addField('url', "INPUT_URL", 'input', 255, false);
	}
	
	protected function setUrl() {
		return 'module/add';
	}
	
	protected function getOption() {
		return "module.add";
	}

}

?>
