<?php

class delapplicationController extends CrudController {

	public function crudAction() {
		$app = new Application();
		$app->id = $this->getId();
		
		$this->getService("application")->delete($app);
	}
	
	protected function getOption() {
		return "app.del";
	}

}

?>
