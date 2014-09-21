<?php

class putoptionController extends AddController {

	protected  function getTitle() {
		return "MODULE_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addField('prop', "OPTION_PROP", 'input', 30, true);
		$this->addField('url', "INPUT_URL", 'input', 50, true);
		$this->addFieldList('module', "INPUT_MODULE", 'select', 0, true, $this->getModules());
		$this->addField('father', "OPTION_FATHER", 'number', 3, true);
	}
	
	protected function setUrl() {
		return 'option/add';
	}

	private function getModules() {
		
		$list = $this->getService("module")->listAll();
		
		return $list;
	}
	
	protected function getOption() {
		return "option.add";
	}

}

?>
