<?php

class loadpacketController extends EditController {
	
	protected  function getTitle() {
		return "PACKET_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('id', "INPUT_ID");
		$this->addField('name', "INPUT_NAME", 'input', 30, true);
		$this->addField('description', "INPUT_DESCRIPTION", 'text', 200, false);
		$this->addFieldList('option', "INPUT_APP", 'multiGroupRadio', 100, true, $this->getListApp());
	}
	
	protected function loadService(){	
		return "packet";
	}
	
	protected function setUrl() {
		return 'packet/edit';
	}

	private function getListApp() {
		$module = new Module();
		$module->id = $this->getId();
		
		$list = $this->getservice("packet")->listoption($module);
		
		return $list;
	}

	protected function getOption() {
		return "packet.mod";
	}

}

?>
