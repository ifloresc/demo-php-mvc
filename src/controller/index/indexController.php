<?php

class indexController extends AbstractController {

	public function action() {
		
		if ($this->getUserSession()) {
			return "->home/data";
		}

		return "index";
	}

	protected function accessControl() {
		return false;
	}

	protected function isFreeAccess() {
		return true;
	}

}

?>
