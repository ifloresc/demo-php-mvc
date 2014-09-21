<?php

class listpacketController extends ListController {
	
	protected  function getTitle() {
		return "PACKET_TITLE";
	}
	
	protected function setColumns() {
		$this->addColumns('id', "INPUT_ID");
		$this->addColumns('name', "INPUT_NAME");
		$this->addColumns('description', "INPUT_DESCRIPTION");
		$this->addColumns('enabled', "INPUT_STATE");
	}
	
	protected function loadService(){	
		return "packet";
	}
	
	protected function setOptions() {
		$this->addDialogsEvaluation("packet.enabled", 'enabled', 'packet/enabled', 'glyphicon-ok', new Evaluation('enabled',Condition::EQUALS,'0'));
		$this->addDialogsEvaluation("packet.enabled", 'disabled', 'packet/disabled', 'glyphicon-off', new Evaluation('enabled',Condition::EQUALS,'1'));
		$this->addOptions("packet.mod", 'load', 'packet/load', 'glyphicon-edit');
		$this->addOptions("packet.detail", 'detail', 'packet/detail', 'glyphicon-book');
		$this->addDialogs("packet.del", 'delete', 'packet/del', 'glyphicon-remove');
	}
	
	protected function setKeys() {
		return "id";
	}

	protected function getOption() {
		return "packet.list";
	}

}

?>
