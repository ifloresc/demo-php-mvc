<?php

class delprofileController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("profile")->delete($app);
	}
	
	protected function getOption() {
		return "profile.del";
	}


}

?>
