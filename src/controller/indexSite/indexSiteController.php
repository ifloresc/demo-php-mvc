<?php

class indexSiteController extends AbstractController {
	
	public function action() {
	
		if ($this->isLogin()) {
			return "home";
		}
	
		return "index";
	}
	
	protected function accessControl() {
		return false;
	}
	
}

?>
