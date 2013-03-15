<?php

class loadtestController extends BaseController {
	
	public function action() {
		$this->registry->template->id = $_GET['id'];
		return "load";
	}

	protected function accessControl() {
		return false;
	}
	
}

?>
