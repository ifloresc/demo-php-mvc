<?php

class loadtestController extends BaseController {
	
	public function action() {
		$this->setAttribute('id',$this->getId());
		return "load";
	}

	protected function accessControl() {
		return false;
	}
	
}

?>
