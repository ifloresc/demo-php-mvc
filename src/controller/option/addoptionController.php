<?php

class addoptionController extends CrudController {

	public function crudAction() {
		$opt = new Option();
		$opt->name = $_POST["name"];
		$opt->description = $_POST["description"];
		$opt->prop = $_POST["prop"];
		$opt->url = $_POST["url"];
		$opt->module = $_POST["module"];
		//TODO: Falta validar cuando es Null
		$opt->father = $_POST["father"];
		
		$this->getService("option")->add($opt);
	}
	
	protected function getOption() {
		return "option.add";
	}

}

?>
