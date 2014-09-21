<?php

class optionapplicationController extends AbstractController {

	public function action() {
		$app = new Application();
		$app->id = $this->getId();
		
		$mod = $this->getService("application")->load($app);		
		$this->setAttribute("module", $mod);
		
		$options = $this->getService("option")->optionApp($app);
		$this->setAttribute("listOption", $options);
		
		return "option";
	}
	
	protected function getOption() {
		return "appOpt.list";
	}

}

?>
