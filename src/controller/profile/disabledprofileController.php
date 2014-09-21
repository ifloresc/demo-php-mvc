<?php

class disabledprofileController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("profile")->disabled($app);
	}
	
	protected function getOption() {
		return "profile.enabled";
	}


}

?>
