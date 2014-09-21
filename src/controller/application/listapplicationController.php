<?php

class listapplicationController extends ListController {
	
	protected  function getTitle() {
		return "APPLICATION_TITLE";
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
		return "application";
	}
	
	protected function setOptions() {
		$this->addDialogsEvaluation('app.active', 'enabled', 'application/enabled', 'glyphicon-ok', new Evaluation('enabled', Condition::EQUALS,'0'));
		$this->addDialogsEvaluation('app.active', 'disabled', 'application/disabled', 'glyphicon-off', new Evaluation('enabled', Condition::EQUALS,'1'));
		$this->addOptions('app.edit', 'load', 'application/load', 'glyphicon-edit');
		$this->addOptions('app.detail', 'detail', 'application/detail', 'glyphicon-book');
		$this->addOptions('appOpt.list', 'option', 'application/option', 'glyphicon-tasks');
		$this->addDialogs('app.del', 'delete', 'application/del', 'glyphicon-remove');
	}
	
	protected function setKeys() {
		return "id";
	}
	
	protected function getOption() {
		return "app.list";
	}

}

?>
