<?php

class putpacketController extends AddController {

	protected  function getTitle() {
		return "PACKET_ADD";
	}
	
	protected function setFields() {
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addFieldList('option', "INPUT_APP", 'multiGroupRadio', 100, true, $this->getListApp());
	}
	
	protected function setUrl() {
		return 'packet/add';
	}

	private function getListApp() {
		return $this->getService("application")->listAppOptionAll();
	}

	protected function getOption() {
		return "packet.add";
	}

}

?>
