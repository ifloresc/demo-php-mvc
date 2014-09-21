<?php

class listuserController extends ListController {
	
	protected  function getTitle() {
		return "USER_TITLE";
	}
	
	protected function setFilters() {
		$this->addFilter('name', "INPUT_NAME", 'input', 30, false);
		$this->addFilter('lastName', "INPUT_LASTNAME", 'input', 30, false);
		$this->addFilter('login', "INPUT_USER", 'input', 30, false);
		$this->addFilterList('profile', "INPUT_PROFILE", 'select', 0, false, $this->getListProfile());
	}

	private function getListProfile() {
		return $this->getService("profile")->listAll();	
	}
	
	protected function setColumns() {
		$this->addColumns('name', "INPUT_NAME");
		$this->addColumns('lastName', "INPUT_LASTNAME");
		$this->addColumns('login', "INPUT_USER");
		$this->addColumns('profile', "INPUT_PROFILE");
		$this->addColumns('lastLogin', "INPUT_LAST_LOGIN");
		$this->addColumns('enabled', "INPUT_STATE");
	}
	
	protected function loadService(){	
		return "user";
	}
	
	protected function setOptions() {
		$this->addDialogsEvaluation("user.enabled", 'enabled', 'user/enabled', 'glyphicon-ok', new Evaluation('enabled',Condition::EQUALS,'0'));
		$this->addDialogsEvaluation("user.enabled", 'disabled', 'user/disabled', 'glyphicon-off', new Evaluation('enabled',Condition::EQUALS,'1'));
		$this->addDialogs("user.password", 'password', 'user/password', 'glyphicon-lock');
		$this->addOptions("user.mod", 'load', 'user/load', 'glyphicon-edit');
		$this->addOptions("user.detail", 'detail', 'user/detail', 'glyphicon-book');
		$this->addDialogsEvaluation("user.del", 'delete', 'user/del', 'glyphicon-remove', new Evaluation('id',Condition::NOTEQUALS,'1'));
	}
	
	protected function setKeys() {
		return "id";
	}

	protected function getOption() {
		return "user.list";
	}

}

?>
