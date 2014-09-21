<?php

class editoptionController extends CrudController {

	public function crudAction() {
		$opt = new Option();
		$opt->id = $_POST["id"];		
		$opt->name = $_POST["name"];
		$opt->description = $_POST["description"];
		$opt->prop = $_POST["code"];
		$opt->url = $_POST["url"];
		$opt->module = $_POST["module_id"];
		$opt->father = $_POST["father"];
		
		$this->getService("option")->update($opt);
	}
	
	protected function getOption() {
		return "option.edit";
	}

}

?>
