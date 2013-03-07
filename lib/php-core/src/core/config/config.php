<?php

interface Config {
	// Nombre del Sitio
	const site_name = "demo";
	
	// Datos Sitio
	const site_url = "/demo-php-mvc";
	
	const mail_to = "info@mvc.cl";
	
	const publickey = ""; // you got this from the signup page
	
	const privatekey = "";
	
	const mailhide_pubkey = '';
	
	const mailhide_privkey = '';
	
	/*
	 * Datos Conexion BD
	 */
	const db_ip = "localhost";
	const db_name = "db";
	const db_user = "user";
	const db_pass = "pass";

}
?>
