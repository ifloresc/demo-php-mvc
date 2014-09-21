<?php

class listoptionController extends ListController {
	
	protected  function getTitle() {
		return "OPTION_TITLE";
	}
	
	protected function setFilters() {
		$this->addFilter('name', "INPUT_NAME", 'input', 30, false);
		$this->addFilterList('module', "INPUT_MODULE", 'select', 30, false, $this->getModules());
	}

	private function getModules() {		
		return$this->getService("module")->listAll();
	}
	
	protected function setColumns() {
		$this->addColumns('name', "INPUT_NAME");
		$this->addColumns('description', "INPUT_DESCRIPTION");
		$this->addColumns('module', "INPUT_MODULE");
		$this->addColumns('url', "INPUT_URL");
		$this->addColumns('enabled', "INPUT_STATE");
	}
	
	protected function loadService(){	
		return "option";
	}
	
	protected function setOptions() {
		$this->addDialogsEvaluation("option.active", 'enabled', 'option/enabled', 'glyphicon-ok', new Evaluation('enabled',Condition::EQUALS,'0'));
		$this->addDialogsEvaluation("option.active", 'disabled', 'option/disabled', 'glyphicon-off', new Evaluation('enabled',Condition::EQUALS,'1'));
		$this->addOptions("option.edit", 'load', 'option/load', 'glyphicon-edit');
		$this->addOptions("option.detail", 'detail', 'option/detail', 'glyphicon-book');
		$this->addDialogs("option.del", 'delete', 'option/del', 'glyphicon-remove');
	}
	
	protected function setKeys() {
		return "id";
	}
	
	protected function getOption() {
		return "option.list";
	}

}

?>
