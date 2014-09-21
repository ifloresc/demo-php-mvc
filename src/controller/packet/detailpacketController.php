<?php

class detailpacketController extends DetailController {
	
	protected  function getTitle() {
		return "PACKET_LOAD";
	}
	
	protected function setFields() {
		$this->addFieldDetail('name', "INPUT_NAME");
		$this->addFieldDetail('description', "INPUT_DESCRIPTION");
		$this->addFieldDetailList('optName', "INPUT_APP", $this->getListApp());
	}

	protected function loadService(){	
		return "packet";
	}

	private function getListApp() {
		$module = new Module();
		$module->id = $this->getId();
		
		$list = $this->getservice("packet")->listOptionPacket($module);
		
		return $list;
	}

	protected function getOption() {
		return "packet.detail";
	}

}

?>
