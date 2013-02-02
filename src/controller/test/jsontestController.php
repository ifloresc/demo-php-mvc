<?php

class jsontestController extends JsonController {
	
	public function jsonAction() {
		// Logica
		return "{data = ''}";
	}

	protected function accessControl() {
		return false;
	}
	
}

?>