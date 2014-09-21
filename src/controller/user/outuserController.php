<?php

class outuserController extends AbstractController {

	public function action() {
		$this->deleteSession();
		return "controller->indexSite";
	}

	protected function accessControl() {
		return false;
	}

}

?>
