<?php

class enabledprofileController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("profile")->enabled($app);
	}
	
	protected function getOption() {
		return "profile.enabled";
	}


}

?>
