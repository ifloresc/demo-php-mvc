<?php

class loginuserController extends AbstractController {

	public function action() {
		$session = $this->getUserSession();
		if (!isset($session)) {
			$user = new User();
			$user->login = $_POST['user'];
			$user->password = $_POST['passwd'];
			// Logeamos el Usuario		
			$login = $this->getService('user')->login($user);
			
			// Creamos Objeto de Session
			$userSession = new UserSession();
			$userSession->id = $login->id;
			$userSession->login = $login->login;
			$userSession->user = $login->user;
			$userSession->name = $login->name;
			$userSession->lastName = $login->lastName;
			$userSession->company = $login->company;
			$userSession->companyName = $login->companyName;

			// Clave temporal, debe cambiar la clave
			if ($login->error == 1001004) {
				$this->createSession($userSession);
				return "->login/first";
			}
			// Clave expirada
			if ($login->error == 1001003) {
				$this->createSession($userSession);
				return "->login/expired";
			}

			// Agregamos las opciones
			$userSession->profile = $login->profile;
			$userSession->applications = $login->applications;
			$userSession->options = $login->options;
			
			$this->createSession($userSession);
			// Generamos Cookie
			if (isset($_POST['remember'])) {
				if ($_POST['remember'] == 1) {
					setcookie('user', $userSession, time() + (3600 * 24 * 30));
				}
			}
		}

		return "->home/data";
	}
	
	protected function accessControl() {
		return false;
	}

}

?>
