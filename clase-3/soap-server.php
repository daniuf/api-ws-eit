<?php

class Servidor {

	public function __construct(){}

	public function holaMundo() {
		return "Hola mundo!";
	}

	public function holaMundoParam($mensaje) {
		return "Hola, ".$mensaje;
	}
}

$options = array(
		'uri' => 'http://eit.indianadev.biz/clase-3/soap-server.php'
	   );

$servidor = new SoapServer(null, $options);
$servidor->setClass('Servidor');
$servidor->handle();


