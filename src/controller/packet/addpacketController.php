<?php

class addpacketController extends CrudController {

	public function crudAction() {
		$data = new Packet();
		$data->name = $_POST["name"];
		$data->description = $_POST["description"];
		$data->options = $_POST["option"];
		
		$this->getService("packet")->addPacketOpt($data);
	}
	
	protected function getOption() {
		return "packet.add";
	}

}

?>
