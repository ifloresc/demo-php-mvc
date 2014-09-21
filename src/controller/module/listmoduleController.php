<?php

class listmoduleController extends ListController {
	
	protected  function getTitle() {
		return "MODULE_TITLE";
	}

	protected function setFilters() {
		$this->addFilter('name', "INPUT_NAME", 'input', 30, false);
		$this->addFilter('code', "INPUT_CODE", 'input', 5, false);
	}
	
	protected function setColumns() {
		$this->addColumns('name', "INPUT_NAME");
		$this->addColumns('code', "INPUT_CODE");
		$this->addColumns('description', "INPUT_DESCRIPTION");
		$this->addColumns('enabled', "INPUT_STATE");
	}
	
	protected function loadService(){	
		return "module";
	}
	
	protected function setOptions() {
		$this->addDialogsEvaluation('module.active', 'enabled', 'module/enabled', 'glyphicon-ok', new Evaluation('enabled',Condition::EQUALS,'0'));
		$this->addDialogsEvaluation('module.active', 'disabled', 'module/disabled', 'glyphicon-off', new Evaluation('enabled',Condition::EQUALS,'1'));
		$this->addOptions('module.edit', 'load', 'module/load', 'glyphicon-edit');
		$this->addOptions('module.detail', 'detail', 'module/detail', 'glyphicon-book');
		$this->addDialogs('module.del', 'delete', 'module/del', 'glyphicon-remove');
	}
	
	protected function setKeys() {
		return "id";
	}

	protected function getOption() {
		return "module.list";
	}

}

?>
