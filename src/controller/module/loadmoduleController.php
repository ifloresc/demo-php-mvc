<?php

class loadmoduleController extends EditController {
	
	protected  function getTitle() {
		return "MODULE_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('code', "INPUT_CODE", 'input', 5, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addField('url', "INPUT_URL", 'input', 255, true);
	}
	
	protected function loadService(){	
		return "module";
	}
	protected function setUrl() {
		return 'module/edit';
	}
	
	protected function getOption() {
		return "module.edit";
	}

}

?>
