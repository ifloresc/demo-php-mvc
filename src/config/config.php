<?php

interface Config {
	// Nombre del Sitio
	const site_name = "demo-php-mvc";
	
	// Datos Sitio
	const site_url = "/demo-php-mvc";
	
	const mail_to = "info@demo.cl";
	
	const publickey = ""; // you got this from the signup page
	
	const privatekey = "";
	
	const mailhide_pubkey = '';
	
	const mailhide_privkey = '';

	// Campos que define el atributo de donde sacar el perfil del Objeto de la session
	const profileType = 'profile';
	
	/*
	 * Datos Conexion BD
	 */
	const db_ip = "localhost";
	const db_name = "sisnetcl_demo";
	const db_user = "demo_user";
	const db_pass = "nz2038pq";
	
	// Modo develop
	const develop = false;
	
	// Title Mail
	const title_mail = 'Contacto Web';
	
	// Active/Disable mail
	const sendMail_cliente = false;
	
	const sendMail_user = true;

}
?>
