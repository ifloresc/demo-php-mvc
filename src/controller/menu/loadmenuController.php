<?php

class loadmenuController extends AbstractController {

	public function action() {
		$id = $this->getId();
		
		$session = $this->getUserSession();
		$session->application = $id;
		
		$this->createSession($session);
		
		return "->home/data";
	}

	protected function isFreeAccess() {
		return true;
	}

}

?>
