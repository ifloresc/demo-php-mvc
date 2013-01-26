<?php

class errortestController extends CrudController {
	
	public function crudAction() {
		
		throw new Exception("Error en la Logica");
	}
	
	public function getMsg() {
		return "Succes";
	}

	protected function accessControl() {
		return false;
	}
	
}

?>