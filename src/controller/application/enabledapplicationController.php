<?php

class enabledapplicationController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("application")->enabled($app);
	}
	
	protected function getOption() {
		return "app.active";
	}

}

?>
