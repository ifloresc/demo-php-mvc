<?php

class optionprofileController extends AbstractController {

	public function action() {
	
		$packet = new Packet();
		$packet->id = $_POST['packet'];
		
		$list = $this->getService("packet")->listOptionPacket($packet);
		$this->setAttribute("list", $list);
		
		return "option";
	}
	
	protected function isModal() {
		return true;
	}

	protected function getOption() {
		return "profile.option";
	}

	

}

?>
