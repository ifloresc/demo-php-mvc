<?php

class loadoptionController extends EditController {
	
	protected  function getTitle() {
		return "OPTION_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addField('code', "OPTION_PROP", 'input', 30, true);
		$this->addField('url', "INPUT_URL", 'input', 50, true);
		$this->addFieldList('module_id', "INPUT_MODULE", 'select', 0, true, $this->getModules());
		$this->addField('father', "OPTION_FATHER", 'number', 3, true);
	}
	
	protected function loadService(){	
		return "option";
	}
	
	protected function setUrl() {
		return 'option/edit';
	}

	private function getModules() {
		
		$list = $this->getService("module")->listAll();
		
		return $list;
	}
	
	protected function getOption() {
		return "option.edit";
	}

}

?>
