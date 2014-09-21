<?php

class datahomeController extends AbstractController {

	public function action() {
		return "home";
	}
	
	protected function accessControl() {
		return true;
	}
	
	protected  function isGloba() {
		return true;
	}

	protected function isFreeAccess() {
		return true;
	}

}

?>
