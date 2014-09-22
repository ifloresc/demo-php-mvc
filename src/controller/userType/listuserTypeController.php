<?php

class listuserTypeController extends ListController {
	
	protected  function getTitle() {
		return "USER_TYPE_TITLE";
	}

	protected function setFilters() {
		$this->addFilter('name', "INPUT_NAME", 'input', 30, false);
	}
	
	protected function setColumns() {
		$this->addColumns('id', "INPUT_ID");
		$this->addColumns('name', "INPUT_NAME");
		$this->addColumns('description', "INPUT_DESCRIPTION");
	}
	
	protected function loadService(){	
		return "userType";
	}
	
	protected function setOptions() {
		$this->addOptions("userType.mod", 'load', 'userType/load', 'glyphicon-edit');
		$this->addOptions("userType.detail", 'detail', 'userType/detail', 'glyphicon-book');
		$this->addDialogs("userType.del", 'delete', 'userType/del', 'glyphicon-remove');
	}
	
	protected function setKeys() {
		return "id";
	}

	protected function getOption() {
		return "userType.list";
	}

}

?>
