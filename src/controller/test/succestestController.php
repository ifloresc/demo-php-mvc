<?php

class succestestController extends CrudController {
	
	public function crudAction() {
		// Logica
	}
	
	public function getMsg() {
		return "Operacion Exitosa";
	}

	protected function accessControl() {
		return false;
	}
	
}

?>