<?php
/**
* Servicio para User
**/
class userService extends Service  {
	
	/**
	* Servicio encargado del Login al Sitio
	*
	*/
	public function login($user) {
		// Validamos si usuario existe
		$userDao = $this->getDAO("user");
		if (!$userDao->existLogin($user)) {
			throw new Exception("user.not.found", 1001001);
		}
		// Validamos User y pass
		$login = $userDao->login($user);
		
		if ($login == null) {
			// Verificamos cantidad de intentos de logeo invalidos
			$login = $userDao->loadLogin($user);
			// Si usuario no es Admin Bloqueamos
			if ($login->id != 1) {
				if ($login->attempts >= 3) {
					// Bloqueamos usuario
					$userDao->bloqued($login);
					// Se bloquea Usuario
					throw new Exception("user.bloq", 1001005);
				}
			}

			// Actualizamos intentos
			$userDao->updateAttemps($user);
			// Error
			throw new Exception("user.invalid", 1001002);
		}
		// Verificamos si clave esta expirada
		if (!$userDao->isPasswordValid($login)) {
			$login->error = 1001003;
			return $login;
		}	
		// Verificamos si es temporal
		if ($login->temp) {
			// Guardamos el error
			$login->error = 1001004;
			return $login;
		}
		// Actualizamos Ingreso
		$userDao->updatelogin($login);

		// Verificamos si perteneca a un empresa
		$user->user = $login->user_id;
		$company = $this->getDAO("companyUser")->load($user);

		if (isset($company)) {
			$login->company = $company->companyId;
			$login->companyName = $company->company;
		}

		// Cargamos las Opciones del Perfil
		$login->applications = $this->getOption($login);
		$login->options = $this->getOptionCode($login->applications);
	
		return $login;
	}

	private function getOptionCode($applications) {
		$options = array();
		foreach ($applications as &$app) {
			foreach ($app->modules as &$module) {
				foreach ($module->options as &$opt) {
					$options[] = $opt->code;
					if (isset($opt->option)) {
						foreach ($opt->option as &$optSon) {
							$options[] = $optSon->code;
						}
					}
				}
			}
		}
		return $options;
	}
	
	private function getOption($user) {		
		$applications = $this->getDAO("profile")->listOptionProfileActive($user);
		
		return $this->groupOption($applications);
	}
	
	public function disabled($data) {
		$this->getDAO("user")->disabled($data);
	}
	
	public function enabled($data) {
		$this->getDAO("user")->enabled($data);
	}
	
	public function add($data) {
		$userDao = $this->getDAO("user");
		// Verificamos si no existe el Login
		if ($userDao->existLogin($data)) {
			throw new Exception("user.exist");
		}
		// Creamos Usuario habilitado
		$data->enabled = 1;
		$data->type = 1;
		// Creamos Usuario
		$id = $userDao->add($data);
		
		$data->id = $id;
		
		// Generamos Clave Aleatoria
		$data->password = $this->rand_string(10);
		
		// Desactivamos todas las claves anteriores
		$userDao->disabledLogin($data);
		// Creamos Contraseña
		$userDao->addLoginTmp($data);

		$message = "<p>Se ha registrado en el sitio , su datos de acceso son los siguiente : </p>";
		$message .= "<p><b>Usuario : </b> ". $data->login ."</p>";
		$message .= "<p><b>Clave : </b> ". $data->password ."</p>";
		$message .= "<p><b>Url : </b> ". self::site_url ."</p>";
		$message .= "<p>Esta clave es temporal, y se solicitara cambiarla al ingresar al sitio.</p>";
		
		// Enviamos correo
		$this->sendMail($data->email, $message, 'Clave Ingreso Sitio');
	}
	
	public function delete($data) {
		$userDao = $this->getDAO("user");
		// Borramos Claves
		$userDao->deleteLogin($data);
		// Borramos Usuario
		$userDao->delete($data);
	}
	
	public function resetLogin($data) {
		$userDao = $this->getDAO("user");

		// Generamos Clave Aleatoria
		$data->password = $this->rand_string(10);
	
		// Desactivamos todas las claves anteriores
		$userDao->disabledLogin($data);
		// Creamos Contraseña
		$userDao->addLoginTmp($data);

		// Cargamos los Datos
		$user = $userDao->load($data);

		$message = "<p>Se ha solicitado reseto de clave , su datos de acceso son los siguiente : </p>";
		$message .= "<p><b>Usuario : </b> ". $user->login ."</p>";
		$message .= "<p><b>Clave : </b> ". $data->password ."</p>";
		$message .= "<p><b>Url : </b> ". self::site_url ."</p>";
		$message .= "<p>Esta clave es temporal, y se solicitara cambiarla al ingresar al sitio.</p>";

		// Enviamos correo
		$this->sendMail($user->email, $message, 'Reseteo Clave Ingreso');
	}
	
	public function updateProfile($data) {
		$userDao = $this->getDAO("user");

		// Borramos Usuario
		$userDao->updateProfile($data);
	}

	public function changePassword($user) {
		// Verificamos nueva clave
		if ($user->newpassword != $user->renewpassword) {
			throw new Exception("user.pass.not.equals");
		}
		if ($user->password == $user->newpassword) {
			throw new Exception("user.pass.not.same");
		}
		// Validamos si usuario existe
		$userDao = $this->getDAO("user");

		if (!$userDao->existLogin($user)) {
			throw new Exception("user.not.found", 1001001);
		}
		// Validamos User y pass
		$login = $userDao->login($user);
		
		if ($login == null) {
			throw new Exception("user.pass.invalid", 1001002);
		}
		// Desactivamos todas las claves anteriores
		$user->id = $login->id;

		$userDao->disabledLogin($user);
		// Actualizamos Clave
		$user->password = $user->newpassword;
		// Actualizamos Clave
		$userDao->addLogin($user);
	}
}
?>