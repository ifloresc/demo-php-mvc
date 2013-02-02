<?php

class exporttestController extends exportController {
	
	public function action() {
		
		return "simple";
	}

	protected function accessControl() {
		return false;
	}
	
}

?>