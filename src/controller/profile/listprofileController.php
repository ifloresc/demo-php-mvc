<?php

class listprofileController extends ListController {
	
	protected  function getTitle() {
		return "PROFILE_TITLE";
	}

	protected function setFilters() {
		$this->addFilter('name', "INPUT_NAME", 'input', 30, false);
	}
	
	protected function setColumns() {
		$this->addColumns('name', "INPUT_NAME");
		$this->addColumns('description', "INPUT_DESCRIPTION");
		$this->addColumns('enabled', "INPUT_STATE");
	}
	
	protected function loadService(){	
		return "profile";
	}
	
	protected function setOptions() {
		$this->addDialogsEvaluation("profile.enabled", 'enabled', 'profile/enabled', 'glyphicon-ok', new Evaluation('enabled',Condition::EQUALS,'0'));
		$this->addDialogsEvaluation("profile.enabled", 'disabled', 'profile/disabled', 'glyphicon-off', new Evaluation('enabled',Condition::EQUALS,'1'));
		$this->addOptions("profile.mod", 'load', 'profile/load', 'glyphicon-edit');
		$this->addOptions("profile.detail", 'detail', 'profile/detail', 'glyphicon-book');
		$this->addDialogs("profile.del", 'delete', 'profile/del', 'glyphicon-remove');
	}
	
	protected function setKeys() {
		return "id";
	}

	protected function getOption() {
		return "profile.list";
	}


}

?>
