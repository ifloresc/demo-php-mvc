<?php
/**
 * Classe que deben implementar los Sitios si requieres logicas especificas
 * @author iflores
 *
 */
abstract class BaseController extends AbstractController {
	
	final protected function initSite() {
	}
	
	final protected function indexSite() {
	}
	
	final protected function validAdminProfile() {
		return false;
	}	
	
	/**
	 * Methodo que obtiene el Grupo de la Session
	 */
	protected final function setOwnData() {

	}
	
}

?>
