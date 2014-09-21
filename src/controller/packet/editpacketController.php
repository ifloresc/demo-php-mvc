<?php

class editpacketController extends CrudController {

	public function crudAction() {
		$data = new Application();
		$data->id = $_POST["id"];
		$data->name = $_POST["name"];
		$data->description = $_POST["description"];
		$data->options = $_POST["option"];
		
		$this->getService("packet")->updatePacketOpt($data);
	}
	
	protected function getOption() {
		return "packet.mod";
	}

}

?>
